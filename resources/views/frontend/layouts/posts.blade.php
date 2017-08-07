<div class="features_items" id="load"><!--features_items-->
  <h2 class="title text-center">{{trans('index.featuresitem')}}</h2>
@if(count($posts)>0)
@foreach($posts as $p)
{!! csrf_field() !!}
<div class="col-sm-4">
  <div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
          <img src="{!!asset($p->image[0]->path)!!}" alt="" />
          <h2>${{number_format($p->price)}}</h2>
          <p>{{$p->title}}</p>
        </div>
        @if($cart)
        @if(array_key_exists($p->id,$cart))
        <div class="product-overlay hidden" id="{{$p->id}}">
          <div class="overlay-content" >
            <h2>${{number_format($p->price)}}</h2>
            <p>{{$p->title}}</p>
            <a class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><p class="hidden">{{$p->id}}</p>{{trans('index.cart')}}</a>
          </div>
        </div>
        @else
        <div class="product-overlay" id="{{$p->id}}">
          <div class="overlay-content" >
            <h2>${{number_format($p->price)}}</h2>
            <p>{{$p->title}}</p>
            <a class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><p class="hidden">{{$p->id}}</p>{{trans('index.cart')}}</a>
          </div>
        </div>
        @endif
        @else
        <div class="product-overlay" id="{{$p->id}}">
          <div class="overlay-content" >
            <h2>${{number_format($p->price)}}</h2>
            <p>{{$p->title}}</p>
            <a class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><p class="hidden">{{$p->id}}</p>{{trans('index.cart')}}</a>
          </div>
        </div>
        @endif
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-2">
    </div>
    <a href="{{route('shop.showinfo',['id'=>$p->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>{{trans('index.see')}}</a>
    <div class="choose">
      <ul class="nav nav-pills nav-justified">
        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
      </ul>
    </div>
  </div>
</div>
@endforeach
@else
<h2 class=" text-center" style="color:gray">NO PRODUCTS</h2>
<br>
<br>
@endif
</div><!--features_items-->
<div class="text-center">
  <!-- {!! $posts->appends(\Request::except('page'))->render() !!} -->
  {{$posts->links()}}
</div>
<script type="text/javascript" src="{!!asset('frontend/js/ajax_cart.js')!!}"></script>
