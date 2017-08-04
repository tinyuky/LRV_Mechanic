<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Customer;
use App\product;
use App\image;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use File;
use Purifier;
use App\categories;
use App\branches;


class ProductCRUDController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __construct()
  {
    $this->middleware('auth:web');
  }

  public function index()
  {
    $user = User::find(1);
    $post = product::sortable()->paginate(5);
    return view('pages.product.home')->with('user',$user)->with('post',$post);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user =User::find(1);
    $ct = categories::all();
    $br = branches::all();
    return view('pages.product.product')->with('user',$user)->with('cus',null)->with('categories',$ct)->with('branches',$br);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $ct = categories::where('name',$request->category)->first();
    $br = branches::where('name',$request->branch)->first();
    $lastid = product::create([
      'title'=> $request->title,
      'price'=> $request->price,
      'status'=> $request->status,
      'condition'=> $request->condition,
      'category_id'=> $ct->id,
      'branch_id'=> $br->id,
      'content'=> Purifier::clean($request->content)
      ])->id;
      for ($i=0; $i <4 ; $i++) {
        $cop = Storage::copy('public/old'.$i.'.png', 'public/image/'.$lastid.'_'.$i.'.png');
        Storage::delete('public/old'.$i.'.png');
        image::create([
          'product_id'=>$lastid,
          'path'=>'storage/image/'.$lastid.'_'.$i.'.png'
        ]);
      }
      return redirect()->route('product.index')->with('status','PRODUCT ADDED!');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function search(Request $search)
    {
      if($search->search==null){
    		return redirect()->route('product.index');
    	}
    	else{
    		$str = $search->search;
    		$users	 = product::where('title','like','%'.$str.'%')
    					->orwhere('price','like','%'.$str.'%')->sortable()->paginate(5);
        $user =User::find(1);
         	return view('pages.product.home',['post'=>$users,'user'=>$user]);
    	}

    }

    public function show($id){
      $user =User::find(1);
      $cus = product::find($id);
      $img = image::where('product_id',$id)->get();
      $ct = categories::all();
      $br = branches::all();
      return view('pages.product.product')->with('user',$user)->with('cus',$cus)->with('img',$img)->with('categories',$ct)->with('branches',$br);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
      $ct = categories::where('name',$request->input('category'))->first();
      $br = branches::where('name',$request->input('branch'))->first();
      $cus = product::find($request->id);
      $cus->title = $request->input('title');
      $cus->price = $request->input('price');
      $cus->status = $request->input('status');
      $cus->condition = $request->input('condition');
      $cus->category_id = $ct->id;
      $cus->branch_id = $br->id;
      $cus->content = Purifier::clean($request->input('content'));
      $cus->save();
      image::where('product_id',$request->id)->delete();
      for ($i=0; $i <4 ; $i++) {
        Storage::delete('public/image/'.$request->id.'_'.$i.'.png');
        $cop = Storage::copy('public/old'.$i.'.png', 'public/image/'.$request->id.'_'.$i.'.png');
        Storage::delete('public/old'.$i.'.png');
        image::create([
          'product_id'=>$request->id,
          'path'=>'storage/image/'.$request->id.'_'.$i.'.png'
        ]);
      }
      return redirect()->route('product.index')->with('status','PRODUCT UPDATED!');


    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
      image::where('product_id',$id)->delete();
      for ($i=0; $i <4 ; $i++) {
        Storage::delete('public/image/'.$id.'_'.$i.'.png');
      }
      $user = product::find($id);
      $user->delete();
      return redirect()->back()->with('status', 'PRODUCT DELETED!');
    }

    public function preview(Request $request){
      if($request->id==null){
        $this->validate($request,array(
          'title' => 'required|string|max:255',
          'content' => 'required|string|max:255',
          'price'=>'required|numeric',
          'files'=> 'required',
          'condition'=> 'required|string',
          'status'=> 'required|string',
        ));
        for ($i=0; $i <4 ; $i++) {
          $del = Storage::delete('public/old'.$i.'.png' );
        }
        $files = $request->file('files');
        $i=0;
        foreach ($files as $img) {
          $c = $img->storeAs('public','old'.$i.'.png');
          $i = $i+1;
        }
        if($request->file('reselect0')!=null){
          $request->file('reselect0')->storeAs('public','old0.png');
        }
        if($request->file('reselect1')!=null){
          $request->file('reselect1')->storeAs('public','old1.png');
        }
        if($request->file('reselect2')!=null){
          $request->file('reselect2')->storeAs('public','old2.png');
        }
        if($request->file('reselect3')!=null){
          $request->file('reselect3')->storeAs('public','old3.png');
        }
        $user =User::find(1);
        return view('pages.product.preview')->with('request',$request)->with('user',$user);
      }
      else{
        $this->validate($request,array(
          'title' => 'string|max:255',
          'content' => 'string|max:255',
          'price'=>'numeric',
          'condition'=> 'required|string',
          'status'=> 'required|string',
        ));
        for ($i=0; $i <4 ; $i++) {
          $del = Storage::delete('public/old'.$i.'.png' );
        }
        if($request->file('files')!=null){
          $files = $request->file('files');
          $i=0;
          foreach ($files as $img) {
            $c = $img->storeAs('public','old'.$i.'.png');
            $i = $i+1;
          }
        }
        else{
          for ($i=0; $i <4 ; $i++) {
            $cop = Storage::copy('public/image/'.$request->id.'_'.$i.'.png','public/old'.$i.'.png' );
          }
        }
        if($request->file('reselect0')!=null){
          $request->file('reselect0')->storeAs('public','old0.png');
        }
        if($request->file('reselect1')!=null){
          $request->file('reselect1')->storeAs('public','old1.png');
        }
        if($request->file('reselect2')!=null){
          $request->file('reselect2')->storeAs('public','old2.png');
        }
        if($request->file('reselect3')!=null){
          $request->file('reselect3')->storeAs('public','old3.png');
        }
        $user = User::find(1);
        return view('pages.product.preview')->with('request',$request)->with('user',$user);
      }
    }

    public function showlist(){
      $user = User::find(1);
      $product = product::all();
      return view('pages.product.show')->with('user',$user)->with('post',$product);
    }

    public function getinfo($id){
      $user = User::find(1);
      $cus = product::find($id);
      $img = image::where('product_id',$id)->get();
      return view('pages.product.info')->with('user',$user)->with('post',$cus)->with('img',$img);
    }

    public function getcate(Request $request){
      $br  = branches::where('name',$request->name)->first()->categories;
      return response()->json($br);
    }

  }
