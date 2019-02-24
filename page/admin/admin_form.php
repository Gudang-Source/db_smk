<?php session_start();
if ($_SESSION && $_SESSION['login'] == 'admin') {
    ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
if(isset($_POST['edit'])){
  $username = $_POST['username'];
  $query = mysql_query("SELECT * FROM tbl_admin where username='$username' ");
  $data = mysql_fetch_assoc($query);
}
?>

<div class="content">
	<div class="font">

    <div style="font-size: 25pt;">
      FORM DATA ADMIN
		</div><hr>
		<form action="action/admin_act.php" method="post" enctype="multipart/form-data">
			<pre>
ID ADMIN      : <input type="text" value="AUTO" disabled><br>
USERNAME      : <input type="text" name="username" value="<?php if(isset($_POST['edit'])) echo $data['username']; ?>" required><br>
PASSWORD      : <input type="password" name="password" value="<?php if(isset($_POST['edit'])) echo $data['password']; ?>" required><br>
NAMA          : <input type="text" name="nama" value="<?php if(isset($_POST['edit'])) echo $data['nama']; ?>" required><br>
			</pre>
      <input type="hidden" name="id" value="<?php if(isset($_POST['edit'])) echo $data['id']; ?>">
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
