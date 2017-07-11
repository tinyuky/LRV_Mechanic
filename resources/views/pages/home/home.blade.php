@extends('layouts.mechanic_home_layout')
@extends('layouts.mechanic_home_header')
@extends('layouts.mechanic_home_slidebar')
@extends('layouts.mechanic_home_footer')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="col-md-10">
                        </div>
                        <div class="col-md-2">
                            <div>
                                <a href="{{route('customer.create')}}" class="btn green-meadow"><i class="fa fa-check"></i> Add new customer</a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="name" class="col-md-2 control-label">Name <i class="fa fa-asterisk"></i>  </label>
                                    <div class="col-md-4">
                                        <input type="email" class="form-control" id="name" placeholder="Name"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-2 control-label">Email <i class="fa fa-asterisk"></i>  </label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="email" id="email" class="form-control" placeholder="Email"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="col-md-2 control-label">Gender <i class="fa fa-asterisk"></i>  </label>
                                        <div class="col-md-4">
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios" id="female" value="female" checked="">Female
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios" id="male" value="male"> Male
                                                    <span></span>
                                                </label>                                                   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="number" class="col-md-2 control-label">Phone Number <i class="fa fa-asterisk"></i> </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="number" placeholder="Phone number"> 
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
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Name </th>
                                            <th> Email </th>
                                            <th> Gender </th>
                                            <th> Phone Number </th>
                                            <th> Date </th>
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
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
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