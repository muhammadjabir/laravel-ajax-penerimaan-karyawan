<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title') - Penerimaan Karyawan</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('tem/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('tem/css/sb-admin-2.min.css')}}" rel="stylesheet">
   <link href="{{asset('tem/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

   
 <style type="text/css">
 #datatable {
    
  }

 @media (min-width: 992px) {
  #datatable {
    overflow: auto;
  }
 }
@yield('css')

 </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi PKB</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{Request::path() == "home" ? 'active' : ''}}">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dahsboard</span></a>
      </li>
      @if(\Auth::user()->role=='PEMILIK')
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{Request::path() == "users" ? 'active' : ''}}">
        <a class="nav-link" href="{{route('users.index')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Kelola Admin</span></a>
      </li>
      @endif
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{Request::path() == "calon" ? 'active' : ''}}">
        <a class="nav-link" href="{{route('calon.index')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pelamar</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{Request::path() == "interview" ? 'active' : ''}}">
        <a class="nav-link" href="{{route('interview.index')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Jadwal Interview</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{Request::path() == "karyawan" ? 'active' : ''}}">
        <a class="nav-link" href="{{route('karyawan.index')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Karyawan Baru</span></a>
      </li>
      <hr class="sidebar-divider my-0">


      <!-- Nav Item - Utilities Collapse Menu -->




      <!-- Nav Item - Pages Collapse Menu -->
    

      <!-- Nav Item - Charts -->
   

      <!-- Nav Item - Tables -->
    

      <!-- Divider -->

   <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <h4>Kembar Relaxation</h4>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            

            <!-- Nav Item - Alerts -->
       

            <!-- Nav Item - Messages -->
       

            <div class="topbar-divider d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline text-gray-600 small">
                
                Welcome, {{\Auth::user()->username}}
                
                </span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <form method="POST" action="{{route('logout')}}">
                @csrf
                <button class="dropdown-item">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </button>
                </form>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; April </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


 
  <!-- Bootstrap core JavaScript-->
 
  <script src="{{asset('tem/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('tem/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('tem/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('tem/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('tem/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('tem/js/sb-admin-2.min.js')}}"></script>

  @yield('script')

</body>

</html>
