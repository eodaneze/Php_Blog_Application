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
              <form action="">
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
                           <input type="text" name="password" class="form-control">
                      </div>
                      <div class="col-lg-12 mb-3">
                        <label>Profile</label>
                           <input type="file" name="password" class="form-control">
                      </div>
                  </div>
                  <button class="btn">Register</button>
              </form>
              </div>
         </div>
     </div> 
</body>
</html>