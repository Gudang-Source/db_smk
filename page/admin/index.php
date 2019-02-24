<?php session_start();
if($_SESSION && $_SESSION['login'] == 'admin'){ ?>
<?php require_once('assets/header.php'); ?>

<div class="content">
	<div class="font">
		<h1>Selamat Datang Admin...</h1>
		<?php
	echo "<h2><strong><font color=blue>".$_SESSION['nama']."</h2></strong></font><p>";
		?>
		</center>
		</h1>
	</div>
</div>

<?php require_once('assets/footer.php'); ?>
<?php }else{ ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php } ?>
