@extends('layouts.mechanic_customer_layout')
@extends('layouts.mechanic_customer_header')
@extends('layouts.mechanic_customer_slidebar')
@extends('layouts.mechanic_customer_footer')
@section('content')
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="portlet-body">
      <div class="portlet-title">
        <span for="" style="font-size: 32px;color:red">{{$post->title}}</span>
      </div>
      <div class="porlet-body">
        <br>
        <div class="col-md-12">
          <div class="row">
              <span for="" style="font-size: 20px;text-align:center;">Giới thiệu :{!!$post->content!!}</span>
          </div>

          <span style="font-size: 20px;text-align:center;">Gía bán: {{$post->price}}</span>
        </div>

        <div class="col-md-12">
          <br>
          <div class="col-md-2">
            @for ($i=0;$i<count($img);$i++)
            <img src="{!!asset($img[$i]->path)!!}" alt="" height="75" width="75" id="{{$i}}" onclick="change(this.id)" >
            <br>
            @endfor
          </div>
          <div class="col-md-8" >
            <img id="main" src="{!!asset('storage/image/'.$post->id.'_0.png')!!}" height="300" width="300" >
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function change(clicked){
    if(clicked==0){
       document.getElementById("main").src="{!!asset('storage/image/'.$post->id.'_0.png')!!}";
    }
    if(clicked==1){
      document.getElementById("main").src="{!!asset('storage/image/'.$post->id.'_1.png')!!}";
    }
    if(clicked==2){
      document.getElementById("main").src="{!!asset('storage/image/'.$post->id.'_2.png')!!}";
    }
    if(clicked==3){
      document.getElementById("main").src="{!!asset('storage/image/'.$post->id.'_3.png')!!}";
    }
  }
</script>
@endsection
