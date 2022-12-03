<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div style="padding:20px;" align="center">
        <a href="index.php" class="pg_btn">Home</a>
        <a href="employe.php" class="pg_btn">Back</a>
        <hr/>
    </div>

    <div style="padding:20px;" align="center">
        <form action="#" method="POST">
            <span>Date : </span>
            <input name="fdate" type="date"><br/><br/>
            <input type="submit" value="Find" name="sub">
        </form>
    </div>

    <div align="center">
        
        <table border="3">
            <tr>
                <th>EMPLOYEE</th>
                <th>DEPARTMENT</th>
            </tr>

    <?php

    if(isset($_POST['sub'])){
    
    $search = date("m-d-Y", strtotime($_POST['fdate']));
    $lines = file('emp.txt');
    
    echo "Employees working on : ". $search;
    
        foreach($lines as $line){

            $outExp = explode('|',$line);
                $Id = $outExp[0];
                $Name = $outExp[1];
                $Age = $outExp[2];
                $Depart = $outExp[3];
                $City = $outExp[4];
                $State = $outExp[5];
                $Country = $outExp[6];
                $StartDate = $outExp[7];
                $EndDate = $outExp[8];
                
                if(($search >= $StartDate) && ($search <= $EndDate)){
                
    ?>

    <tr>
        <td><?=$Name; ?></td>
        <td><?=$Depart; ?></td>
    </tr>

    <?php  
                    

            }
    
        }

    }

    ?>

    </table>
    <br>
    <br>
    <br>

    <hr/>

    <div style="padding:20px;" align="center">
        <form action="#" method="POST">
            <span>Start Date : </span>
            <input type="date" name="sdate"> ||
            <span>End Date : </span>
            <input name="edate" type="date"><br/><br/>
            <input type="submit" value="Find" name="search">
        </form>
    </div>

    <div align="center">

        <table border="3">
            <tr>
                <th>EMPLOYEE</th>
                <th>DEPARTMENT</th>
                <th>START DATE</th>
                <th>END DATE</th>
            </tr>

            <?php

    if(isset($_POST['search'])){
        
        $Startsr = date("m-d-Y", strtotime($_POST['sdate']));
        $Endsr = date("m-d-Y", strtotime($_POST['edate']));
        $liness = file('emp.txt');

        echo "Employes working between : ". $Startsr ." & ". $Endsr. " are";
    
        foreach($liness as $line){
            
            $outExp = explode('|',$line);
            $Id = $outExp[0];
            $Name = $outExp[1];
            $Age = $outExp[2];
            $Depart = $outExp[3];
            $City = $outExp[4];
            $State = $outExp[5];
            $Country = $outExp[6];
            $StartDate = $outExp[7];
            $EndDate = $outExp[8];
            
            if((($Startsr <= $StartDate) && ($StartDate <= $Endsr)) || (($Startsr <= $EndDate) && ($Endsr >= $EndDate))){

                // $view = file('details.txt');
                // $view1 = file('department.txt');

                // foreach($view as $views){
            
                //     $vExp = explode('|',$views);
                //     $vId = $vExp[0];
                //     $vName = $vExp[1];
                //     $vStartDate = $vExp[2];
                //     $vEndDate = $vExp[3];

                //     foreach($view1 as $views1){

                //         $dExp = explode('|',$views1);
                //         $dId = $dExp[0];
                //         $dName = $dExp[1];
                //         $dDetail = $dExp[2];
                    
                //     if($vId == $Id && $vName == $dId){

    ?>
    
            <tr>
                <td><?=$Name; ?></td>
                <td><?=$Depart; ?></td>
                <td><?=$StartDate; ?></td>
                <td><?=$EndDate; ?></td>
            </tr>
    
    <?php
                    }
                    }
                }
    
    //         }
        
    //     }
    
    // }
    
    ?>

        </table>

    </div>

</body>
</html>