<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

?>

<style>
    p span{
        display: block;
    }
</style>
<main class="main" id="main">
      <div class="pagetitle">
        
          <h1>View Blog | StandBlog</h1>
        </div>
     <div class="row">
        <?php
            $sql = "SELECT * FROM posts";
            $result = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_assoc($result)) {
                 $title = $row['title'];
                 $pic = $row['blog_image'];
                 $id = $row['post_id'];

                 ?>
                    <div class="col-lg-3">
                             <img style="height: 200px;" class="img-fluid" src="./includes/blogImg/<?=$pic?>" alt="">
                         <div class="text-center">
                            <a href="./singleBlog.php"><h5><?=$title?></h5></a>
                            <p>
                                <span>Category: Artificial Intelligence</span>
                                <span>Tag: Educational</span>
                             </p>
                            <a href=""><i class="fa fa-edit"></i></a>
                            <a href="./includes/delete.php?id=<?=$id?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>

                <?php
            }

         ?>
        
         
     </div>
</main>
 

<?php require_once('./alertify.php');
  require_once("./footer.php")

?>