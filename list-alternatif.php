<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1)); ?>

<?php
$page = "Alternatif";
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
        <h5 class="m-0 font-weight-bold text-dark text-center"> Daftar Data Alternatif</h5>
		<a href="tambah-alternatif.php" class="btn font-weight-bold" style="background-color:#393E46; color:white"> <i class="fa fa-plus"></i> Tambah Data </a>
    </div>
	</div>
    <div class="card-body">
		<div class="table-responsive" >
			<table class="table table-bordered font-weight-bold table-secondary" id="dataTable" width="100%" cellspacing="0" style="color:black">
				<thead class="bg-info text-white">
					<tr align="center" style="background-color:#393E46; color:white; text-align:center;">	
						<th width="5%">No</th>
						<th>Nama</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>			
				<?php
				$no=0;
				$query = mysqli_query($koneksi,"SELECT * FROM alternatif");			
				while($data = mysqli_fetch_array($query)):
				$no++;
				?>
					<tr align="center">
						<td><?php echo $no; ?></td>
						<td align="left"><?php echo $data['nama']; ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="edit-alternatif.php?id=<?php echo $data['id_alternatif']; ?>" class="btn btn-warning btn-sm font-weight-bold" style="margin-right:20px;"><i class="fa fa-edit"></i> Edit</a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="hapus-alternatif.php?id=<?php echo $data['id_alternatif']; ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm font-weight-bold"><i class="fa fa-trash"></i> Hapus</a>
							</div>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

