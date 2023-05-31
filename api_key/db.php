<?php
error_reporting(0);
define('server','localhost');
define('username','tungduon_binhtools_binh06');
define('password','tungduon_binhtools_binh06');
define('database','tungduon_binhtools_binh06');
$ketnoi = mysqli_connect(server,username,password) or die('Không kết nối được server Database');
mysqli_select_db($ketnoi,database) or die("Không thể chọn database");
mysqli_query($ketnoi,"SET NAMES utf8");