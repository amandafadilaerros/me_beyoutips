<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "db_beyoutips";
	$koneksi=mysqli_connect($host,$user,$pass);
	$db_koneksi=mysqli_select_db($koneksi,$db);
