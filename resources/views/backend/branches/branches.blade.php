@extends('layouts.mechanic_customer_layout')
@extends('layouts.mechanic_customer_header')
@extends('layouts.mechanic_customer_slidebar')
@extends('layouts.mechanic_customer_footer')
@section('content')
@if($cus==null)
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption">
              <span class="caption-subject font-green bold uppercase">ADD NEW BRANCH</span>
            </div>
          </div>
          <div class="portlet-body">
            <form class="form-horizontal" role="form" action="{{route('branches.store')}}"
            method="post" novalidate="novalidate">
            {!! csrf_field() !!}
            <div class="form-body">
              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Name<span class="required"
                  aria-required="true"> * </span>
                </label>
                <div class="col-md-8">
                  @if(old('name')!=null)
                  <input type="text" class="form-control" name="name"
                  placeholder="Nmae" data-required="1"
                  value="{{ old('name') }}">
                  @else
                  <input type="text" class="form-control" name="name"
                  placeholder="Name" data-required="1"
                  >
                  @endif
                  @if ($errors->has('name'))
                  <span class="help-block help-block-error danger"
                  style="color: red">{{$errors->first('name')}}</span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                  <label class="col-md-2 control-label">Categories<span class="required"
                    aria-required="true"> * </span></label>
                  <div class="col-md-8">
                    <select multiple class="form-control" id="catemul" name="categories[]">
                      @foreach($categories as $ct)
                        <option>{{$ct->name}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('categories'))
                    <span class="help-block help-block-error danger"
                    style="color: red">{{$errors->first('categories')}}</span>
                    @endif
                  </div>
                  <script type="text/javascript">
                    $('#catemul').select2({
                      placeholder: "Categories"
                    });
                  </script>
              </div>
            </div>
            <div class="form-actions">
              <div class="row">
                <div class=" col-md-2"></div>
                <div class=" col-md-8">
                  <button type="submit" class="btn green" style="margin-right: 20px">
                    Submit
                  </button>
                  <a type="button" class="btn default" href="{{route('branches.index')}}">Cancel</a>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@else
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption">
              <span class="caption-subject font-green bold uppercase">UPDATE BRANCH</span>
            </div>
          </div>
          <div class="portlet-body">
            <form class="form-horizontal" role="form" action="{{route('branches.up')}}"
            method="post" novalidate="novalidate">
            {!! csrf_field() !!}
            <div class="form-body">
              <div class="form-group hidden">
                <input type="text" name="id" value="{{$cus->id}}">
              </div>
              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Name<span class="required"
                  aria-required="true"> * </span>
                </label>
                <div class="col-md-8">
                  @if(old('name')!=null)
                  <input type="text" class="form-control" name="name"
                  placeholder="Nmae" data-required="1"
                  value="{{ old('name') }}">
                  @else
                  <input type="text" class="form-control" name="name"
                  placeholder="Name" data-required="1" value="{{ $cus->name }}">
                  @endif
                  @if ($errors->has('name'))
                  <span class="help-block help-block-error danger"
                  style="color: red">{{$errors->first('name')}}</span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                  <label class="col-md-2 control-label">Categories<span class="required"
                    aria-required="true"> * </span></label>
                  <div class="col-md-8">
                    <select multiple class="form-control" id="catemul" name="categories[]">
                      @php
                        foreach($categories as $ct){
                          $c = 0;
                          foreach($cus->categories as $k){
                            if($k->name==$ct->name){
                              @endphp
                              <option selected>{{$ct->name}}</option>
                              @php
                              $c = 1;
                            }
                          }
                          if($c==0){
                            @endphp
                            <option>{{$ct->name}}</option>
                            @php
                          }
                        }
                      @endphp
                    </select>
                    @if ($errors->has('categories'))
                    <span class="help-block help-block-error danger"
                    style="color: red">{{$errors->first('categories')}}</span>
                    @endif
                  </div>
                  <script type="text/javascript">
                    $('#catemul').select2({
                      placeholder: "Categories"
                    });
                  </script>
              </div>
            </div>
            <div class="form-actions">
              <div class="row">
                <div class=" col-md-2"></div>
                <div class=" col-md-8">
                  <button type="submit" class="btn green" style="margin-right: 20px">
                    Submit
                  </button>
                  <a type="button" class="btn default" href="{{route('branches.index')}}">Cancel</a>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
