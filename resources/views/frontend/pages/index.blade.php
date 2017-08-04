@extends('frontend.layouts.home_layout')
@extends('frontend.layouts.home_slider')
@extends('frontend.layouts.home_footer')
@section('content')
<div class="col-sm-9 padding-right">
  <div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
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
                <a class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><p class="hidden">{{$p->id}}</p>Add to cart</a>
              </div>
            </div>
            @else
            <div class="product-overlay" id="{{$p->id}}">
              <div class="overlay-content" >
                <h2>${{number_format($p->price)}}</h2>
                <p>{{$p->title}}</p>
                <a class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><p class="hidden">{{$p->id}}</p>Add to cart</a>
              </div>
            </div>
            @endif
            @else
            <div class="product-overlay" id="{{$p->id}}">
              <div class="overlay-content" >
                <h2>${{number_format($p->price)}}</h2>
                <p>{{$p->title}}</p>
                <a class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><p class="hidden">{{$p->id}}</p>Add to cart</a>
              </div>
            </div>
            @endif
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-2">
        </div>
        <a href="{{route('shop.showinfo',['id'=>$p->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-search"></i>See</a>
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

  <div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
        <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
        <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
        <li><a href="#kids" data-toggle="tab">Kids</a></li>
        <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
      </ul>
    </div>
    <div class="tab-content">
      <div class="tab-pane fade active in" id="tshirt" >
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery1.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery2.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery3.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery4.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="blazers" >
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery4.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery3.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery2.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery1.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="sunglass" >
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery3.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery4.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery1.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery2.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="kids" >
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery1.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery2.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery3.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery4.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="poloshirt" >
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery2.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery4.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery3.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="{!!asset('frontend/images/home/gallery1.jpg')!!}" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!--/category-tab-->

  <div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active">
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="{!!asset('frontend/images/home/recommend1.jpg')!!}" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="{!!asset('frontend/images/home/recommend2.jpg')!!}" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="{!!asset('frontend/images/home/recommend3.jpg')!!}" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="{!!asset('frontend/images/home/recommend1.jpg')!!}" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="{!!asset('frontend/images/home/recommend2.jpg')!!}" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="{!!asset('frontend/images/home/recommend3.jpg')!!}" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
        </a>
    </div>
  </div><!--/recommended_items-->
</div>
@endsection
