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
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('Dashboard')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('Dashboard')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('Dashboard')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.19/dist/sweetalert2.min.css" rel="stylesheet">
  <style>
    .colored-toast.swal2-icon-success {
    background-color: #a5dc86 !important;
    opacity: 0.95;
    }

    .colored-toast.swal2-icon-error {
    background-color: #f27474 !important;
    opacity: 0.95;
    }

    .colored-toast.swal2-icon-warning {
    background-color: #f8bb86 !important;
    opacity: 0.95;
    }

    .colored-toast.swal2-icon-info {
    background-color: #3fc3ee !important;
    opacity: 0.95;
    }

    .colored-toast.swal2-icon-question {
    background-color: #87adbd !important;
    opacity: 0.95;
    }

    .colored-toast .swal2-title {
    color: white;
    }

    .colored-toast .swal2-close {
    color: white;
    }

    .colored-toast .swal2-html-container {
    color: white;
    }

    body.swal2-shown > [aria-hidden="true"] {
    transition: 0.1s filter;
    filter: blur(10px);
    }
  </style>

</head>
<body class="sidebar-mini sidebar-mini-md sidebar-mini-xs layout-navbar-fixed layout-fixed sidebar-closed sidebar-collapse">

@guest

@else

@include('layouts.extras.navbar')
@include('layouts.extras.sidebar')

<div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('Dashboard')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->


@endguest

@yield('admin_content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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

<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.19/dist/sweetalert2.all.min.js
"></script>
<script>
  @if(Session::has('messege'))
  var type="{{Session::get('alert-type','info')}}"

  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  iconColor: 'white',
  customClass: {
    popup: 'colored-toast'
  },
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

  switch (type) {
    case 'info':
      Toast.fire({
      icon: 'info',
      title: "{{ Session::get('messege')}}"
      })
      break;
    case 'success':
      Toast.fire({
      icon: 'success',
      title: "{{ Session::get('messege')}}"
      })
      break; 
    case 'warning':
      Toast.fire({
      icon: 'warning',
      title: "{{ Session::get('messege')}}"
      })
      break;
    case 'error':
      Toast.fire({
      icon: 'error',
      title: "{{ Session::get('messege')}}"
      })
      break;
    case 'question':
      Toast.fire({
      icon: 'question',
      title: "{{ Session::get('messege')}}"
      })
      break;
  }
@endif
</script>
<script>
  $(document).on("click","#delete", function(e){
  e.preventDefault();
  var link = $(this).attr("href");
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link;
  }
});
});
</script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('Dashboard')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('Dashboard')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
  $('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>
</body>
</html>
