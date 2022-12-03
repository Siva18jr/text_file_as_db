<?php

require('function.php');

if(isset($_POST['submit'])){

    define('DB','department.txt');

    $loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $total = count($loadDB);
    $id = $total;
    $name = $_POST['dep_name'];
    $description = $_POST['description'];

    saveTxt(DB,"$id|$name|$description".PHP_EOL,'a');
    header('location:index.php');
    exit;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php 

    require('menu.php');

    ?>

    <div align="center" class="add_box">
        
        <div align="justify" class="add_content">
            <form action="#" method="POST">
                <span>Department Name : </span>
                <input name="dep_name" type="text" autocomplete="off" required><br/>
                <br>
                <span>Description : </span>
                <input name="description" type="text" autocomplete="off" required>
                <br/>
                <br>
                <input type="submit" value="Add" name="submit" class="sub_btn">
            </form>
        </div>
    
    </div>
    
</body>
</html>