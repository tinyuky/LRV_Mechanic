<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CustomerCRUDController extends Controller
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
        $post = Customer::paginate(5);
        return view('pages.home.home')->with('user',$user)->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =User::find(1);
        return view('pages.customer.customer')->with('user',$user)->with('cus',null);
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
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:customer,phone',
            'email' => 'required|string|email|max:255|unique:customer,email',
            'content' => 'required|string|max:255',
            'date' =>'date',
            ));
        if($request->date!=null){
            $date = date('Y-m-d', strtotime(str_replace('-', '/', $request->date)));
        }
        
        Customer::create([
            'name'=> $request->name,
            'gender'=> $request->gender,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'content'=> $request->content,
            'date'=> $date,
            ]);

        return redirect()->route('customer.index')->with('status','CUSTOMER ADDED!');
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request,array(
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:255',
            ));

        $user =User::find(1);
        if($request->date!=null){
            $date = date('Y-m-d', strtotime(str_replace('-', '/', $request->date)));
            $cus = Customer::where([
            ['name',$request->name],
            ['gender',$request->gender],
            ['phone',$request->phone],
            ['email',$request->email],
            ['date',$date],
            ])->first();
        }
        else{
            $cus = Customer::where([
            ['name',$request->name],
            ['gender',$request->gender],
            ['phone',$request->phone],
            ['email',$request->email],
            ])->first();
        }       
        if($cus!=null){
            return view('pages.customer.customer')->with('user',$user)->with('cus',$cus);
        }
        else{
            return redirect()->back()->with('message','CUSTOMER NOT EXIST');
        }
        
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
        $cus = Customer::find($request->id);          
        if($cus!=null){
            $data = $request->all();
            $this->validate($request,array(
                'name' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'phone' => 'numeric',
                'email' => 'string|email|max:255',
                'content' => 'required|string|max:255',
                'date'=>'date',
                ));


            Validator::make($data, [
                'email' => [
                'required',
                Rule::unique('customer')->ignore($request->id),
                ],
                'phone' => [
                'required',
                Rule::unique('customer')->ignore($request->id),
                ],
                ]);
            $cus->name = $request->input('name');
            $cus->gender = $request->input('gender');
            $cus->phone = $request->input('phone');
            $cus->email = $request->input('email');
            $cus->content = $request->input('content');
            if($request->input('date')!=null){
                $date = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('date'))));
                $cus->date = $date;
            }           
            $cus->save();
            return redirect()->route('customer.index')->with('status','CUSTOMER UPDATED!');
        }
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
