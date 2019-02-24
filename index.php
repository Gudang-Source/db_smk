<?php session_start() ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <link rel='shortcut icon' href='assets/icon/favicon.png'>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMK</title>
</head>

<body bgcolor="#2bc831">

  <h1 class="judul">
    SMK
  </h1>
  <hr>

  <div class="menu">
    <a href="index.php"><button class="btnatas-success">HOME</button></a>
    <a href="nilai.php"><button class="btnatas-success">NILAI SISWA</button></a>
    <a href="https://github.com/TheSkinnyRat/db_smk" target="_blank"><button class="btnatas-warning">SOURCE CODE / GITHUB</button></a>
    <a href="https://db-smk.000webhostapp.com/" target="_blank"><button class="btnatas-warning">ONLINE WEBSITE</button></a>
  </div>

  <div class="sidebar">
    <div class="font">
      <fieldset>
        <legend><?php if(isset($_SESSION['login'])) echo "ANDA LOGIN SEBAGAI"; else echo "LOGIN"; ?></legend>
        <?php
        if (isset($_SESSION['login'])){ ?>
          <div class="notif-success">
            <?php echo $_SESSION['nama']; ?>
          </div>
          <a href="page/<?php echo $_SESSION['login']; ?>/index.php"><button class="button button1">Beranda</button></a>
          <a href="action/logout.php"><button class="button button-danger">Logout</button></a>
        <?php }else{ ?>
          <button onclick="show_login_siswa()" class="button button1">Siswa</button>
          <button onclick="show_login_guru()" class="button button-info">Guru</button>
          <button onclick="show_login_admin()" class="button button-danger">Admin</button>
          <hr>

          <div id="title_login">
            <?php
            if (isset($_SESSION['notif'])){
              echo $_SESSION['notif'];
              unset($_SESSION['notif']);
            }else{ ?>
              Pilih Menu Login Di Atas
            <?php } ?>
          </div>

          <div id="login_process" style="display: none;">
            <div class="notif-warning">
              MEMPROSES...
            </div>
          </div>

          <div id="login_siswa" style="display: none;">
            Login Siswa
            <form action="action/login_siswa.php" method="post" onsubmit="show_login_process()">
              <pre>
NIS      : <input type="number" name="nis" required>
Password : <input type="password" name="password" required>
<button class="button button-success" type="submit" name="button">LOGIN</button>
              </pre>
            </form>
          </div>

          <div id="login_guru" style="display: none;">
            Login Guru
            <form action="action/login_guru.php" method="post" onsubmit="show_login_process()">
              <pre>
NIP      : <input type="number" name="nip" value="" required>
Password : <input type="password" name="password" value="" required>
<button class="button button-success" type="submit" name="button">LOGIN</button>
              </pre>
            </form>
          </div>

          <div id="login_admin" style="display: none;">
            Login Admin
            <form action="action/login_admin.php" method="post" onsubmit="show_login_process()">
              <pre>
Username : <input type="text" name="username" value="" required>
Password : <input type="password" name="password" value="" required>
<button class="button button-success" type="submit" name="button">LOGIN</button>
              </pre>
            </form>
          </div>
        <?php } ?>

      </fieldset>
    </div>
  </div>

  <div class="content">
    <img src="assets/img/home.jpg">
  </div>

  <div class="sidebar-img">
    <img src="assets/img/login.png">
  </div>

  <div class="footer">
    <div class="font">
      <?php echo base64_decode("JmNvcHk7IDIwMTkgLSBAVGhlU2tpbm55UmF0IC8gQ3JlYXRlZCBBbmQgRGV2ZWxvcGVkIEJ5IDxhIHN0eWxlPSdjb2xvcjogIzMxNjRkNTsnIGhyZWY9J2h0dHBzOi8vaW5zdGFncmFtLmNvbS90aGUuc2tpbm55LnJhdCcgdGFyZ2V0PSdfYmxhbmsnPkBUaGUuU2tpbm55LlJhdDwvYT4gLyBTdXBwb3J0aW5nIFdlYnNpdGU6IDxhIHN0eWxlPSdjb2xvcjogIzMxNjRkNTsnIGhyZWY9J2h0dHBzOi8vc2Nob29sLW1hdGUudGsnIHRhcmdldD0nX2JsYW5rJz5TY2hvb2wtTWF0ZS50azwvYT4gLCA8YSBzdHlsZT0nY29sb3I6ICMzMTY0ZDU7JyBocmVmPSdodHRwczovL3NhcnByYXMudGsnIHRhcmdldD0nX2JsYW5rJz5TYXJwcmFzLnRrPC9hPg==") ?>
    </div>
  </div>

</body>

<script type="text/javascript">
  login_siswa = document.getElementById('login_siswa');
  login_guru = document.getElementById('login_guru');
  login_admin = document.getElementById('login_admin');
  title_login = document.getElementById('title_login');

  function show_login_siswa(){
    login_siswa.style.display = 'block';
    login_guru.style.display = 'none';
    login_admin.style.display = 'none';
    title_login.style.display = 'none';
  }

  function show_login_guru(){
    login_siswa.style.display = 'none';
    login_guru.style.display = 'block';
    login_admin.style.display = 'none';
    title_login.style.display = 'none';
  }

  function show_login_admin(){
    login_siswa.style.display = 'none';
    login_guru.style.display = 'none';
    login_admin.style.display = 'block';
    title_login.style.display = 'none';
  }

  function show_login_process(){
    login_siswa.style.display = 'none';
    login_guru.style.display = 'none';
    login_admin.style.display = 'none';
    title_login.style.display = 'none';
    login_process.style.display = "block";
  }

</script>

</html>
