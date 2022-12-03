<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php 

    require('menu.php');

    ?>

<div align="center">
        
        <table border="9">
            <tr>
                <th>DEPARTMENT NAME</th>
                <th>DESCRIPTION</th>
            </tr>
            
            <?php
            
            define('DB','department.txt');

            $loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
            $i = 0;

            foreach($loadDB as $data){

                if($i==0){
                   
                }else{

                    $expData = explode('|', $data);
                    $Id = $expData[0];
                    $Name = $expData[1];
                    $Description = $expData[2];
                    
            ?>
            
            <tr>
                <td><?=$Name; ?></td>
                <td><?=$Description; ?></td>
            </tr>
            
            <?php
            
                }

            $i++;

            }

            ?>
            
        </table>
    
    </div>

</body>
</html>