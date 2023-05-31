<?php require_once('../config/head.php'); ?>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                  <div class="card auth-card">
                     <div class="card-body p-0">
                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-7 align-self-center">
                              <div class="p-3">
                                 <h2 class="mb-2">Đăng Nhập</h2>
                                 <?php 
if(isset($_POST['dangnhap'])) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    
    $query = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
    
    if($query['bannd'] == 1) { ?>
<script type="text/javascript">
cuteToast({
type: "error",
message: "Tài khoản Của Bạn Đã Bị Khóa !",
timer: 5000
});
</script> 
    <?php } else if ($username == "" || $password =="") { ?>
<script type="text/javascript">
cuteToast({
type: "error",
message: "Vui Lòng Nhập Đầy Đủ Thông Tin !",
timer: 5000
});
</script> 
    <?php } else if(empty($query)) { ?>
<script type="text/javascript">
cuteToast({
type: "error",
message: "Tài Khoản Không Tồn Tại !",
timer: 5000
});
</script>
    <?php } else if($password != $query['password']) { ?>
<script type="text/javascript">
cuteToast({
type: "error",
message: "Mật Khẩu Không Chính Xác !",
timer: 5000
});
</script>
    <?php } else {
        
        $_SESSION['username'] = $username;

        ?>
<script type="text/javascript">
cuteToast({
type: "success",
message: "Đăng Nhập Thành Công",
timer: 5000
});
</script>
        <?php echo '<meta http-equiv="refresh" content="2;url=/">';
       }
}
?>
                            
                
                <form action="" method="POST">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" name="username" type="text" placeholder=" ">
                                             <label>Tài Khoản</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" name="password" type="text" placeholder=" ">
                                             <label>Mật Khẩu</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="custom-control custom-checkbox mb-3">
                                             <input type="checkbox" class="custom-control-input" id="customCheck1">
                                             <label class="custom-control-label control-label-1" for="customCheck1">Lưu Lại</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <a href="auth-recoverpw.html" class="text-primary float-right">Quên mật khẩu ?</a>
                                       </div>
                                    </div>
                                    <button type="dangnhap" name="dangnhap" class="btn btn-primary">Đăng Nhập</button>
                                    <p class="mt-3">
                                       Bạn Chưa Có Tài Khoản ? <a href="/signup" class="text-primary">Đăng Ký</a>
                                    </p>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="../assets/images/login/01.png" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="../assets/js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="../assets/js/chart-custom.js"></script>
    
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
  </body>
</html>