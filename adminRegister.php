<?php
 require_once('./home_header.php')

?>
<style>
    .form-content{
         width: 35%;
    }
</style>
<body style="background-color: #EC883E;">
     <div class="all-form d-flex align-items-center justify-content-center" style="height: 80vh;">
         <div class="form-content bg-white p-3">
            <div class="text-center">
                 <h4>Admin Register</h4>
            </div>
              <div>
              <form action="./includes/adminRegister.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-lg-12 mb-3">
                        <label>Name</label>
                           <input type="text" name="name" class="form-control">
                      </div>

                      <div class="col-lg-12 mb-3">
                        <label>Email</label>
                           <input type="text" name="email" class="form-control">
                      </div>
                      <div class="col-lg-12 mb-3">
                        <label>Password</label>
                           <input type="password" name="password" class="form-control">
                      </div>
                      <div class="col-lg-12 mb-3">
                        <label>Profile</label>
                           <input name='file' type="file" class="form-control">
                      </div>
                  </div>
                  <button class="btn" name="register">Register</button>
                  <div class="text-center">
                      <p>Already have an account? <a href="./adminLogin.php">Login</a></p>
                  </div>
              </form>
              </div>
         </div>
     </div> 
</body>

<?php

 require_once('./alertify.php')
?>
</html>