<?php session_start();
include "../database/config.php";

$username= mysql_real_escape_string($_POST['username']);
$password= mysql_real_escape_string($_POST['password']);
$query=mysql_query("select * from tbl_admin where username='$username' and password='$password'");
$cek=mysql_num_rows($query);

if ($cek) {
    $row = mysql_fetch_assoc($query);
    $_SESSION['username']= $row['username'];
    $_SESSION['password']= $row['password'];
    $_SESSION['nama']= $row['nama'];

    $_SESSION['login']= 'admin';

    header("location: ../page/admin/index.php");

} else {
  $_SESSION['notif'] = "<div class='notif-danger-a'>Username/Password Salah</div>"
    ?>
<script language="javascript">
	document.location = '../index.php'
</script>
<?php
}
?>
