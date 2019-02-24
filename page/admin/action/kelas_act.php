<?php session_start();
include('../../../database/config.php');
if ($_SESSION && $_SESSION['login'] == 'admin') {
// <!-- WARNING START CONTENT ----------------------------------------------------------- -->
$des_tbl_kelas = mysql_query("DESCRIBE tbl_kelas");

if (isset($_POST['tambah'])){
  while ($data = mysql_fetch_assoc($des_tbl_kelas)) {
    $values[] = "'" .$_POST[$data['Field']]. "'";
  }
  $values = implode(',' , $values);
  $query = mysql_query("INSERT INTO tbl_kelas VALUES ($values) ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-success-a'>✔ Tambah Data Berhasil</div>";
    header('location: ../kelas.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 USERNAME SUDAH ADA</div>";
    header('location: ../kelas.php');
  }

}else if(isset($_POST['edit'])){
  $id_kelas = $_POST['id_kelas'];
  while ($data = mysql_fetch_assoc($des_tbl_kelas)) {
    $values[] = $data['Field']. "= '" .$_POST[$data['Field']]. "'";
  }
  $values = implode($values, ',');

  $query = mysql_query("UPDATE tbl_kelas SET $values where id_kelas='$id_kelas' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-warning-a'>✎ Edit Data Berhasil</div>";
    header('location: ../kelas.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 USERNAME SUDAH ADA</div>";
    header('location: ../kelas.php');
  }

}else if(isset($_POST['hapus'])){
  $id_kelas = $_POST['id_kelas'];

  $query = mysql_query("DELETE FROM tbl_kelas WHERE id_kelas='$id_kelas' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>✖ Hapus Data Berhasil</div>";
    header('location: ../kelas.php');
  }else{
    echo mysql_error();
  }

}else{
  $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 ERROR -- NO ACTION FOUND</div>";
  header('location: ../kelas.php');
}

// <!-- WARNING END CONTENT ----------------------------------------------------------- -->
} else {
        ?>
<script language="javascript">
	document.location = '../../../index.php'
</script>
<?php
    } ?>
