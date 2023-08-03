<!DOCTYPE html>
<html>
<head>
  <title>Rich Text Editor Insertion</title>
  <script src="./tinymce/js/tinymce/tinymce.min.js"></script>
  <script>
    // Initialize TinyMCE
    tinymce.init({
      selector: '#myTextarea',
      height: 300,
      plugins: 'advlist autolink lists link image charmap print preview anchor',
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',
      menubar: 'file edit view insert format tools table help'
    });
  </script>
</head>
<body>
  <h1>Rich Text Editor Insertion</h1>
  <form action="insert.php" method="post">
    <textarea id="myTextarea" name="content"></textarea>
    <input type="submit" value="Submit">
  </form>
</body>
</html>