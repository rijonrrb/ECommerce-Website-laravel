<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daily- Ecommerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('Dashboard')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('Dashboard')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Dashboard')}}/dist/css/adminlte.min.css">
  <!-- toastr style -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>

</head>
<body>
<div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


@guest

@else

@include('layouts.extras.navbar')
@include('layouts.extras.sidebar')

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('Dashboard')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>


@endguest

@yield('admin_content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</div>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('Dashboard')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('Dashboard')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('Dashboard')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('Dashboard')}}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('Dashboard')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('Dashboard')}}/plugins/chart.js/Chart.min.js"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- AdminLTE for demo purposes
<script src="{{ asset('Dashboard')}}/dist/js/demo.js"></script>
AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('Dashboard')}}/dist/js/pages/dashboard2.js')}}"></script>


<script>
  @if(Session::has('messege'))
  var type="{{Session::get('alert-type','info')}}"
  switch (type) {
    case 'info':
      toastr.info("{{ Session::get('messege')}}", "", {closeButton: true,  progressBar: true, positionClass: 'toast-top-center', timeOut: 5000});
      break;
    case 'success':
      toastr.success("{{ Session::get('messege')}}", "", {closeButton: true,  progressBar: true, positionClass: 'toast-top-center', timeOut: 2500});
      break; 
    case 'warning':
      toastr.warning("{{ Session::get('messege')}}", "", {closeButton: true,  progressBar: true, positionClass: 'toast-top-center', timeOut: 5000});
      break;
    case 'error':
      toastr.error("{{ Session::get('messege')}}", "", {closeButton: true,  progressBar: true, positionClass: 'toast-top-center', timeOut: 5000});
      break;

      
  }

@endif
</script>
</body>
</html>
