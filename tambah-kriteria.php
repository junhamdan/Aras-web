<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1)); ?>

<?php
$errors = array();
$sukses = false;

if(isset($_POST['submit'])):	
	$kode_kriteria = $_POST['kode_kriteria'];
	$nama = $_POST['nama'];
	$type = $_POST['type'];
	$bobot = $_POST['bobot'];

	if(!$kode_kriteria) {
		$errors[] = 'Kode kriteria tidak boleh kosong';
	}
	// Validasi Nama Kriteria
	if(!$nama) {
		$errors[] = 'Nama kriteria tidak boleh kosong';
	}		
	// Validasi Tipe
	if(!$type) {
		$errors[] = 'Type kriteria tidak boleh kosong';
	}
	// Validasi Bobot
	if(!$bobot) {
		$errors[] = 'Bobot kriteria tidak boleh kosong';
	}	
	
	if(empty($errors)):
		
		$simpan = mysqli_query($koneksi,"INSERT INTO kriteria (id_kriteria, kode_kriteria, nama, type, bobot) VALUES ('', '$kode_kriteria', '$nama', '$type', '$bobot')");
		if($simpan) {
			redirect_to('list-kriteria.php?status=sukses-baru');		
		}else{
			$errors[] = 'Data gagal disimpan';
		}
	endif;

endif;
?>

<?php
$page = "Kriteria";
require_once('template/header.php');
?>


<div class="d-sm-flex align-items-center justify-content-end mb-4">


	<a href="list-kriteria.php" class="btn btn-secondary btn-icon-split font-weight-bold" style="background-color:#393E46; color:white"><span class="icon text-white-50"><i class="fas fa-arrow-left" style="color:white"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?php if(!empty($errors)): ?>
	<div class="alert alert-info">
		<?php foreach($errors as $error): ?>
			<?php echo $error; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>	

<div class="card shadow mb-4 text-dark">
    <div class="card-header py-3 ">
        <h6 class="m-0 font-weight-bold text-dark text-center"> Tambah Data Kriteria</h6>
    </div>
	
	<form action="tambah-kriteria.php" method="post">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kode Kriteria</label>
					<input autocomplete="off" type="text" name="kode_kriteria" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Kriteria</label>
					<input autocomplete="off" type="text" name="nama" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Type Kriteria</label>
					<select name="type" class="form-control" required>
						<option value="">--Pilih--</option>
						<option value="Benefit">Benefit</option>
						<option value="Cost">Cost</option>						
					</select>
				</div>
				
				<div class="form-group col-md-6 ">
					<label class="font-weight-bold">Bobot Kriteria</label>
					<input autocomplete="off" type="number" name="bobot" required step="0.01" class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger "><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</form>
</div>


<?php
require_once('template/footer.php');
?>