<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets')}}/dist/css/adminlte.min.css">

  <style>
    .ortala {
      text-align: center;
      vertical-align: middle;
    }
    body{
      font-size: 15px;
      font-family: "Times New Roman";
    }
  </style>



</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets')}}/images/elitbil1.png" alt="AdminLTELogo" height="60" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('assets')}}/images/elitbil1.png" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Elit Yazılım</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <h5 style="color:white;">Borç Takip Sistemi</h5>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                 <a href="{{route('home')}}" class="nav-link">
                   <i class="nav-icon fas fa-home"></i>
                   <p>
                     Giriş Sayfası
                   </p>
                 </a>
               </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Borç İşlemleri
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('borceklepage')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Borç Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('borclueklepage')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Borçlu Ekle</p>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{route('borclarpage')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Borç Listesi</p>
            </a>
          </li>
          <li>
            <a href="{{route('borclularpage')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Borçlular Listesi</p>
            </a>
          </li>
      </ul>
    </nav>

    </div>
    <!-- /.sidebar -->
  </aside>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Borç Listesi</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card">
              @if(session()->has('successMessage'))
                <div class="alert alert-success">
                  {{ session()->get('successMessage') }}
                </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr class="ortala">
                        <th class="ortala">Adı-Soyadı</th>
                        <th class="ortala">Borç Başlangıç Tarihi</th>
                        <th class="ortala">Borç Bitiş Tarihi</th>
                        <th class="ortala">Tutar</th>
                        <th class="ortala">Para Türü</th>
                        <th class="ortala">Açıklama</th>
                        <th class="ortala">Sil</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($veriler as $veri)
                      <tr>
                            <td class="ortala">{{$veri->getBorclu->borclu_ad." ".$veri->getBorclu->borclu_soyad}}</td>
                            <td class="ortala">{{$veri->borc_baslangic_tarihi}}</td>
                            <td class="ortala">{{$veri->borc_bitis_tarihi}}</td>
                            <td class="ortala">{{$veri->borc_miktari}}</td>
                            <td class="ortala">{{$veri->getParaTuru->para_adi}}</td>
                            <td class="ortala">{{$veri->aciklama}}</td>

                            <td class="ortala"><a href="{{route('borcsil',['borc_id'=>$veri->borc_id])}}" class="btn btn-sm btn-danger">Sil</a></td>

                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
    <strong>Design : <a href="https://www.elitbil.com">Elit Bilişim</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('assets')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('assets')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets')}}/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
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
</body>
</html>
