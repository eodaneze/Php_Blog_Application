<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

?>

<main class="main" id="main">
      <div class="pagetitle">
        
          <h1>Add Blog | StandBlog</h1>
        </div>
        <form action="./includes/addBlog.php" enctype="multipart/form-data" method="post" class=" bg-white border p-3">
           <div class="row">
              <div class="col-lg-6 mb-3">
                  <label class="fw-bold">Blog Title</label>
                  <input name="title" type="text" class="form-control">
              </div>
              <div class="col-lg-6 mb-3">
                  <label class="fw-bold">Blog Category</label>
                  <select name="cat" class="form-control">
                     <option>--select category--</option>
                     <?php 
                            $sql = "SELECT * FROM category";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $catName = $row['category_name'];

                                ?>


                                    <option><?=$catName?></option>
                                <?php
                            }
                     
                     ?>
                     
                  </select>
              </div>
              <div class="col-lg-6 mb-3">
                  <label class="fw-bold">Blog Tags</label>
                  <select name="tags" class="form-control">
                     <option>--select Tags--</option>
                     <option>Education</option>
                     <option>Motivation</option>
                  </select>
              </div>
              <div class="col-lg-6 mb-3">
                  <label class="fw-bold">Blog Image</label>
                  <input name="file" type="file" class="form-control">
              </div>
              <div class="col-lg-12 mb-3">
                  <label class="fw-bold">Blog Details</label>
                  <textarea name="details" id="" cols="30" rows="10" class="form-control"></textarea>
              </div>
              
           </div>
           <button class="btn btn-secondary" name="add">Add Blog</button>
        </form>
</main>
 

<?php require_once('./alertify.php');
  require_once("./footer.php")

?>