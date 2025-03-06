<?php
session_start();
include ('Connection.php');

if(isset($_POST['submit'])){

    $subject = $_POST['subject'];
    $batch = $_POST['batch'];
    $year = $_POST['year'];

    $tableName = $batch.$year.'yearanalysis';


    $subjectName = $year.'yearsubjects';
    $q="select * From `$subjectName` WHERE `SEM` = 1 ORDER BY `srno`";
    $result=$con->query($q);
    $i=0;
    $subjectNames;
    $subjectCodes;
    
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
        $subjectCode = $row['SUBJECT CODE'];
        $subjectName = $row['SUBJECT NAME'];
        
        $subjectNames[$i] = $subjectName;
        $subjectCodes[$i] = $subjectCode;

        $i++;
       }       
    }



    $tableName = $batch.$year.'yearanalysis';

    $query = "SELECT * FROM `$tableName`";
    $run_query = mysqli_query($con, $query) or die(mysqli_error($con));


    $Sr_no = 1;
    $allStudentSGPA;
    $subjectSize = count($subjectNames);        
    if (mysqli_num_rows($run_query) > 0 ) 
    {
        while ($row = mysqli_fetch_array($run_query))
          {

                  $totalCrd = 0;
                  $totalCP = 0;

                  for($i = 0; $i < $subjectSize; $i++){
                    $subCrd = $row[$subjectCodes[$i]."Crd"];  
                    $subCP = $row[$subjectCodes[$i]."CP"];
                    
                    $totalCrd += $subCrd;
                    $totalCP += $subCP;
                  
                 }
                 $SGPA = floatval($totalCP/$totalCrd);
                 $allStudentSGPA[$Sr_no] = $SGPA;
              
                 $Sr_no++;
         }
    }
















    $query = "SELECT * FROM `$tableName`";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    $subjectName = $year.'yearsubjects';
    $q="select * From `$subjectName` WHERE `SEM` = 2 ORDER BY `srno`";
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
            <th scope="col" colspan="7" style="text-align: center;">ENGINEERING MATHEMATICS III</th>
            <th scope="col" colspan="7" style="text-align: center;">ENGINEERING MATHEMATICS III</th>
            <th scope="col" colspan="7" style="text-align: center;">DATA STRUCTURES & ALGO.</th>
            <th scope="col" colspan="7" style="text-align: center;">SOFTWARE ENGINEERING</th>
            <th scope="col" colspan="7" style="text-align: center;">MICROPROCESSOR</th>
            <th scope="col" colspan="7" style="text-align: center;">PRINCIPLES OF PROG. LANG.</th>
            <th scope="col" colspan="7" style="text-align: center;">DATA STRUCTURES & ALGO. LAB.</th>
            <th scope="col" colspan="7" style="text-align: center;">MICROPROCESSOR LABORATORY </th>
            <th scope="col" colspan="7" style="text-align: center;">PROJECT BASED LEARNING II</th>
            <th scope="col" colspan="7" style="text-align: center;">CODE OF CONDUCT  </th>
            <th scope="col" colspan="7" style="text-align: center;">SR : YOGA AND MEDITATION</th>
            </tr>';
    }
    elseif($year == 'third'){
        $table .= '<tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>           
            <th scope="col" colspan="7" style="text-align: center;">DATA SCI & BIG DATA ANA.</th>
            <th scope="col" colspan="7" style="text-align: center;">WEB TECHNOLOGY </th>
            <th scope="col" colspan="7" style="text-align: center;">ARTIFICIAL INTELLIGENCE</th>
            <th scope="col" colspan="7" style="text-align: center;">INFORMATION SECURITY</th>
            <th scope="col" colspan="7" style="text-align: center;">INTERNSHIP</th>
            <th scope="col" colspan="7" style="text-align: center;">DATA SCI & BIG DATA ANA.</th>
            <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE-II </th>
            <th scope="col" colspan="7" style="text-align: center;">WEB TECHNOLOGY</th>
            <th scope="col" colspan="7" style="text-align: center;">LEAD. & PERSONALITY DEV.</th>
            </tr>';
    }
    elseif($year == 'fourth'){
        $table .= '<tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>           
            <th scope="col" colspan="7" style="text-align: center;">MACHINE LEARNING</th>
            <th scope="col" colspan="7" style="text-align: center;">INFORMATION AND CYBER SEC.</th>
            <th scope="col" colspan="7" style="text-align: center;">EMBEDDED & REAL TIME O.S. </th>
            <th scope="col" colspan="7" style="text-align: center;">HUMAN COMPUTER INTERFACE </th>
            <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE III </th>
            <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE III</th>
            <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE IV </th>
            <th scope="col" colspan="7" style="text-align: center;">LABORATORY PRACTICE IV</th>
            <th scope="col" colspan="7" style="text-align: center;">PROJECT WORK STAGE II </th>
            <th scope="col" colspan="7" style="text-align: center;">PROJECT WORK STAGE II </th>
            <th scope="col" colspan="7" style="text-align: center;">BUSINESS INTELLIGENCE</th>
            </tr>';
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

    $table .= '<th scope="col">CGPA</th>';                
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
            $CGPA = floatval(($allStudentSGPA[$srno] + $SGPA) / 2);
            $CGPA = round($CGPA, 2);

            $table .= '<td>'. $CGPA . '</td>';

            
            $table .= '</tr>';
            $srno++;
        }
    

    $table .= '</table>';
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Sem 2 Batch Analysis.xls");
    echo $table;
}

?>