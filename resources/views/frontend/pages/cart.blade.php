@extends('frontend.layouts.home_layout')
@extends('frontend.layouts.home_footer')
@section('contentcart')
<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="{{route('shop.index')}}">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
    </div>
    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="description"></td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          @if(Session::has('cart'))
          @foreach($products as $p)
          {!! csrf_field() !!}
          <tr id="tr{{$p['item']->id}}">
            <td class="cart_product">
              <a href=""><img src="{!!asset($p['item']->image[0]->path)!!}" alt=""></a>
            </td>
            <td class="cart_description">
              <h4><a href="">{{$p['item']->title}}</a></h4>
            </td>
            <td class="cart_price">
              <p>${{number_format($p['item']->price)}}</p>
            </td>
            <td class="cart_quantity">
              <div class="cart_quantity_button">
                <a class="cart_quantity_up"><p class="hidden">{{$p['item']->id}}</p> + </a>
                <input id="ip{{$p['item']->id}}" class="cart_quantity_input" type="text" name="quantity" value="{{$p['qty']}}" autocomplete="off" size="2">
                <a class="cart_quantity_down"><p class="hidden">{{$p['item']->id}}</p> - </a>
              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price" id="pr{{$p['item']->id}}">${{number_format($p['price'])}}</p>
            </td>
            <td class="cart_delete">
              <a type="button" class="cart_quantity" data-toggle="modal" data-target="#myModal" data-whatever="{{$p['item']->id}}"><p class="hidden">{{$p['item']->id}}</p><i class="fa fa-times"></i></a>
            </td>
          </tr>
          @endforeach
          @else
          <h3 class="text-center" style="color:gray">NO PRODUCTS</h3>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</section> <!--/#cart_items-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to remove this product from Cart?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" value="" id="modalbtn">Do it</button>
      </div>
    </div>
  </div>
</div>
@endsection
