<?php session_start();
if($_SESSION && $_SESSION['login'] == 'admin'){ ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query = mysql_query("select * from tbl_admin");
?>

<div class="content">
	<div class="font">

		<div style="font-size: 25pt;">
			<center>DATA ADMIN</center>
		</div><hr>
		<a href="admin_form.php"><button class="button button1">+ Tambah</button></a>
		<?php if (isset($_SESSION['notif'])) echo $_SESSION['notif']; unset($_SESSION['notif']);?>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>ID ADMIN</th>
				<th>USERNAME</th>
				<th>PASSWORD</th>
				<th>NAMA</th>
				<th colspan="2">ACTION</th>
			</tr>
			<?php
while ($data = mysql_fetch_assoc($query)) {
?>
			<tr>
				<td>
					<?php echo $data['id'];  ?>
				</td>
				<td>
					<?php echo $data['username'];  ?>
				</td>
				<td>
					<?php echo $data['password'];  ?>
				</td>
				<td>
					<?php echo $data['nama'];  ?>
				</td>
				<td>
					<form action="admin_form.php" method="post">
						<input type="hidden" name="username" value="<?php echo $data['username']; ?>">
						<input type="submit" name="edit" class="button button-info" value="Edit">
					</form>
				</td>
				<td>
					<form action="action/admin_act.php" method="post">
						<input type="hidden" name="username" value="<?php echo $data['username']; ?>">
						<input type="submit" name="hapus" class="button button-danger" value="Hapus">
					</form>
				</td>
			</tr>
			<?php
}
?>
		</table>

	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('assets/footer.php'); ?>
<?php }else{ ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php } ?>
