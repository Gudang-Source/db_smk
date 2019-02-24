<?php session_start();
if ($_SESSION && $_SESSION['login'] == 'admin') {
    ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
if(isset($_POST['edit'])){
  $id_kelas = $_POST['id_kelas'];
  $query = mysql_query("SELECT * FROM tbl_kelas where id_kelas='$id_kelas' ");
  $data = mysql_fetch_assoc($query);
}
?>

<div class="content">
	<div class="font">

    <div style="font-size: 25pt;">
      FORM DATA KELAS
		</div><hr>
		<form action="action/kelas_act.php" method="post" enctype="multipart/form-data">
			<pre>
ID KELAS      : <input type="text" value="AUTO" disabled><br>
NAMA KELAS    : <input type="text" name="kelas" value="<?php if(isset($_POST['edit'])) echo $data['kelas']; ?>" required><br>
			</pre>
      <input type="hidden" name="id_kelas" value="<?php if(isset($_POST['edit'])) echo $data['id_kelas']; else echo '0'; ?>">
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
