<?php
require_once('includes/init.php');

$user_role = get_role();
if($user_role == 'admin' || $user_role == 'user') {

$page = "Hasil";
require_once('template/header.php');
?>



<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
	<div class="d-sm-flex align-items-center justify-content-between" >
        <h5 class="m-0 font-weight-bold text-dark text-center"> Hasil Akhir Perankingan</h5>
		<a href="cetak.php" target="_blank" class="btn font-weight-bold" style="background-color:#393E46; color:white"> <i class="fa fa-print"></i> Cetak Data </a>
    </div>
	</div>
    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered font-weight-bold table-secondary" width="100%" cellspacing="0" style="color:black">
				<thead class="bg-info text-white">
					<tr align="center" style="background-color:#393E46; color:white; text-align:center;">
						<th>Nama Alternatif</th>
						<th>Nilai K</th>
						<th width="15%">Rank</th>
				</thead>
				<tbody>
					<?php 
						$no=0;
						$query = mysqli_query($koneksi,"SELECT * FROM hasil JOIN alternatif ON hasil.id_alternatif=alternatif.id_alternatif ORDER BY hasil.nilai DESC");
						while($data = mysqli_fetch_array($query)){
						$no++;
					?>
					<tr align="center">
						<td align="left"><?= $data['nama'] ?></td>
						<td><?= $data['nilai'] ?></td>
						<td><?= $no; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
require_once('template/footer.php');
}
else {
	header('Location: login.php');
}
?>