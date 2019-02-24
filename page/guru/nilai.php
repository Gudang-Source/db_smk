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
			<center>DATA NILAI</center>
		</div><hr>

		<form action="nilai.php" method="post" enctype="multipart/form-data">
MAPEL / KELAS   : <select name="id_pengajar" required>
              <?php while ($data_pengajar = mysql_fetch_assoc($query_pengajar)) { ?>
                <option value="<?php echo $data_pengajar['id_pengajar']; ?>" <?php if(isset($_POST['go']) && $data_pengajar['id_pengajar'] == $id_pengajar) echo "selected"; ?>>
									<?php echo $data_pengajar['nama_mapel']; ?> / <?php echo $data_pengajar['kelas'] ?>
								</option>
              <?php } ?>
              </select>
							<button class="button button1" type="submit" name="go">CARI</button>
		</form>

		<hr>

		<?php if(!isset($_POST['go']) or $data_temp['nama_mapel'] == NULL){ ?>
			-- Pilih Mapel / Kelas Pada Menu Diatas --
		<?php } else { ?>
			Menampilkan Data Nilai, Mata Pelajaran <font style="color: red; text-transform: uppercase;"><?php echo $data_temp['nama_mapel'] ?></font> Kelas <font style="color: blue; text-transform: uppercase;"><?php echo $data_temp['kelas'] ?></font>
			<?php if (isset($_SESSION['notif'])) echo $_SESSION['notif']; unset($_SESSION['notif']);?>
			<br><br>
			<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
				<tr>
					<th>ID NILAI</th>
					<th>MAPEL</th>
					<th>NAMA SISWA</th>
					<th>KELAS</th>
					<th>NILAI HARIAN</th>
					<th>NILAI UTS</th>
					<th>NILAI UAS</th>
					<th>RATA-RATA</th>
				</tr>
				<?php if(!$data_row){ ?>
					<td colspan="8"><i>-- No Data Entry --</i></td>
				<?php } ?>
				<?php while ($data = mysql_fetch_assoc($query)) {
					$nis = $data['nis'];
					$query_nilai = mysql_query("SELECT * FROM tbl_nilai where id_pengajar=$id_pengajar and nis=$nis ");
					$data_nilai = mysql_fetch_assoc($query_nilai); ?>
				<tr>
						<td>
							<?php if($data_nilai) echo $data_nilai['id_nilai']; else echo "-"  ?>
						</td>
						<td>
							<?php echo $data_temp['nama_mapel'];  ?>
						</td>
						<td>
							<?php echo $data['nama'];  ?>
						</td>
						<td>
							<?php echo $data['kelas'];  ?>
						</td>
						<td>
							<?php if($data_nilai) echo $data_nilai['harian']; else echo "-" ?>
						</td>
						<td>
							<?php if($data_nilai) echo $data_nilai['uts']; else echo "-" ?>
						</td>
						<td>
							<?php if($data_nilai) echo $data_nilai['uas']; else echo "-" ?>
						</td>
						<td>
							<?php if($data_nilai) echo ($data_nilai['harian']+$data_nilai['uts']+$data_nilai['uas'])/3; else echo "-" ?>
						</td>
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
