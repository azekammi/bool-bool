<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <link href="{{asset('assets/admin/assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/ui/nicescroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/ui/drilldown.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/core/libraries/jquery_ui/interactions.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/core/libraries/jquery_ui/touch.min.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('assets/admin/ckeditor/ckeditor.js')}}"></script>--}}
    <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/admin/assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/pages/components_navs.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/assets/js/pages/form_inputs.js')}}"></script>

    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-collapse collapse" id="navbar-mobile">

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <span>{{Lang::get('admin.settings')}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{route('adminLogout')}}"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Second navbar -->
<div class="navbar navbar-default" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
        @yield('nav')
    </div>
</div>
<!-- /second navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            @if(Session::has("errors"))
                <div class="box-header with-border">
                    <ul style="padding-left: 0">
                        @foreach(Session::get("errors") as $error)
                            <div class="alert alert-danger no-border">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">{{Lang::get('admin.close')}}</span></button>
                                {{$error}}
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif

                @if(Session::has("messages"))
                    <div class="box-header with-border">
                        <ul style="padding-left: 0">
                            @foreach(Session::get("messages") as $message)
                                <div class="alert alert-{{$message["status"]}} no-border">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">{{Lang::get("admin.close")}}</span></button>
                                    {{$message["text"]}}
                                </div>
                            @endforeach
                        </ul>
                    </div>
                @endif

            @yield('content')

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
