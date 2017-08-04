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
              <span class="caption-subject font-green bold uppercase">REVIEW PRODUCT INFORMATION</span>
            </div>
          </div>
          <div class="portlet-body form">
            @if(request('id')==null)
            <form class="form-horizontal" role="form" action="{{route('product.previewstore')}}"
            method="post" novalidate="novalidate">
            @else
            <form class="form-horizontal" role="form" action="{{route('product.previewup')}}"
            method="post" novalidate="novalidate">
            @endif
            {!! csrf_field() !!}
            <div class="form-body">
              <div class="form-group hidden">
                  <input type="text" name="id" class="form-control hidden" style="border:none;background: transparent" value="{{ request('id')}}" readonly>
              </div>
              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Name
                </label>
                <div class="col-md-8">
                  <input type="text" name="title" class="form-control hidden" style="border:none;background: transparent" value="{{ request('title')}}" readonly>
                  <label for="name" name="title" class="control-label">{{ request('title')}}</label>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-2 control-label">Price </label>
                <div class="col-md-8">
                      <input type="text" name="price" class="form-control hidden " style="border:none;background: transparent" value="{{ request('price')}}" readonly>
                      <label for="name" name="price" class="control-label">{{ request('price')}}</label>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-2 control-label">Status</label>
                <div class="col-md-8">
                      <input type="text" name="status" class="form-control hidden " style="border:none;background: transparent" value="{{ request('status')}}" readonly>
                      <label for="name" name="status" class="control-label">{{ request('status')}}</label>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-2 control-label">Condition </label>
                <div class="col-md-8">
                      <input type="text" name="condition" class="form-control hidden " style="border:none;background: transparent" value="{{ request('condition')}}" readonly>
                      <label for="name" name="condition" class="control-label">{{ request('condition')}}</label>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-2 control-label">Category</label>
                <div class="col-md-8">
                      <input type="text" name="category" class="form-control hidden " style="border:none;background: transparent" value="{{ request('category')}}" readonly>
                      <label for="name" name="category" class="control-label">{{ request('category')}}</label>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-2 control-label">Branch</label>
                <div class="col-md-8">
                      <input type="text" name="branch" class="form-control hidden " style="border:none;background: transparent" value="{{ request('branch')}}" readonly>
                      <label for="name" name="branch" class="control-label">{{ request('branch')}}</label>
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
                <label class="col-md-2 control-label">Images</label>
                <div class="col-md-8">
                  <img src="{!!asset('storage/old0.png')!!}" height="200px"
                  width="200px" style="margin-bottom: 10px">
                  <img src="{!!asset('storage/old1.png')!!}" height="200px"
                  width="200px" style="margin-bottom: 10px">
                  <img src="{!!asset('storage/old2.png')!!}" height="200px"
                  width="200px" style="margin-bottom: 10px">
                  <img src="{!!asset('storage/old3.png')!!}" height="200px"
                  width="200px" style="margin-bottom: 10px">
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
