<?php

require('function.php');

error_reporting(E_ALL);
ini_set('display_errors',1);

$filename = 'department.txt';
$eachlines = file($filename, FILE_IGNORE_NEW_LINES);

if(isset($_POST['sub'])){

    define('DB','emp.txt');
    define('DD','details.txt');

    if(!file_exists(DB)){

        saveTxt(DB,"$id|$name|$age|$departStr|$city|$state|$country|$startdate|$enddate".PHP_EOL,'a');

    }

    if(!file_exists(DD)){

        saveTxt(DD,"$empid|$departint|$startdate|$enddate".PHP_EOL,'a');

    }
    
    $id = $_GET['id'];
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
    $enddate = $_POST['edate'];
    $finaldata = update($_GET['id']);
    $finaldata1 = updated($_GET['id']);
    $content = str_replace($finaldata,"$id|$name|$age|$departStr|$city|$state|$country|$startdate|$enddate", file_get_contents(DB));
    saveTxt(DD,"$empid|$departint|$startdate|$enddate".PHP_EOL,'a');

    saveTxt(DB, $content,'w');
    header('location:employe.php');
    exit;

}

if(!empty($_GET['id'])){

    $loadEdit = update($_GET['id']);
    $explEdit = explode('|', $loadEdit);
    $name = $explEdit[1];
    $age = $explEdit[2];
    $depart = $explEdit[3];
    $city = $explEdit[4];
    $state = $explEdit[5];
    $country = $explEdit[6];
    $startdate = $explEdit[7];
    $enddate = $explEdit[8];

}

if(!empty($_GET['id'])){

    $loaddEdit = updated($_GET['id']);
    $expl1Edit = explode('|', $loaddEdit);
    $dep_id = $expl1Edit[1];

}

function update($id){

    $db = 'emp.txt';
    $loadDB = @file($db, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach($loadDB as $data){

        $exp = explode('|',$data);
        $myid = $exp[0];

        if($myid==$id){
            
            $out = $data;
            break;
        
        }else{

            $out = null;

        }

    }

return $out;

}

function updated($id){

    $dd = 'details.txt';
    $loadDD = @file($dd, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach($loadDD as $datas){

        $expo = explode('|',$datas);
        $myidd = $expo[0];

        if($myidd==$id){
            
            $outs = $datas;
            break;
        
        }else{

            $outs = null;

        }

    }

return $outs;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php 

    require('menu.php');

    ?>

    <div align="right">
        <a href="employe.php" class="pg_btn">Back</a>
    </div>
    <br>

    <div align="center" class="add_box">
        
        <div align="justify" class="add_content">
            <form action="#" method="POST">
                <span>Name</span><br/>
                <input name="name" type="text" value="<?=$name; ?>" readonly><br/>
                <br>
                <span>Age</span><br/>
                <input name="age" type="number" min="18" max="65" value="<?=$age; ?>" readonly><br/>
                <br>
                <span>Department : </span>
                <select id="depart" name="department" required>
                    <option selected value="<?php echo $dep_id; echo $depart ?>"  disabled="disabled">
                    <?php 
                    
                    echo $depart; 
                    
                    ?></option>
                    
                    <?php
                    
                    $i=0;
                    
                    foreach($eachlines as $lines){
                        
                        if($i==0){

                        }else{
                            
                            $expData = explode('|', $lines);
                            $Id = $expData[0];
                            $Name = $expData[1];
                            $Details = $expData[2]; 
                            
                            if($dep_id == $Id){
                                
                                $em = "";
                            
                            }else{
                                
                        ?>
                    
                        <option value="<?php echo "(". $Id .")". $Name; ?>" ><?php echo  $Name; ?></option>
                    
                    <?php
                        
                            }
                        
                        }
                        
                        $i++;
                    
                    }
                    
                    ?>
                    
                </select><br>
                <br>
                <span>City</span><br/>
                <input name="city" type="text" value="<?=$city; ?>" readonly><br/>
                <br>
                <span>State</span><br/>
                <input name="state" type="text" value="<?=$state; ?>" readonly><br/>
                <br>
                <span>Country</span><br/>
                <input name="country" type="text" value="<?=$country; ?>" readonly>
                <br/><br>
                <Span>Start Date :</Span>
                <input type="date" name="sdate" id="StartDate" class="StartDate" value="<?=$startdate; ?>" required>
                <br/><br>
                <Span>End Date :</Span>
                <input type="text" name="edate" id="EndDate" class="EndDate" value="<?=$enddate; ?>" required>
                <br/><br>
                <input type="submit" value="Update" name="sub" class="sub_btn">
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