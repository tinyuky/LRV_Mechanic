$(document).ready(function(){
  $(".add-to-cart").click(function(){
    var _token = $('input[name="_token"]').val();
    var id = $(this).find("p").text();
    $.ajax({
      url: 'http://localhost:81/LaravelSource/MechanicP/public/addcart',
      type: "post",
      data: {  _token : _token,'id': id},
      datatype:'json',
      success: function(){
        $("#"+id).addClass("hidden");
      }
    });
  });

  $(".cart_quantity_up").click(function(){
    var _token = $('input[name="_token"]').val();
    var id = $(this).find("p").text();
    $.ajax({
      url: 'http://localhost:81/LaravelSource/MechanicP/public/addcart',
      type: "post",
      data: {  _token : _token,'id': id},
      datatype:'json',
      success: function(data){
        $('#ip'+id).val(data['qty']);
        var nb = data['price'];
        var number = nb.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        $('#pr'+id).text('$'+number);
      }
    });
  });

  $(".cart_quantity_down").click(function(){
    var _token = $('input[name="_token"]').val();
    var id = $(this).find("p").text();
    $.ajax({
      url: 'http://localhost:81/LaravelSource/MechanicP/public/deletecart',
      type: "post",
      data: {  _token : _token,'id': id},
      datatype:'json',
      success: function(data){
        $('#ip'+id).val(data['qty']);
        var nb = data['price'];
        var number = nb.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        $('#pr'+id).text('$'+number);
      }
    });
  });

  $('#modalbtn').click(function(){
    var _token = $('input[name="_token"]').val();
    // var id = $(this).find("p").text();
    var id = $(this).val();
    $.ajax({
      url: 'http://localhost:81/LaravelSource/MechanicP/public/removecart',
      type: "post",
      data: {  _token : _token,'id': id},
      datatype:'json',
      success: function(data){
        $('#tr'+id).remove();
      }
    });
  });

  $('#myModal').on('show.bs.modal', function (event) {
    var a = $(event.relatedTarget);
    var recipient = a.data('whatever');
    var modal = $(this);
    modal.find('.modal-footer button').val(recipient);
  });
});
