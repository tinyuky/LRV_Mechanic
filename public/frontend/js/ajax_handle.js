$(document).ready(function(){
  $('#cateselect').change(function(){
    document.getElementById("oldcate").value = $(this).val();
  });
});

$(window).load(function () {
  var _token = $('input[name="_token"]').val();
  $.ajax({
    url: 'http://localhost:81/LaravelSource/MechanicP/public/product/create/getcate',
    type: "post",
    data: { _token : _token,'name':$('#branchselect').val()},
    datatype:'JSON',
    success: function( data ) {
      $('#cateselect option').remove();
      data.forEach(function(item,index){
          if($('#oldcate').val()!=""){
            if(item.name==$('#oldcate').val()){
              $('#cateselect').append("<option selected>"+item.name+"</option>");
            }
            else{
              $('#cateselect').append("<option id="+item.name+">"+item.name+"</option>");
            }
          }
          else{
            $('#cateselect').append("<option id="+item.name+">"+item.name+"</option>");
          }

      });
    }
  });
});
