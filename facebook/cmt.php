<?php require_once('../config/head.php'); ?>
<title>Trang Chủ</title>
<?php
if(!$_SESSION['username']) {
die('<script type="text/javascript">setTimeout(function(){ location.href = "/login" },0);</script>');
}


?>
<?php require_once('../config/nav.php'); ?>
      </div>      <div class="content-page">
     <div class="container-fluid add-form-list">
<div class="card-body">
<?php
if(isset($_POST['submit'])) {
$id = $_POST['id'];
$sl = $_POST['sl'];
$nd = $_POST['nd'];
$tinhtien = 13 * $sl;
if($user['money'] < $tinhtien){ ?>
<script type="text/javascript">
cuteToast({
type: "error",
message: "Bạn Không Đủ Số Dư Để Mua",
timer: 5000
});setTimeout(function(){ location.href = "/mua-comment" },5000);
</script>
    <?php 
    } else if($sl < 20) { ?>
<script type="text/javascript">
cuteToast({
type: "error",
message: "Mua Tối Thiểu 20 Comment Trở Lên !",
timer: 5000
});setTimeout(function(){ location.href = "/mua-comment" },5000);
</script>   
<?php } else {
require_once('../admin/tds.php'); 
// mua follow
$header = array( 
"Host:traodoisub.com",
"content-type:application/x-www-form-urlencoded; charset=UTF-8",
"x-requested-with:XMLHttpRequest",
"user-agent:$useragent",
"origin:https://traodoisub.com",
"referer:https://traodoisub.com/mua/comment/",
);
$data = 'maghinho=&id='.$id.'&sl='.$sl.'&noidung='.$nd.'&dateTime='.$tong.'';
$mr = curl_init();
curl_setopt($mr, CURLOPT_URL, 'https://traodoisub.com/mua/comment/themid.php');
curl_setopt($mr, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($mr, CURLOPT_COOKIEFILE, 'file.txt');
curl_setopt($mr, CURLOPT_POSTFIELDS, $data);
curl_setopt($mr, CURLOPT_HTTPHEADER, $header);
curl_setopt($mr, CURLOPT_USERAGENT, $useragent);
$mr2 = curl_exec($mr); 
curl_close($mr); 
if($mr2 == "1"){
?>
<script type="text/javascript">
cuteToast({
type: "error",
message: "Mua Thất Bại !",
timer: 5000
});
</script>
<?php
}else{

$ketnoi->query("UPDATE `users` SET `money` = `money` - '$tinhtien' WHERE `username` = '$username'"); # trừ tiền
     
$ketnoi->query("UPDATE `users` SET `tong_tru` = `tong_tru` + '$tinhtien' WHERE `username` = '$username'"); # cộng đã tiêu

$create = $ketnoi->query("INSERT INTO `muafbcmt` SET 
        `idtang` = '$id',
        `sl` = '$sl',
        `nd` = '$nd',
        `username` = '$username',
        `time` = '$time' ");
?>
<script type="text/javascript">
cuteToast({
type: "success",
message: "Mua Thành Công",
timer: 5000
});
</script>
<?php
}
}
}
?>
                                <form action="" method="POST">
                                    <div class="form-group row">
                                        <label for="" class="col-md-3">ID Trang Cá Nhân </label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control mb-3" name="id" placeholder="Nhập id trang cá nhân cần tăng">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-3">Máy chủ </label>
                                        <div class="col-md-9">
                                                                                        <div class="mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="sv1" type="radio" name="server_order" checked="" onchange="if (!window.__cfRLUnblockHandlers) return false; bill();" value="sv1">
                                                    <label class="form-check-label" for="sv1">sv1 <small>(Comment người dùng chéo, tài khoản tên Việt, có Avatar)</small>&nbsp;<span class="badge border border-success text-success">13 coin / 1 comment</span>&nbsp;<b class="text-warning">(Hoạt động)</b></label>
                                                </div>
                                            </div>
                                                                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-3">Số lượng </label>
                                        <div class="col-md-9">
                                            <input type="sl" id="sl" class="form-control mb-3" name="sl" placeholder="Nhập số lượng cần tăng" onkeyup="tinhtien();" required>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="" class="col-md-3">Nội dung</label>
                                        <div class="col-md-9">
                                            <input type="nd" id="nd" class="form-control mb-3" name="nd" placeholder="Nhập nội dung" onkeyup="tinhtien();" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center">
                                            <div class="alert alert-dismissible alert-success">
                                                <div class="form-group"><label class="active">Tổng thanh toán: <font color="red"><b id="ketqua">0</b></font> VNĐ</label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit" ><i class="fa fa-shopping-cart"></i> Thanh toán</button>
                                </form>
                            </div>
        <!-- Page end  -->
<div class="card-body px-3 py-1 bg-light"> <div class="row flex-between-center py-1"> <div class="col-7 col-sm-auto d-flex align-items-center pe-0">
     <div class="h-200"> <div class="input-group"><input class="form-control form-control-sm shadow-none search" type="search" placeholder="Tìm kiếm ID" id="search_box" aria-label="search"> 
</div> </div> </div> <div class="table-responsive scrollbar"> 
<table class="table table-bordered table-striped fs--1"> 
<thead class="bg-200 text-900"> 
<tr> 
<th class="sort pr-1 align-middle white-space-nowrap text-center">STT</th> 
<th class="sort pr-1 align-middle white-space-nowrap text-center">ID</th> 
<th class="sort pr-1 align-middle white-space-nowrap text-center">Trạng thái</th> 
<th class="sort pr-1 align-middle white-space-nowrap text-center">Số lượng</th> 
<th class="sort pr-1 align-middle white-space-nowrap text-center">Đã tăng</th>
<th class="sort pr-1 align-middle white-space-nowrap text-center">Nội dung</th>
<th class="sort pr-1 align-middle white-space-nowrap text-center">Tốc độ</th> 
<th class="sort pr-1 align-middle white-space-nowrap text-center">Ngày mua</th> 
</tr> 
</thead>
<?php
error_reporting(1);
require_once('../admin/tds.php'); 
// get lịch sử mua follow
$header = array( 
"Host:traodoisub.com",
"content-type:application/x-www-form-urlencoded; charset=UTF-8",
"x-requested-with:XMLHttpRequest",
"user-agent:$useragent",
"origin:https://traodoisub.com",
"referer:https://traodoisub.com/mua/comment/",
);
$data = 'page=1&query=';
$mr = curl_init();
curl_setopt($mr, CURLOPT_URL, 'https://traodoisub.com/mua/comment/fetch.php');
curl_setopt($mr, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($mr, CURLOPT_COOKIEFILE, 'file.txt');
curl_setopt($mr, CURLOPT_POSTFIELDS, $data);
curl_setopt($mr, CURLOPT_HTTPHEADER, $header);
curl_setopt($mr, CURLOPT_USERAGENT, $useragent);
$mr2 = curl_exec($mr); 
curl_close($mr); 
$json = json_decode($mr2, true);

$id = $json["data"][0]["idpost"];
$status = $json["data"][0]["status"];
$sl = $json["data"][0]["sl"];
$dt = $json["data"][0]["datang"];
$nd = $json["data"][0]["nd"];
$time = $json["data"][0]["date"];

                                $i = 1;
                                $query = mysqli_query($ketnoi, "SELECT * FROM `muafollow` WHERE `username` = '$username' ORDER BY id DESC limit 5");
      while($row = mysqli_fetch_assoc($query)){
?>
<tbody class="list" id="table-purchase-body"><tr class="btn-reveal-trigger"> 
    <td class="align-middle text-center white-space-nowrap"><?=$i;?> <?php $i++;?></td>
    <td class="align-middle text-center white-space-nowrap"><?=$row['idtang'];?></td>
    <?php if($status == '<span class="badge badge badge-soft-primary">Hoàn Thành</span>'){ ?>
    <td class="align-middle text-center fs-0 white-space-nowrap"><span class="badge badge badge-success">Hoàn Thành</span></td>
    <?php }else{ ?>
    <td class="align-middle text-center fs-0 white-space-nowrap"><span class="badge badge badge-warning">Đang Tăng</span></td>
    <?php } ?>
    <td class="align-middle text-center white-space-nowrap"><?=$sl;?></td> 
    <td class="align-middle text-center white-space-nowrap"><?=$dt;?></td> 
    <td class="align-middle text-center white-space-nowrap"><?=$nd;?></td> 
    <td class="align-middle text-center fs-0 white-space-nowrap"><span class="badge badge badge-info">Nhanh</span></td> 
    <td class="align-middle text-center white-space-nowrap"><?=$time;?></td>
    </tr>
    </th> 
    </tr>
    </tbody> 
    </table> 
<?php } ?>
</div> </div>
       <script src="/assets/js/binh1.js"></script>
       <script type="text/javascript">
          $('#sl').keyup(function() {
          var amount = $("#sl").val();
          var service = 13;
          var ketquaz = service * amount;
          var ketqua = ketquaz - ketquaz * 0 / 100;
          $('#ketqua').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g,'$1,'));
          });
</script>

    </div>
      </div>
    </div>

    <!-- Wrapper End-->
<?php require_once('../config/foot.php'); ?>