<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE post_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cat = $row['category'];
    $title = $row['title'];
    $details = $row['details'];
    $pic = $row['blog_image'];

    // Define the maximum length you want to display
    $maxDisplayLength = 200;

    $excerpt = substr($details, 0, $maxDisplayLength);

                // Check if the extracted text needs to be truncated to preserve whole words
            if (strlen($details) > $maxDisplayLength) {
                $lastSpacePos = strrpos($excerpt, ' ');
                $excerpt = substr($excerpt, 0, $lastSpacePos) . '...';
            }

  }

  if(isset($_GET['cat'])){
    $cat = $_GET['cat'];
    
  }

?>
<style>
     h5 span{
        display: block;
        line-height: 2rem;
     }
     h5 span:first-child{
        color: #152983;
        font-family: 'Poppins', sans-serif;
     }
     h5 span:last-child{
        font-family: 'Roboto', sans-serif;
        color: black;
     }
</style>

<main class="main" id="main">
      <div class="pagetitle">
        
          <h1>Single Blog</h1>
        </div>
    
        <div class="row">
             <div class="col-lg-8">
                  <img src="./includes/blogImg/<?=$pic?>" alt="">
                  <div class="mt-4">
                    <h5>
                        <span class="text-uppercase"><?=$cat?></span>
                        <span><?=$title?></span>
                    </h5>
                    <p style="font-family: 'Times New Roman', Times, serif;"><?=$details?></p>
                  </div>
             </div>
             <div class="col-lg-4">
                  <h4>Related Posts</h4>
                  <?php
                    $sql = "SELECT * FROM posts WHERE category = '$cat' AND NOT post_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $title = $row['title'];
                        
                        ?>
                          <p><?=$title?></p>
                        <?php
                    }
                  ?>
             </div>
        </div>
</main>
 

<?php require_once('./alertify.php');
  require_once("./footer.php")

?>