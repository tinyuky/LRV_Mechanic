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
          <div class="portlet-title">
            <div class="caption">
              <span class="caption-subject font-green bold uppercase">REVIEW CUSTOMER INFORMATION</span>
            </div>
          </div>
          <div class="portlet-body form">
            @if(request('id')==null)
            <form class="form-horizontal" role="form" action="{{route('customer.previewstore')}}"
            method="post" novalidate="novalidate">
            @else
            <form class="form-horizontal" role="form" action="{{route('customer.previewup')}}"
            method="post" novalidate="novalidate">
            @endif
            {!! csrf_field() !!}
            <div class="form-body">
              <div class="form-group hidden">
                  <input type="text" name="id" class="form-control hidden" style="border:none;background: transparent" value="{{ request('id')}}" readonly>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="file">Avatar</label>
                <div class="col-md-8">
                  <img id="imgdf" src="{!!asset('storage/preview.jpeg')!!}" height="200px"
                  width="200px" style="margin-bottom: 10px">
                  <br>
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-md-2 control-label">Name
                </label>
                <div class="col-md-8">
                  <input type="text" name="name" class="form-control" style="border:none;background: transparent" value="{{ request('name')}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-2 control-label">Email </label>
                <div class="col-md-8">
                      <input type="text" name="email" class="form-control hidden " style="border:none;background: transparent" value="{{ request('email')}}" readonly>
                      <label for="name" name="email" class="control-label"><i class="fa fa-check" style="color:#56ffff" ></i>  {{ request('email')}}</label>
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-md-2 control-label">Gender </label>
                <div class="col-md-8">
                  @if(request('gender')=="female")
                  <label for="name" name="gender" value="female" class="control-label">  FEMALE</label>
                  @else
                  <label for="name" name="male" value="male" class="control-label">  MALE</label>
                  @endif
                  <input type="text" name="gender" class="form-control hidden " style="border:none;background: transparent" value="{{ request('gender')}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="number" class="col-md-2 control-label">Phone Number  </label>
                <div class="col-md-8">
                  <label for="name" name="phone" class="control-label"><i class="fa fa-check" style="color:#56ffff" ></i>  {{ request('phone')}}</label>
                  <input type="text" name="phone" class="form-control hidden " style="border:none;background: transparent" value="{{ request('phone')}}" readonly>
                </div>
              </div>
              <div class="form-group ">
                <label class="control-label col-md-2">Content </label>
                <div class="col-md-8">
                  <p class="control-label">{!!request('content')!!}</p>
                </div>
                <input type="text" name="content" class="form-control hidden " style="border:none;background: transparent" value="{{ request('content')}}" readonly>
              </div>
              <div class="form-group last">
                <label class="col-md-2 control-label">Date</label>
                <div class="col-md-8">
                  <label for="name" class="control-label">{{ request('date')}}</label>
                  <input type="text" name="date" class="form-control hidden " style="border:none;background: transparent" value="{{ request('date')}}" readonly>
                </div>
              </div>
            </div>
            <div class="form-actions">
              <div class="row">
                <div class=" col-md-2"></div>
                <div class=" col-md-2"></div>
                <div class=" col-md-2">
                  <button type="submit" class="btn green" style="margin-right: 20px">
                    Submit
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT BODY -->
</div>
@endsection
