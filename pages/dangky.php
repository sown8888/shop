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
                                 <h2 class="mb-2">Đăng Ký</h2>
                                 <?php 
if(isset($_POST['dangky'])) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $email = addslashes($_POST['email']);
    
   $query_username = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ");
    
    if ($username == "" || $password == "" || $email == "") { ?>
    
       <script type="text/javascript">
cuteToast({
type: "error",
message: "Vui Lòng Nhập Đầy Đủ Thông Tin !",
timer: 5000
});
</script>  
       
    <?php } else if($query_username->num_rows != 0) { ?>
    
       <script type="text/javascript">
cuteToast({
type: "error",
message: "Tài Khoản Đã Tồn Tại !",
timer: 5000
});
</script>
       
    <?php } else {
        
        $_SESSION['username'] = $username;
        
        $create = $ketnoi->query("INSERT INTO `users` SET 
        `password` = '$password',
        `username` = '$username',
        `email` = '$email',
        `tong_nap` = '0',
        `money` = '0',
        `tong_tru` = '0',
        `bannd` = '0',
        `level` = '0',
        `time` = '$time' ");
        
        ?>
<script type="text/javascript">
cuteToast({
type: "success",
message: "Đăng Ký Thành Công",
timer: 5000
});
</script>
        <?php
        
        echo '<meta http-equiv="refresh" content="2;url=/">';
       }
}
?>
        <form action="" method="POST">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" name="username" placeholder=" ">
                                             <label>Tài Khoản</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" name="password" placeholder=" ">
                                             <label>Mật Khẩu</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" name="email" type="email" placeholder=" ">
                                             <label>Email</label>
                                          </div>
                                       </div>
                                    </div>
                                    <button type="dangky" name="dangky" class="btn btn-primary">Đăng Ký</button>
                                    <p class="mt-3">
                                       Bạn Đã Có Tài Khoản ? <a href="/login" class="text-primary">Đăng Nhập</a>
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