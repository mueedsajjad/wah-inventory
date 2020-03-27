<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<style type="text/css">
	.dropdown:hover>.dropdown-menu {
  display: block;
}
</style>
    {{--    <meta charset="utf-8">--}}
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--    <!-- CSRF Token -->--}}
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

    {{--    <!-- Scripts -->--}}
    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    {{--    <!-- Fonts -->--}}
    {{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    {{--    <!-- Styles -->--}}
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SGA - WAH Industries Ltd.</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('public/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/public/plugins/datatables/datatables.min.css')}}">





    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">

    <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
</head>

<body class="hold-transition layout-top-nav">

{{--<div id="app">--}}
{{--    --}}{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--    --}}{{--            <div class="container">--}}
{{--    --}}{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--    --}}{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--    --}}{{--                </a>--}}
{{--    --}}{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--    --}}{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--    --}}{{--                </button>--}}

{{--    --}}{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--    --}}{{--                    <!-- Left Side Of Navbar -->--}}
{{--    --}}{{--                    <ul class="navbar-nav mr-auto">--}}

{{--    --}}{{--                    </ul>--}}

{{--    --}}{{--                    <!-- Right Side Of Navbar -->--}}
{{--    --}}{{--                    <ul class="navbar-nav ml-auto">--}}
{{--    --}}{{--                        <!-- Authentication Links -->--}}
{{--    --}}{{--                        @guest--}}
{{--    --}}{{--                            <li class="nav-item">--}}
{{--    --}}{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--    --}}{{--                            </li>--}}
{{--    --}}{{--                            @if (Route::has('register'))--}}
{{--    --}}{{--                                <li class="nav-item">--}}
{{--    --}}{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--    --}}{{--                                </li>--}}
{{--    --}}{{--                            @endif--}}
{{--    --}}{{--                        @else--}}
{{--    --}}{{--                            <li class="nav-item dropdown">--}}
{{--    --}}{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--    --}}{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--    --}}{{--                                </a>--}}

{{--    --}}{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--    --}}{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--    --}}{{--                                       onclick="event.preventDefault();--}}
{{--    --}}{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--    --}}{{--                                        {{ __('Logout') }}--}}
{{--    --}}{{--                                    </a>--}}

{{--    --}}{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--    --}}{{--                                        @csrf--}}
{{--    --}}{{--                                    </form>--}}
{{--    --}}{{--                                </div>--}}
{{--    --}}{{--                            </li>--}}
{{--    --}}{{--                        @endguest--}}
{{--    --}}{{--                    </ul>--}}
{{--    --}}{{--                </div>--}}
{{--    --}}{{--            </div>--}}
{{--    --}}{{--        </nav>--}}

{{--    <main class="py-4">--}}
{{--        @yield('content')--}}
{{--    </main>--}}
{{--</div>--}}

<div class="wrapper">
 @include('layouts.navbar')
{{--    <div id="header">--}}

{{--    </div>--}}

    <!-- Navbar -->
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper water-mark">
        @yield('content')
        <!-- Content Header (Page header) -->
        <!--    <div class="content-header">-->
        <!--      <div class="container-fluid">-->
        <!--        <div class="row mb-2">-->
        <!--          <div class="col-sm-6">-->
        <!--            <h1 class="m-0 text-dark">dashboard v3</h1>-->
        <!--          </div>&lt;!&ndash; /.col &ndash;&gt;-->
        <!--          <div class="col-sm-6">-->
        <!--            <ol class="breadcrumb float-sm-right">-->
        <!--              <li class="breadcrumb-item"><a href="#">Home</a></li>-->
        <!--              <li class="breadcrumb-item active">dashboard v3</li>-->
        <!--            </ol>-->
        <!--          </div>&lt;!&ndash; /.col &ndash;&gt;-->
        <!--        </div>&lt;!&ndash; /.row &ndash;&gt;-->
        <!--      </div>&lt;!&ndash; /.container-fluid &ndash;&gt;-->
        <!--    </div>-->
        <!-- /.content-header -->

        <!-- Main content -->
        <!-- /.content -->
    </div>

     @include('layouts.footer')
    <!-- /.content-wrapper -->
{{--    <div id="footer">--}}

{{--    </div>--}}

</div>


<!-- Bootstrap 4 -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('public/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('public/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('public/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/dist/js/demo.js')}}"></script>
<!-- Page script -->
<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('public/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('public/dist/js/demo.js')}}"></script>
<script src="{{asset('public/dist/js/pages/dashboard3.js')}}"></script>



<script src="{{asset('/public/plugins/datatables/datatables.min.js')}}"></script>

<script>
    $(document).ready( function () {
        $('#pageTable').DataTable();
    });
</script>

<script>
    $(function(){
        $("#header").load("include/header.html");
        $("#footer").load("include/footer.html");
    });
</script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
</body>
</html>
