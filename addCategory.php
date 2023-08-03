<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

?>

<main class="main" id="main">
      <div class="pagetitle">
            <h1>Add category</h1>
        </div>
      <form action="./includes/addCategory.php" method="post">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <label>Category Name</label>
                <input name="name" type="text" class="form-control">
            </div>
        </div>
        <button class="btn btn-secondary" name="add">Add category</button>
      </form>
</main>
<?php 
  require_once('./alertify.php');
  require_once('./footer.php')
?>