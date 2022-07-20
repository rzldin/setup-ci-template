<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Beranda</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('assets/template-admin/vendors/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/template-admin/vendors/base/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('assets/template-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets/template-admin/css/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets/template-admin/images/logo-tempo.png') ?>" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="<?= site_url('')?>"><img src="<?= base_url('assets/template-admin/images/logo-tempo.png')?>" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?= base_url('assets/template-admin/images/auth/icon_user2.png') ?>" alt="profile"/>
                <span class="nav-profile-name"><?= $this->session->userdata('username')?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">  
                <a class="dropdown-item tombol-logout" href="<?= site_url('login/logout')?>">   
                  <i class="mdi mdi-logout text-primary"></i>
                  Logout
                </a>
                
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
              <a class="nav-link" href="<?= site_url('dashboard')?>">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('user')?>">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      
      <!-- MENU -->
      <div class="main-panel">
        <div class="content-wrapper">
            <?= $contents ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 <a href="#" target="_blank">DPLK</a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- TUTUP MENU -->
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url('assets/template-admin/vendors/base/vendor.bundle.base.js')?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- <script src="vendors/chart.js/Chart.min.js"></script> -->
  <script src="<?= base_url('assets/template-admin/vendors/datatables.net/jquery.dataTables.js')?>"></script>
  <script src="<?= base_url('assets/template-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')?>"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?= base_url('assets/template-admin/js/off-canvas.js')?>"></script>
  <script src="<?= base_url('assets/template-admin/js/hoverable-collapse.js')?>"></script>
  <script src="<?= base_url('assets/template-admin/js/template.js')?>"></script>
  <!-- endinject -->
  <!-- Sweet Alert -->
  <script src="<?= base_url('assets/swal/sweetalert2.all.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/myscript.js') ?>"></script>
  <!-- Custom js for this page-->
  <script src="<?= base_url('assets/template-admin/js/dashboard.js')?>"></script>
  <script src="<?= base_url('assets/template-admin/js/data-table.js')?>"></script>
  <script src="<?= base_url('assets/template-admin/js/jquery.dataTables.js')?>"></script>
  <script src="<?= base_url('assets/template-admin/js/dataTables.bootstrap4.js')?>"></script>
  <!-- End custom js for this page-->

  <script>

        /** DataTables */
        $(function () {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $('#myTable').DataTable({
            "paging":false,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            "responsive": true,
            language : {
                "zeroRecords": " "
            }
        });      
</script>
</body>

</html>

