<?php
session_start();
include ('Connection.php');

if(isset($_POST['submit'])){

    $subject = $_POST['subject'];
    $batch = $_POST['batch'];
    $year = $_POST['year'];

    $tableName = $batch.$year.'yearanalysis';

    $query = "SELECT * FROM `$tableName`";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    
    $subjectName = $year.'yearsubjects';
    $q="select * From `$subjectName` WHERE `SEM` = 1 ORDER BY `srno`";
    $r=$con->query($q);
    $i=0;
    $subjectCodes;
    $subjectNames;
    
    if($r->num_rows>0){
        while($row = $r->fetch_assoc()){
        $subjectCode = $row['SUBJECT CODE'];
        $subjectName = $row['SUBJECT NAME'];
        
        $subjectNames[$i] = $subjectName;
        $subjectCodes[$i] = $subjectCode;

        $i++;
       }       
    }


    $table = '<table>';
    if($year == 'second'){
            $table .= '<tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>           
            <th scope="col" colspan="7" style="text-align: center;">DISCRETE MATHEMATICS</th>
            <th scope="col" colspan="7" style="text-align: center;">FUND. OF DATA STRUCTURES</th>
            <th scope="col" colspan="7" style="text-align: center;">OBJECT ORIENTED PROGRAMMING</th>
            <th scope="col" colspan="7" style="text-align: center;">COMPUTER GRAPHICS</th>
            <th scope="col" colspan="7" style="text-align: center;">DIGITAL ELEC. & LOGIC DESIGN</th>
            <th scope="col" colspan="7" style="text-align: center;">DATA STUCTURES LABORATORY</th>
            <th scope="col" colspan="7" style="text-align: center;">OOP & COMP. GRAPHICS LAB.</th>
            <th scope="col" colspan="7" style="text-align: center;">DIGITAL ELEC. LABORATORY </th>
            <th scope="col" colspan="7" style="text-align: center;">BUSINESS COMMUNICATION SKILLS</th>
            <th scope="col" colspan="7" style="text-align: center;">HUMANITY & SOCIAL SCIENCE </th>
            <th scope="col" colspan="7" style="text-align: center;">SOCIAL AWAR. & GOV. PROGRAM </th>
            </tr>
            ';
    }
    elseif($year == 'third'){
        $table .= '<tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>           
        <th scope="col" colspan="7" style="text-align: center;">DATABASE MANAGEMENT SYSTEMS</th>
        <th scope="col" colspan="7" style="text-align: center;">THEORY OF COMPUTATION</th>
        <th scope="col" colspan="7" style="text-align: center;">SYS. PROG & OPERATING SYS.</th>
        <th scope="col" colspan="7" style="text-align: center;">COMPUTER NETWORKS AND SEC.</th>
        <th scope="col" colspan="7" style="text-align: center;"> INT. OF THINGS & EBD. SYS</th>
        <th scope="col" colspan="7" style="text-align: center;">SEMINAR AND TECH. COMN.</th>
        <th scope="col" colspan="7" style="text-align: center;">DATABASE MGMT. SYS. LAB.</th>
        <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE I</th>
        <th scope="col" colspan="7" style="text-align: center;">COMP. NET. AND SEC. LAB.</th>
        <th scope="col" colspan="7" style="text-align: center;">PROF. ETH. & ETIQUETTES 3.</th>
        </tr>
        ';
    }
    elseif($year == 'fourth'){
        $table .= '<tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>           
        <th scope="col" colspan="7" style="text-align: center;"> HIGH PERFORMANCE COMPUTING </th>
        <th scope="col" colspan="7" style="text-align: center;">ARTIFICIAL INTEL. & ROBOTICS </th>
        <th scope="col" colspan="7" style="text-align: center;">DATA ANALYTICS </th>
        <th scope="col" colspan="7" style="text-align: center;">DATA MINING AND WAREHOUSING </th>
        <th scope="col" colspan="7" style="text-align: center;">SW. TESTING & QA. </th>
        <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE I </th>
        <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE I</th>
        <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE II</th>
        <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE II</th>
        <th scope="col" colspan="7" style="text-align: center;">PROJECT WORK STAGE I </th>
        <th scope="col" colspan="7" style="text-align: center;">INDU.SAFETY & ENV.CONSCIOUS.</th>
        </tr>
        ';
    }
    
    $table .= '<tr>
    <th scope="col">Sr. No</th>
    <th scope="col">Prn No</th>
    <th scope="col">Seat No</th>
    <th scope="col">Name</th>';

    $subjectSize = count($subjectNames);
    for($i=0; $i < $subjectSize; $i++){
        $table .= '<th scope="col">ISE</th>
        <th scope="col">ESE</th>
        <th scope="col">TOTAL</th>
        <th scope="col">TW</th>
        <th scope="col">PR</th>
        <th scope="col">OR</th>
        <th scope="col">Tot%</th>';
    }

    $table .= '<th scope="col">SGPA</th>';                
    $table .= '</tr>';

    $srno = 1;
    while ($row = mysqli_fetch_array($result)) {

            $table .= '<tr>';
            $table .= '<td>' . $srno . '</td>';
            $table .= '<td>' . $row['prn'] . '</td>';
            $table .= '<td>' . $row['seat no'] . '</td>';
            $table .= '<td>' . $row['name'] . '</td>';
            
            $totalCrd = 0;
            $totalCP = 0;

            for($i = 0; $i < $subjectSize; $i++){
                $table .= '<td>' . $row[$subjectCodes[$i]. "ISE"] . '</td>';
                $table .= '<td>'. $row[$subjectCodes[$i]. "ESE"] . '</td>';
                $table .= '<td>'. $row[$subjectCodes[$i]. "TOTAL"] . '</td>';
                $table .= '<td>'. $row[$subjectCodes[$i]. "TW"] . '</td>';
                $table .= '<td>'. $row[$subjectCodes[$i]. "PR"] . '</td>';
                $table .= '<td>'. $row[$subjectCodes[$i]. "OR"] . '</td>';
                $table .= '<td>'. $row[$subjectCodes[$i]. "Tot%"] . '</td>';

                $subCrd = $row[$subjectCodes[$i]."Crd"];  
                $subCP = $row[$subjectCodes[$i]."CP"];

                $totalCrd += $subCrd;
                $totalCP += $subCP;
            }
            
            $SGPA = floatval($totalCP/$totalCrd);
            $SGPA = round($SGPA, 2);

            $table .= '<td>'. $SGPA . '</td>';


            $table .= '</tr>';
            
            $srno++;
        }
    

    $table .= '</table>';
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Sem 1 Batch Analysis.xls");
    echo $table;
}

?>