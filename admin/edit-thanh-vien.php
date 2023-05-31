<?php require_once('../config/head.php'); ?>
<title>Trang Chủ</title>
<?php
if(!$_SESSION['username']) {
die('<script type="text/javascript">setTimeout(function(){ location.href = "/login" },0);</script>');
}
if($user['level'] !== 'admin') {
die('<script type="text/javascript">setTimeout(function(){ location.href = "/" },0);</script>');
}
?>
<?php
if (isset($_GET['username'])) {
    $usernamer = $_GET['username'];
}
$AADDCC = mysqli_query($ketnoi,"SELECT * FROM `users` WHERE `username` = '".$usernamer."' ");
while ($row = mysqli_fetch_array($AADDCC) ) 
{
  if (isset($_POST["btn_submit"])) {

   
    $money = $_POST["money"]; 
    $banned = $_POST["banned"]; 
    $level = $_POST["level"];


    mysqli_query($ketnoi,"UPDATE `users` SET 
    `bannd` = '$banned',
    `level`= '$level',
    `money` = '$money',
    `tong_nap` = '$money' WHERE `username` = '$usernamer' ");

    mysqli_query($ketnoi,"INSERT INTO `log` SET 
              `content`= 'Thay đổi thông tin tài khoản bởi Admin ',
              `time` = '$time',
              `username`= '".$row['username']."' ");

    echo '<script type="text/javascript">setTimeout(function(){ location.href = "" },0);</script>';
      
  }

?>
<?php require_once('../config/nav.php'); ?>
      </div>      <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
						
					</div>
				
					<div class="col-md-4">
						
					</div>
					<div class="col-md-8">
					    <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="card-title">Quản Lý Thành Viên</h4>
                 
                  <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" value="<?=$row['username'];?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số Dư</label>
                    <input type="text" class="form-control" name="money" value="<?=$row['money'];?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngày Đăng Ký</label>
                    <input type="text" class="form-control" value="<?=$row['time'];?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tổng Nạp</label>
                    <input type="text" class="form-control" value="<?=$row['tong_nap'];?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tổng Tiêu</label>
                    <input type="text" class="form-control" value="<?=$row['tong_tru'];?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banned</label>
                    <select class="custom-select" name="banned">
                       <option value="<?=$row['bannd'];?>">
                      <?php
                      if($row['bannd'] == "0"){ echo 'Hoạt động';}
                      if($row['bannd'] == "1"){ echo 'Banned';}
                      ?>  
                      </option> 
                          <option value="0">Mở Khóa</option>
                          <option value="1">Khóa</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rank (admin = Quản Trị Website)</label>
                    <input type="text" class="form-control" name="level" value="<?=$row['level'];?>">
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                <a href="thanhvien.php" class="btn btn-primary">Quay Lại</a>  <button type="submit" name="btn_submit" class="btn btn-primary">Lưu Lại</button>
                </div>
              </form>
                   
                   
                   
                </section>
                     <?php } ?>            
                   </div>
               </div>

    <!-- Wrapper End-->
<?php require_once('../config/foot.php'); ?>