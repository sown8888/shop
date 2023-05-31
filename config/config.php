<?php session_start();
define("DATABASE", "tungduon_binhtools_binh06");
define("USERNAME", "tungduon_binhtools_binh06");
define("PASSWORD", "tungduon_binhtools_binh06");
define("LOCALHOST", "localhost");
$ketnoi = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DATABASE);
$ketnoi->query("set names 'utf8'");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date('h:i d-m-Y');

$chiet_khau_card = "15";


if(isset($_SESSION['username'])) {
$username = $_SESSION['username'];
$user = $ketnoi->query("SELECT * FROM users WHERE username = '$username' ")->fetch_array();
if(empty($user['id'])) {
session_start();
session_destroy();
header('location: /');
}

if($user['money'] < 0) {
session_start();
session_destroy();
header('location: /');
}

if($user['bannd'] == 1) {
session_start();
session_destroy();
header('location: /');
}

}










$ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER['WWW_HTTP_CLIENT_IP'])) {
$ip = $SERVER['WWW_HTTP_CLIENT_IP'];
} else if(!empty($_SERVER['WWW_HTTP_X_FORWARDED_FOR'])){
$ip = $_SERVER['WWW_HTTP_X-FORWARDED_FOR'];
}
$browser = $_SERVER['HTTP_USER_AGENT'];


function check_the($data) {
if ($data == 'xuly') {
$show = '<span class="badge bg-warning">Đang Xử Lý</span>';
} else if ($data == "thatbai") {
$show = '<span class="badge bg-danger">Thất Bại</span>';
} else if($data == "hoantat") {
$show = '<span class="badge bg-success">Thành Công</span>';
}
return $show;
}


function tien($price){
    return str_replace(",", ".", number_format($price));
}

function random($string, $int) {  
    return substr(str_shuffle($string), 0, $int);
}

function xoadau($strTitle){
$strTitle=strtolower($strTitle);
//code được viết bởi mạnh, liên hệ zalo: 0333293290
$strTitle=trim($strTitle);
$strTitle=str_replace(' ','-',$strTitle);
$strTitle=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/",'y',$strTitle);
$strTitle=preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/",'y',$strTitle);
$strTitle=str_replace('đ','d',$strTitle);
$strTitle=str_replace('Đ','d',$strTitle);
$strTitle=preg_replace("/[^-a-zA-Z0-9]/",'',$strTitle);
return $strTitle;
}
?>