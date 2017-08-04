@extends('layouts.mechanic_customer_layout')
@extends('layouts.mechanic_customer_header')
@extends('layouts.mechanic_customer_slidebar')
@extends('layouts.mechanic_customer_footer')
@section('content')
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="portlet-body">
      <div class="portlet light">
        <div class="mt-element-overlay">
            <div class="row">
                <div class="col-md-12">
                  @foreach($post as $p)
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="portlet light portlet-fit">
                          <div class="portlet-body">
                              <div class="mt-element-overlay">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="mt-overlay-5">
                                              <img src="{!!asset('storage/image/'.$p->id.'_0.png')!!}" />
                                              <div class="mt-overlay">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                  <p>
                                                      <a class="uppercase" href="{{route('product.getinfo',$p->id)}}">See More</a>
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
