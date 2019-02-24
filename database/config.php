<?php
$server="localhost";
$user="root";
$pass="";

    mysql_connect($server, $user, $pass)or die("Koneksi Gagal");
    mysql_select_db('db_smk')or die("Database Tidak Ada");

?>
