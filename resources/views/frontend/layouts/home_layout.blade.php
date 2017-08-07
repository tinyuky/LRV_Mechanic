<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Home | E-Shopper</title>
  <link href="{!!asset('frontend/css/bootstrap.min.css')!!}" rel="stylesheet">
  <link href="{!!asset('frontend/css/font-awesome.min.css')!!}" rel="stylesheet">
  <link href="{!!asset('frontend/css/prettyPhoto.css')!!}" rel="stylesheet">
  <link href="{!!asset('frontend/css/price-range.css')!!}" rel="stylesheet">
  <link href="{!!asset('frontend/css/animate.css')!!}" rel="stylesheet">
  <link href="{!!asset('frontend/css/main.css')!!}" rel="stylesheet">
  <link href="{!!asset('frontend/css/responsive.css')!!}" rel="stylesheet">
  <link href="{!!asset('frontend/css/social.css')!!}" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{!!asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')!!}">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{!!asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')!!}">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{!!asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')!!}">
  <link rel="apple-touch-icon-precomposed" href="{!!asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')!!}">
	<link rel="stylesheet" href="{!!asset('frontend/FlexSlider/flexslider.css')!!}" type="text/css" media="screen" />
</head><!--/head-->

<body>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
  <header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="{{route('shop.index')}}"><img src="{!!asset('frontend/images/home/logo.png')!!}" alt="" /></a>
            </div>
            <div class="btn-group pull-right">
              <div class="btn-group">
                <button id="btnmulti" type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="multiln"> <p class="hidden">us</p>US</a></li>
                  <li><a class="multiln"><p class="hidden">jp</p>日本語</a></li>
                </ul>
              </div>

              <!-- <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  DOLLAR
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canadian Dollar</a></li>
                  <li><a href="#">Pound</a></li>
                </ul>
              </div> -->
            </div>
          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                <li>
                  @if(App::isLocale('jp'))
                  <a href="{{route('shop.viewcart')}}"><i class="fa fa-shopping-cart"></i> @lang('index.cart')
                  </a>
                  @else
                  <a href="{{route('shop.viewcart')}}"><i class="fa fa-shopping-cart"></i> Cart
                  </a>
                  @endif
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="index.html" class="active">{{trans('index.home')}}</a></li>
                <li class="dropdown"><a href="{{route('shop.shop')}}">{{trans('index.shop')}}<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                    @foreach($ctslide as $ct)
                    <li><a href="{{route('shop.shop.cate',['name'=>$ct->name])}}">{{$ct->name}}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                    <li><a href="blog.html">Blog List</a></li>
                    <li><a href="blog-single.html">Blog Single</a></li>
                  </ul>
                </li>
                <li><a href="404.html">404</a></li>
                <li><a href="contact-us.html">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
              <input id="slidesearch" value="" type="text" placeholder="{{trans('index.search')}}"/>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->

  @yield('slide')
  @yield('contentcart')
  @yield('footer')



  <script src="{!!asset('frontend/js/jquery.js')!!}"></script>
  <script src="{!!asset('frontend/js/bootstrap.min.js')!!}"></script>
  <script src="{!!asset('frontend/js/jquery.scrollUp.min.js')!!}"></script>
  <script src="{!!asset('frontend/js/price-range.js')!!}"></script>
  <script src="{!!asset('frontend/js/jquery.prettyPhoto.js')!!}"></script>
  <script src="{!!asset('frontend/js/main.js')!!}"></script>
  <script type="text/javascript" src="{!!asset('frontend/slick/slick.min.js')!!}"></script>
  <script defer src="{!!asset('frontend/FlexSlider/jquery.flexslider.js')!!}"></script>
  <script type="text/javascript" src="{!!asset('frontend/js/slick.js')!!}"></script>
  <script type="text/javascript" src="{!!asset('frontend/js/ajax_cart.js')!!}"></script>
  <script type="text/javascript" src="{!!asset('frontend/js/ajax_shop.js')!!}"></script>
  <script type="text/javascript" src="{!!asset('frontend/js/ajax_lang.js')!!}"></script>
</body>
</html>
