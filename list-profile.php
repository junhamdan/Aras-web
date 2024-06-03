<?php require_once('includes/init.php'); 
$user_role = get_role();
if($user_role == 'admin' || $user_role == 'user') {
?>

<?php
$errors = array();
$sukses = false;

$ada_error = false;
$result = '';

$id_user = $_SESSION["user_id"];

if(isset($_POST['submit'])):
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	
	if(!$nama) {
		$errors[] = 'Nama tidak boleh kosong';
	}		
	
	if(!$email) {
		$errors[] = 'Email tidak boleh kosong';
	}
	
	if(!$id_user) {
		$errors[] = 'Id User salah';
	}
	
	if($password && ($password != $password2)) {
		$errors[] = 'Password harus sama keduanya';
	}
	
	
	if(empty($errors)):
		$update = mysqli_query($koneksi,"UPDATE user SET nama = '$nama', email = '$email' WHERE id_user = '$id_user'");
		
		if($password) {
			$pass = sha1($password);
			$update = mysqli_query($koneksi,"UPDATE user SET nama = '$nama',  password = '$pass', email = '$email' WHERE id_user = '$id_user'");
		}		
		if($update) {
			$errors[] = 'Data berhasil diupdate';
		}else{
			$errors[] = 'Data gagal diupdate';
		}
	endif;

endif;
?>

<?php
$page = "Profile";
require_once('template/header.php');
?>

 

<?php if(!empty($errors)): ?>
	<div class="alert alert-info">
			<?php foreach($errors as $error): ?>
				<?php echo $error; ?>
			<?php endforeach; ?>
	</div>
<?php endif; ?>

<form action="" method="post">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-info text-dark text-center">  Edit Data Profile</h5>
		</div>
		<?php
		if(!$id_user) {
		?>
		<div class="card-body">
			<div class="alert alert-danger">Data tidak ada</div>
		</div>
		<?php
		}else{
		$data = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$id_user'");
		$cek = mysqli_num_rows($data);
		if($cek <= 0) {
		?>
		<div class="card-body">
			<div class="alert alert-danger">Data tidak ada</div>
		</div>
		<?php
		}else{
			while($d = mysqli_fetch_array($data)){
		?>
		<div class="card-body">
			<div class="row text-dark">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Username</label>
					<input autocomplete="off" type="text" readonly required value="<?php echo $d['username']; ?>" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Password</sub></label>
					<input autocomplete="off" type="password" name="password" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Ulangi Password</label>
					<input autocomplete="off" type="password" name="password2" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama</label>
					<input autocomplete="off" type="text" name="nama" required value="<?php echo $d['nama']; ?>" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">E-Mail</label>
					<input autocomplete="off" type="email" name="email" required value="<?php echo $d['email']; ?>" class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</div>
	<?php
		}
		}
		}
	?>
</form>

<?php
require_once('template/footer.php');
}else {
	header('Location: login.php');
}
?>