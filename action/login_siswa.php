<?php session_start();
include "../database/config.php";

$nis= mysql_real_escape_string($_POST['nis']);
$password= mysql_real_escape_string($_POST['password']);
$query=mysql_query("select * from tbl_siswa where nis='$nis' and password='$password'");
$cek=mysql_num_rows($query);

if ($cek) {
    $row = mysql_fetch_assoc($query);
    $_SESSION['nis']= $row['nis'];
    $_SESSION['password']= $row['password'];
    $_SESSION['nama']= $row['nama'];
    $_SESSION['tempat_lahir']= $row['tempat_lahir'];
    $_SESSION['tanggal_lahir']= $row['tanggal_lahir'];
    $_SESSION['email']= $row['email'];
    $_SESSION['no_telp']= $row['no_telp'];
    $_SESSION['jenis_kelamin']= $row['jenis_kelamin'];
    $_SESSION['id_kelas']= $row['id_kelas'];

    $_SESSION['login']= 'siswa';

    header("location: ../page/siswa/index.php");

} else {
  $_SESSION['notif'] = "<div class='notif-danger-a'>Nis/Password Salah</div>"
    ?>
<script language="javascript">
	document.location = '../index.php'
</script>
<?php
}
?>
