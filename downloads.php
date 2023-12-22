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
    <title>Download files</title>
</head>
<body>
    <?php echo $menu ?>

    <table>
        <thead>
            <th>ID</th>
            <th>File Name</th>
            <th>Size (in MB)</th>
            <th>Downloads</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php foreach ($files as $file): ?>    
            <tr>
                <td><?php echo $file['id']; ?></td>
                <td><?php echo $file['name']; ?></td>
                <td><?php echo $file['size']; ?></td>
                <td><?php echo $file['downloads']; ?></td>
                <td><a href="downloads.php?file_id=<?php echo $file['id']?>">Download</a></td>
            </tr>
        <?php endforeach;?>    
        </tbody>
    </table>
    
</body>
</html>