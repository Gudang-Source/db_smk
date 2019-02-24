<?php session_start();
include('../../../database/config.php');
if ($_SESSION && $_SESSION['login'] == 'admin') {
// <!-- WARNING START CONTENT ----------------------------------------------------------- -->
$des_tbl_admin = mysql_query("DESCRIBE tbl_admin");

if (isset($_POST['tambah'])){
  while ($data = mysql_fetch_assoc($des_tbl_admin)) {
    $values[] = "'" .$_POST[$data['Field']]. "'";
  }
  $values = implode(',' , $values);
  $query = mysql_query("INSERT INTO tbl_admin VALUES ($values) ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-success-a'>✔ Tambah Data Berhasil</div>";
    header('location: ../admin.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 USERNAME SUDAH ADA</div>";
    header('location: ../admin.php');
  }

}else if(isset($_POST['edit'])){
  $id = $_POST['id'];
  while ($data = mysql_fetch_assoc($des_tbl_admin)) {
    $values[] = $data['Field']. "= '" .$_POST[$data['Field']]. "'";
  }
  $values = implode($values, ',');

  $query = mysql_query("UPDATE tbl_admin SET $values where id='$id' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-warning-a'>✎ Edit Data Berhasil</div>";
    header('location: ../admin.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 USERNAME SUDAH ADA</div>";
    header('location: ../admin.php');
  }

}else if(isset($_POST['hapus'])){
  $username = $_POST['username'];

  $query = mysql_query("DELETE FROM tbl_admin WHERE username='$username' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>✖ Hapus Data Berhasil</div>";
    header('location: ../admin.php');
  }else{
    echo mysql_error();
  }

}else{
  $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 ERROR -- NO ACTION FOUND</div>";
  header('location: ../admin.php');
}

// <!-- WARNING END CONTENT ----------------------------------------------------------- -->
} else {
        ?>
<script language="javascript">
	document.location = '../../../index.php'
</script>
<?php
    } ?>
