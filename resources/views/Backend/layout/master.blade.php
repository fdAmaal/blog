<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title') </title>

    <!-- Using Select2 from a CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- Bootstrap -->
    <link href="{{asset('../vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('../vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('../vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('../vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet')}}"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('../vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('../build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  
  
  
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	  
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            
            <!----------------------- menu profile quick info ---------------------->
            <div class="profile clearfix">


              <div class="profile_info" style="text-align: center;">
                <span >Welcome,</span>
               <h1>{{ Auth::user()->name }}</h1>
              </div>
            </div>
            <!----------------------- /menu profile quick info ---------------------->
            <br />

			
			
            <!----------------------- sidebar menu ---------------------->
            <div id="sidebar-menu" class="main_menu_side menu_fixed hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a  href="index"><i class="fa  fa-tachometer"></i> Dashboard </a> </li>
                  <li><a href="{{route('categories.index')}}"><i class="fa  fa-bookmark-o"></i> Categories</a></li>
                  <li><a href="{{route('posts.index')}}"><i class="fa fa-edit"></i> Posts </a></li>
                  <li><a href="{{route('users.index')}}"><i class="fa  fa-users"></i> Users</a></li>
				          <li><a href="notifications"><i class="fa  fa-bullhorn"></i> Notifications</a></li>
                </ul>
              </div>
            </div>
            <!----------------------- /sidebar menu ---------------------->
          </div>
        </div>



        <!----------------------- top navigation ---------------------->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
			<div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="storage/user.png" alt=""><i class="fa  fa-at"></i> {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                      </form>
                    </li>
                  </ul>
            </nav>
          </div>
        </div>
        <!----------------------- /top navigation ---------------------->

		
		
		
        <!----------------------- page content ---------------------->
        <div class="right_col" role="main">
        @yield('content')
        <div class="clearfix"></div>
	    	</div>
         
        <!----------------------- /page content ---------------------->

		
		
		
		
		
        <!--------------- footer content -------------------->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!--------------- /footer content -------------------->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('../vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('../vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('../vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('../vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('../vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('../vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('../vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('../vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('../vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('../vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('../vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('../vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('../vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('../vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('../vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('../vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('../vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('../vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('../vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('../vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('../vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('../build/js/custom.min.js')}}"></script>
	
  </body>
</html>
