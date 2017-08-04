@extends('frontend.layouts.home_layout')
@extends('frontend.layouts.home_slider')
@extends('frontend.layouts.home_footer')
@section('content')
<div class="col-sm-9 padding-right">
    <div id="posts" class="postscontent">
      @include('frontend.layouts.posts')
    </div>
</div>
@endsection
