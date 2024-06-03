<?php
require_once('includes/init.php');
cek_login($role = array(1));
$page = "Sub Kriteria";
require_once('template/header.php');

if(isset($_POST['tambah'])):	
	$id_kriteria = $_POST['id_kriteria'];
	$nama = $_POST['nama'];
	$operator = $_POST['operator'];
	$a = $_POST['a'];
	$b = $_POST['b'];
	$nilai = $_POST['nilai'];

	if(!$id_kriteria) {
		$errors[] = 'ID kriteria tidak boleh kosong';
	}
	// Validasi Nama Kriteria
	if(!$nama) {
		$errors[] = 'Nama kriteria tidak boleh kosong';
	}
	if(!$operator) {
		$errors[] = 'operator kriteria tidak boleh kosong';
	}
	// Validasi Tipe
	if(!$nilai) {
		$errors[] = 'Nilai kriteria tidak boleh kosong';
	}	
	
	if(empty($errors)):
		$simpan = mysqli_query($koneksi,"INSERT INTO sub_kriteria (id_sub_kriteria, id_kriteria, nama, operator, a, b, nilai) VALUES ('', '$id_kriteria', '$nama', '$operator', '$a', '$b', '$nilai')");
		
		if($simpan) {
			$sts[] = 'Data berhasil disimpan';
		}else{
			$sts[] = 'Data gagal disimpan';
		}
	endif;
endif;

if(isset($_POST['edit'])):	
	$id_sub_kriteria = $_POST['id_sub_kriteria'];
	$id_kriteria = $_POST['id_kriteria'];
	$nama = $_POST['nama'];
	$operator = $_POST['operator'];
	$a = $_POST['a'];
	$b = $_POST['b'];
	$nilai = $_POST['nilai'];

	if(!$id_kriteria) {
		$errors[] = 'ID kriteria tidak boleh kosong';
	}
	// Validasi Nama Kriteria
	if(!$nama) {
		$errors[] = 'Nama kriteria tidak boleh kosong';
	}
	if(!$operator) {
		$errors[] = 'operator kriteria tidak boleh kosong';
	}	
	// Validasi Tipe
	if(!$nilai) {
		$errors[] = 'Nilai kriteria tidak boleh kosong';
	}	
	
	if(empty($errors)):
		$update = mysqli_query($koneksi,"UPDATE sub_kriteria SET nama = '$nama', operator = '$operator', a = '$a', b = '$b', nilai = '$nilai' WHERE id_kriteria = '$id_kriteria' AND id_sub_kriteria = '$id_sub_kriteria'");
		
		if($update) {
			$sts[] = 'Data berhasil diupdate';
		}else{
			$sts[] = 'Data gagal diupdate';
		}
	endif;
endif;
?>



<?php if(!empty($sts)): ?>
	<div class="alert alert-info">
		<?php foreach($sts as $st): ?>
			<?php echo $st; ?>
		<?php endforeach; ?>
	</div>
<?php
endif;

$status = isset($_GET['status']) ? $_GET['status'] : '';
$msg = '';
switch($status):
	case 'sukses-baru':
		$msg = 'Data berhasil disimpan';
		break;
	case 'sukses-hapus':
		$msg = 'Data behasil dihapus';
		break;
	case 'sukses-edit':
		$msg = 'Data behasil diupdate';
		break;
endswitch;

if($msg):
	echo '<div class="alert alert-info">'.$msg.'</div>';
endif;

$query = mysqli_query($koneksi,"SELECT * FROM kriteria ORDER BY kode_kriteria ASC");
$cek = mysqli_num_rows($query);
if($cek <= 0) {
?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Daftar Data Sub Kriteria</h6>
    </div>

    <div class="card-body">
		<div class="alert alert-info">
			Data kriteria masih kosong.
		</div>
	</div>
</div>
<?php
}else{
	while($data = mysqli_fetch_array($query)){
?>
<div class="card shadow mb-4 text-dark">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between" >
			<h6 class="m-0 font-weight-bold text-dark"> <?= $data['nama']." (".$data['kode_kriteria'].")" ?></h6>
			
			<a href="#tambah<?= $data['id_kriteria']; ?>" data-toggle="modal" class="btn btn-sm font-weight-bold" style="background-color:#393E46; color:white"> <i class="fa fa-plus"></i> Tambah Data </a>
		</div>
    </div>
	
	<div class="modal fade" id="tambah<?= $data['id_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-dark" id="myModalLabel"> Tambah <?= $data['nama'] ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form action="" method="post">
					<div class="modal-body">
						<input type="text" name="id_kriteria" value="<?= $data['id_kriteria']; ?>" hidden>
						<div class="form-group">
							<label class="font-weight-bold">Nama Sub Kriteria</label>
							<input autocomplete="off" type="text"class="form-control" name="nama" required>
						</div>
						<div class="form-group">
							<label class="font-weight-bold">Operator</label>
							<select class="form-control" name="operator" id="pilihan_<?= $data['id_kriteria'] ?>" required> 
								<option value="">--Pilih--</option>
								<option value="1">Lebih Dari (>)</option>
								<option value="2">Kurang Dari (<)</option>
								<option value="3">Range Nilai (-)</option>
							</select>
						</div>
						<div class="form-group d-none" id="operator<?= $data['id_kriteria'] ?>">
							<label class="font-weight-bold" id="range<?= $data['id_kriteria'] ?>"></label>
							<div class="row">
								<div class="col-6" id="div_a<?= $data['id_kriteria'] ?>">
									<input autocomplete="off" type="number" step="0.01" id="a<?= $data['id_kriteria'] ?>" name="a" class="form-control">
								</div>
								<div class="col-6" id="div_b<?= $data['id_kriteria'] ?>">
									<input autocomplete="off" type="number" step="0.01" id="b<?= $data['id_kriteria'] ?>" name="b" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="font-weight-bold">Nilai</label>
							<input autocomplete="off" step="0.001" type="number" name="nilai" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
						<button type="submit" name="tambah" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <div class="card-body">
		<div class="table-responsive font-weight-bold">
			<table class="table table-bordered table-secondary" width="100%" cellspacing="0" style="color:black">
				<thead class="" style="background-color:#393E46; color:white; text-align:center;>
					<tr align="center">						
						<th width="5%">No</th>
						<th>Nama Sub Kriteria</th>
						<th width="20%">Range Nilai</th>
						<th>Nilai</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						$id_kriteria = $data['id_kriteria'];
						$q = mysqli_query($koneksi,"SELECT * FROM sub_kriteria WHERE id_kriteria = '$id_kriteria' ORDER BY nilai DESC");			
						while($d = mysqli_fetch_array($q)){
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $d['nama'] ?></td>
						<td>
							<?php
							if($d['operator'] == "1"){
							?>
							> <?= $d['a'] ?>
							<?php
							}
							if($d['operator'] == "2"){
							?>
							< <?= $d['a'] ?>
							<?php
							}if($d['operator'] == "3"){
							?>
							<?= $d['a'] ?> - <?= $d['b'] ?>
							<?php
							}
							?>
						</td>
						<td><?= $d['nilai'] ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="modal" title="Edit Data" href="#editsk<?= $d['id_sub_kriteria'] ?>" class="btn btn-warning btn-sm font-weight-bold" style="margin-right:20px;"><i class="fa fa-edit" ></i> Edit</a>
								
								
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="hapus-sub-kriteria.php?id=<?php echo $d['id_sub_kriteria']; ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm font-weight-bold"><i class="fa fa-trash"></i> Hapus</a>
							</div>
						</td>
					</tr>

					<!-- Modal -->
					<div class="modal fade" id="editsk<?= $d['id_sub_kriteria'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit <?= $d['nama'] ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<form action="list-sub-kriteria.php?id=<?php echo $d['id_sub_kriteria']; ?>" method="post">
									<input type="text" name="id_sub_kriteria" value="<?= $d['id_sub_kriteria']; ?>" hidden>
									<div class="modal-body">
										<input type="text" name="id_kriteria" value="<?= $d['id_kriteria'] ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold">Nama Sub Kriteria</label>
											<input type="text" autocomplete="off" class="form-control" value="<?= $d['nama'] ?>" name="nama" required>
										</div>
										<div class="form-group">
											<label class="font-weight-bold">Operator</label>
											<select class="form-control" name="operator" required id="epilihan_<?=$d['id_sub_kriteria']?>"> 
												<option value="">--Pilih--</option>
												<option value="1" <?php if($d['operator'] == "1"){echo "selected";}?>>Lebih Dari</option>
												<option value="2" <?php if($d['operator'] == "2"){echo "selected";}?>>Kurang Dari</option>
												<option value="3" <?php if($d['operator'] == "3"){echo "selected";}?>>Range Nilai</option>
											</select>
										</div>
										<div class="form-group" id="eoperator<?= $d['id_sub_kriteria'] ?>">
											<label class="font-weight-bold" id="erange<?= $d['id_sub_kriteria'] ?>"><?php if($d['operator'] == "1"){echo "Nilai Lebih Dari";} if($d['operator'] == "2"){echo "Nilai Kurang Dari";} if($d['operator'] == "3"){echo "Range Nilai";}?></label>
											<div class="row">
												<div class="<?php if($d['operator'] == "3"){echo "col-6";}else{echo "col-12";}?>" id="ediv_a<?= $d['id_sub_kriteria'] ?>">
													<input value="<?= $d['a'] ?>" autocomplete="off" type="number" step="0.01" id="ea<?= $d['id_sub_kriteria'] ?>" name="a" class="form-control">
												</div>
												<div class="col-6 <?php if(($d['operator'] == "1") || ($d['operator'] == "2")){echo "d-none";}?>" id="ediv_b<?= $d['id_sub_kriteria'] ?>">
													<input value="<?= $d['b'] ?>" autocomplete="off" type="number" step="0.01" id="eb<?= $d['id_sub_kriteria'] ?>" name="b" class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="font-weight-bold">Nilai</label>
											<input type="number" step="0.001" autocomplete="off" name="nilai" class="form-control" value="<?= $d['nilai'] ?>" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger font-weight-bold" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" name="edit" class="btn btn-success font-weight-bold"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
                <?php
					$no++;
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
$kriteria = mysqli_query($koneksi,"SELECT * FROM kriteria ORDER BY kode_kriteria ASC");
foreach ($kriteria as $key){
	$id_kriteria = $key['id_kriteria'];
?>
	<script>
		$(document).ready(function() {
			$('#pilihan_<?= $id_kriteria ?>').change(function() {
				var pilihan = $('#pilihan_<?= $id_kriteria ?>').val();
				if (pilihan == '1') {
					$('#operator<?= $id_kriteria ?>').attr('class', 'd-block form-group');
					$('#div_a<?= $id_kriteria ?>').removeAttr('class', 'col-6');
					$('#div_a<?= $id_kriteria ?>').attr('class', 'col-12');
					
					$('#a<?= $id_kriteria ?>').removeAttr('class', 'd-none');
					$('#a<?= $id_kriteria ?>').attr('class', 'form-control');
					document.getElementById("range<?= $id_kriteria ?>").innerHTML = "Nilai Lebih Dari";
					
					$('#div_b<?= $id_kriteria ?>').attr('class', 'd-none');
					
					$('#a<?= $id_kriteria ?>').val('');
					$('#b<?= $id_kriteria ?>').val('');
				}else if (pilihan == '2') {
					$('#operator<?= $id_kriteria ?>').attr('class', 'd-block form-group');
					$('#div_a<?= $id_kriteria ?>').removeAttr('class', 'col-6');
					$('#div_a<?= $id_kriteria ?>').attr('class', 'col-12');
					
					$('#a<?= $id_kriteria ?>').removeAttr('class', 'd-none');
					$('#a<?= $id_kriteria ?>').attr('class', 'form-control');
					document.getElementById("range<?= $id_kriteria ?>").innerHTML = "Nilai Kurang Dari";
					
					$('#div_b<?= $id_kriteria ?>').attr('class', 'd-none');
					
					$('#a<?= $id_kriteria ?>').val('');
					$('#b<?= $id_kriteria ?>').val('');
				}else if (pilihan == '3') {
					$('#operator<?= $id_kriteria ?>').attr('class', 'd-block form-group');
					$('#div_a<?= $id_kriteria ?>').removeAttr('class', 'col-6');
					$('#div_a<?= $id_kriteria ?>').attr('class', 'col-6');
					
					$('#div_b<?= $id_kriteria ?>').removeAttr('class', 'col-6');
					$('#div_b<?= $id_kriteria ?>').attr('class', 'col-6');
					
					$('#a<?= $id_kriteria ?>').removeAttr('class', 'd-none');
					$('#a<?= $id_kriteria ?>').attr('class', 'form-control');
					document.getElementById("range<?= $id_kriteria ?>").innerHTML = "Range Nilai";
					
					$('#b<?= $id_kriteria ?>').removeAttr('class', 'd-none');
					$('#b<?= $id_kriteria ?>').attr('class', 'form-control');
					
					$('#a<?= $id_kriteria ?>').val('');
					$('#b<?= $id_kriteria ?>').val('');
				} else {
					$('#div_a<?= $id_kriteria ?>').attr('class', 'd-none form-group');
					$('#div_b<?= $id_kriteria ?>').attr('class', 'd-none form-group');
					$('#range<?= $id_kriteria ?>').attr('class', 'd-none');
					$('#a<?= $id_kriteria ?>').val('');
					$('#b<?= $id_kriteria ?>').val('');
				}
			});
		});
	</script>
	
	<?php
	
	$sub_kriteria = mysqli_query($koneksi,"SELECT * FROM sub_kriteria WHERE id_kriteria = '$id_kriteria' ORDER BY nilai DESC");
	foreach ($sub_kriteria as $key){
		$id_sub_kriteria = $key['id_sub_kriteria'];
	?>
	
	<script>
		$(document).ready(function() {
			$('#epilihan_<?= $id_sub_kriteria ?>').change(function() {
				var epilihan = $('#epilihan_<?= $id_sub_kriteria ?>').val();
				
				if (epilihan == '1') {
					$('#eoperator<?= $id_sub_kriteria ?>').attr('class', 'd-block form-group');
					$('#ediv_a<?= $id_sub_kriteria ?>').removeAttr('class', 'col-6');
					$('#ediv_a<?= $id_sub_kriteria ?>').attr('class', 'col-12');
					
					$('#ea<?= $id_sub_kriteria ?>').removeAttr('class', 'd-none');
					$('#ea<?= $id_sub_kriteria ?>').attr('class', 'form-control');
					document.getElementById("erange<?= $id_sub_kriteria ?>").innerHTML = "Nilai Lebih Dari";
					
					$('#ediv_b<?= $id_sub_kriteria ?>').attr('class', 'd-none');
					
					$('#ea<?= $id_sub_kriteria ?>').val('');
					$('#eb<?= $id_sub_kriteria ?>').val('');
				}else if (epilihan == '2') {
					$('#eoperator<?= $id_sub_kriteria ?>').attr('class', 'd-block form-group');
					$('#ediv_a<?= $id_sub_kriteria ?>').removeAttr('class', 'col-6');
					$('#ediv_a<?= $id_sub_kriteria ?>').attr('class', 'col-12');
					
					$('#ea<?= $id_sub_kriteria ?>').removeAttr('class', 'd-none');
					$('#ea<?= $id_sub_kriteria ?>').attr('class', 'form-control');
					document.getElementById("erange<?= $id_sub_kriteria ?>").innerHTML = "Nilai Kurang Dari";
					
					$('#ediv_b<?= $id_sub_kriteria ?>').attr('class', 'd-none');
					
					$('#ea<?= $id_sub_kriteria ?>').val('');
					$('#eb<?= $id_sub_kriteria ?>').val('');
				}else if (epilihan == '3') {
					$('#eoperator<?= $id_sub_kriteria ?>').attr('class', 'd-block form-group');
					$('#ediv_a<?= $id_sub_kriteria ?>').removeAttr('class', 'col-6');
					$('#ediv_a<?= $id_sub_kriteria ?>').attr('class', 'col-6');
					
					$('#ediv_b<?= $id_sub_kriteria ?>').removeAttr('class', 'col-6');
					$('#ediv_b<?= $id_sub_kriteria ?>').attr('class', 'col-6');
					
					$('#ea<?= $id_sub_kriteria ?>').removeAttr('class', 'd-none');
					$('#ea<?= $id_sub_kriteria ?>').attr('class', 'form-control');
					document.getElementById("erange<?= $id_sub_kriteria ?>").innerHTML = "Range Nilai";
					
					$('#eb<?= $id_sub_kriteria ?>').removeAttr('class', 'd-none');
					$('#eb<?= $id_sub_kriteria ?>').attr('class', 'form-control');
					
					$('#ea<?= $id_sub_kriteria ?>').val('');
					$('#eb<?= $id_sub_kriteria ?>').val('');
				} else {
					$('#eoperator<?= $id_sub_kriteria ?>').attr('class', 'd-none');
					$('#erange<?= $id_sub_kriteria ?>').attr('class', 'd-none');
					$('#ea<?= $id_sub_kriteria ?>').val('');
					$('#eb<?= $id_sub_kriteria ?>').val('');
				}
			});
		});
	</script>

<?php
	} }

}
}
require_once('template/footer.php');
?>