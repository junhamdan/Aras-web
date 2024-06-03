<?php
require_once('includes/init.php');

$user_role = get_role();
if($user_role == 'admin' || $user_role == 'user') {
?>  

<html>
    <head>
        <title>Sistem Pendukung Keputusan Metode OCRA</title>
        <style>
            .container {
                border: 1px solid #000; /* Warna dan jenis garis kisi */
                padding: 10px; /* Padding untuk menjaga jarak konten dari garis kisi */
            }
            .divider {
                border-bottom: 2px solid #000; /* Warna dan jenis garis lurus */
                margin-top: 20px; /* Jarak antara garis dan teks di bawahnya */
                margin-bottom: 20px; /* Jarak antara garis dan konten di atasnya */
            }
        </style>
    </head>
    <body onload="window.print();">

    <?php 
    // Ambil tanggal saat ini
    $tanggal = date('d F Y');
    ?>
<div class="container" style="text-align: center; width: 75%; margin: 0 auto;">

    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <img src="assets/img/rackh.png" alt="Logo Perusahaan" style="width: 175px; height: auto; margin-right: 50px;">
        </div>
        <div><center>
            <h3 style="font-family: Arial, sans-serif; color: #333; margin: 5px 0;">PT RACKH LINTAS ASIA </h3>
            <h3 style="font-family: Arial, sans-serif; color: #333; margin: 5px 0;">INTEGRATED SOLUTION PARTNER</h3>
            <h5 style="font-family: Arial, sans-serif; color: #555; margin: 5px 0;">Jl. Senam No.2, Ps. Merah Bar., Kec. Medan Kota, Kota Medan </h5>
            <h5 style="font-family: Arial, sans-serif; color: #555; margin: 5px 0;">Sumatera Utara 20217, Indonesia</h5>
            <h5 style="font-family: Arial, sans-serif; color: #555; margin: 5px 0;">Website : <a href="http://www.arjunafarm.com" style="color: #007bff; text-decoration: none;">www.rackh.com</a></h5>
            </center>
        </div>
    </div>
    <div class="divider"></div> <!-- Garis lurus -->
    

    <h5 style="font-family: Arial, sans-serif; color: #333; margin: 5px 0; text-decoration: underline;">
    LAPORAN HASIL REKRUTMEN SYSTEM ENGINEER CABANG JAKARTA<br> PT RACKH LINTAS ASIA<br><br>
</h5>
<table width="100%" cellspacing="0" cellpadding="5" border="1">
    <thead>
        <tr align="center">
            <th>Nama Alternatif</th>
            <th>Nilai Preferensi</th>
            <th width="15%">Rank</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 0;
        $query = mysqli_query($koneksi, "SELECT * FROM hasil JOIN alternatif ON hasil.id_alternatif=alternatif.id_alternatif ORDER BY hasil.nilai DESC");
        while($data = mysqli_fetch_array($query)) {
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


        <div style="text-align: right; margin-top: 20px;">
    <div style="margin-right: 20px; display: inline-block; text-align: right;">
        <h5 style="font-family: Arial, sans-serif; color: #555; margin: 5px 0;">Medan, <?= $tanggal ?><br>
            <span style="display: inline-block; width: 140px; text-align: left;">Di ketahui oleh:</span>
        </h5>
        <br><br>
        <h5 style="font-family: Arial, sans-serif; color: #555; width: 140px; text-align: left;">Bambang Kusuma</h5>
        <!-- <h5 style="font-family: Arial, sans-serif; color: #555;">Tanda Tangan: [Tanda Tangan Anda]</h5> -->
    </div>
</div>

    </body>
</html>

<?php
}
else {
    header('Location: login.php');
}
?>
