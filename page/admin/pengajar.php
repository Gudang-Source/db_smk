<?php session_start();
if($_SESSION && $_SESSION['login'] == 'admin'){ ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query = mysql_query("SELECT *, tbl_guru.nama as nama_guru FROM tbl_pengajar LEFT JOIN tbl_guru ON tbl_pengajar.nip=tbl_guru.nip LEFT JOIN tbl_mapel ON tbl_pengajar.id_mapel=tbl_mapel.id_mapel LEFT JOIN tbl_kelas ON tbl_pengajar.id_kelas=tbl_kelas.id_kelas");
?>

<div class="content">
	<div class="font">

		<div style="font-size: 25pt;">
			<center>DATA PENGAJAR</center>
		</div><hr>
		<a href="pengajar_form.php"><button class="button button1">+ Tambah</button></a>
		<?php if (isset($_SESSION['notif'])) echo $_SESSION['notif']; unset($_SESSION['notif']);?>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>ID PENGAJAR</th>
				<th>NIP</th>
				<th>NAMA GURU</th>
				<th>MAPEL</th>
				<th>KELAS</th>
				<th colspan="2">ACTION</th>
			</tr>
			<?php
while ($data = mysql_fetch_assoc($query)) {
?>
			<tr>
				<td>
					<?php echo $data['id_pengajar'];  ?>
				</td>
				<td>
					<?php echo $data['nip'];  ?>
				</td>
				<td>
					<?php echo $data['nama_guru'];  ?>
				</td>
				<td>
					<?php echo $data['nama_mapel'];  ?>
				</td>
				<td>
					<?php echo $data['kelas'];  ?>
				</td>
				<td>
					<form action="pengajar_form.php" method="post">
						<input type="hidden" name="id_pengajar" value="<?php echo $data['id_pengajar']; ?>">
						<input type="submit" name="edit" class="button button-info" value="Edit">
					</form>
				</td>
				<td>
					<form action="action/pengajar_act.php" method="post">
						<input type="hidden" name="id_pengajar" value="<?php echo $data['id_pengajar']; ?>">
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
