<?php
require_once('includes/init.php');
cek_login($role = array(1));
$page = "Kriteria";
require_once('template/header.php');
?>



<?php
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
?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
	<div class="d-sm-flex align-items-center justify-content-between" >
        <h5 class="m-0 font-weight-bold text-dark d-sm-flex align-items-center justify-content-between"> Daftar Data Kriteria</h5> 
		<a href="tambah-kriteria.php" class="btn font-weight-bold" style="background-color:#393E46; color:white"> <i class="fa fa-plus"></i> Tambah Data </a>
    </div>
</div>
    <div class="card-body">
		<div class="table-responsive ">
			<table class="table table-bordered font-weight-bold table-secondary" id="dataTable" width="100%" cellspacing="0" style="color:black">
				<thead class="" style="background-color:#393E46; color:white; text-align:center;">
					<tr align="center">
						<th>No</th>
						<th>Kode Kriteria</th>
						<th>Nama Kriteria</th>
						<th>Type</th>
						<th>Bobot</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				$query = mysqli_query($koneksi,"SELECT * FROM kriteria ORDER BY kode_kriteria ASC");			
				while($data = mysqli_fetch_array($query)):
				?>
					<tr align="center">
						<td><?php echo $no; ?></td>
						<td><?php echo $data['kode_kriteria']; ?></td>
						<td align="left"><?php echo $data['nama']; ?></td>
						<td><?php echo $data['type']; ?></td>
						<td><?php echo $data['bobot']; ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="edit-kriteria.php?id=<?php echo $data['id_kriteria']; ?>" class="btn btn-warning btn-sm font-weight-bold" style="margin-right:20px;"><i class="fa fa-edit"></i> Edit</a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="hapus-kriteria.php?id=<?php echo $data['id_kriteria']; ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm font-weight-bold" style="background-color:#D65A31"><i class="fa fa-trash"></i> Hapus</a>
							</div>
						</td>
					</tr>
					<?php 
					$no++;
					endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

