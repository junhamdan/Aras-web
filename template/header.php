<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Pendukung Keputusan Metode ARAS</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- SIDEBAR KIRI -->
    
    <!-- SIDEBAR KIRI -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
		  <button id="sidebarToggleTop" class="btn text-info d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->

             <!-- T E S T --> 
             <ul class="navbar-nav">
          <div class="card-body">
          <div class="mb-0 font-weight-bold text-gray-900"><a href="dashboard.php" class="text-secondary text-decoration-none"><h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> </h1></a></div>
           </ul>
            <!-- T E S T --> 

             <!-- T E S T --> 
          <ul class="navbar-nav ml-auto">
          <div class="card-body">
          <div class="mb-0 font-weight-bold text-gray-800"><a href="list-kriteria.php" class="text-secondary text-decoration-none">Data Kriteria</a></div>
           </ul>
            <!-- T E S T --> 

             <!-- T E S T --> 
          <ul class="navbar-nav">
          <div class="card-body">
          <div class="mb-0 font-weight-bold text-gray-800"><a href="list-sub-kriteria.php" class="text-secondary text-decoration-none">Data Sub Kriteria</a></div>
           </ul>
            <!-- T E S T --> 

             <!-- T E S T --> 
          <ul class="navbar-nav">
          <div class="card-body">
          <div class="mb-0 font-weight-bold text-gray-800"><a href="list-alternatif.php" class="text-secondary text-decoration-none">Data Alternatif</a></div>
           </ul>
            <!-- T E S T --> 

             <!-- T E S T --> 
          <ul class="navbar-nav">
          <div class="card-body">
          <div class="mb-0 font-weight-bold text-gray-800"><a href="list-penilaian.php" class="text-secondary text-decoration-none">Data Penilaian</a></div>
           </ul>

            <!-- T E S T --> 

             <!-- T E S T --> 
          <ul class="navbar-nav">
          <div class="card-body">
          <div class="mb-0 font-weight-bold text-gray-800"><a href="perhitungan.php" class="text-secondary text-decoration-none">Data Perhitungan</a></div>
           </ul>

            <!-- T E S T --> 

             <!-- T E S T --> 
          <ul class="navbar-nav">
          <div class="card-body">
          <div class="mb-0 font-weight-bold text-gray-800"><a href="hasil.php" class="text-secondary text-decoration-none">Data Hasil Akhir</a></div>
           </ul>

            <!-- T E S T --> 





  <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="text-uppercase mr-2 d-none d-lg-inline text-gray-600 small">
					<?php
					echo $_SESSION['username'];
					?>
				</span>
   
                <img class="img-profile rounded-circle" src="assets/img/xxx.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="list-profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
              
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
		
		<div class="container-fluid">