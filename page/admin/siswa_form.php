<?php session_start();
if ($_SESSION && $_SESSION['login'] == 'admin') {
    ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query_kelas = mysql_query("SELECT * FROM tbl_kelas");
if(isset($_POST['edit'])){
  $nis = $_POST['nis'];
  $query = mysql_query("SELECT * FROM tbl_siswa where nis='$nis' ");
  $data = mysql_fetch_assoc($query);
}
?>

<div class="content">
	<div class="font">

    <div style="font-size: 25pt;">
      FORM DATA SISWA
		</div><hr>
		<form action="action/siswa_act.php" method="post" enctype="multipart/form-data">
			<pre>
NIS           : <input type="number" name="nis" value="<?php if(isset($_POST['edit'])) echo $data['nis']; ?>" <?php if(isset($_POST['edit'])) echo "readonly"; ?> required><br>
PASSWORD      : <input type="password" name="password" value="<?php if(isset($_POST['edit'])) echo $data['password']; ?>" required><br>
NAMA          : <input type="text" name="nama" value="<?php if(isset($_POST['edit'])) echo $data['nama']; ?>" required><br>
TEMPAT LAHIR  : <input type="text" name="tempat_lahir" value="<?php if(isset($_POST['edit'])) echo $data['tempat_lahir']; ?>" required><br>
TANGGAL LAHIR : <input type="date" name="tanggal_lahir" value="<?php if(isset($_POST['edit'])) echo $data['tanggal_lahir']; ?>" required><br>
EMAIL         : <input type="email" name="email" value="<?php if(isset($_POST['edit'])) echo $data['email']; ?>" required><br>
NO TLP        : <input type="number" name="no_tlp" value="<?php if(isset($_POST['edit'])) echo $data['no_tlp']; ?>" required><br>
JENIS KELAMIN : <select name="jenis_kelamin" required>
                  <option value="L" <?php if(isset($_POST['edit']) && $data['jenis_kelamin'] == 'L') echo "selected"; ?> >Laki-Laki</option>
                  <option value="P" <?php if(isset($_POST['edit']) && $data['jenis_kelamin'] == 'P') echo "selected"; ?> >Perempuan</option>
                </select><br>
KELAS         : <select name="id_kelas" required>
                  <?php while ($data_kelas = mysql_fetch_assoc($query_kelas)) { ?>
                    <option value="<?php echo $data_kelas['id_kelas']; ?>" <?php if(isset($_POST['edit']) && $data['id_kelas'] == $data_kelas['id_kelas']) echo "selected"; ?>><?php echo $data_kelas['kelas']; ?></option>
                  <?php } ?>
                </select>
			</pre>
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
