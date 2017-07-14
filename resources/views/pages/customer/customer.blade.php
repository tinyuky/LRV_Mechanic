@extends('layouts.mechanic_customer_layout')
@extends('layouts.mechanic_customer_header')
@extends('layouts.mechanic_customer_slidebar')
@extends('layouts.mechanic_customer_footer')
@section('content')
    @if($cus!=null)
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-green bold uppercase">CUSTOMER INFORMATION</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form class="form-horizontal" role="form" action="{{route('customer.up')}}"
                                      method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="file">Avatar</label>

                                            <div class="col-md-8">
                                                <img id="imgdf" src="{!!asset($cus->avatar)!!}" height="200px"
                                                     width="200px" style="margin-bottom: 10px">
                                                <br>
                                                <input onchange="ValidateSize(this)" type="file" id="file" name="file"
                                                       accept="image/*">

                                                @if ($errors->has('file'))
                                                    <span class="help-block help-block-error danger"
                                                          style="color: red">{{$errors->first('file')}}</span>
                                                @endif
                                                <button type="reset" id="file_reset" style="display:none">
                                                    <script type="text/javascript">
                                                        function ValidateSize(file) {
                                                            var selected_file_name = $(file).val();
                                                            if (selected_file_name.length > 0) {
                                                                var FileSize = file.files[0].size / 1024 / 1024; // in MB
                                                                if (FileSize > 3) {
                                                                    alert('File size exceeds 3 MB');
                                                                    $('#file_reset').trigger('click');

                                                                }
                                                                else {
                                                                    var reader = new FileReader();
                                                                    reader.onload = function (e) {
                                                                        $('#imgdf')
                                                                                .attr('src', e.target.result)
                                                                                .width(200)
                                                                                .height(200);
                                                                    };
                                                                    reader.readAsDataURL(file.files[0]);
                                                                }
                                                            }
                                                            else {
                                                                $('#imgdf')
                                                                        .attr('src', "{!!asset($cus->avatar)!!}")
                                                                        .width(200)
                                                                        .height(200);
                                                            }
                                                        }
                                                    </script>
                                            </div>
                                        </div>
                                        <div class="form-group hidden">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="id" id="id"
                                                       placeholder="Name" data-required="1"
                                                       value="{{ $cus->id }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Name<span class="required"
                                                                                                       aria-required="true"> * </span>
                                            </label>

                                            <div class="col-md-8">
                                                @if(old('name')!=null)
                                                    <input type="text" class="form-control" name="name" id="name"
                                                           placeholder="Name" data-required="1"
                                                           value="{{ old('name') }}">
                                                @else
                                                    <input type="text" class="form-control" name="name" id="name"
                                                           placeholder="Name" data-required="1"
                                                           value="{{ $cus->name }}">
                                                @endif
                                                @if ($errors->has('name'))
                                                    <span class="help-block help-block-error danger"
                                                          style="color: red">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-md-2 control-label">Email <span
                                                        class="required" aria-required="true"> * </span> </label>

                                            <div class="col-md-8">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                    @if(old('email')!=null)
                                                        <input type="email" name="email" id="email" class="form-control"
                                                               placeholder="Email" value="{{ old('email') }}">
                                                    @else
                                                        <input type="email" name="email" id="email" class="form-control"
                                                               placeholder="Email" value="{{ $cus->email }}">
                                                    @endif
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="help-block help-block-error danger"
                                                          style="color: red">{{$errors->first('email')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="col-md-2 control-label">Gender <span
                                                        class="required" aria-required="true"> * </span> </label>

                                            <div class="col-md-8">
                                                <div class="mt-radio-inline">
                                                    @if(old('gender')==null)
                                                        <label class="mt-radio">
                                                            @if($cus->gender=='female')
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="female"
                                                                       checked="">Female
                                                                <span></span>
                                                            @else
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="female"
                                                                        >Female
                                                                <span></span>
                                                            @endif
                                                        </label>
                                                        <label class="mt-radio">
                                                            @if($cus->gender=='male')
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="male"
                                                                       checked="">Male
                                                                <span></span>
                                                            @else
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="male"
                                                                        >Male
                                                                <span></span>
                                                            @endif
                                                        </label>
                                                    @else
                                                        @if(old('gender')=='female')
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="female"
                                                                       checked="">Female
                                                                <span></span>
                                                            </label>
                                                        @else
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="female">Female
                                                                <span></span>
                                                            </label>
                                                        @endif
                                                        @if(old('gender')=='male')
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="male"
                                                                       checked="">Male
                                                                <span></span>
                                                            </label>
                                                        @else
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="male">Male
                                                                <span></span>
                                                            </label>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="number" class="col-md-2 control-label">Phone Number <span
                                                        class="required" aria-required="true"> * </span> </label>

                                            <div class="col-md-8">
                                                @if(old('phone')!=null)
                                                    <input type="text" class="form-control" name="phone"
                                                           placeholder="Phone number" value="{{ old('phone') }}">
                                                @else
                                                    <input type="text" class="form-control" name="phone"
                                                           placeholder="Phone number" value="{{ $cus->phone }}">
                                                @endif
                                                @if ($errors->has('phone'))
                                                    <span class="help-block help-block-error danger"
                                                          style="color: red">{{$errors->first('phone')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-md-2">Content <span class="required"
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
                                        <div class="form-group last">
                                            <label class="col-md-2 control-label">Date</label>

                                            <div class="col-md-4">
                                                <div class="input-group input-medium date date-picker">
                                                    @if(old('date')!=null)
                                                        <input type="text" name="date" size="16" readonly=""
                                                               class="form-control" value="{{ old('date') }}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default date-set" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    @else
                                                        <input type="text" name="date" size="16" readonly=""
                                                               class="form-control" value="{{ $cus->date }}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default date-set" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class=" col-md-2"></div>
                                            <div class=" col-md-8">
                                                <button type="submit" class="btn green" style="margin-right: 20px">
                                                    Submit
                                                </button>
                                                <a type="button" class="btn default" href="{{route('customer.index')}}">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
    @else
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-green bold uppercase">ADD NEW CUSTOMER</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form name="addform" class="form-horizontal" role="form"
                                      action="{{route('customer.store')}}"
                                      method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="file">Avatar</label>

                                            <div class="col-md-8">
                                                <img id="imgdf" src="{!!asset('storage/avatar.jpeg')!!}" height="200px"
                                                     width="200px" style="margin-bottom: 10px">
                                                <br>
                                                <input onchange="ValidateSize(this)" type="file" id="file" name="file"
                                                       accept="image/*">

                                                @if ($errors->has('file'))
                                                    <span class="help-block help-block-error danger"
                                                          style="color: red">{{$errors->first('file')}}</span>
                                                @endif
                                                <button type="reset" id="file_reset" style="display:none">
                                                    <script type="text/javascript">
                                                        function ValidateSize(file) {
                                                            var selected_file_name = $(file).val();
                                                            if (selected_file_name.length > 0) {
                                                                var FileSize = file.files[0].size / 1024 / 1024; // in MB
                                                                if (FileSize > 3) {
                                                                    alert('File size exceeds 3 MB');
                                                                    $('#file_reset').trigger('click');

                                                                }
                                                                else {
                                                                    var reader = new FileReader();
                                                                    reader.onload = function (e) {
                                                                        $('#imgdf')
                                                                                .attr('src', e.target.result)
                                                                                .width(200)
                                                                                .height(200);
                                                                    };
                                                                    reader.readAsDataURL(file.files[0]);
                                                                }
                                                            }
                                                            else {
                                                                $('#imgdf')
                                                                        .attr('src', "{!!asset('storage/avatar.jpeg')!!}")
                                                                        .width(200)
                                                                        .height(200);
                                                            }
                                                        }
                                                    </script>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Name<span class="required"
                                                                                                       aria-required="true"> * </span>
                                            </label>

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="name" id="name"
                                                       placeholder="Name" data-required="1" value="{{ old('name') }}">
                                                @if ($errors->has('name'))
                                                    <span class="help-block help-block-error danger"
                                                          style="color: red">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-md-2 control-label">Email <span
                                                        class="required" aria-required="true"> * </span> </label>

                                            <div class="col-md-8">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                    <input type="email" name="email" id="email" class="form-control"
                                                           placeholder="Email" value="{{ old('email') }}">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="help-block help-block-error danger"
                                                          style="color: red">{{$errors->first('email')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="col-md-2 control-label">Gender <span
                                                        class="required" aria-required="true"> * </span> </label>

                                            <div class="col-md-8">
                                                <div class="mt-radio-inline">
                                                    @if(old('gender')==null)
                                                        <label class="mt-radio">
                                                            <input type="radio" name="gender" id="gender" value="female"
                                                                   checked="">Female
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="gender" id="gender" value="male">
                                                            Male
                                                            <span></span>
                                                        </label>
                                                    @else
                                                        @if(old('gender')=='female')
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="female"
                                                                       checked="">Female
                                                                <span></span>
                                                            </label>
                                                        @else
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="female">Female
                                                                <span></span>
                                                            </label>
                                                        @endif
                                                        @if(old('gender')=='male')
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="male"
                                                                       checked="">Male
                                                                <span></span>
                                                            </label>
                                                        @else
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="gender"
                                                                       value="male">Male
                                                                <span></span>
                                                            </label>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="number" class="col-md-2 control-label">Phone Number <span
                                                        class="required" aria-required="true"> * </span> </label>

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="Phone number" value="{{ old('phone') }}">
                                                @if ($errors->has('phone'))
                                                    <span class="help-block help-block-error danger"
                                                          style="color: red">{{$errors->first('phone')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-md-2">Content <span class="required"
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

                                                    CKEDITOR.instances.content.setData('<?php echo old('content') ?>');

                                                </script>
                                                @if ($errors->has('content'))
                                                    <span class="help-block help-block-error danger"
                                                          style="color: red">{{$errors->first('content')}}</span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="form-group last">
                                            <label class="col-md-2 control-label">Date</label>

                                            <div class="col-md-4">
                                                <div class="input-group input-medium date date-picker">
                                                    <input type="text" name="date" size="16" readonly=""
                                                           class="form-control" value="{{ old('date') }}">
                                                        <span class="input-group-btn">
                                                            <button class="btn default date-set" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class=" col-md-2"></div>
                                            <div class=" col-md-8">
                                                <button type="submit" class="btn green" style="margin-right: 20px">
                                                    Submit
                                                </button>
                                                <a type="button" class="btn default" href="{{route('customer.index')}}">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    @endif
@endsection