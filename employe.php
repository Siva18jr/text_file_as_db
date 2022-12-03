<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php

    require('menu.php');

    ?>
    
    <div style="padding:20px;" align="center">
    <a href="find.php" class="pg_btn">Find</a>
    </div>

    <div align="center">
        
        <table border="8">
            <tr>
                <th>ACTIONS</th>
                <th>EMPLOYEE ID</th>
                <th>EMPLOYEE</th>
                <th>AGE</th>
                <th>DEPARTMENT</th>
                <th>CITY</th>
                <th>STATE</th>
                <th>COUNTRY</th>
                <th>START DATE</th>
                <th>END DATE</th>
            </tr>
            
            <?php
            
            define('DB','emp.txt');

            $loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
            $i = 0;

            foreach($loadDB as $data){

                if($i==0){
                   
                }else{
                    
                    $expData = explode('|', $data);
                    $Id = $expData[0];
                    $Name = $expData[1];
                    $Age = $expData[2];
                    $Depart = $expData[3];
                    $City = $expData[4];
                    $State = $expData[5];
                    $Country = $expData[6];
                    $StartDate = $expData[7];
                    $EndDate = $expData[8];
                    
            ?>
            
            <tr>
                <td><a href="update.php?id=<?=$Id;?>">Edit</a></td>
                <td><?=$Id ?></td>
                <td><?=$Name; ?></td>
                <td><?=$Age; ?></td>
                <td><?=$Depart; ?></td>
                <td><?=$City; ?></td>
                <td><?=$State; ?></td>
                <td><?=$Country; ?></td>
                <td><?=$StartDate; ?></td>
                <td><?=$EndDate; ?></td>
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