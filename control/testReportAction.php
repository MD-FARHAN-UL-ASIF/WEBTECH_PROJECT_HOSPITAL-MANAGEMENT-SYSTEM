<?php
    require "../model/dbConnect.php";

    $sqlDiagonosis = "SELECT `pID`, `firstName`, `lastName`, `medicalDiagonosis` FROM `prescription`;";
    $stmt = mysqli_stmt_init($conn);
    // mysqli_stmt_prepare($stmt, $sqlDiagonosis);
    if(!mysqli_stmt_prepare($stmt, $sqlDiagonosis))
    {
        header("location: ../view/signUp.php?error=stmtfailed");
        exit();
    }
    
    // mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    
    echo "<table>
    <tr>
        <th>Patient Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Test</th>
        <th>Report</th>
    </tr>";
    $count = 1;
    while($row = mysqli_fetch_assoc($resultData)){
        echo "<tr>
        <td>".$row['pID']."</td>
        <td>".$row['firstName']."</td>
        <td>".$row['lastName']."</td>
        <td>".$row['medicalDiagonosis']."</td>
        <td>
        <button style='padding-left:15px;padding-right:15px;padding-top:7px;padding-bottom:7px;border:none;border-radius:10px;background-color:tomato;'>
        <a style='text-decoration:none;color:white;' href='../control/report/patient".$count.".pdf' target='_blank'>
        View
        </a>
        </button>
        <button style='padding-left:15px;padding-right:15px;padding-top:7px;padding-bottom:7px;border:none;border-radius:10px;background-color:tomato;'><a style='text-decoration:none;color:white;' href='../view/diagonosis.php?patientId=".$row['pID']."' >Add Test</a></button>
        </td>
    </tr>";
    $count = $count + 1;
    }
    echo "<table>";
    mysqli_stmt_close($stmt);
?>