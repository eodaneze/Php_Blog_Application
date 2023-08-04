<?php
  require_once('./includes/connection.php');
 require_once('./home_header.php');
 require_once('./home_navbar.php');

 if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM posts WHERE post_id = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $cat = $row['category'];
  $title = $row['title'];
  $details = $row['details'];
  $pic = $row['blog_image'];
  $createdate = $row['createddate'];
  $post_id = $row['post_id'];

  $dateString = $createdate;
  $day = date('d', strtotime($dateString)); // Output: 03
  $month = date('F', strtotime($dateString)); // Output: August
  $year = date('Y', strtotime($dateString)); // Output: 2023
  
  $date = "${month} ${day}, ${year}";
  
 }

 if(isset($_GET['category'])){
  $cat = $_GET['category'];
  
}
$sql = "SELECT COUNT(*) AS comment_count FROM post_comments WHERE post_id = '$post_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$getCount = $row['comment_count'];
?>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
   

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Post Details</h4>
                <h2>Single blog post</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->

    


    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="./includes/blogImg/<?=$pic?>" alt="">
                    </div>
                    <div class="down-content">
                      <span><?=$cat?></span>
                      <a href="post-details.html"><h4><?=$title?></h4></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#"><?=$date?></a></li>
                        <li><a href="#"><?=mysqli_num_rows($result) == 0 ? '0 comment' : $getCount?> Comment</a></li>
                      </ul>
                      <p><?=$details?></p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Best Templates</a>,</li>
                              <li><a href="#">TemplateMo</a></li>
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      
                    </div>
                    <div class="content">
                      <ul>
                          <?php

                              $sql = "SELECT * FROM post_comments WHERE post_id = $post_id ORDER BY created_at DESC";
                              $result = mysqli_query($conn, $sql);
                              if($result && mysqli_num_rows($result) > 0){
                                  echo "<h2>Comments</h2>";

                                  while($row = mysqli_fetch_assoc($result)){
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $getName = explode('@', $email);
                                    $getName2 = $getName[0];
                                    // echo $getName;
                                    // die();
                                    $comment = $row['comment'];
                                    $created_at = $row['created_at'];
                                    $dateString = $created_at;
                                    $day = date('d', strtotime($dateString)); // Output: 03
                                    $month = date('F', strtotime($dateString)); // Output: August
                                    $year = date('Y', strtotime($dateString)); // Output: 2023
                                    
                                    $date = "${month} ${day}, ${year}";
                                      ?>
                                            <li>
                                              <div class="author-thumb">
                                                <img src="assets/images/comment-author-01.jpg" alt="">
                                              </div>
                                              <div class="right-content">
                                                <h4><?=ucfirst($getName2)?><span><?=$date?></span></h4>
                                                <p><?=$comment?></p>
                                              </div>
                                            </li>
                                      <?php
                                  }
                              }else{
                                echo "<strong>No comments yet.</strong>";
                              }
                          ?>
                            
                            
                      
                       
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>Your comment</h2>
                    </div>
                    <div class="content">
                      <form id="comment" action="./includes/comment.php" method="post">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your name" >
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Your email">
                              <input type="hidden" name="post_id" value="<?=$row['post_id']?>">
                            </fieldset>
                          </div>
                          
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="message" rows="6" id="message" placeholder="Type your comment"></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button name="submit" class="main-button">Submit</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Related Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                           <?php
                                $sql = "SELECT * FROM posts WHERE category = '$cat' AND NOT post_id = '$id'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $title = $row['title'];
                                   
                                    ?>
                                      <li>
                                          <a href="post-details.html">
                                            <h5><?=$title?></h5>
                                            <span><?=$date?></span>
                                          </a>
                                       </li>
                                    <?php
                                }
                            ?>
                          
                       
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">- Nature Lifestyle</a></li>
                        <li><a href="#">- Awesome Layouts</a></li>
                        <li><a href="#">- Creative Ideas</a></li>
                        <li><a href="#">- Responsive Templates</a></li>
                        <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                        <li><a href="#">- Creative &amp; Unique</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">PSD</a></li>
                        <li><a href="#">Responsive</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Behance</a></li>
              <li><a href="#">Linkedin</a></li>
              <li><a href="#">Dribbble</a></li>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">
              <p>Copyright 2020 Stand Blog Co.
                    
                 | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>


  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
    <?php 
       if(isset($_SESSION['error'])){
          ?>alertify.set('notifier', 'position', 'bottom-right');
    alertify.error('<?=$_SESSION['error']?>');
    <?php
          unset($_SESSION['error']);
       }elseif(isset($_SESSION['success'])){
                ?>
    alertify.set('notifier', 'position', 'bottom-right');
    alertify.success('<?=$_SESSION['success']?>');
    <?php
        unset($_SESSION['success']);
       }
     ?>
    </script>
</html>
