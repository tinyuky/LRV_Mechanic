<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\product;
use App\branches;
use App\categories;
use Session;
use App\Cart;
use View;

class ShopController extends Controller
{
  function index(){
    $posts = product::orderBy('created_at','desc')->limit(6)->get();
    $oldcart = Session::get('cart');
    $cart = new Cart($oldcart);
    return view('frontend.pages.index')->with('posts',$posts)->with('cart',$cart->items);
  }
  function showinfo($id){
    $info = product::find($id);
    return view('frontend.pages.product_detail')->with('info',$info)->with('posts',null);
  }
  function showfromlink($cate,$branch){
    $ct = categories::where('name',$cate)->first();
    $br = branches::where('name',$branch)->first();
    $posts = product::where('category_id',$ct->id)->where('branch_id',$br->id)->get();
    return view('frontend.pages.index')->with('posts',$posts);
  }
  function showfromlinkbr($branch){
    $br = branches::where('name',$branch)->first();
    $posts = product::where('branch_id',$br->id)->get();
    return view('frontend.pages.index')->with('posts',$posts);
  }
  public function addCart(Request $request){
    $product = product::find($request->id);
    $oldcart = null;
    if($request->session()->has('cart')){
      $oldcart = $request->session()->get('cart');
    }
    $cart = new Cart($oldcart);
    $cart->add($product,$product->id);
    $request->session()->put('cart',$cart);
    $rs = $cart->items[$request->id];
    return response()->json($rs);

  }

  public function viewCart(){
    if(Session::has('cart')){
      $oldcart = Session::get('cart');
      $cart = new Cart($oldcart);
      return view('frontend.pages.cart',['products'=>$cart->items]);
    }
    else{
      return view('frontend.pages.cart');
    }
  }

  public function deleteCart(Request $request){
    $product = product::find($request->id);
    $oldcart = null;
    if($request->session()->has('cart')){
      $oldcart = $request->session()->get('cart');
    }
    $cart = new Cart($oldcart);
    $cart->delete($product,$product->id);
    $request->session()->put('cart',$cart);
    $rs = $cart->items[$request->id];
    return response()->json($rs);
  }

  public function removeCart(Request $request){
    $product = product::find($request->id);
    $oldcart = null;
    if($request->session()->has('cart')){
      $oldcart = $request->session()->get('cart');
    }
    $cart = new Cart($oldcart);
    $cart->remove($product->id);
    $request->session()->put('cart',$cart);
    $check = session()->get('cart');
    if(count($check->items)==0){
      $request->session()->forget('cart');
    }
  }

  public function shop(){
    $product = product::paginate(1);
    $productsum = product::all();
    $branch = branches::all();
    $oldcart = Session::get('cart');
    $cart = new Cart($oldcart);
    return view('frontend/pages/shop',array('posts'=>$product))->with('branches',$branch)->with('prsum',$productsum)->with('cart',$cart->items);
  }


  public function shopbycate($name){
    $find = categories::where('name',$name)->first();
    $productsum = product::where('category_id',$find->id)->get();
    $branch = $find->branches;
    $product = product::where('category_id',$find->id)->paginate(1);
    $oldcart = Session::get('cart');
    $cart = new Cart($oldcart);
    return view('frontend/pages/shop')->with('posts',$product)->with('branches',$branch)->with('prsum',$productsum)->with('cart',$cart->items);
  }

  // public function ajaxshop(Request $request){
  //   if($request->name==null){
  //     $product = product::paginate(1);
  //     $oldcart = Session::get('cart');
  //     $cart = new Cart($oldcart);
  //     return View::make('frontend/layouts/posts')->with('posts',$product)->with('cart',$cart->items)->render();
  //   }
  //   else{
  //     $find = categories::where('name',$request->name)->first();
  //     $product = product::where('category_id',$find->id)->paginate(1);
  //     $oldcart = Session::get('cart');
  //     $cart = new Cart($oldcart);
  //     return View::make('frontend/layouts/posts')->with('posts',$product)->with('cart',$cart->items)->render();
  //   }
  //
  // }

  public function ajaxsearch(Request $request){
    $sr = $request->search;
    if($request->brand!=null){
      $br = explode("/",$request->brand);
    }
    $pr = explode(":",$request->price);
    $prmin = $pr[0];
    $prmax = $pr[1];
    if($request->name==null){
      $product = product::where('title','like','%'.$sr.'%')
      ->whereBetween('price',[$prmin,$prmax])->paginate(1);
      if($request->brand!=null){
        $product = product::where('title','like','%'.$sr.'%')
        ->whereBetween('price',[$prmin,$prmax])->whereIn('branch_id',$br)->paginate(1);
      }
      $oldcart = Session::get('cart');
      $cart = new Cart($oldcart);
      return View::make('frontend/layouts/posts')->with('posts',$product)->with('cart',$cart->items)->render();
    }
    else{
      $find = categories::where('name',$request->name)->first();
      $product = product::where('category_id',$find->id)->where('title','like','%'.$sr.'%')
      ->whereBetween('price',[$prmin,$prmax])->paginate(1);
      if($request->brand!=null){
        $product = product::where('category_id',$find->id)->where('title','like','%'.$sr.'%')
        ->whereBetween('price',[$prmin,$prmax])->whereIn('branch_id',$br)->paginate(1);
      }
      $oldcart = Session::get('cart');
      $cart = new Cart($oldcart);
      return View::make('frontend/layouts/posts')->with('posts',$product)->with('cart',$cart->items)->render();

    }
  }

  public function changeLang(Request $request){
    if($request->ajax()){
      $request->session()->put('locale',$request->locale);
    }
  }

}
