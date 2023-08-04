<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE post_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $cat = $row['category'];
    $pic = $row['blog_image'];
    $tags = $row['tags'];
    $details = $row['details'];
    $post_id = $row['post_id'];
  }

  
?>

<style>
    p span{
        display: block;
    }
</style>
<script src="./tinymce/js/tinymce/tinymce.min.js"></script>
  <script>
    // Initialize TinyMCE
    tinymce.init({
      selector: '#myTextarea',
      height: 300,
      plugins: 'advlist autolink lists link image charmap print preview anchor',
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image ',
      menubar: 'file edit view insert format tools table help'
    });
  </script>
<main class="main" id="main">
      <div class="pagetitle">
        
          <h1>View Single Blog | StandBlog</h1>
        </div>
     <form action="./includes/editBlog.php" method="post" enctype="multipart/form-data">
         <div class="row  bg-white border p-4 mb-4">
             <div class="col-lg-6 mb-4">
                <label>Title</label>
                 <input type="text" name="title" value="<?=$title?>" class="form-control">
             </div>
             <div class="col-lg-6 mb-4">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option><?=$cat?></option>
                    <?php

                      $sql = "SELECT * FROM category";
                      $result = mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)){
                          $catName = $row['category_name'];

                          ?><option><?=$catName?></option><?php
                      }
                    ?>
                </select>
                 
                 <input type="hidden" name="photo" value="<?=$pic?>">
                 <input type="hidden" name="post_id" value="<?=$post_id?>">
             </div>
             <div class="col-lg-6 mb-4">
                <label>Tags</label>
                 <input name="tags" type="text" value="<?=$tags?>" class="form-control">
             </div>
             <div class="col-lg-6 mb-4">
                <label class="mb-3"><img style="width: 8rem; height: 4rem;" src="./includes/blogImg/<?=$pic?>" alt=""></label>
                 <input type="file" name="file"  class="form-control">
             </div>
             <div class="col-lg-12 mb-4">
                 <label class="fw-bold">Blog Details</label>
                  <textarea id="myTextarea"  name="details" id="" cols="30" rows="10" class="form-control"><?=$details?></textarea>
             </div>
            <div class="col-lg-3">
            <button class="btn btn-secondary" name="update">Update Post</button>
            </div>
         </div>
     </form>
</main>
 

<?php require_once('./alertify.php');
  require_once("./footer.php");

?>