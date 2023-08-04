<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

  
?>
<main class="main" id="main">
    <div class="pagetitle">
        
        <h1>Comments</h1>
    </div>

    <form action="./includes/approve_comment.php" method="post">
    <div class="table-responsive">
        <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>S/N</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Status</th>
                  </tr>
              </thead>
            <tbody>
                 <?php
                        
                 
                      
                        
                        $sql = "SELECT * FROM post_comments";
                        $result = mysqli_query($conn, $sql);
                        $num = 1;
                        while($row = mysqli_fetch_assoc($result)){
                            $name = $row['name'];
                            $email = $row['email'];
                            $comment = $row['comment'];
                            $post_id = $row['post_id'];

                            $sql1 = "SELECT * FROM approved_comments WHERE post_id = '$post_id'";
                             $result1 = mysqli_query($conn, $sql);
                            ?>
                                <tr>
                                     <td><?=$num++?></td>
                                     <td><?=$name?></td>
                                     <td><?=$email?></td>
                                     <td><?=$comment?></td>
                                     <input type="hidden" name="post_id" value="<?=$post_id?>">
                                     <td><?=mysqli_num_rows($result1) == 0 ? '<button class="btn btn-success">Approved</button>' : '<button class="btn btn-secondary" name="approve">Pending</button>'?></td>
                                </tr>

                            <?php
                        }
                    ?>
            </tbody>

        </table>
    </div>
    </form>
</main>


<?php require_once('./footer.php') ?>