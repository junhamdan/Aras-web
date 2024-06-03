<!-- ---------------------------------------------------------Kriteria----------------------------------------------------------------- -->

<?php
require_once('includes/init.php');
cek_login($role = array(1));
$page = "Kriteria";
require_once('template/header.php');

// Hitung jumlah data
$query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM kriteria");
$result = mysqli_fetch_assoc($query);
$total_data = $result['total_data'];
?>

<div class="d-sm-flex align-items-center justify-content-center my-5">
        <h1 class="h2 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
    </div>


    <div class="row d-flex justify-content-center text-center">

<div class="col-xl-4 col-md-4 mb-4">
    <div class="card shadow h-100" >
        <div class="card-body" >
            <div class="row no-gutters align-items-center" >
                <div class="col mr-2" >
                    <div class="h5 mb-0 font-weight-bold"><a href="list-kriteria.php" class="text-dark text-decoration-none" >Total Kriteria :
                         <?php echo $total_data; ?> <!-- Menampilkan jumlah total data --> </div>
                </div>
                </div>
        </div>
    </div>
</div>
</div>


<!-- ---------------------------------------------------------Sub Kriteria----------------------------------------------------------------- -->
<?php
require_once('includes/init.php');
cek_login($role = array(1));
$page = "Kriteria";
require_once('template/header.php');

// Hitung jumlah data
$query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM sub_kriteria");
$result = mysqli_fetch_assoc($query);
$total_data = $result['total_data'];
?>

<div class="row d-flex justify-content-center text-center">

<div class="col-xl-4 col-md-4 mb-4">
    <div class="card shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold"><a href="list-sub-kriteria.php" class="text-dark text-decoration-none">Total Sub Kriteria :
                         <?php echo $total_data; ?> <!-- Menampilkan jumlah total data --> </div>
                </div>
                </div>
        </div>
    </div>
</div>
</div>





<!-- ---------------------------------------------------------ALTERNATIF----------------------------------------------------------------- -->
<?php
require_once('includes/init.php');
cek_login($role = array(1));
$page = "Kriteria";
require_once('template/header.php');

// Hitung jumlah data
$query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM alternatif");
$result = mysqli_fetch_assoc($query);
$total_data = $result['total_data'];
?>


<div class="row d-flex justify-content-center text-center">

<div class="col-xl-4 col-md-4 mb-4">
    <div class="card shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold"><a href="list-alternatif.php" class="text-dark text-decoration-none">Total Alternatif :
                         <?php echo $total_data; ?> <!-- Menampilkan jumlah total data --> </div>
                </div>
                </div>
        </div>
    </div>
</div>
</div>


<!-- ---------------------------------------------------------Hasil Akhir----------------------------------------------------------------- -->



<div class="row d-flex justify-content-center text-center">

<div class="col-xl-4 col-md-4 mb-4">
    <div class="card shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold"><a href="hasil.php" class="text-dark text-decoration-none ">Top 3 Rank Hasil Akhir : </div><br>
                    
                    <?php
                    
require_once('includes/init.php');

$user_role = get_role();
if($user_role == 'admin' || $user_role == 'user') {

$page = "Hasil";
require_once('template/header.php');

// Ambil 3 data teratas
$query_top_3 = mysqli_query($koneksi, "SELECT * FROM hasil JOIN alternatif ON hasil.id_alternatif=alternatif.id_alternatif ORDER BY hasil.nilai DESC LIMIT 3");

?>



<?php 
$no=0;
while($data = mysqli_fetch_array($query_top_3)){
    $no++;
?>
<div class="h5 font-weight-bold">
    <p><?= $no; ?>. <?= $data['nama'] ?> </p>
</div>
<?php
}
?>

<?php
require_once('template/footer.php');
}
else {
    header('Location: login.php');
}
?>

                </div>
                </div>
        </div>
    </div>
</div>
</div>


