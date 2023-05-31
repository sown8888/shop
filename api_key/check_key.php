<?php
session_start();
header('Content-Type: application/json;charset=utf-8');  
require_once 'db.php';
$key_code = @mysqli_real_escape_string($ketnoi,htmlentities($_REQUEST['key']));
$query = mysqli_query($ketnoi,"SELECT * FROM key_log");
if(isset($key_code)){
while($row = mysqli_fetch_array($query)){
$pass = $row["key"];
$id = $row["id"];
if($key_code == $pass){
$ngaytao = $row["ngay_mua"];
$ketthuc = $row["ngay_het_han"];
$name = $row["nguoi_mua"];
$ip2 = $row["ip"];
$time = date("Y-m-d");
$gio = date("H:i:s");
$a = $time.' '.$gio;
$b = explode(" ",$a)[0];
$dayt = (int)explode("-",$b)[2];
$namt = (int)explode("-",$b)[0];
$thangt = (int)explode("-",$b)[1];
$d = explode(" ",$a)[1];
$giot = (int)explode(":",$d)[0];
$a1 = $ketthuc;
$b1 = explode(" ",$a1)[1];
$dayh = (int)explode("-",$b1)[0];
$namh = (int)explode("-",$b1)[2];
$thangh = (int)explode("-",$b1)[1];
$d1 = explode(" ",$a1)[0];
$gioh = (int)explode(":",$d1)[0];

if($namt >= $namh && $thangt >= $thangh && $dayt >= $dayh && $giot >= $gioh){
echo(json_encode(array("status" => "error","msg" => "Key hết hạn!", "create" => $ngaytao, "end" => $ketthuc, "name" => $name)));
 mysqli_query($ketnoi,"DELETE FROM `key_log` WHERE `key` = '$key_code'");
break;
}else if($ngaytao == $ketthuc){
echo(json_encode(array("status" => "error","msg" => "Key hết hạn!", "create" => $ngaytao, "end" => $ketthuc, "name" => $name)));
 mysqli_query($ketnoi,"DELETE FROM `key_log` WHERE `key` = '$key_code'");
break;
} else {
echo(json_encode(["status" => "success", "create" => $ngaytao, "end" => $ketthuc, "name" => $name, "ip" => $ip2]));
}
}
}
}else{
    echo(json_encode(['status' => 'error', 'msg' => 'Vui lòng nhập key']));
}
?>
