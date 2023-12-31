<?php
require_once('./includes/connection.php');
 require_once('./home_header.php');
 require_once('./home_navbar.php');
 require_once('./includes/function.php');



 $sql = 'SELECT * FROM  posts';
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $post_id = $row['post_id'];
 
// display the count of comments
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
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          <div class="item">
            <img src="assets/images/banner-item-01.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Fashion</span>
                </div>
                <a href="post-details.html"><h4>Morbi dapibus condimentum</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 12, 2020</a></li>
                  <li><a href="#">12 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/banner-item-02.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Nature</span>
                </div>
                <a href="post-details.html"><h4>Donec porttitor augue at velit</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 14, 2020</a></li>
                  <li><a href="#">24 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/banner-item-03.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Lifestyle</span>
                </div>
                <a href="post-details.html"><h4>Best HTML Templates on TemplateMo</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 16, 2020</a></li>
                  <li><a href="#">36 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/banner-item-04.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Fashion</span>
                </div>
                <a href="post-details.html"><h4>Responsive and Mobile Ready Layouts</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 18, 2020</a></li>
                  <li><a href="#">48 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/banner-item-05.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Nature</span>
                </div>
                <a href="post-details.html"><h4>Cras congue sed augue id ullamcorper</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 24, 2020</a></li>
                  <li><a href="#">64 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/banner-item-06.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Lifestyle</span>
                </div>
                <a href="post-details.html"><h4>Suspendisse nec aliquet ligula</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 26, 2020</a></li>
                  <li><a href="#">72 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <?php
                    $sql = 'SELECT * FROM  posts ORDER BY createddate DESC';
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                       $title = $row['title'];
                       $cat = $row['category'];
                       $pic = $row['blog_image'];
                       $details = $row['details'];
                       $author = $row['author'];
                       $getFirstName = explode(' ', $author);
                       $firstName = $getFirstName[0];
                       $id = $row['post_id'];
                       $createdate = $row['createddate'];
                       $time_ago = time_ago($createdate);
                       $dateString = $createdate;
                       $day = date('d', strtotime($dateString)); // Output: 03
                       $month = date('F', strtotime($dateString)); // Output: August
                       $year = date('Y', strtotime($dateString)); // Output: 2023

                       
                       $date = "${month} ${day}, ${year}";

                          // Define the maximum length you want to display
                        $maxDisplayLength = 400;

                        $excerpt = substr($details, 0, $maxDisplayLength);
                          // Check if the extracted text needs to be truncated to preserve whole words
                          if (strlen($details) > $maxDisplayLength) {
                            $lastSpacePos = strrpos($excerpt, ' ');
                            $excerpt = substr($excerpt, 0, $lastSpacePos) . '...';
                        }
                          
                       ?>
                          <div class="col-lg-12">
                              <div class="blog-post">
                                <div class="blog-thumb">
                                  <img src="./includes/blogImg/<?=$pic?>" alt="">
                                </div>
                                <div class="down-content" style="border: 0;">
                                  <span><?=$cat?></span>
                                  <a href="post-details.php?id=<?=$id?>&category=<?=urlencode($cat)?>"><h4><?=$title?></h4></a>
                                  <ul class="post-info">
                                    <li><a href="#"><?=$firstName?></a></li>
                                    <li><a href="#"><?=$date?> | <?=$time_ago?></a></li>
                                    <li><a href="#"><?=$getCount?> Comments</a></li>
                                  </ul>
                                  <p style="border: none; padding: 0; margin: 0"><?=$excerpt ?></p>
                                  <div class="post-options">
                                    <div class="row">
                                      <div class="col-6">
                                        <ul class="post-tags">
                                          <li><i class="fa fa-tags"></i></li>
                                          <li><a href="#">Beauty</a>,</li>
                                          <li><a href="#">Nature</a></li>
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
                       <?php
                    }
                ?>
                
                
                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.html">View All Posts</a>
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
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                      <?php
                         $sql2 = "SELECT * FROM posts";
                         $result = mysqli_query($conn, $sql);
                         if(mysqli_num_rows($result) > 0){
                          
                           $sql = "SELECT * FROM posts WHERE category = '$cat'  ORDER BY createddate DESC";
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
                         }else{
                            ?>No recent blog yet!!<?php
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
                          <?php 
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $catName = $row['category_name'];

                                    ?>


                                        <li><a href="#">- <?=$catName?></a></li>
                                    <?php
                                }
                        
                        ?>
                        
                       
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
                    
                 | Developed by<a rel="nofollow" href="https://github.com/eodaneze" target="_parent"> Dev_Daniels</a></p>
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
</html>