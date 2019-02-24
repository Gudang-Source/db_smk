<?php session_start();
if ($_SESSION && $_SESSION['login'] == 'guru') {
    ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$nis = $_POST['nis'];
$id_pengajar = $_POST['id_pengajar'];
$query_temp = mysql_query("SELECT * FROM tbl_siswa where nis='$nis' ");
$data_temp = mysql_fetch_assoc($query_temp);
$query_temp2 = mysql_query("SELECT * FROM tbl_pengajar LEFT JOIN tbl_mapel ON tbl_pengajar.id_mapel=tbl_mapel.id_mapel where id_pengajar='$id_pengajar' ");
$data_temp2 = mysql_fetch_assoc($query_temp2);
if(isset($_POST['edit'])){
  $query = mysql_query("SELECT * FROM tbl_nilai where nis='$nis' and id_pengajar='$id_pengajar' ");
  $data = mysql_fetch_assoc($query);
}
?>

<div class="content">
	<div class="font">

    <div style="font-size: 25pt;">
      FORM INPT NILAI
		</div><hr>
		<form action="action/input_nilai_act.php" method="post" enctype="multipart/form-data">
			<pre>
NIS SISWA     : <input type="text" value="<?php echo $data_temp['nis']; ?>" disabled><br>
NAMA SISWA    : <input type="text" value="<?php echo $data_temp['nama']; ?>" disabled><br>
MAPEL         : <input type="text" value="<?php echo $data_temp2['nama_mapel']; ?>" disabled><br>
NILAI HARIAN  : <input type="number" name="harian" value="<?php if(isset($_POST['edit'])) echo $data['harian']; ?>" required><br>
NILAI UTS     : <input type="number" name="uts" value="<?php if(isset($_POST['edit'])) echo $data['uts']; ?>" required><br>
NIALI UAS     : <input type="number" name="uas" value="<?php if(isset($_POST['edit'])) echo $data['uas']; ?>" required><br>
			</pre>
      <input type="hidden" name="id_pengajar" value="<?php echo $id_pengajar ?>">
      <input type="hidden" name="nis" value="<?php echo $nis ?>">
      <input type="hidden" name="id_nilai" value="<?php if(isset($_POST['edit'])) echo $data['id_nilai']; ?>">
			<button class="button button1" type="submit" name="<?php if(isset($_POST['edit'])) echo 'edit'; else echo 'tambah'; ?>">SIMPAN</button>
			<button class="button button-info" type="reset">RESET</button>
		</form>
	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('assets/footer.php'); ?>
<?php
} else {
        ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php
    } ?>
