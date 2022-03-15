
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Time and Attendance System</title>    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Custom styles for this template -->
    <link href="/demo/sidebars.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="/swal/sweetalert2.min.css" rel="stylesheet">
    <script src="/swal/sweetalert2.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="/demo/sidebars.js"></script>

  </head>
<body>
  @guest
    @include('auth.login')
  @else  

<main>

    @include('partial.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="container" style="margin: 20px">

      <div class="container-fluid">
        <ul class="breadcrumb">
            <li><a href="/home">Home</a></li>
            <li>{{ $page }}</li>
        </ul>
      </div>

      <div class="container" style="max-width:100% !important;width: 100%;display: inline-block;">
        <div class="container-fluid">

            @yield('content')
        </div>
      </div>
    </div>
  <!-- /.content-wrapper -->

</main>

@endif

</body>
  <script>
    @if(Session::has('success'))
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      Swal.fire({
        icon: 'success',
        title: '{{ session("success") }}'
      }).then(function() {
        window.location.reload();
      });
    @endif
  </script>
</html>
