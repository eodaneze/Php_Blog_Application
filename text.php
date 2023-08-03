<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<script src="./tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    // Initialize TinyMCE
    tinymce.init({
      selector: '#content',
      height: 300,
      plugins: 'advlist autolink lists link image charmap print preview anchor',
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image ',
      menubar: 'file edit view insert format tools table help'
    });
  </script>
<body>
    <form action="" method="post">
         <div>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
         </div>
         <div>
            <button>Submit</button>
         </div>
    </form>

    <?php
     require_once('./includes/connection.php');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $content = $_REQUEST['content'];
       if($content == ""){
         echo "content filed is required";
       }else{
         $sql = "INSERT INTO  text(content)VALUES('$content')";
         $result = mysqli_query($conn, $sql);
         if($result){
            ?><div><?=$content?></div><?php
         }
       }
    }
    ?>
</body>
</html>