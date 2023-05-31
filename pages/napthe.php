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
        <div class="row">
            <?php
if(isset($_POST['btnNapCard']) && isset($_SESSION['username'])) {
    $loaithe = $_POST['loaithe'];
    $menhgia = $_POST['menhgia'];
    $seri = $_POST['seri'];
    $pin = $_POST['pin'];
    $code1 = random('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM', 12);
    $thucnhan = $menhgia - $menhgia * 0 / 100;
    if (strlen($seri) < 5 || strlen($pin) < 5) { ?>
<div class="alert alert-danger text-center" role="alert"><strong>Mã Thẻ Hoặc Số Seri Không Đúng Định Dạng!</strong></div>
<?php echo '<meta http-equiv="refresh" content="1;url=">';
    } else {
         
$command = 'charging';
require_once('../tsr.php'); 

$request_id = rand(100000000, 999999999);
$telco = $loaithe;
$amount = $menhgia;
$serial = $seri;
$code = $pin;
$dataPost = array();
$dataPost['partner_id'] = $partner_id;
$dataPost['request_id'] = $request_id;
$dataPost['telco'] = $telco;
$dataPost['amount'] = $amount;
$dataPost['serial'] = $serial;
$dataPost['code'] = $code;
$dataPost['command'] = $command;
$sign = creatSign($partner_key, $dataPost);
$dataPost['sign'] = $sign;
$data = http_build_query($dataPost);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
curl_setopt($ch, CURLOPT_REFERER, $actual_link);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

#tiến hành làm
$obj = json_decode($result);
$manhdz = $obj->message;

if($manhdz == "PENDING") {
$note_cb = "Đang Xử Lý";
}

if ($obj->status == 99) {




$create = $ketnoi->query("INSERT INTO `cards` SET 
        `code` = '$code1',
        `seri` = '$seri',
        `pin` = '$pin',
        `loaithe` = '$loaithe',
        `menhgia` = '$menhgia',
        `thucnhan` = '$thucnhan',
        `username` = '$username',
        `status` = 'xuly',
        `note` = '$note_cb',
        `time` = '$time' ");
           ?>
<script type="text/javascript">
cuteToast({
type: "success",
message: "Thành Công: <?=$note_cb;?>! Chờ 5s Xử Lý Thẻ, Vui Lòng Không Bấm Gì",
timer: 5000
});setTimeout(function(){ location.href = "/nap-the" },5000);
</script>
<?php 
            } else { ?>
<script type="text/javascript">
cuteToast({
type: "error",
message: "Thất Bại: Thẻ Đã Tồn Tại Trong Hệ Thống !",
timer: 5000
});setTimeout(function(){ location.href = "/nap-the" },5000);
</script>
<?php  }
            
        
    }
}
?>
                <form action="" method="POST">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Loại thẻ</label>
                            <div class="col-lg-8 fv-row">
                                <select class="form-control" name="loaithe" required="">
                                    <option value="">-- Chọn loại thẻ --</option>
                                    <option value="VIETTEL">Viettel</option>
                                    <option value="VINAPHONE">Vinaphone</option>
                                    <option value="MOBIFONE">Mobifone</option>
                                    <option value="VNMOBI">Vietnamobile</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Mệnh giá</label>
                            <div class="col-lg-8 fv-row">
                               <select class="form-control" name="menhgia" id="menhgia" required="">
                                    <option value="">-- Chọn mệnh giá --</option>
                                    <option value="10000">10.000đ</option>
                                    <option value="20000">20.000đ</option>
                                    <option value="30000">30.000đ</option>
                                    <option value="50000">50.000đ</option>
                                    <option value="100000">100.000đ</option>
                                    <option value="200000">200.000đ</option>
                                    <option value="300000">300.000đ</option>
                                    <option value="500000">500.000đ</option>
                                    <option value="1000000">1.000.000đ</option>
                                    <option value="2000000">2.000.000đ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Serial</label>
                            <div class="col-lg-8 fv-row">
                                <input class="form-control" type="text" name="seri" placeholder="Nhập serial thẻ" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Pin</label>
                            <div class="col-lg-8 fv-row">
                                 <input class="form-control" type="text" name="pin" placeholder="Nhập mã thẻ" required="">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="alert bg-white alert-info" role="alert">
                                <div class="iq-alert-icon">
                                </div>
                                <div class="iq-alert-text">Số tiền thực nhận: <b id="ketqua" style="color: red;">100%</b></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 fv-row text-center">
                                <button type="submit" name="btnNapCard"
                                    class="btn btn-danger">Nạp Thẻ</button></br>
                                     </form>
                            </div>
<div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Lịch sử nạp thẻ</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead class="table-color-heading">
                                    <tr>
                                        <th width="5%">STT</th>
                                        <th>USERNAME</th>
                                        <th>Loại</th>
                                        <th>Mệnh Giá</th>
                                        <th>Serial</th>
                                        <th>Pin</th>
                                        <th>Trạng thái</th>
                                        <th>NOTE</th>
                                    </tr>
                                </thead>
                                <?php 
                                $i = 1;
                                $query = mysqli_query($ketnoi, "SELECT * FROM `cards` WHERE `username` = '$username' ORDER BY id DESC limit 5");
      while($row = mysqli_fetch_assoc($query)){
?>
                                <tbody>
                                     <tr>
                                        <td><?=$i;?> <?php $i++;?></td>
                                        <td><?=$row['username'];?></td>
                                        <td><?=$row['loaithe'];?></td>
                                        <td><b style="color: red;"><?=tien($row['menhgia']);?>đ</b></td>
                                        <td><?=$row['seri'];?></td>
                                        <td><?=$row['pin'];?></td>
                                        <td><p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center"><?=check_the($row['status']);?></p></td>
                                        <td><?=$row['note'];?></td>
                                        <td></td>
                                    </tr>
                                    <?php }?>
                                                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function totalPrice(){
                    var total = 0;
                    var amount =  $("#amount").val();
                    total = amount - amount * 10 / 100;
                    $('#ketqua').html(total.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.'));
                }
            </script>

    <!-- Wrapper End-->
<?php require_once('../config/foot.php'); ?>