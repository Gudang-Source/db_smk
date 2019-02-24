<?php session_start();
include('../../../database/config.php');
if ($_SESSION && $_SESSION['login'] == 'admin') {
// <!-- WARNING START CONTENT ----------------------------------------------------------- -->
$des_tbl_guru = mysql_query("DESCRIBE tbl_guru");

if (isset($_POST['tambah'])){
  while ($data = mysql_fetch_assoc($des_tbl_guru)) {
    $values[] = "'".$_POST[$data['Field']]."'";
  }
  $values = implode($values, ",");

  $query = mysql_query("INSERT INTO tbl_guru VALUES ($values) ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-success-a'>✔ Tambah Data Berhasil</div>";
    header('location: ../guru.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 NIP SUDAH ADA</div>";
    header('location: ../guru.php');
  }

}else if(isset($_POST['edit'])){
  $nip = $_POST['nip'];
  while ($data = mysql_fetch_assoc($des_tbl_guru)) {
    $values[] = $data['Field']. "= '".$_POST[$data['Field']]."'";
  }
  $values = implode($values, ",");

  $query = mysql_query("UPDATE tbl_guru SET $values where nip='$nip' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-warning-a'>✎ Edit Data Berhasil</div>";
    header('location: ../guru.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 NIS SUDAH ADA</div>";
    header('location: ../guru.php');
  }

}else if(isset($_POST['hapus'])){
  $nip = $_POST['nip'];

  $query = mysql_query("DELETE FROM tbl_guru WHERE nip='$nip' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>✖ Hapus Data Berhasil</div>";
    header('location: ../guru.php');
  }else{
    echo mysql_error();
  }

}else{
  $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 ERROR -- NO ACTION FOUND</div>";
  header('location: ../guru.php');
}

// <!-- WARNING END CONTENT ----------------------------------------------------------- -->
} else {
        ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php
    } ?>
