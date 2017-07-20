@section('slide')
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">

      <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper hide">
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          <div class="sidebar-toggler">
            <span></span>
          </div>
          <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>

        <li id="customer1" class="nav-item"  >
          <a  class="nav-link nav-toggle" >
            <i class="icon-settings" ></i>
            <span class="arrow open" ></span>
            <span class="title">Customer</span>
            <span class="selected" ></span>

          </a>
          <ul class="sub-menu">
            <li id="cuschild1" class="nav-item 1"  >
              <a href="{{route('customer.index')}}"  class="nav-link ">
                <span class="title">Customer List
                  <span class="selected "></span>
                </a>
              </li>
              <li id="cuschild2" class="nav-item 1" >
                <a href="{{route('customer.create')}}"  class="nav-link " >
                  <span class="title">New Customer
                    <span class="selected"></span>
                  </a>
                </li>

              </ul>
            </li>

            <li id="customer2" class="nav-item"  >
              <a class="nav-link nav-toggle" >
                <i class="icon-settings" ></i>
                <span class="title">Admin</span>
                <span class="selected"></span>
                <span class="arrow open" ></span>
              </a>
              <ul class="sub-menu">
                <li id="cuschild3" class="nav-item 1" >
                  <a class="nav-link ">
                    <span class="title">Customer List
                      <span class="selected "></span>
                    </a>
                  </li>
                  <li id="cuschild4" class="nav-item 1" >
                    <a class="nav-link " >
                      <span class="title">New Customer
                        <span class="selected"></span>
                      </a>
                    </li>

                  </ul>
                </li>
              </ul>
              <?php if(Request::is('customer')){?>
                <script type="text/javascript">
                  $('#customer1').addClass('active');
                  $('#cuschild1').addClass('active');
                </script>
              <?php
              } ?>
              <?php if(Request::is('customer/create')){?>
                <script type="text/javascript">
                  $('#customer1').addClass('active');
                  $('#cuschild2').addClass('active');
                </script>
              <?php
              } ?>
              <!-- <script type="text/javascript">
              function checked(id){
                var elms = document.getElementsByClassName('nav-item active');
                if(elms.length>0){
                  for (i=0;i<elms.length;i++){
                    elms[i].classList.remove('active');
                  }
                }
                $("#"+id).addClass('active');
              }
              function childchecked(id){
                var elms = document.getElementsByClassName('nav-item 1');
                if(elms.length>0){
                  for (i=0;i<elms.length;i++){
                    elms[i].classList.remove('active');
                  }
                }
                $("#"+id).addClass('active');
              }

              </script> -->
              <!-- END SIDEBAR MENU -->
              <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
          </div>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->

          <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            @yield('content')

            <!-- END CONTENT BODY -->
          </div>
          <!-- END CONTENT -->

          <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        @endsection
