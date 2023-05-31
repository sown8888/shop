<?php require_once('config/head.php'); ?>
<title>Trang Chủ</title>
<?php
if(!$_SESSION['username']) {
die('<script type="text/javascript">setTimeout(function(){ location.href = "/login" },0);</script>');
}


?>
<?php require_once('config/nav.php'); ?>
      </div>      <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-transparent card-block card-stretch card-height border-none">
                    <div class="card-body p-0 mt-lg-2 mt-0">
                        <h3 class="mb-3">Chào Mừng <?=$user['username'];?></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info-light">
                                        <img src="https://i.imgur.com/3Y3fo21.png" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Tổng Tiền Đã Nạp</p>
                                        <h4><?=tien($user['tong_nap']);?>đ</h4>
                                    </div>
                                </div>                                
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="85">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-danger-light">
                                        <img src="https://i.imgur.com/8P04Dvc.png" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Số Dư Còn Lại</p>
                                        <h4><?=tien($user['money']);?>đ</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-danger iq-progress progress-1" data-percent="70">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="https://i.imgur.com/XLRxknY.png" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Tổng Tiền Đã Trừ</p>
                                        <h4><?=tien($user['tong_tru']);?>đ</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="75">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-title">
                                    <h3 class="m-0">Mua Key Tool Auto(600/Ngày 35 chế độ vip/kèm tool python vip ) 
                                    </div>
                                    <a href="https://drive.google.com/file/d/1EWDxxTRJGo1y-M8jeOUlNjooZ0bUDLjI/view" class="btn btn-success btn-sm">Tải Tool Auto Tại Đây</a></h3>
                                </div>
                <?php
$key_log = 1;
function date_end($amout){
$time = date("d-m-Y");
$time_stamp = strtotime($time);
$date = $time_stamp+(int)$amout*24*60*60;
$new = date('d-m-Y',$date);
return $new;
}
$time_create = date("H-i-s d-m-Y");


if(isset($_POST['mua_key'])){
    
$amount =$_POST['amount']; // số ngày
$name = $_POST['name']; // tên người mua
$key_code = $_POST['key_code']; // key cần tạo
   
$check = $ketnoi->query("SELECT * FROM `key_log` WHERE `key` = '$key_code' ")->fetch_array();

if($check){ ?>
    
       <div class="alert alert-danger text-center" role="alert"><strong>Key Này Vi Phạm, Hãy Mua Key Khác!</strong></div>
       
    <?php 
    echo '<meta http-equiv="refresh" content="1;url=">';
} else {
	$tinhtien = 600 * $amount;
	if($user['money'] < $tinhtien){ ?>
	
       <div class="alert alert-danger text-center" role="alert"><strong>Bạn Không Đủ <?=$tinhtien;?> Để Mua</strong></div>
       
       
    <?php echo '<meta http-equiv="refresh" content="1;url=">';
    } else if($amount < 1) { ?>
    
       <div class="alert alert-danger text-center" role="alert"><strong>Mua Tối Thiểu 1 Ngày Trở Lên!</strong></div>
       
<?php 
echo '<meta http-equiv="refresh" content="1;url=">';
} else {
$ketnoi->query("UPDATE `users` SET `money` = `money` - '$tinhtien' WHERE `username` = '$username'"); # trừ tiền
     
$ketnoi->query("UPDATE `users` SET `tong_tru` = `tong_tru` + '$tinhtien' WHERE `username` = '$username'"); # cộng đã tiêu
      
$time = $time_create;

$timee = date('h:i d-m-Y');

$ngay_mua = date('h:i:s');
$ngay_mua1 = date('d-m-Y');

			
$han_key = date_end($amout=$amount); #ngày hết hạn
		   
$ketnoi->query("INSERT INTO `key_log` SET `nguoi_mua` = '$name', `key` = '$key_code', `ngay_mua` = '$ngay_mua $ngay_mua1', `ngay_het_han` = '$ngay_mua $han_key', `username` = '$username', `ip` = '$ip' "); # tạo key
			
$ketnoi->query("INSERT INTO `lich_su_mua`(`username`, `key`, `ngay`, `ngay_mua`, `ngay_het_han`, `time`) VALUES ('$username', '$key_code','$amount','$ngay_mua $ngay_mua1','$ngay_mua $han_key','$time')"); # lưu vào lịch sử
	 ?>
    
       <div class="alert alert-success text-center" role="alert"><strong>Mua Key Thành Công, Chờ 1s Load</strong></div>
       
    <?php echo '<meta http-equiv="refresh" content="1;url=">'; }
}
}
	?>
          
         <form action="" method="POST">
          <div class="form-group">
		  <label for="" style="color:green;"> Nhập Tên Người Mua :</label>
		  <input type="text" name="name" class="form-control bs-tooltip" placeholder="Nhập Tên Người Mua" required>
		</div>
<div class="form-group">
		  <label for="" style="color:green;"> Nhập Key Muốn Tạo:</label>
		  <input type="text" name="key_code" class="form-control bs-tooltip" placeholder="Nhập Key Muốn Tạo" required>
		</div>
        <div class="form-group">
		  <label for="" style="color:green;"> Số Ngày :</label>
		  <input type="number" name="amount" id="amount" class="form-control bs-tooltip" placeholder="Nhập số ngày" onkeyup="tinhtien();" required>
		</div>
		<div class="form-group"><label class="active">Tổng thanh toán: <font color="red"><b id="ketqua">0</b></font> Nghìn</label></div>

		<div class="form-group text-center">
		    <button type="submit" class="btn btn-success btn-success" name="mua_key"><i class="fa fa-shopping-cart"></i> <a for="" style="color:white;"> Mua Ngay</a></button>
        </div>
        </form>
        
<script src="/assets/js/binh1.js"></script>
       <script type="text/javascript">
          $('#amount').keyup(function() {
          var amount = $("#amount").val();
          var service = 600;
          var ketquaz = service * amount;
          var ketqua = ketquaz - ketquaz * 0 / 100;
          $('#ketqua').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g,'$1,'));
          });
</script>

          
          
                        </div>
                    </div>
            </div>
        </div>
    </div>
        <!-- Page end  -->
    </div>
      </div>
    </div>
    <!-- Wrapper End-->
<?php require_once('config/foot.php'); ?>