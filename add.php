<?php

require('function.php');

error_reporting(E_ALL);
ini_set('display_errors',1);

$filename = 'department.txt';
$eachlines = file($filename, FILE_IGNORE_NEW_LINES);

if(isset($_POST['sub'])){

    define('DB','emp.txt');
    define('DE','details.txt');

    $loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $total = count($loadDB);
    $id = $total;
    $empid = $id;
    $name = $_POST['name'];
    $age = $_POST['age'];
    $depart = preg_replace('/[0-9]+/', '', $_POST['department']);
    $departStr = preg_replace('/[^a-zA-Z0-9\']/', '',$depart);
    $departint = (int) filter_var($_POST['department'], FILTER_SANITIZE_NUMBER_INT);
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $startdate = date("m-d-Y", strtotime($_POST['sdate']));
    $enddate = date("m-d-Y", strtotime( $_POST['edate']));

    saveTxt(DB,"$id|$name|$age|$depart|$city|$state|$country|$startdate|$enddate".PHP_EOL,'a');
    saveTxt(DE,"$empid|$departint|$startdate|$enddate".PHP_EOL,'a');

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
    <title>Add</title>
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
                <span>Name</span><br/>
                <input name="name" type="text" id="name" autocomplete="off" required><br/>
                <br/>
                <span>Age</span><br/>
                <input name="age" type="number" min="18" max="65" autocomplete="off" required><br/>
                <br/>
                <span>Department : </span>
                <select id="depart" name="department" required>
                    <option selected value="base" disabled="disabled">Select Department</option>
                    <?php 
                    
                    $i=0;
                    
                    foreach($eachlines as $lines){
                        
                        if($i==0){

                        }else{
                            
                            $expData = explode('|', $lines);
                            $Id = $expData[0];
                            $Name = $expData[1];
                            $Details = $expData[2]; 
                            
                    ?>
                    
                    <option value="<?php echo $Id; echo $Name; ?>" required>
                    <?php echo $Name; ?>
                    </option>
                    
                    <?php
                        
                        }
                        
                        $i++;
                    
                    }
                    
                    ?>
                
                </select><br/>
                <br/>
                <span>City</span><br/>
                <input name="city" type="text" required><br/>
                <br/>
                <span>State</span><br/>
                <input name="state" type="text" required><br/>
                <br/>
                <span>Country</span><br/>
                <input name="country" type="text" required><br/>
                <br/>
                <Span>Start Date :</Span>
                <input type="date" name="sdate" id="StartDate" class="StartDate" onchange="startDate()" autocomplete="off" required><br/>
                <br/>
                <Span>End Date  :</Span>
                <input type="date" name="edate" id="EndDate" class="EndDate" onchange="endDate()" required autocomplete="off"><br/>
                <br/>
                <input type="submit" value="Add Data" name="sub" class="sub_btn">
            </form>
        </div>
    
    </div>

<script>

    function startDate(){
        
        var startDate = document.getElementById("StartDate").value;
        var endDate = document.getElementById("EndDate").value;

        if ((Date.parse(startDate) <= Date.parse(endDate))) {
            
            alert("Start date can't greater than End date");
            document.getElementById("EndDate").value = "";
        
        }
    
    }

    function endDate(){
        
        var startDate = document.getElementById("StartDate").value;
        var endDate = document.getElementById("EndDate").value;

        if ((Date.parse(startDate) >= Date.parse(endDate))) {
            
            alert("End date should be greater than Start date");
            document.getElementById("EndDate").value = "";
        
        }
    
    }

</script>
</body>
</html>