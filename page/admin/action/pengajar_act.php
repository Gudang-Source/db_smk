<?php session_start();
include('../../../database/config.php');
if ($_SESSION && $_SESSION['login'] == 'admin') {
// <!-- WARNING START CONTENT ----------------------------------------------------------- -->
$des_tbl_pengajar = mysql_query("DESCRIBE tbl_pengajar");

if (isset($_POST['tambah'])){
  while ($data = mysql_fetch_assoc($des_tbl_pengajar)) {
    $values[] = "'" .$_POST[$data['Field']]. "'";
  }
  $values = implode(',' , $values);
  $query = mysql_query("INSERT INTO tbl_pengajar VALUES ($values) ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-success-a'>✔ Tambah Data Berhasil</div>";
    header('location: ../pengajar.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 USERNAME SUDAH ADA</div>";
    header('location: ../pengajar.php');
  }

}else if(isset($_POST['edit'])){
  $id_pengajar = $_POST['id_pengajar'];
  while ($data = mysql_fetch_assoc($des_tbl_pengajar)) {
    $values[] = $data['Field']. "= '" .$_POST[$data['Field']]. "'";
  }
  $values = implode($values, ',');

  $query = mysql_query("UPDATE tbl_pengajar SET $values where id_pengajar='$id_pengajar' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-warning-a'>✎ Edit Data Berhasil</div>";
    header('location: ../pengajar.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 USERNAME SUDAH ADA</div>";
    header('location: ../pengajar.php');
  }

}else if(isset($_POST['hapus'])){
  $id_pengajar = $_POST['id_pengajar'];

  $query = mysql_query("DELETE FROM tbl_pengajar WHERE id_pengajar='$id_pengajar' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>✖ Hapus Data Berhasil</div>";
    header('location: ../pengajar.php');
  }else{
    echo mysql_error();
  }

}else{
  $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 ERROR -- NO ACTION FOUND</div>";
  header('location: ../pengajar.php');
}

// <!-- WARNING END CONTENT ----------------------------------------------------------- -->
} else {
        ?>
<script language="javascript">
	document.location = '../../../index.php'
</script>
<?php
    } ?>
