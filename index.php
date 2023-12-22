<?php
include("header.php");
include("filesLogic.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
    <title>Upload files</title>
</head>
<body>
    <?php echo $menu; ?>

    <div class="container">
           <form action="index.php" method="POST" enctype="multipart/form-data">
              <h3>Upload File</h3>
              <input type="file" name="myfile"><br>
              <button type="submit" name="save">Upload</button>
           </form>
   </div>
    
</body>
</html>