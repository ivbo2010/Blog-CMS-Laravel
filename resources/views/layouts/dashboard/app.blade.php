<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/AdminLTE.min.css') }}">
    <style>
        .mr-2 {
            margin-right: 5px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
            animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/noty/noty.css') }}">
    <script src="{{ asset('admin_assets/plugins/noty/noty.min.js') }}"></script>
    {{--morris--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/morris/morris.css') }}">
    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/icheck/all.css') }}">
    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        {{--<!-- Logo -->--}}
        <a href="{{ asset('dashboard') }}" class="logo">
            {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-flag-checkered"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <ul class="menu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>

                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/uploads/user_images/{{ auth()->user()->image }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            {{--<!-- User image -->--}}
                            <li class="user-header">
                                <img src="/uploads/user_images/{{ auth()->user()->image }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                    <small>Member since 2 days</small>
                                </p>
                            </li>
                            {{--<!-- Menu Footer-->--}}
                            <li class="user-footer">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">@lang('site.logout')</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    @include('layouts.dashboard._aside')

    @yield('content')

    @include('partials._session')
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2020
            <a href="#">CMS example</a>.</strong> All rights
        reserved.
    </footer>
</div><!-- end of wrapper -->
{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
{{--icheck--}}
<script src="{{ asset('admin_assets/plugins/icheck/icheck.min.js') }}"></script>
{{--<!-- FastClick -->--}}
<script src="{{ asset('admin_assets/js/fastclick.js') }}"></script>
{{--<!-- AdminLTE App -->--}}
<script src="{{ asset('admin_assets/js/adminlte.min.js') }}"></script>
{{--ckeditor standard--}}
<script src="{{ asset('admin_assets/plugins/ckeditor/ckeditor.js') }}"></script>
{{--jquery number--}}
<script src="{{ asset('admin_assets/js/jquery.number.min.js') }}"></script>
{{--print this--}}
<script src="{{ asset('admin_assets/js/printThis.js') }}"></script>
{{--morris --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('admin_assets/plugins/morris/morris.min.js') }}"></script>
{{--custom js--}}
<script src="{{ asset('admin_assets/js/custom/image_preview.js') }}"></script>
<script src="{{ asset('admin_assets/js/custom/order.js') }}"></script>
<script>
    $(document).ready(function () {

        $('.sidebar-menu').tree();

        //icheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        //delete
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('site.confirm_delete')",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });

        // // image preview
        // $(".image").change(function () {
        //
        //     if (this.files && this.files[0]) {
        //         var reader = new FileReader();
        //
        //         reader.onload = function (e) {
        //             $('.image-preview').attr('src', e.target.result);
        //         }
        //
        //         reader.readAsDataURL(this.files[0]);
        //     }
        //
        // });

        CKEDITOR.config.language = "{{ app()->getLocale() }}";

    });
</script>
@stack('scripts')
</body>
</html>
