<?php
$conn = mysqli_connect('localhost','root',,'management_file');
$sql_query = "SELECT *
              FROM files";
$query_result = mysqli_query($conn,$sql_query);
$files = mysqli_fetch_all($query_result,MYSQLI_ASSOC);

//Upload files
if(isset($_POST['save'])){
    $filename = $_FILES['myfile']['name'];
    $destination = 'uploads/' . $filename;
    $extension = pathinfo($filename ,PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
   
    if(!in_array($extension,['zip','pdf','docx'])){
        echo "You file extension must be .zip, .pdf or .docx";
    }elseif($_FILES['myfile']['size'] > 1000000){
        echo "File too large";
    }else{
        if(move_uploaded_file($file,$destination)){
            $query_insert = "INSERT INTO files(`name`,`size`,`downloads`)
                             VALUES ('$filename',$size,0)";
               if(mysqli_query($conn,$query_insert)){
                   echo "File uploaded successfully";
               }              
        }else{
            echo "Failed to upload file.";
        }
    }
}

//Downloads files
if(isset($_GET['file_id'])){
   $id = $_GET['file_id'];
   $query_file = "SELECT *
                  FROM files
                  WHERE id = $id ";
   $result_file = mysqli_query($conn,$query_file);
   $file = mysqli_fetch_assoc($result_file);
   $filePath = "uploads/".$file['name'];
  
   if(file_exists($filePath)){
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filePath));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('uploads/' . $file['name']));
    ob_clean();
    flush();
    readfile('uploads/'.$file['name']);
    $newCount = $file['downloads'] + 1;
    $queryCount = "UPDATE files
                   SET downloads = $newCount
                   WHERE id=$id";
    mysqli_query($conn,$queryCount);
     exit;
   }
}
