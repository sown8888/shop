<?php
require_once('config/config.php');
error_reporting(0);

include 'tsr.php';

$callback_sign = md5($partner_key.$_GET['code'].$_GET['serial']);

if($_GET['callback_sign'] == $callback_sign) { 
$getdata['status'] = $_GET['status'];
$getdata['message'] = $_GET['message'];
$getdata['request_id'] = $_GET['request_id'];
$getdata['trans_id'] = $_GET['trans_id'];
$getdata['declared_value'] = $_GET['declared_value'];
$getdata['value'] = $_GET['value'];
$getdata['amount'] = $_GET['amount'];
$getdata['code'] = $_GET['code'];
$getdata['serial'] = $_GET['serial'];
$getdata['telco'] = $_GET['telco'];
$code = $_GET['code'];  
$seri = $_GET['serial']; 
$card = $ketnoi->query("SELECT * FROM cards WHERE `pin` = '$code' and `seri` = '$seri'  ")->fetch_array();


$msg_cb = $_GET['message'];

if ($_GET['status'] == '1') {
$thucnhan = $card['thucnhan'];
$ketnoi->query("UPDATE cards SET `status` = 'hoantat' WHERE `pin` = '$code' and `seri` = '$seri' ");

$ketnoi->query("UPDATE cards SET note = 'Thông Tin Thẻ Đúng' WHERE `pin` = '$code' and `seri` = '$seri' ");


$ketnoi->query("UPDATE users SET `money` = `money` + '$thucnhan', `tong_nap` = `tong_nap` + '$thucnhan' WHERE `username` = '".$card['username']."' ");

$ketnoi->query("INSERT INTO `log` SET 
        `content` = 'Nạp Card thành công,nhận được $thucnhan ',
        `time` = now(),
        `username` = '".$card['username']."' ");
    } else {
        
if($msg_cb == "CARD_INVALID") {
$note_cb = "Sai Thông Tin Thẻ";
}
        
        
        $ketnoi->query("UPDATE cards SET status = 'thatbai' WHERE `pin` = '$code' and `seri` = '$seri' ");
        
        $ketnoi->query("UPDATE cards SET note = '$note_cb' WHERE `pin` = '$code' and `seri` = '$seri' ");
        
    }
} else {   
    echo json_encode(array('status' => "error", 'msg' => "duong nhan code website gia re | lh zalo: 0866471227"));
}
?>