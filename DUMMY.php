 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-database"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SPK ARAS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php if($page == "Dashboard"){echo "active";} ?>">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span></a>
</li>

<?php
$user_role = get_role();
if($user_role == 'admin') {
?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Master Data
</div>


<li class="nav-item <?php if($page == "Kriteria"){echo "active";} ?>">
  <a class="nav-link" href="list-kriteria.php">
    <i class="fas fa-fw fa-cube"></i>
    <span>Data Kriteria</span></a>
</li>

<li class="nav-item <?php if($page == "Sub Kriteria"){echo "active";} ?>">
  <a class="nav-link" href="list-sub-kriteria.php">
    <i class="fas fa-fw fa-cubes"></i>
    <span>Data Sub Kriteria</span></a>
</li>

<li class="nav-item <?php if($page == "Alternatif"){echo "active";} ?>">
  <a class="nav-link" href="list-alternatif.php">
    <i class="fas fa-fw fa-users"></i>
    <span>Data Alternatif</span></a>
</li>

<li class="nav-item <?php if($page == "Penilaian"){echo "active";} ?>">
  <a class="nav-link" href="list-penilaian.php">
    <i class="fas fa-fw fa-edit"></i>
    <span>Data Penilaian</span></a>
</li>

<li class="nav-item <?php if($page == "Perhitungan"){echo "active";} ?>">
  <a class="nav-link" href="perhitungan.php">
    <i class="fas fa-fw fa-calculator"></i>
    <span>Data Perhitungan</span></a>
</li>	

<li class="nav-item <?php if($page == "Hasil"){echo "active";} ?>">
  <a class="nav-link" href="hasil.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Data Hasil Akhir</span></a>
</li>	

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Master User
</div>


<li class="nav-item <?php if($page == "User"){echo "active";} ?>">
  <a class="nav-link" href="list-user.php">
    <i class="fas fa-fw fa-users-cog"></i>
    <span>Data User</span></a>
</li>	

<li class="nav-item <?php if($page == "Profile"){echo "active";} ?>">
  <a class="nav-link" href="list-profile.php">
    <i class="fas fa-fw fa-user"></i>
    <span>Data Profile</span></a>
</li>	

<?php
}elseif($user_role == 'user') {
?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Master Data
</div>

<li class="nav-item <?php if($page == "Hasil"){echo "active";} ?>">
  <a class="nav-link" href="hasil.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Data Hasil Akhir</span></a>
</li>	

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Master User
</div>

<li class="nav-item <?php if($page == "Profile"){echo "active";} ?>">
  <a class="nav-link" href="list-profile.php">
    <i class="fas fa-fw fa-user"></i>
    <span>Data Profile</span></a>
</li>	

<?php
}
?>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->


<!-- T E S T --> 
<ul class="navbar-nav ml-auto">
          <div class="card-body">
          <div class="mb-0 font-weight-bold text-gray-800"><a href="list-kriteria.php" class="text-secondary text-decoration-none">Data Kriteria</a></div>
           </ul>
            <!-- T E S T --> 


            <!-- DASHBOARD V2 -->
            <?php
require_once('includes/init.php');

$user_role = get_role();
if($user_role == 'admin' || $user_role == 'user') {
$page = "Dashboard";
require_once('template/header.php');

?>


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center my-3">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
    </div>

	<?php
	if($user_role == 'admin') {
	?>
	
 
    <div class="row d-flex justify-content-center text-center">

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold"><a href="list-kriteria.php" class="text-dark text-decoration-none">Data Kriteria </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cube fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center text-center">
		
		<div class="col-xl-6 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="list-sub-kriteria.php" class="text-dark text-decoration-none">Data Sub Kriteria</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row d-flex justify-content-center text-center">
		
		<div class="col-xl-6 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="list-alternatif.php" class="text-dark text-decoration-none">Data Alternatif</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row d-flex justify-content-center text-center">
		
		<div class="col-xl-6 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="list-penilaian.php" class="text-dark text-decoration-none">Data Penilaian</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-edit fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row d-flex justify-content-center text-center">

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="perhitungan.php" class="text-dark text-decoration-none">Data Perhitungan</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calculator fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row d-flex justify-content-center text-center">
		
		<div class="col-xl-6 col-md-6 mb-4 mb-5">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="hasil.php" class="text-dark text-decoration-none">Data Hasil Akhir</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
	}elseif($user_role == 'user') {
	?>
	<!-- Content Row -->
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Selamat datang <span class="text-uppercase"><b><?php echo $_SESSION['username']; ?>!</b></span> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah.
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php" class="text-secondary text-decoration-none">Dashboard</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="hasil.php" class="text-secondary text-decoration-none">Data Hasil Akhir</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="list-profile.php" class="text-secondary text-decoration-none">Data Profile</a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<?php
	}
	?>
</div>

<?php
require_once('template/footer.php');
}else {
	header('Location: login.php');
}
?>

            <!-- DASHBOARD V2 -->