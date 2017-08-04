@extends('layouts.mechanic_customer_layout')
@extends('layouts.mechanic_customer_header')
@extends('layouts.mechanic_customer_slidebar')
@extends('layouts.mechanic_customer_footer')
@section('content')
@if($cus==null)
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption">
              <span class="caption-subject font-green bold uppercase">ADD NEW PRODUCT</span>
            </div>
          </div>
          <div class="portlet-body form">
            <form class="form-horizontal" role="form" action="{{route('product.preview')}}"
            method="post" novalidate="novalidate" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-body">
              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Name<span class="required"
                  aria-required="true"> * </span>
                </label>

                <div class="col-md-8">
                  @if(old('title')!=null)
                  <input type="text" class="form-control" name="title"
                  placeholder="Name" data-required="1"
                  value="{{ old('title') }}">
                  @else
                  <input type="text" class="form-control" name="title"
                  placeholder="Name" data-required="1"
                  >
                  @endif
                  @if ($errors->has('title'))
                  <span class="help-block help-block-error danger"
                  style="color: red">{{$errors->first('title')}}</span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Price<span class="required"
                  aria-required="true"> * </span>
                </label>

                <div class="col-md-8">
                  @if(old('price')!=null)
                  <input type="text" class="form-control" name="price"
                  placeholder="Price" data-required="1"
                  value="{{ old('price') }}">
                  @else
                  <input type="text" class="form-control" name="price"
                  placeholder="Price" data-required="1"
                  >
                  @endif
                  @if ($errors->has('price'))
                  <span class="help-block help-block-error danger"
                  style="color: red">{{$errors->first('price')}}</span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Status<span class="required"
                  aria-required="true"> * </span>
                </label>

                <div class="col-md-8">
                  @if(old('status')!=null)
                  <input type="text" class="form-control" name="status"
                  placeholder="Status" data-required="1"
                  value="{{ old('status') }}">
                  @else
                  <input type="text" class="form-control" name="status"
                  placeholder="Status" data-required="1"
                  >
                  @endif
                  @if ($errors->has('status'))
                  <span class="help-block help-block-error danger"
                  style="color: red">{{$errors->first('status')}}</span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Condition<span class="required"
                  aria-required="true"> * </span>
                </label>

                <div class="col-md-8">
                  @if(old('condition')!=null)
                  <input type="text" class="form-control" name="condition"
                  placeholder="Condition" data-required="1"
                  value="{{ old('condition') }}">
                  @else
                  <input type="text" class="form-control" name="condition"
                  placeholder="Condition" data-required="1"
                  >
                  @endif
                  @if ($errors->has('condition'))
                  <span class="help-block help-block-error danger"
                  style="color: red">{{$errors->first('condition')}}</span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Branch<span class="required"
                  aria-required="true"> * </span>
                </label>
                <div class="col-md-8">
                  <select class="form-control" name="branch" id="branchselect" style="width:75%">
                    @foreach($branches as $br)
                    <option>{{$br->name}}</option>
                    @if(old('branch')!=null)
                    @if(old('branch')==$br->name)
                    <option selected>{{$br->name}}</option>
                    @endif
                    @endif
                    @endforeach
                  </select>
                </div>
                <script type="text/javascript">
                $('#branchselect').select2().on("change",function(){
                  var _token = $('input[name="_token"]').val();
                  $.ajax({
                    url: 'http://localhost:81/LaravelSource/MechanicP/public/product/create/getcate',
                    type: "post",
                    data: { _token : _token,'name':$(this).val()},
                    datatype:'JSON',
                    success: function( data ) {
                      $('#cateselect option').remove();
                      data.forEach(function(item,index){
                        $('#cateselect').append("<option>"+item.name+"</option>");
                      });
                      document.getElementById("oldcate").value = data[0].name;
                    }
                  });
                });
                </script>
              </div>
              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Category<span class="required"
                  aria-required="true"> * </span>
                </label>
                <div class="col-md-8">
                  <select class="form-control" name="category" id="cateselect" style="width:75%">
                    @if(old('category')!=null)
                    <div class="form-group hidden">
                      <input type="text" id="oldcate" class="hidden" value="{{old('category')}}">
                    </div>
                    @endif
                  </select>
                </div>
                <script type="text/javascript">
                  $('#cateselect').select2();
                </script>
              </div>
              <div class="form-group ">
                <label class="control-label col-md-2">Description <span class="required"
                  aria-required="true"> * </span></label>

                  <div class="col-md-8">
                    <textarea id="content" name="content" class="textbox"></textarea>
                    <script type="text/javascript">
                    var editor = CKEDITOR.replace('content', {
                      language: 'vi',
                      filebrowserImageBrowserUrl: '../js/plugins/ckfinder/ckfinder.html?Type=Image',
                      filebrowserFlashBrowserUrl: '../js/plugins/ckfinder/ckfinder.html?Type=Flash',
                      filebrowserImageUploadUrl: '../js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                      filebrowserFlashUploadUrl: '../js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    })

                    CKEDITOR.instances.content.setData('<?php echo old('content'); ?>');

                    </script>
                    @if ($errors->has('content'))
                    <span class="help-block help-block-error danger"
                    style="color: red">{{$errors->first('content')}}</span>
                    @endif
                  </div>

                </div>

                <div class="form-group">
                  <label for="name" class="col-md-2 control-label">Images<span class="required"
                    aria-required="true"> * </span>
                  </label>

                  <div class="col-md-8">
                    <span class="btn green fileinput-button">
                      <i class="fa fa-plus"></i>
                      <span> Add files </span>
                      <input onchange="ValidateSize(this)" type="file" id="file" name="files[]" multiple
                      accept="image/png"></span>
                      @if ($errors->has('files'))
                      <span class="help-block help-block-error danger"
                      style="color: red">{{$errors->first('files')}}</span>
                      @endif

                      <button type="reset" id="file_reset" style="display:none">

                        <script type="text/javascript">
                        function ValidateSize(file) {

                          var selected_file_name = $(file).val();
                          if (selected_file_name.length > 0) {
                            if(file.files.length!=4){
                              $('#countbtn').trigger('click');
                              $('#file_reset').trigger('click');
                            }
                            else{
                              var a = 0;
                              for (i = 0; i < file.files.length; i++) {
                                var FileSize = file.files[i].size / 1024 / 1024; // in MB
                                var Filex = file.files[i].name.split('.')[1];

                                if(Filex!='png'){
                                  $('#exbtn').trigger('click');
                                  $('#file_reset').trigger('click');
                                  a=1;
                                  break;
                                }
                                if (FileSize > 5) {
                                  $('#sizebtn').trigger('click');
                                  $('#file_reset').trigger('click');
                                  a=1;
                                  break;
                                }
                              }
                              if(a==0){
                                $('#show').removeClass('hidden');
                                var reader0 = new FileReader();
                                reader0.onload = function(e) {
                                  var reader = new FileReader();
                                  $('#img0').attr('src', e.target.result);
                                }
                                reader0.readAsDataURL(file.files[0]);

                                var reader1 = new FileReader();
                                reader1.onload = function(e) {
                                  var reader = new FileReader();
                                  $('#img1').attr('src', e.target.result);
                                }
                                reader1.readAsDataURL(file.files[1]);

                                var reader2 = new FileReader();
                                reader2.onload = function(e) {
                                  var reader = new FileReader();
                                  $('#img2').attr('src', e.target.result);
                                }
                                reader2.readAsDataURL(file.files[2]);

                                var reader3 = new FileReader();
                                reader3.onload = function(e) {
                                  var reader = new FileReader();
                                  $('#img3').attr('src', e.target.result);
                                }
                                reader3.readAsDataURL(file.files[3]);
                              }
                            }

                          }
                        }
                        </script>

                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-8 hidden" id="show">
                        <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
                          <div class="portlet light portlet-fit">
                            <div class="portlet-body">
                              <div class="mt-element-overlay">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="mt-overlay-4">
                                      <img id="img0" src="" height="50" width="50" />
                                      <div class="mt-overlay">
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <span class="btn fileinput-button mt-info btn default btn-outline">
                                          <span> edit image </span>
                                          <input onchange="select0(this)" type="file" id="re0" name="reselect0"
                                          accept="image/png"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
                            <div class="portlet light portlet-fit">
                              <div class="portlet-body">
                                <div class="mt-element-overlay">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mt-overlay-4">
                                        <img id="img1" src="" height="50" width="50" />
                                        <div class="mt-overlay">
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <span class="btn fileinput-button mt-info btn default btn-outline">
                                            <span> edit image </span>
                                            <input onchange="select1(this)" type="file" name="reselect1"
                                            accept="image/png"></span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
                              <div class="portlet light portlet-fit">
                                <div class="portlet-body">
                                  <div class="mt-element-overlay">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="mt-overlay-4">
                                          <img id="img2" src="" height="50" width="50" />
                                          <div class="mt-overlay">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <span class="btn fileinput-button mt-info btn default btn-outline">
                                              <span> edit image </span>
                                              <input onchange="select2(this)" type="file"  name="reselect2"
                                              accept="image/png"></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
                                <div class="portlet light portlet-fit">
                                  <div class="portlet-body">
                                    <div class="mt-element-overlay">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="mt-overlay-4">
                                            <img id="img3" src="" height="50" width="50" />
                                            <div class="mt-overlay">
                                              <br>
                                              <br>
                                              <br>
                                              <br>
                                              <span class="btn fileinput-button mt-info btn default btn-outline">
                                                <span> edit image </span>
                                                <input onchange="select3(this)" type="file" name="reselect3"
                                                accept="image/png"></span>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <script type="text/javascript">
                                function select0(file){
                                  var reader0 = new FileReader();
                                  reader0.onload = function(e) {
                                    var reader = new FileReader();
                                    $('#img0').attr('src', e.target.result);
                                  }
                                  reader0.readAsDataURL(file.files[0]);
                                }
                                function select1(file){
                                  var reader0 = new FileReader();
                                  reader0.onload = function(e) {
                                    var reader = new FileReader();
                                    $('#img1').attr('src', e.target.result);
                                  }
                                  reader0.readAsDataURL(file.files[0]);
                                }
                                function select2(file){
                                  var reader0 = new FileReader();
                                  reader0.onload = function(e) {
                                    var reader = new FileReader();
                                    $('#img2').attr('src', e.target.result);
                                  }
                                  reader0.readAsDataURL(file.files[0]);
                                }
                                function select3(file){
                                  var reader0 = new FileReader();
                                  reader0.onload = function(e) {
                                    var reader = new FileReader();
                                    $('#img3').attr('src', e.target.result);
                                  }
                                  reader0.readAsDataURL(file.files[0]);
                                }
                                </script>

                              </div>
                            </div>
                          </div>
                          <div class="form-actions">
                            <div class="row">
                              <div class=" col-md-2"></div>
                              <div class=" col-md-8">
                                <button type="submit" class="btn green" style="margin-right: 20px">
                                  Preview
                                </button>
                                <a type="button" class="btn default" href="{{route('product.index')}}">Cancel</a>
                              </div>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="sizeModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Notice</h4>
                  </div>
                  <div class="modal-body">
                    <p>File size exceeds 1 MB</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <button id="sizebtn" type="button" class="btn btn-primary btn-lg hidden " data-toggle="modal" data-target="#sizeModal"></button>

            <div class="modal fade" tabindex="-1" role="dialog" id="countModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Notice</h4>
                  </div>
                  <div class="modal-body">
                    <p>You must chose 4 images</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <button id="countbtn" type="button" class="btn btn-primary btn-lg hidden " data-toggle="modal" data-target="#countModal"></button>

            <div class="modal fade" tabindex="-1" role="dialog" id="exModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Notice</h4>
                  </div>
                  <div class="modal-body">
                    <p>You must chose png image</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <button id="exbtn" type="button" class="btn btn-primary btn-lg hidden " data-toggle="modal" data-target="#exModal"></button>
            @else
            <div class="page-content-wrapper">
              <div class="page-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption">
                          <span class="caption-subject font-green bold uppercase">UPDATE PRODUCT</span>
                        </div>
                      </div>
                      <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="{{route('product.preview')}}"
                        method="post" novalidate="novalidate" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-body">
                          <div class="form-group hidden">
                            <input type="text" name="id" value="{{$cus->id}}">
                          </div>
                          <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Title<span class="required"
                              aria-required="true"> * </span>
                            </label>

                            <div class="col-md-8">
                              @if(old('title')!=null)
                              <input type="text" class="form-control" name="title"
                              placeholder="Title" data-required="1"
                              value="{{ old('title') }}">
                              @else
                              <input type="text" class="form-control" name="title"
                              placeholder="Title" data-required="1" value="{{$cus->title}}"
                              >
                              @endif
                              @if ($errors->has('title'))
                              <span class="help-block help-block-error danger"
                              style="color: red">{{$errors->first('title')}}</span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Price<span class="required"
                              aria-required="true"> * </span>
                            </label>

                            <div class="col-md-8">
                              @if(old('price')!=null)
                              <input type="text" class="form-control" name="price"
                              placeholder="Price" data-required="1"
                              value="{{ old('price') }}">
                              @else
                              <input type="text" class="form-control" name="price"
                              placeholder="Price" data-required="1" value="{{ $cus->price }}"
                              >
                              @endif
                              @if ($errors->has('price'))
                              <span class="help-block help-block-error danger"
                              style="color: red">{{$errors->first('price')}}</span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Status<span class="required"
                              aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                              @if(old('status')!=null)
                              <input type="text" class="form-control" name="status"
                              placeholder="Status" data-required="1"
                              value="{{ old('status') }}">
                              @else
                              <input type="text" class="form-control" name="status"
                              placeholder="Status" data-required="1" value="{{$cus->status}}"
                              >
                              @endif
                              @if ($errors->has('status'))
                              <span class="help-block help-block-error danger"
                              style="color: red">{{$errors->first('status')}}</span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Condition<span class="required"
                              aria-required="true"> * </span>
                            </label>

                            <div class="col-md-8">
                              @if(old('condition')!=null)
                              <input type="text" class="form-control" name="condition"
                              placeholder="Condition" data-required="1"
                              value="{{ old('condition') }}">
                              @else
                              <input type="text" class="form-control" name="condition"
                              placeholder="Condition" data-required="1" value="{{$cus->condition}}"
                              >
                              @endif
                              @if ($errors->has('condition'))
                              <span class="help-block help-block-error danger"
                              style="color: red">{{$errors->first('condition')}}</span>
                              @endif
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Branch<span class="required"
                              aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                              <select class="form-control" name="branch" id="branchselect" style="width:75%">
                                @foreach($branches as $br)
                                @if(old('branch')==$br->name)
                                <option selected>{{$br->name}}</option>
                                @else
                                @if($cus->branch->name==$br->name)
                                <option selected>{{$br->name}}</option>
                                @else
                                <option>{{$br->name}}</option>
                                @endif
                                @endif
                                @endforeach
                              </select>
                            </div>
                            <script type="text/javascript">
                            $('#branchselect').select2().on("change",function(){
                              var _token = $('input[name="_token"]').val();
                              $.ajax({
                                url: 'http://localhost:81/LaravelSource/MechanicP/public/product/create/getcate',
                                type: "post",
                                data: { _token : _token,'name':$(this).val()},
                                datatype:'JSON',
                                success: function( data ) {
                                  $('#cateselect option').remove();
                                  data.forEach(function(item,index){
                                    $('#cateselect').append("<option>"+item.name+"</option>");
                                  });
                                  document.getElementById("oldcate").value = data[0].name;
                                }
                              });
                            });
                            </script>
                          </div>
                          <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Category<span class="required"
                              aria-required="true"> * </span>
                            </label>
                            <div class="col-md-8">
                              <select class="form-control" name="category" id="cateselect" style="width:75%">
                                @if(old('category')!=null)
                                <input type="text" id="oldcate" class="hidden" value="{{old('category')}}">
                                @else
                                <input type="text" id="oldcate" class="hidden" value="{{$cus->category->name}}">

                                @endif
                              </select>
                            </div>
                            <script type="text/javascript">
                              $('#cateselect').select2();
                            </script>
                          </div>
                          <div class="form-group ">
                            <label class="control-label col-md-2">Decsription <span class="required"
                              aria-required="true"> * </span></label>

                              <div class="col-md-8">
                                <textarea id="content" name="content" class="textbox"></textarea>
                                <script type="text/javascript">
                                var editor = CKEDITOR.replace('content', {
                                  language: 'vi',
                                  filebrowserImageBrowserUrl: '../js/plugins/ckfinder/ckfinder.html?Type=Image',
                                  filebrowserFlashBrowserUrl: '../js/plugins/ckfinder/ckfinder.html?Type=Flash',
                                  filebrowserImageUploadUrl: '../js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                  filebrowserFlashUploadUrl: '../js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                })

                                CKEDITOR.instances.content.setData('<?php if(old('content')==null){
                                  echo $cus->content;
                                }
                                else{
                                  echo old('content');
                                }  ?>');

                                </script>
                                @if ($errors->has('content'))
                                <span class="help-block help-block-error danger"
                                style="color: red">{{$errors->first('content')}}</span>
                                @endif
                              </div>

                            </div>

                            <div class="form-group">
                              <label for="name" class="col-md-2 control-label">Images<span class="required"
                                aria-required="true"> * </span>
                              </label>

                              <div class="col-md-8">
                                <span class="btn green fileinput-button">
                                  <i class="fa fa-plus"></i>
                                  <span> Add files </span>
                                  <input onchange="ValidateSize(this)" type="file" id="file" name="files[]" multiple
                                  accept="image/png"></span>
                                  @if ($errors->has('files'))
                                  <span class="help-block help-block-error danger"
                                  style="color: red">{{$errors->first('files')}}</span>
                                  @endif

                                  <button type="reset" id="file_reset" style="display:none">

                                    <script type="text/javascript">
                                    function ValidateSize(file) {
                                      $('#show > img').remove();
                                      var selected_file_name = $(file).val();
                                      if (selected_file_name.length > 0) {
                                        if(file.files.length!=4){
                                          $('#countbtn').trigger('click');
                                          $('#file_reset').trigger('click');
                                        }
                                        else{
                                          var a = 0;
                                          for (i = 0; i < file.files.length; i++) {
                                            var FileSize = file.files[i].size / 1024 / 1024; // in MB
                                            var Filex = file.files[i].name.split('.')[1];

                                            if(Filex!='png'){
                                              $('#exbtn').trigger('click');
                                              $('#file_reset').trigger('click');
                                              a=1;
                                              break;
                                            }
                                            if (FileSize > 5) {
                                              $('#sizebtn').trigger('click');
                                              $('#file_reset').trigger('click');
                                              a=1;
                                              break;
                                            }
                                          }
                                          if(a==0){
                                            $('#show').removeClass('hidden');
                                            var reader0 = new FileReader();
                                            reader0.onload = function(e) {
                                              var reader = new FileReader();
                                              $('#img0').attr('src', e.target.result);
                                            }
                                            reader0.readAsDataURL(file.files[0]);

                                            var reader1 = new FileReader();
                                            reader1.onload = function(e) {
                                              var reader = new FileReader();
                                              $('#img1').attr('src', e.target.result);
                                            }
                                            reader1.readAsDataURL(file.files[1]);

                                            var reader2 = new FileReader();
                                            reader2.onload = function(e) {
                                              var reader = new FileReader();
                                              $('#img2').attr('src', e.target.result);
                                            }
                                            reader2.readAsDataURL(file.files[2]);

                                            var reader3 = new FileReader();
                                            reader3.onload = function(e) {
                                              var reader = new FileReader();
                                              $('#img3').attr('src', e.target.result);
                                            }
                                            reader3.readAsDataURL(file.files[3]);
                                          }
                                        }

                                      }
                                    }
                                    </script>
                                  </div>
                                </div>
                                <br>
                                <div class="form-group">
                                  <div class="col-md-2">
                                  </div>
                                  <div class="col-md-8" id="show">
                                    <!-- @foreach ($img as $im)
                                    <img src="{!!asset($im->path)!!}" height="200" width="200">
                                    @endforeach -->

                                    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
                                      <div class="portlet light portlet-fit">
                                        <div class="portlet-body">
                                          <div class="mt-element-overlay">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="mt-overlay-4">
                                                  <img id="img0" src="{!!asset($img[0]->path)!!}" height="50" width="50" />
                                                  <div class="mt-overlay">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <span class="btn fileinput-button mt-info btn default btn-outline">
                                                      <span> edit image </span>
                                                      <input onchange="select0(this)" type="file" id="re0" name="reselect0"
                                                      accept="image/png"></span>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                      <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
                                        <div class="portlet light portlet-fit">
                                          <div class="portlet-body">
                                            <div class="mt-element-overlay">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="mt-overlay-4">
                                                    <img id="img1" src="{!!asset($img[1]->path)!!}" height="50" width="50" />
                                                    <div class="mt-overlay">
                                                      <br>
                                                      <br>
                                                      <br>
                                                      <br>
                                                      <span class="btn fileinput-button mt-info btn default btn-outline">
                                                        <span> edit image </span>
                                                        <input onchange="select1(this)" type="file" name="reselect1"
                                                        accept="image/png"></span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>


                                        <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
                                          <div class="portlet light portlet-fit">
                                            <div class="portlet-body">
                                              <div class="mt-element-overlay">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="mt-overlay-4">
                                                      <img id="img2" src="{!!asset($img[2]->path)!!}" height="50" width="50" />
                                                      <div class="mt-overlay">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <span class="btn fileinput-button mt-info btn default btn-outline">
                                                          <span> edit image </span>
                                                          <input onchange="select2(this)" type="file"  name="reselect2"
                                                          accept="image/png"></span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>


                                          <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
                                            <div class="portlet light portlet-fit">
                                              <div class="portlet-body">
                                                <div class="mt-element-overlay">
                                                  <div class="row">
                                                    <div class="col-md-12">
                                                      <div class="mt-overlay-4">
                                                        <img id="img3" src="{!!asset($img[3]->path)!!}" height="50" width="50" />
                                                        <div class="mt-overlay">
                                                          <br>
                                                          <br>
                                                          <br>
                                                          <br>
                                                          <span class="btn fileinput-button mt-info btn default btn-outline">
                                                            <span> edit image </span>
                                                            <input onchange="select3(this)" type="file" name="reselect3"
                                                            accept="image/png"></span>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <script type="text/javascript">
                                            function select0(file){
                                              var reader0 = new FileReader();
                                              reader0.onload = function(e) {
                                                var reader = new FileReader();
                                                $('#img0').attr('src', e.target.result);
                                              }
                                              reader0.readAsDataURL(file.files[0]);
                                            }
                                            function select1(file){
                                              var reader0 = new FileReader();
                                              reader0.onload = function(e) {
                                                var reader = new FileReader();
                                                $('#img1').attr('src', e.target.result);
                                              }
                                              reader0.readAsDataURL(file.files[0]);
                                            }
                                            function select2(file){
                                              var reader0 = new FileReader();
                                              reader0.onload = function(e) {
                                                var reader = new FileReader();
                                                $('#img2').attr('src', e.target.result);
                                              }
                                              reader0.readAsDataURL(file.files[0]);
                                            }
                                            function select3(file){
                                              var reader0 = new FileReader();
                                              reader0.onload = function(e) {
                                                var reader = new FileReader();
                                                $('#img3').attr('src', e.target.result);
                                              }
                                              reader0.readAsDataURL(file.files[0]);
                                            }
                                            </script>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-actions">
                                        <div class="row">
                                          <div class=" col-md-2"></div>
                                          <div class=" col-md-8">
                                            <button type="submit" class="btn green" style="margin-right: 20px">
                                              Preview
                                            </button>
                                            <a type="button" class="btn default" href="{{route('product.index')}}">Cancel</a>
                                          </div>
                                        </div>
                                      </div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal fade" tabindex="-1" role="dialog" id="sizeModal">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Notice</h4>
                              </div>
                              <div class="modal-body">
                                <p>File size exceeds 1 MB</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                              </div>
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <button id="sizebtn" type="button" class="btn btn-primary btn-lg hidden " data-toggle="modal" data-target="#sizeModal"></button>

                        <div class="modal fade" tabindex="-1" role="dialog" id="countModal">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Notice</h4>
                              </div>
                              <div class="modal-body">
                                <p>You must chose 4 images</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                              </div>
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <button id="countbtn" type="button" class="btn btn-primary btn-lg hidden " data-toggle="modal" data-target="#countModal"></button>

                        <div class="modal fade" tabindex="-1" role="dialog" id="exModal">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Notice</h4>
                              </div>
                              <div class="modal-body">
                                <p>You must chose png image</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                              </div>
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <button id="exbtn" type="button" class="btn btn-primary btn-lg hidden " data-toggle="modal" data-target="#exModal"></button>
                        @endif
                        @endsection
