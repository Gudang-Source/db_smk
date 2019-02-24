<?php session_start();
if($_SESSION && $_SESSION['login'] == 'guru'){ ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$nip = $_SESSION['nip'];
$query_pengajar = mysql_query("SELECT * FROM tbl_pengajar LEFT JOIN tbl_mapel ON tbl_pengajar.id_mapel=tbl_mapel.id_mapel LEFT JOIN tbl_kelas ON tbl_pengajar.id_kelas=tbl_kelas.id_kelas where tbl_pengajar.nip = $nip ");
if (isset($_POST['go'])) {
	$id_pengajar = $_POST['id_pengajar'];
	$query_kelas = mysql_query("SELECT * FROM tbl_pengajar where id_pengajar=$id_pengajar");
	$data_kelas = mysql_fetch_assoc($query_kelas);
	$id_kelas = $data_kelas['id_kelas'];

	$query = mysql_query("SELECT * FROM tbl_siswa LEFT JOIN tbl_kelas ON tbl_siswa.id_kelas=tbl_kelas.id_kelas where tbl_siswa.id_kelas=$id_kelas");
	$data_row = mysql_num_rows($query);
	$query_temp = mysql_query("SELECT * FROM tbl_pengajar LEFT JOIN tbl_mapel ON tbl_pengajar.id_mapel=tbl_mapel.id_mapel LEFT JOIN tbl_kelas ON tbl_pengajar.id_kelas=tbl_kelas.id_kelas where tbl_pengajar.id_pengajar=$id_pengajar");
	$data_temp = mysql_fetch_assoc($query_temp);
}
?>

<div class="content">
	<div class="font">

		<div style="font-size: 25pt;">
			<center>INPUT DATA NILAI</center>
		</div><hr>

		<form action="input_nilai.php" method="post" enctype="multipart/form-data">
MAPEL / KELAS   : <select name="id_pengajar" required>
              <?php while ($data_pengajar = mysql_fetch_assoc($query_pengajar)) { ?>
                <option value="<?php echo $data_pengajar['id_pengajar']; ?>" <?php if(isset($_POST['go']) && $data_pengajar['id_pengajar'] == $id_pengajar) echo "selected"; ?>>
									<?php echo $data_pengajar['nama_mapel']; ?> / <?php echo $data_pengajar['kelas']; ?>
								</option>
              <?php } ?>
              </select>
							<button class="button button1" type="submit" name="go">CARI</button>
		</form>

		<hr>
		<?php if (isset($_SESSION['notif'])) echo $_SESSION['notif']; unset($_SESSION['notif']);?>

		<?php if(!isset($_POST['go']) or $data_temp['nama_mapel'] == NULL){ ?>
			-- Pilih Mapel / Kelas Pada Menu Diatas --
		<?php } else { ?>
			Input Nilai Siswa, Mata Pelajaran <font style="color: red; text-transform: uppercase;"><?php echo $data_temp['nama_mapel'] ?></font> Kelas <font style="color: blue; text-transform: uppercase;"><?php echo $data_temp['kelas'] ?></font>
			<br><br>
			<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
				<tr>
					<th>NIS</th>
					<th>NAMA SISWA</th>
					<th>KELAS</th>
					<th>STATUS NILAI</th>
					<th colspan="2">ACTION</th>
				</tr>
				<?php if(!$data_row){ ?>
					<td colspan="10"><i>-- No Data Entry --</i></td>
				<?php } ?>
				<?php while ($data = mysql_fetch_assoc($query)) { ?>
				<tr>
						<td>
							<?php echo $data['nis'];  ?>
						</td>
						<td>
							<?php echo $data['nama'];  ?>
						</td>
						<td>
							<?php echo $data['kelas'];  ?>
						</td>
						<td>
							<?php
							$nis = $data['nis'];
							$query_status_nilai = mysql_query("SELECT * FROM tbl_nilai where id_pengajar=$id_pengajar and nis=$nis ");
							$data_status_row = mysql_num_rows($query_status_nilai);
							if ($data_status_row) { ?>
								<font style="color: green;">Sudah Di Input</font>
							<?php } else { ?>
								<font style="color: red;">Belum Di Input</font>
							<?php } ?>
						</td>
						<?php if ($data_status_row) { ?>
						<td>
								<form action="input_nilai_form.php" method="post">
									<input type="hidden" name="nis" value="<?php echo $data['nis']; ?>">
									<input type="hidden" name="id_pengajar" value="<?php echo $id_pengajar ?>">
									<input type="submit" name="edit" class="button button-info" value="EDIT">
								</form>
						</td>
						<td>
								<form action="action/input_nilai_act.php" method="post">
									<input type="hidden" name="nis" value="<?php echo $data['nis']; ?>">
									<input type="hidden" name="id_pengajar" value="<?php echo $id_pengajar ?>">
									<input type="submit" name="hapus" class="button button-danger" value="HAPUS">
								</form>
						</td>
						<?php }else{ ?>
							<td colspan="2">
									<form action="input_nilai_form.php" method="post">
										<input type="hidden" name="nis" value="<?php echo $data['nis']; ?>">
										<input type="hidden" name="id_pengajar" value="<?php echo $id_pengajar ?>">
										<input type="submit" name="input" class="button button1" value="INPUT">
									</form>
							</td>
						<?php } ?>

				</tr>
				<?php
	}
	?>
			</table>
		<?php } ?>

	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('assets/footer.php'); ?>
<?php }else{ ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php } ?>
