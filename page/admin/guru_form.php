<?php session_start();
if ($_SESSION && $_SESSION['login'] == 'admin') {
    ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
if(isset($_POST['edit'])){
  $nip = $_POST['nip'];
  $query = mysql_query("SELECT * FROM tbl_guru where nip='$nip' ");
  $data = mysql_fetch_assoc($query);
}
?>

<div class="content">
	<div class="font">

    <div style="font-size: 25pt;">
      FORM DATA GURU
		</div><hr>
		<form action="action/guru_act.php" method="post" enctype="multipart/form-data">
			<pre>
NIP           : <input type="number" name="nip" value="<?php if(isset($_POST['edit'])) echo $data['nip']; ?>" <?php if(isset($_POST['edit'])) echo "readonly" ?> required><br>
PASSWORD      : <input type="password" name="password" value="<?php if(isset($_POST['edit'])) echo $data['password']; ?>" required><br>
NAMA          : <input type="text" name="nama" value="<?php if(isset($_POST['edit'])) echo $data['nama']; ?>" required><br>
TEMPAT LAHIR  : <input type="text" name="tempat_lahir" value="<?php if(isset($_POST['edit'])) echo $data['tempat_lahir']; ?>" required><br>
TANGGAL LAHIR : <input type="date" name="tanggal_lahir" value="<?php if(isset($_POST['edit'])) echo $data['tanggal_lahir']; ?>" required><br>
EMAIL         : <input type="email" name="email" value="<?php if(isset($_POST['edit'])) echo $data['email']; ?>" required><br>
NO TLP        : <input type="number" name="no_tlp" value="<?php if(isset($_POST['edit'])) echo $data['no_tlp']; ?>" required><br>
JENIS KELAMIN : <select name="jenis_kelamin">
                  <option value="L" <?php if(isset($_POST['edit']) && $data['jenis_kelamin'] == 'L') echo "selected"; ?> >Laki-Laki</option>
                  <option value="P" <?php if(isset($_POST['edit']) && $data['jenis_kelamin'] == 'P') echo "selected"; ?> >Perempuan</option>
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
