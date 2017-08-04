<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
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
    $posts = categories::paginate(5);
    return view('backend.categories.home')->with('user',$user)->with('posts',$posts);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user = User::find(1);
    return view('backend.categories.categories')->with('user',$user)->with('cus',null);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request,array(
      'name' => 'required|string|max:255|unique:categories,name',
    ));
    categories::create(['name'=>$request->name]);
    return redirect()->route('categories.index')->with('status','CATEGORY ADDED!');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $user = User::find(1);
    $cus = categories::find($id);
    return view('backend.categories.categories')->with('user',$user)->with('cus',$cus);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
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
    $data = $request->all();
    $cus = categories::find($request->input('id'));

    $c = Validator::make($data, [
      'name' => [
        'required',
        'string',
        'max:255',
        Rule::unique('categories')->ignore($cus->id),
      ],
    ]);
    if($c->fails()){
      $this->validate($request,array(
        'name' => 'required|string|max:255|unique:categories,name',
      ));
    }

    $cus->name = $request->input('name');
    $cus->save();
    return redirect()->route('categories.index')->with('status','CATEGORY UPDATED');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $product = product::where('category_id',$id)->get();
    foreach ($product as $key) {
      image::where('product_id',$key->id)->delete();
      for ($i=0; $i <4 ; $i++) {
        Storage::delete('public/image/'.$key->id.'_'.$i.'.png');
      }
      $user = product::find($key->id);
      $user->delete();
    }
    $rl = branchrelationship::where('category_id',$id)->get();
    foreach ($rl as $key) {
      $key->delete();
    }
    $user = categories::find($id);
    $user->delete();
    return redirect()->back()->with('status', 'CATEGORY DELETED!');
  }
}
