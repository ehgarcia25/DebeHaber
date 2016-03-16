
<!--<!DOCTYPE html>
<html lang="en">
        <head>
                <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                <meta charset="utf-8">
                <title>Bootstrap Login Form</title>
                <meta name="generator" content="Bootply" />
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                <link href="{{url()}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                [if lt IE 9]>
                        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <![endif]
                <link href="{{url()}}/bootstrap/css/styles.css" rel="stylesheet">
        </head>
        <body>
login modal
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
           <div class="container text-danger">
  @if (Session::has('message'))
   {{Session::get('message')}}
  @endif
 </div>
          
      </div>
      <div class="container text-danger">
 
 </div>
      <div class="modal-body">
          <form method="post" action="{{url('auth/login')}}" class="form col-md-12 center-block" >
               {{csrf_field()}}
            <div class="form-group">
              <input type="email" name="email" class="form-control input-lg" placeholder="Email" value="{{Input::old('email')}}">
              <div class="text-danger">{{$errors->first('email')}}</div>
            </div>
               
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
              <div class="text-danger">{{$errors->first('password')}}</div>
            </div>
                <div class="form-group">
   <label for="remember">No cerrar sesión:</label>
   <input type="checkbox" name="remember" />
  </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"><a href="{{url('auth/register')}}">Register</a></span><span><a href="#">Need help?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                  </div>	
      </div>
  </div>
  </div>
</div>
         script references 
                <script src="{{url()}}/bootstrap/js/jquery.min.js"></script>
                <script src="{{url()}}/bootstrap/js/bootstrap.min.js"></script>
        </body>
</html>-->

<!DOCTYPE html>
<html>
    <head>

        <!-- Title -->
        <title>Modern | Login - Sign in</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="{{url()}}/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="{{url()}}/assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="{{url()}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{url()}}/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="{{url()}}/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="{{url()}}/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="{{url()}}/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="{{url()}}/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{url()}}/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	

        <!-- Theme Styles -->
        <link href="{{url()}}/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{url()}}/assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="{{url()}}/assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <script src="{{url()}}/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="{{url()}}/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="page-login">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="index.html" class="logo-name text-lg text-center">DebeHaber</a>
                                <p class="text-center m-t-md">Please login into your account.</p>
                                <div class="container text-danger">
                                    @if (Session::has('message'))
                                    {{Session::get('message')}}
                                    @endif
                                </div>
                                <form class="m-t-md" method="POST" action="{{url('auth/login')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        <div class="text-danger">{{$errors->first('email')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        <div class="text-danger">{{$errors->first('password')}}</div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Login</button>
                                    {{--<a href="forgot.html" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                                    <p class="text-center m-t-xs text-sm">Do not have an account?</p>--}}
                                    <a href="{{url('auth/register')}}" class="btn btn-default btn-block m-t-md">Create an account</a>
                                </form>
                                <p class="text-center m-t-xs text-sm">2015 Cognitivo Paraguay.</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->


        <!-- Javascripts -->
        <script src="{{url()}}/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="{{url()}}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="{{url()}}/assets/plugins/pace-master/pace.min.js"></script>
        <script src="{{url()}}/assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="{{url()}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{url()}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="{{url()}}/assets/plugins/switchery/switchery.min.js"></script>
        <script src="{{url()}}/assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="{{url()}}/assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="{{url()}}/assets/plugins/waves/waves.min.js"></script>
        <script src="{{url()}}/assets/js/modern.min.js"></script>

    </body>
</html>