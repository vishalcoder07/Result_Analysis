<?php
session_start();
include ('Connection.php');

if(isset($_POST['submit'])){

    $subject = $_POST['subject'];
    $batch = $_POST['batch'];

    $query = "SELECT * FROM `$subject` where BATCH='$batch'" ;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    $table = '<table>';
    $table .= '<tr><th>Sr. No.</th><th>Prn No</th><th>Seat No</th><th>Name</th><th>ISE</th><th>ESE</th><th>TOTAL</th><th>TW</th><th>PR</th><th>OR</th><th>Tot%</th></tr>';
    $srno = 1;
    while ($row = mysqli_fetch_array($result)) {

        $Grd = $row["Grd"];
        if($Grd == 'F'){ 
            $table .= '<tr>';
            $table .= '<td>' . $srno . '</td>';
            $table .= '<td>' . $row['PRN'] . '</td>';
            $table .= '<td>' . $row['SEAT NO'] . '</td>';
            $table .= '<td>' . $row['NAME'] . '</td>';
            $table .= '<td>' . $row['ISE'] . '</td>';
            $table .= '<td>' . $row['ESE'] . '</td>';
            $table .= '<td>' . $row['TOTAL'] . '</td>';
            $table .= '<td>' . $row['TW'] . '</td>';
            $table .= '<td>' . $row['PR'] . '</td>';
            $table .= '<td>' . $row['OR'] . '</td>';
            $table .= '<td>' . $row['Tot%'] . '</td>';
            $table .= '</tr>';
            
            $srno++;
        }
    }




    $table .= '</table>';
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Fail Student List.xls");
    echo $table;
}



?>