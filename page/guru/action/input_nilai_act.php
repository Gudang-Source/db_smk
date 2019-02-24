<?php session_start();
include('../../../database/config.php');
if ($_SESSION && $_SESSION['login'] == 'guru') {
// <!-- WARNING START CONTENT ----------------------------------------------------------- -->
$des_tbl_nilai = mysql_query("DESCRIBE tbl_nilai");

if (isset($_POST['tambah'])){
  while ($data = mysql_fetch_assoc($des_tbl_nilai)) {
    $values[] = "'" .$_POST[$data['Field']]. "'";
  }
  $values = implode(',' , $values);
  $query = mysql_query("INSERT INTO tbl_nilai VALUES ($values) ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-success-a'>✔ Input Nilai Berhasil</div>";
    header('location: ../input_nilai.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 ERROR -- UNKNOWN</div>";
    header('location: ../input_nilai.php');
  }

}else if(isset($_POST['edit'])){
  $nis = $_POST['nis'];
  $id_pengajar = $_POST['id_pengajar'];
  while ($data = mysql_fetch_assoc($des_tbl_nilai)) {
    $values[] = $data['Field']. "= '" .$_POST[$data['Field']]. "'";
  }
  $values = implode($values, ',');

  $query = mysql_query("UPDATE tbl_nilai SET $values where nis='$nis' and id_pengajar='$id_pengajar' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-warning-a'>✎ Edit Nilai Berhasil</div>";
    header('location: ../input_nilai.php');
  }else{
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 ERROR</div>";
    header('location: ../input_nilai.php');
  }

}else if(isset($_POST['hapus'])){
  $nis = $_POST['nis'];
  $id_pengajar = $_POST['id_pengajar'];
  $query = mysql_query("DELETE FROM tbl_nilai WHERE nis='$nis' and id_pengajar='$id_pengajar' ");
  if ($query){
    $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>✖ Hapus Nilai Berhasil</div>";
    header('location: ../input_nilai.php');
  }else{
    echo mysql_error();
  }

}else{
  $_SESSION['notif'] = "<div style='float: right;' class='notif-danger-a'>😢 ERROR -- NO ACTION FOUND</div>";
  header('location: ../input_nilai.php');
}

// <!-- WARNING END CONTENT ----------------------------------------------------------- -->
} else {
        ?>
<script language="javascript">
	document.location = '../../../index.php'
</script>
<?php
    } ?>
