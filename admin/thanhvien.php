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
<?php require_once('../config/nav.php'); ?>
      </div>      <div class="content-page">

        <div class="row">
						
					</div>
					<div class="col-md-8">
					    <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="card-title">Quản Lý Thành Viên</h4>
                 
                  <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th>username</th>
                                <th>password</th>
                                <th>tổng nạp</th>
                                <th>số dư</th>
                                <th>thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$i = 1;
$querryy = $ketnoi->query("SELECT * FROM `users` ORDER BY id desc");
while ($row = mysqli_fetch_array($querryy)) { ?>
                            <tr>
                                <td><?=$row['username'];?></td>
                                <td><?=$row['password'];?></td>
                                <td><?=$row['tong_nap'];?></td>
                                <td><?=$row['money'];?></td>
                                <td><a type="button" class="btn btn-default"
                                        href="edit-thanh-vien.php?username=<?=$row["username"];?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </a></td>
                                
                            </tr>

                            <?php 
$i++; 
}?>
                        </tbody>
                    </table>
                   </div>


    <!-- Wrapper End-->
<?php require_once('../config/foot.php'); ?>