<?php session_start();
include('../../../database/config.php');
if ($_SESSION && $_SESSION['login'] == 'admin') {
// <!-- WARNING START CONTENT ----------------------------------------------------------- -->
$des_tbl_mapel = mysql_query("DESCRIBE tbl_mapel");

if (isset($_POST['tambah'])){
  while ($data = mysql_fetch_assoc($des_tbl_mapel)) {
    $values[] = "'" .$_POST[$data['Field']]. "'";
  }
  $values = implode(',' , $values);
  $query = mysql_query("INSERT INTO tbl_mapel VALUES ($values) ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-success-a'>✔ Tambah Data Berhasil</div>";
    header('location: ../mapel.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 USERNAME SUDAH ADA</div>";
    header('location: ../mapel.php');
  }

}else if(isset($_POST['edit'])){
  $id_mapel = $_POST['id_mapel'];
  while ($data = mysql_fetch_assoc($des_tbl_mapel)) {
    $values[] = $data['Field']. "= '" .$_POST[$data['Field']]. "'";
  }
  $values = implode($values, ',');

  $query = mysql_query("UPDATE tbl_mapel SET $values where id_mapel='$id_mapel' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-warning-a'>✎ Edit Data Berhasil</div>";
    header('location: ../mapel.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 USERNAME SUDAH ADA</div>";
    header('location: ../mapel.php');
  }

}else if(isset($_POST['hapus'])){
  $id_mapel = $_POST['id_mapel'];

  $query = mysql_query("DELETE FROM tbl_mapel WHERE id_mapel='$id_mapel' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>✖ Hapus Data Berhasil</div>";
    header('location: ../mapel.php');
  }else{
    echo mysql_error();
  }

}else{
  $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 ERROR -- NO ACTION FOUND</div>";
  header('location: ../mapel.php');
}

// <!-- WARNING END CONTENT ----------------------------------------------------------- -->
} else {
        ?>
<script language="javascript">
	document.location = '../../../index.php'
</script>
<?php
    } ?>
