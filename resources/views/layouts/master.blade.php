<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

    <!-- Title -->
    <title>@yield('title')</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="admin,dashboard"/>
    <meta name="author" content="Cognitivo Paraguay"/>

    <!-- Styles -->
   {{-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>--}}
    @include('layouts.css')
</head>
<body class="page-header-fixed" >



<form class="search-form" action="#" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button">
                        <i class="fa fa-times"></i></button>
                </span>
    </div><!-- Input Group -->
</form><!-- Search Form -->
<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="{{url()}}/" class="logo-text"><span>DebeHaber</span></a>
            </div><!-- Logo Box -->
            <div class="search-button">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i
                            class="fa fa-search"></i></a>
            </div>
            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="javascript:void(0);"
                               class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                        </li>

                        <!--
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                        </li>
                        -->

                    </ul>
                    <ul class="nav navbar-nav navbar-right">


                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="{{url()}}" class="dropdown-toggle waves-effect waves-button waves-classic"
                                   data-toggle="dropdown">
                                    <b class="icon-user"><span class="user-name"> {{Auth::user()->name}} <i
                                                    class="fa-angle-down"></i></span></b>
                                </a>
                                <ul class="dropdown-menu dropdown-list" role="menu">
                                    <li role="presentation"><a href="{{url('edit',Auth::user()->id)}}"><i class="fa fa-user"></i>Perfil</a>
                                    </li>
                                    {{--<li role="presentation"><a href="calendar.html"><i class="fa fa-calendar"></i>Calendario</a>--}}
                                    {{--</li>--}}
                                    {{--<li role="presentation"><a href="inbox.html"><i--}}
                                                    {{--class="fa fa-envelope"></i>Mensajes<span--}}
                                                    {{--class="badge badge-success pull-right"><!-- number of unread --></span></a>--}}
                                    {{--</li>--}}
                                    {{--<li role="presentation" class="divider"></li>--}}
                                    {{--<li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Bloquear</a>--}}
                                    {{--</li>--}}
                                    <li role="presentation"><a href="{{url('auth/logout')}}"><i
                                                    class="fa fa-sign-out m-r-xs"></i>Salir</a></li>
                                </ul>
                            </li>
                        @else

                            <li>
                                <a href="{{url('auth/login')}}">
                                    <span><i class="icon-login" tooltip="Login"></i></span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i
                                        class="fa fa-search"></i></a>
                        </li>


                    </ul><!-- Nav -->
                </div><!-- Top Menu -->
            </div>
        </div>
    </div><!-- Navbar -->
    <div class="page-sidebar sidebar">
        <div class="page-sidebar-inner slimscroll">
            <div class="sidebar-header">
                <div class="sidebar-profile">
                    <a href="{{url()}}/list_empresas" >
                        <div class="sidebar-profile" id="sustituir_empresa">

                            @if(Auth::check())

                                <span id="nombre_empresa"><small id="codigo">
                                        {{Session::get('empresa_code')}}
                                       </small>
                                    <br id="nombre_empresa"> {{Session::get('empresa')}} </br>


                                </span>
                            @endif
                        </div>
                    </a>
                </div>
            </div>
            <ul class="menu accordion-menu">
                @if(Auth::check())


                {{--<li
                        @if(Request::url() === '')
                        class="active"
                        @endif
                ><a href="{{url()}}/divisas" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-usd"></span>
                        <p>Divisas</p></a></li>--}}






                <li
                        @if(Request::url() === '')
                        class="active"
                        @endif
                ><a href="{{url()}}/compras" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-import"></span>
                        <p>Compras</p></a></li>

                <li
                        @if(Request::url() === 'sales')
                        class="active"
                        @endif
                ><a href="{{url()}}/ventas" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-export"></span>
                        <p>Ventas</p></a></li>
                <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-transfer"></span>
                        <p>Comercial</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        {{--<li><a href="{{url()}}/importaciones">Importaciones</a></li>--}}
                        <li><a href="{{url()}}/cobros">Cobros</a></li>
                        <li><a href="{{url()}}/pagos">Pagos</a></li>
                        <li><a href="{{url()}}/credito">Notas de Crédito</a></li>
                        <li><a href="{{url()}}/retencion">Retenciones</a></li>
                        <li><a href="{{url()}}/activos">Activos Fijos</a></li>
                    </ul>
                </li>
                    @if(Auth::user()->role_id ==1 || Auth::user()->role_id ==2)
                <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-book"></span>
                        <p>Contabilidad</p><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{url()}}/ciclos">Periodo Fiscal</a></li>
                        {{--<li><a href="{{url()}}/presupuesto">Presupuesto Fiscal</a></li>--}}
                        <li><a href="{{url()}}/plan_cuenta">Plan de Cuenta</a></li>
                        <li><a href="{{url()}}/list_asiento">Asientos</a></li>

                    </ul>
                </li>
                   @endif
                <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-briefcase"></span>
                        <p>Informes</p><span class="arrow"></span></a>
                    <ul class="sub-menu">

                        <li><a href="{{url()}}/informe_libro_diario">Libro Diario</a></li>
                        <li><a href="{{url()}}/informe_libro_mayor">Libro Mayor</a></li>
                        <li><a href="{{url()}}/informe_balance_general">Balance General</a></li>
                        <li><a href="{{url()}}/informe_cuadro_resultado" target="_blank">Cuadro de Resultados</a></li>
                        {{--<li><a href="#">Sumas &amp; Saldos</a></li>--}}

                        <li><a href="hechouka_ventas">Hechauka Ventas</a></li>
                        <li><a href="hechouka_compras">Hechauka Compras</a></li>
                    </ul>
                </li>

                    @if(Auth::user()->role_id==1)
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                                        class="menu-icon glyphicon glyphicon-cog"></span>
                                <p>Configuración</p><span class="arrow"></span></a>
                            <ul class="sub-menu">

                                <li><a href="{{url()}}/users">Usuarios</a></li>
                                {{--<li><a href="{{url()}}/calendario">Calendario</a></li>--}}
                                <li><a href="{{url()}}/list_rango">Rango</a></li>
                                <li><a href="{{url()}}/divisas">Divisas</a></li>
                                <li><a href="{{url()}}/list_centro_costo">Centro Costo</a></li>

                                <li><a href="{{url()}}/list_accounts">Cuentas</a></li>
                                <li><a href="{{url()}}/list_sucursal">Sucursal</a></li>
                                <li><a href="{{url()}}/list_terminal">Terminal</a></li>
                                <li><a href="{{url()}}/list_iva">Iva</a></li>
                            </ul>
                        </li>
                      @endif
                    @endif
            </ul>
        </div><!-- Page Sidebar Inner -->
    </div><!-- Page Sidebar -->
    <div class="page-inner">
        <div class="page-title">
            <h3>@yield('Title')</h3>
            <div class="page-breadcrumb">
                @yield('breadcrumbs')
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-4"> @yield('botones')</div>
            </div>


        </div>

        <div id="main-wrapper" >
            <!-- CONTENT -->
            @yield('content')
        </div>

        <div class="page-footer">
            <p class="no-s">2015 &copy; Cognitivo Paraguay</p>
        </div>
    </div><!-- Page Inner -->
</main><!-- Page Content -->
<nav class="cd-nav-container" id="cd-nav">
    <header>
        <h3>Menu Rápido</h3>
        <a href="#0" class="cd-close-nav">Close</a>
    </header>
    <ul class="cd-nav list-unstyled">
        <li class="cd-selected" data-menu="index">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-dashboard"></i>
                        </span>
                <p>Dashboard</p>
            </a>
        </li>
        <li data-menu="profile">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                <p>Profile</p>
            </a>
        </li>
        <li data-menu="inbox">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                <p>Mailbox</p>
            </a>
        </li>
        <li data-menu="#">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                <p>Tasks</p>
            </a>
        </li>
        <li data-menu="#">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                <p>Settings</p>
            </a>
        </li>
        <li data-menu="calendar">
            <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                <p>Calendar</p>
            </a>
        </li>
    </ul>
</nav>




<!-- Javascripts -->
@include('layouts.js')
@yield('scripts')

</body>
</html>
