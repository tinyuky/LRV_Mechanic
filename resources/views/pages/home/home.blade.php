@extends('layouts.mechanic_customer_layout')
@extends('layouts.mechanic_customer_header')
@extends('layouts.mechanic_customer_slidebar')
@extends('layouts.mechanic_customer_footer')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="portlet-title">
                            <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <div>
                                    <a href="{{route('customer.create')}}" class="btn green-meadow"><i
                                                class="fa fa-check"></i> Add new customer</a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            @if (session('message'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form class="form-horizontal" role="form" action="{{route('customer.search')}}"
                                  method="get">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="name" class="col-md-2 control-label">Name <span class="required"
                                                                                                    aria-required="true"> * </span>
                                        </label>

                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="name" placeholder="Name">
                                            @if ($errors->has('name'))
                                                <span class="help-block help-block-error danger"
                                                      style="color: red">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-md-2 control-label">Email <span
                                                    class="required" aria-required="true"> * </span> </label>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                                <input type="email" name="email" class="form-control"
                                                       placeholder="Email">
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block help-block-error danger"
                                                      style="color: red">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="col-md-2 control-label">Gender <span
                                                    class="required" aria-required="true"> * </span> </label>

                                        <div class="col-md-4">
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="gender" value="female"
                                                           checked="">Female
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="gender" value="male">
                                                    Male
                                                    <span></span>
                                                </label>
                                            </div>
                                            @if ($errors->has('gender'))
                                                <span class="help-block help-block-error danger"
                                                      style="color: red">{{$errors->first('gender')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="number" class="col-md-2 control-label">Phone Number <span
                                                    class="required" aria-required="true"> * </span> </label>

                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="phone"
                                                   placeholder="Phone number">
                                            @if ($errors->has('phone'))
                                                <span class="help-block help-block-error danger"
                                                      style="color: red">{{$errors->first('phone')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <label class="col-md-2 control-label">Date</label>

                                        <div class="col-md-4">
                                            <div class="input-group input-medium date date-picker">
                                                <input type="text" name="date" size="16" readonly=""
                                                       class="form-control" value="{{ old('date') }}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default date-set" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class=" col-md-2">
                                    </div>
                                    <div class=" col-md-4">
                                        <button type="submit" class="btn blue btn-block">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-green bold uppercase">CUSTOMER</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th bgcolor="#7e7c99">#</th>
                                        <th bgcolor="#7e7c99"> Name</th>
                                        <th bgcolor="#7e7c99"> Email</th>
                                        <th bgcolor="#7e7c99"> Gender</th>
                                        <th bgcolor="#7e7c99"> Phone Number</th>
                                        <th bgcolor="#7e7c99"> Date</th>
                                        <th bgcolor="#7e7c99"> Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i=0;$i<count($post);$i++)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$post[$i]->name}}</td>
                                            <td>{{$post[$i]->email}}</td>
                                            <td>{{$post[$i]->gender}}</td>
                                            <td>{{$post[$i]->phone}}</td>
                                            <td>{{$post[$i]->date}}</td>
                                            <td><a href="javascript:;" class="btn btn-outline btn-circle btn-sm green-meadow">
                                                            <i class="fa fa-edit"></i> Edit </a>
                                                <a href="javascript:;" class="btn btn-outline btn-circle btn-sm red">
                                                            <i class="fa fa-delete"></i> Delete </a>
                                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">                   
                                {!! $post->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection