<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\branches;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\categories;
use App\product;
use App\image;
use App\branchrelationship;

class BranchesController extends Controller
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
    $posts = branches::paginate(5);
    return view('backend.branches.home')->with('user',$user)->with('posts',$posts);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user = User::find(1);
    $ct = categories::all();
    return view('backend.branches.branches')->with('user',$user)->with('cus',null)->with('categories',$ct);
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
      'name' => 'required|string|max:255|unique:branches,name',
      'categories'=>'required',
    ));
    $lastid = branches::create(['name'=>$request->name]);
    foreach ($request->relations as $key) {
      $a = categories::where('name',$key)->first();
      branchrelationship::create([
        'branch_id'=>$lastid->id,
        'category_id'=>$a->id,
      ]);
    }
    return redirect()->route('branches.index')->with('status','BRANCH ADDED!');
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
    $cus = branches::find($id);
    $ct = categories::all();
    return view('backend.branches.branches')->with('user',$user)->with('cus',$cus)->with('categories',$ct);
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
    $cus = branches::find($request->input('id'));
    $data = $request->all();
    $c = Validator::make($data, [
      'name' => [
        'required',
        'string',
        'max:255',
        Rule::unique('branches')->ignore($cus->id),
      ],
    ]);
    if($c->fails()){
      $this->validate($request,array(
        'name' => 'required|string|max:255|unique:branches,name',
        'categories'=>'required',
      ));
    }
    $rl = branchrelationship::where('branch_id',$cus->id)->get();
    foreach ($rl as $key) {
      $key->delete();
    }
    foreach ($request->relations as $key) {
      $a = categories::where('name',$key)->first();
      branchrelationship::create([
        'branch_id'=>$cus->id,
        'category_id'=>$a->id,
      ]);
    }
    $cus->name = $request->input('name');
    $cus->save();
    return redirect()->route('branches.index')->with('status','BRANCH UPDATED');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $product = product::where('branch_id',$id)->get();
    foreach ($product as $key) {
      image::where('product_id',$key->id)->delete();
      for ($i=0; $i <4 ; $i++) {
        Storage::delete('public/image/'.$key->id.'_'.$i.'.png');
      }
      $user = product::find($key->id);
      $user->delete();
    }
    $rl = branchrelationship::where('branch_id',$id)->get();
    foreach ($rl as $key) {
      $key->delete();
    }
    $br = branches::find($id);
    $br->delete();
    return redirect()->back()->with('status', 'BRANCH DELETED!');
  }
}
