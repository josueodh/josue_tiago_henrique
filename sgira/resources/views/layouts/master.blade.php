<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SGIRA</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"  data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="far fa-bell fa-2x {{ (Auth::user()->unreadNotifications->count() > 0) ? 'red-bell' : ''}}"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <span class="dropdown-item dropdown-header">{{ Auth::user()->unreadNotifications->count() }} Notificações</span>
                      <div class="dropdown-divider"></div>
                      @foreach(Auth::user()->unreadNotifications->take(3) as $notification)
                          <a href="{{ route('notifications.read', $notification ) }}" class="dropdown-item">
                            <i class="{{ $notification->data['icon'] }} mr-2"></i>{{ $notification->data['title']}}
                            <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                          </a>
                          <div class="dropdown-divider"></div>
                      @endforeach
                      <div class="dropdown-divider"></div>
                      <a href="{{ route('notifications.index') }}" class="dropdown-intem dropdown-footer">Veja todas as Notificações</a>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        @include('includes.sidebar')
        @include('includes.success')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                @yield('title')
                            </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div id="app" class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
            </div>
            <!-- Default to the left -->
            <b>Copyright &copy; 2021 <span style="color:#5a5eae">SGIRA</span>. Todos direitos
            reservados.</b>
        </footer>
    </div>

    <!-- ./wrapper -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(function() {
                $('.select2').select2({
                    placeholder: 'Selecione',
                    allowClear:true,
                });
            });
            $('select[value]').each(function () {
                $(this).val($(this).attr('value'));
            });
            $('.multiple[value]').each(function(){
                var value = $(this).attr('value');
                if (value) {
                    value = JSON.parse(value);
                }
                $(this).val(value);
            });

        });
    </script>
    @stack('scripts')

</body>

</html>
