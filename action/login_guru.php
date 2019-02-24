<?php session_start();
include "../database/config.php";

$nip= mysql_real_escape_string($_POST['nip']);
$password= mysql_real_escape_string($_POST['password']);
$query=mysql_query("select * from tbl_guru where nip='$nip' and password='$password'");
$cek=mysql_num_rows($query);

if ($cek) {
    $row = mysql_fetch_assoc($query);
    $_SESSION['nip']= $row['nip'];
    $_SESSION['password']= $row['password'];
    $_SESSION['nama']= $row['nama'];
    $_SESSION['tempat_lahir']= $row['tempat_lahir'];
    $_SESSION['tanggal_lahir']= $row['tanggal_lahir'];
    $_SESSION['email']= $row['email'];
    $_SESSION['no_tlp']= $row['no_tlp'];
    $_SESSION['jenis_kelamin']= $row['jenis_kelamin'];

    $_SESSION['login']= 'guru';

    header("location: ../page/guru/index.php");

} else {
  $_SESSION['notif'] = "<div class='notif-danger-a'>Nip/Password Salah</div>"
    ?>
<script language="javascript">
	document.location = '../index.php'
</script>
<?php
}
?>
