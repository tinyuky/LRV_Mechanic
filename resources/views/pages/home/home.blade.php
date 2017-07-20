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
              <form class="form-horizontal" role="form" action="{{route('customer.searchform')}}"
              method="get">
              <div class="form-body">
                <div class="form-group">
                  <label for="name" class="col-md-2 control-label">Name <span class="required"
                    aria-required="true"> * </span>
                  </label>

                  <div class="col-md-4">
                    <input type="text" class="form-control" name="name" placeholder="Name"
                    value="{{request()->name}}">
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
                        placeholder="Email" value="{{request()->email}}">
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
                            @if(request()->gender=="female")
                            <input type="radio" name="gender" value="female"
                            checked="">Female
                            <span></span>
                            @else
                            <input type="radio" name="gender" value="female"
                            >Female
                            <span></span>
                            @endif
                          </label>
                          <label class="mt-radio">
                            @if(request()->gender=="male")
                            <input type="radio" name="gender" value="male"
                            checked="">Male
                            <span></span>
                            @else
                            <input type="radio" name="gender" value="male"
                            >Male
                            <span></span>
                            @endif
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
                          placeholder="Phone number" value="{{request()->phone}}">

                          @if ($errors->has('phone'))
                          <span class="help-block help-block-error danger"
                          style="color: red">{{$errors->first('phone')}}</span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group last">
                        <label class="col-md-2 control-label">Date</label>

                        <div class="col-md-4">
                          <div class="input-group input-large date-picker input-daterange"
                          data-date="10/11/2012" data-date-format="mm/dd/yyyy">

                          <input type="text" class="form-control" name="from"
                          value="{{request()->from}}">

                          <span class="input-group-addon"> to </span>

                          <input type="text" class="form-control" name="to"
                          value="{{request()->to}}">

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
                    <table class="table table-striped table-bordered table-hover order-column dataTable no-footer">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th> @sortablelink('name', 'Name')</th>
                          <th> @sortablelink('email', 'Email')</th>
                          <th> @sortablelink('gender', 'Gender')</th>
                          <th> @sortablelink('phone', 'Phone Number')</th>
                          <th> Date</th>
                          <th> Options</th>
                        </tr>
                      </thead>
                      <tbody>
                        @for ($i=0;$i<count($post);$i++)
                        <tr>
                          @if(request()->page=="")
                          <td>{{($i+1)}}</td>
                          @else
                          <td>{{($i+1+(request()->page-1)*5)}}</td>
                          @endif
                          <td>{{$post[$i]->name}}</td>
                          <td>{{$post[$i]->email}}</td>
                          <td>{{$post[$i]->gender}}</td>
                          <td>{{$post[$i]->phone}}</td>
                          <td>{{$post[$i]->date}}</td>
                          <td>
                            <a href="{{route('customer.show',$post[$i]->id)}}"
                              class="btn btn-outline btn-circle btn-sm green-meadow">
                              <i class="fa fa-edit"></i> Edit </a>

                              <button type="button"
                              id="delete-court-button"
                              class="btn btn-outline btn-circle btn-sm red"
                              data-toggle="modal" data-target="#myModal{{$i}}">
                              <i class="fa fa-delete"> Delete
                              </button>
                            </td>

                          </tr>
                          @endfor
                        </tbody>
                      </table>
                    </div>
                    <div class="text-center">
                      {!! $post->appends(\Request::except('page'))->render() !!}
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        @for ($i=0;$i<count($post);$i++)
        <div class="modal fade" role="dialog" id="myModal{{$i}}" tabindex="-1"
        aria-labelledby="myModalLabel" style="display: none;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"
              aria-label="Close"><span
              aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel"
              style="color: red">Caution</h4></div>
              <div class="modal-body">
                <h4 style="text-align: center">Are you sure to delete
                  this?</h4>
                  <h4>Name: {{$post[$i]->name}}</h4>
                  <h4>Email: {{$post[$i]->email}}</h4>
                  <h4>Gender: {{$post[$i]->gender}}</h4>
                  <h4>Phone: {{$post[$i]->phone}}</h4>
                  <h4>Date: {{$post[$i]->date}}</h4>
                </div>
                <div class="modal-footer">
                  {{ Form::open(['route' => ['customer.destroy',$post[$i]->id], 'method' => 'delete']) }}
                  <button type="submit" class="btn btn-danger">Delete
                  </button>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>

          @endfor

          @endsection
