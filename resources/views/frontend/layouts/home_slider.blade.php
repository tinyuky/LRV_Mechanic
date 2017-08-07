
@section('slide')
@if(Request::is('index'))
<section id="slider">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <div class="col-sm-6">
                <h1><span>E</span>-SHOPPER</h1>
                <h2>Free E-Commerce Template</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <button type="button" class="btn btn-default get">Get it now</button>
              </div>
              <div class="col-sm-6">
                <img src="{!!asset('frontend/images/home/girl1.jpg')!!}" class="girl img-responsive" alt="" />
                <img src="{!!asset('frontend/images/home/pricing.png')!!}"  class="pricing" alt="" />
              </div>
            </div>
            <div class="item">
              <div class="col-sm-6">
                <h1><span>E</span>-SHOPPER</h1>
                <h2>100% Responsive Design</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <button type="button" class="btn btn-default get">Get it now</button>
              </div>
              <div class="col-sm-6">
                <img src="{!!asset('frontend/images/home/girl2.jpg')!!}" class="girl img-responsive" alt="" />
                <img src="{!!asset('frontend/images/home/pricing.png')!!}"  class="pricing" alt="" />
              </div>
            </div>

            <div class="item">
              <div class="col-sm-6">
                <h1><span>E</span>-SHOPPER</h1>
                <h2>Free Ecommerce Template</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <button type="button" class="btn btn-default get">Get it now</button>
              </div>
              <div class="col-sm-6">
                <img src="{!!asset('frontend/images/home/girl3.jpg')!!}" class="girl img-responsive" alt="" />
                <img src="{!!asset('frontend/images/home/pricing.png')!!}" class="pricing" alt="" />
              </div>
            </div>
          </div>
          <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

@if(Request::is('index*'))
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
          <div class="price-range">
            @if(App::isLocale('jp'))
            <h2>@lang('index.pricerange')</h2>
            @else
            <h2>Price Range</h2>
            @endif
            <div class="well text-center">
              @if($posts)
              @php
              $max = 600;
              foreach($posts as $p){
                if($p->price>$max){
                  $max = $p->price;
                }
              }
              @endphp
              <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="{{$max}}" data-slider-step="5" data-slider-value="[0,{{$max}}]" id="sl2" ><br />
              <b class="pull-left">$ 0</b> <b class="pull-right">${{number_format($max)}}</b>
              @else
              <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[0,0]" id="sl2" disabled ><br />
              <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
              @endif
            </div>
            <div class="shipping text-center">
              <img src="{!!asset('frontend/images/home/shipping.jpg')!!}" alt="" />
            </div>
          </div>
        </div>
      </div>
      @yield('content')
    </div>
  </div>
</section>
@endif

@if(\Request::is('shop*'))
<section id="advertisement">
  <div class="container">
    <img src="{!!asset('frontend/images/shop/advertisement.jpg')!!}" alt="" />
  </div>
</section>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="left-sidebar">
        <div class="brands_products"><!--brands_products-->
          <h2>Brands</h2>
          <!-- <div class="brands-name"> -->
            <ul class="nav nav-pills nav-stacked">
              <div class="containercheckbox">
                @foreach($branches as $br)
                @php
                  $sum = 0;
                  foreach($prsum as $p){
                    if($p->branch_id==$br->id){
                      $sum++;
                    }
                  }
                @endphp
                <li><input class="slidecb" type="checkbox" name="" value="{{$br->id}}">  <span class="pull-right">({{$sum}})</span>{{$br->name}}</li>
                @endforeach

              </div>
            </ul>
            <input class="hidden" type="text" name="slidecheck" id="slidecheck" value="">
            {!! csrf_field() !!}
          <!-- </div> -->
        </div><!--/brands_products-->
        <div class="price-range">
          <h2>Price Range</h2>
          <div class="well text-center">
            @if(count($prsum)>0)
            @php
            $max = 600;
            foreach($prsum as $p){
              if($p->price>$max){
                $max = $p->price;
              }
            }
            @endphp
            <input type="text" class="span2" value="0:{{$max+20000000}}" data-slider-min="0" data-slider-max="{{$max+10000000}}" data-slider-step="5" data-slider-value="[0,{{$max}}]" id="sl2" ><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">${{number_format($max+20000000)}}</b>
            @else
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[0,0]" id="sl2" disabled ><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            @endif
          </div>
          <div class="shipping text-center">
            <img src="{!!asset('frontend/images/home/shipping.jpg')!!}" alt="" />
          </div>
        </div>
      </div>

    </div>
    @yield('content')
  </div>
</div>
</section>
@endif
@endsection
