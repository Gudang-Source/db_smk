<?php session_start();
if ($_SESSION && $_SESSION['login'] == 'admin') {
    ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query_guru = mysql_query("SELECT * FROM tbl_guru");
$query_mapel = mysql_query("SELECT * FROM tbl_mapel");
$query_kelas = mysql_query("SELECT * FROM tbl_kelas");
if(isset($_POST['edit'])){
  $id_pengajar = $_POST['id_pengajar'];
  $query = mysql_query("SELECT * FROM tbl_pengajar where id_pengajar='$id_pengajar' ");
  $data = mysql_fetch_assoc($query);
}
?>

<div class="content">
	<div class="font">

    <div style="font-size: 25pt;">
      FORM DATA PENGAJAR
		</div><hr>
		<form action="action/pengajar_act.php" method="post" enctype="multipart/form-data">
			<pre>
ID PENGAJAR : <input type="text" value="AUTO" disabled><br>
NAMA GURU   : <select name="nip" required>
              <?php while ($data_guru = mysql_fetch_assoc($query_guru)) { ?>
                <option value="<?php echo $data_guru['nip']; ?>" <?php if(isset($_POST['edit']) && $data['nip'] == $data_guru['nip']) echo "selected"; ?>><?php echo $data_guru['nama']; ?></option>
              <?php } ?>
              </select><br>
NAMA MAPEL  : <select name="id_mapel" required>
              <?php while ($data_mapel = mysql_fetch_assoc($query_mapel)) { ?>
                <option value="<?php echo $data_mapel['id_mapel']; ?>" <?php if(isset($_POST['edit']) && $data['id_mapel'] == $data_mapel['id_mapel']) echo "selected"; ?>><?php echo $data_mapel['nama_mapel']; ?></option>
              <?php } ?>
              </select><br>
KELAS       : <select name="id_kelas" required>
              <?php while ($data_kelas = mysql_fetch_assoc($query_kelas)) { ?>
                <option value="<?php echo $data_kelas['id_kelas']; ?>" <?php if(isset($_POST['edit']) && $data['id_kelas'] == $data_kelas['id_kelas']) echo "selected"; ?>><?php echo $data_kelas['kelas']; ?></option>
              <?php } ?>
                </select>
			</pre>
      <input type="hidden" name="id_pengajar" value="<?php if(isset($_POST['edit'])) echo $data['id_pengajar']; ?>">
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
