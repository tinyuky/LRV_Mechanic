
$(document).ready(function(){
  $(document).on('click', '.pagination a', function (e) {
    e.preventDefault();
    searchPosts($(this).attr('href').split('page=')[1]);
  });

  $('.slidecb').on('click',function(){
    var rs = $(this).val()+'/';
    if($('#slidecheck').val().search(rs)==-1){
      $('#slidecheck').val($('#slidecheck').val()+rs);
      searchPosts(null);
    }
    else{
      $('#slidecheck').val($('#slidecheck').val().replace(rs,''));
      searchPosts(null);
    }
  });

  $('.slider-track').on('click',function(){
    $('#sl2').val($('.tooltip-inner').text());
    searchPosts();
  });

  $('#slidesearch').on('keydown',function(e){
    var key = e.which;
    if(key==13){
      searchPosts(null);
    }
  });
});

// function getPosts(page) {
//   var _token = $('input[name="_token"]').val();
//   var name = window.location.href;
//   var lasturl = name.split("/");
//   if(lasturl.length==7){
//     $.ajax({
//       url: 'http://localhost:81/LaravelSource/MechanicP/public/paginate/shop',
//       type: "post",
//       data: { _token : _token,'page': page,'name':null},
//       datatype:'json',
//       success: function(data){
//       }
//     }).done(function(data){
//       $('.postscontent').html(data);
//     });
//
//   }
//   else{
//     $.ajax({
//       url: 'http://localhost:81/LaravelSource/MechanicP/public/paginate/shop',
//       type: "post",
//       data: { _token : _token,'page': page,'name':lasturl[7]},
//       datatype:'json',
//       success: function(data){
//       }
//     }).done(function(data){
//       $('.postscontent').html(data);
//     });
//   }
// }

function searchPosts(page) {
  var _token = $('input[name="_token"]').val();
  var name = window.location.href;
  var lasturl = name.split("/");
  if(lasturl.length==7){
    $.ajax({
      url: 'http://localhost:81/LaravelSource/MechanicP/public/fillshop',
      type: "post",
      data: {
        _token : _token,
        'page':page,
        'name':null,
        'search':$('#slidesearch').val(),
        'brand':$('#slidecheck').val(),
        'price':$('#sl2').val(),
      },
      datatype:'json',
      success: function(data){
      }
    }).done(function(data){
      $('.postscontent').html(data);
    }).fail(function(data){
      alert('fail');
    });
  }
  else{
    $.ajax({
      url: 'http://localhost:81/LaravelSource/MechanicP/public/fillshop',
      type: "post",
      data: {
        _token : _token,
        'page':page,
        'name':lasturl[7],
        'search':$('#slidesearch').val(),
        'brand':$('#slidecheck').val(),
        'price':$('#sl2').val(),
      },
      datatype:'json',
      success: function(data){
      }
    }).done(function(data){
      $('.postscontent').html(data);
    }).fail(function(data){
      alert('fail');
    });
  }
}
