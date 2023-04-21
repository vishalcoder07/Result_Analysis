<?php
session_start(); 
$Faculty_id=$_SESSION["Faculty_id"];
include ('./Connection.php');
ob_start();
$tablename="TT".$Faculty_id;

 $mon="";
         //startmon        
$From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
$l=count($From);
$i=0;
$flag=0;
$flag1=0;
while($i<$l)
 {
   $F=$From[$i];
   if($flag==0)
   {
   if($F=="1.30")
    {
      $mon.="<td  rowspan='6' style='vertical-align : middle;text-align:center;' class='text-center '><span class=' text-l  font-weight-bold'>R</span></td>";
     $flag=1;
  
    }
   }
   if($flag1==0)
   {
   if($F=="3.50")
    {
        $mon.="<td  rowspan='6' style='vertical-align : middle;text-align:center;' class='text-center '><span class=' text-l  font-weight-bold'>R</span></td>";
     $flag1=1;
  
    }
   }


 
 
$q2="select * from $tablename where `Days`='Mon' and `Time_from`=$F";

 $result1=$con->query($q2);
 if($result1->num_rows > 0)
 {

    while($row=$result1->fetch_assoc())
    {
      if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
       {
         $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
         $mon.="<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
         $i++;
       }
       else{
         $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
         $mon.="<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
       }
    }

 }
 else
 {
   if($F!="1.30"&& $F!="3.50"){
    $mon.="<td> </td>";
   }
  
 }
 $i++;
 }

//endmon
//starttue
$tue="";
$From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
$l=count($From);
$i=0;

while($i<$l)
 {
   $F=$From[$i];



 
 
$q2="select * from $tablename where `Days`='Tue' and `Time_from`=$F";

 $result1=$con->query($q2);
 if($result1->num_rows > 0)
 {

    while($row=$result1->fetch_assoc())
    {
      if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
       {
         $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
         $tue.="<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
         $i++;
       }
       else{
         $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
         $tue.="<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
       }
    }

 }
 else
 {
   if($F!="1.30"&& $F!="3.50"){
   $tue.="<td> </td>";
   }
  
 }
 $i++;
 }

//endtue
//startWed
$wed="";
$From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
$l=count($From);
$i=0;

while($i<$l)
 {
   $F=$From[$i];



 
 
$q2="select * from $tablename where `Days`='Wed' and `Time_from`=$F";

 $result1=$con->query($q2);
 if($result1->num_rows > 0)
 {

    while($row=$result1->fetch_assoc())
    {
      if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
       {
         $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
        $wed.="<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
         $i++;
       }
       else{
         $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
        $wed.="<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
       }
    }

 }
 else
 {
   if($F!="1.30"&& $F!="3.50"){
  $wed.="<td> </td>";
   }
  
 }
 $i++;
 }

//endWed
//startthur
$thur="";
$From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
                  $l=count($From);
                  $i=0;
                  
                  while($i<$l)
                   {
                     $F=$From[$i];
                  
                  
                  
                   
                   
                  $q2="select * from $tablename where `Days`='Thus' and `Time_from`=$F";
                  
                   $result1=$con->query($q2);
                   if($result1->num_rows > 0)
                   {
                  
                      while($row=$result1->fetch_assoc())
                      {
                        if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
                         {
                           $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
                           $thur.="<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                           $i++;
                         }
                         else{
                           $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
                           $thur.="<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                         }
                      }
                  
                   }
                   else
                   {
                     if($F!="1.30"&& $F!="3.50"){
                     $thur.="<td> </td>";
                     }
                    
                   }
                   $i++;
                   }
                  
//endthur
//startfri
$fri="";
$From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
                  $l=count($From);
                  $i=0;
                  
                  while($i<$l)
                   {
                     $F=$From[$i];
                  
                  
                  
                   
                   
                  $q2="select * from $tablename where `Days`='Fri' and `Time_from`=$F";
                  
                   $result1=$con->query($q2);
                   if($result1->num_rows > 0)
                   {
                  
                      while($row=$result1->fetch_assoc())
                      {
                        if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
                         {
                           $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
                           $fri.="<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                           $i++;
                         }
                         else{
                           $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
                           $fri.="<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                         }
                      }
                  
                   }
                   else
                   {
                     if($F!="1.30"&& $F!="3.50"){
                     $fri.="<td> </td>";
                     }
                    
                   }
                   $i++;
                   }
                  
//endfri
//startsat
$sat="";
$From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
                  $l=count($From);
                  $i=0;
                  
                  while($i<$l)
                   {
                     $F=$From[$i];
                  
                  
                  
                   
                   
                  $q2="select * from $tablename where `Days`='Sat' and `Time_from`=$F";
                  
                   $result1=$con->query($q2);
                   if($result1->num_rows > 0)
                   {
                  
                      while($row=$result1->fetch_assoc())
                      {
                        if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
                         {
                           $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
                           $sat.="<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                           $i++;
                         }
                         else{
                           $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
                           $sat.="<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                         }
                      }
                  
                   }
                   else
                   {
                     if($F!="1.30"&& $F!="3.50"){
                     $sat.="<td> </td>";
                     }
                    
                   }
                   $i++;
                   }
                  
//endsat
?>


<?php

$a="<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=\, initial-scale=1.0'>
    <title>Document</title>
     
    <style> 
    table{
      border-collapse: collapse;
      
      width:100%;
      }
    #footer td{
      text-align:center;
      vertical-align:middle;
    }
    #timetable td,th{
      border:2px solid ;
      text-align:center;
      vertical-align:middle;
    }
    #heading td{
         text-align:center;
         vertical-align:middle;

    }
    #heading table{
      width:80%;
    }
    h2{
      margin:1px;
      font-size:18px;
    }


    
    .ft{
      width:100%;
    }

.center{
    display:flex;
    align-items:center;
    justify-content:center;
}
    </style> 
</head>
<body>
    <div id='heading'> 
    <table >
    <tr> 
    <td width='150px' > 
<img height='100px' width='100px' src='../../../img/dtelogo.jpg'>
    </td>
    <td>  
    <h2>Government Polytechnic, Ahmednagar</h2> 
    <h2>Department of Computer Technology</h2> 
    <h2>Time table</h2> 
    </td>
    </tr> 
    </table> 
    </div> 
     <br> 

 

                 
            
                    <div class='center'>
                    <div id='timetable'> 
                  <table class='table table-bordered' class='tt' >
             
                      <tr>
                        <th scope='col' class='text-center'  >Day/Time</th>
                        <th scope='col' class='text-center' >9.30-10.30</th>
                        <th scope='col' class='text-center' >10.30-11.30</th>
                        <th scope='col' class='text-center' >11.30-12.30</th>
                        <th scope='col' class='text-center' >12.30-1.30</th>
                        <th scope='col' class='text-center' >1.30-1.50</th>
                        <th scope='col' class='text-center' >1.50-2.50</th>
                        <th scope='col' class='text-center' >2.50-3.50</th>
                        <th scope='col' class='text-center' >3.50-4.00</th>
                        <th scope='col' class='text-center' >4.00-5.00</th>
                        <th scope='col' class='text-center' >5.00-6.00</th>
                      </tr>

                
                
                      <tr>
                        <th scope='row' class='text-center '><span class=' text-l  font-weight-bold'id=''>Mon</span></th>
                        ".$mon."
                        </tr>
                      <tr>
                        <th scope='row' class='text-center '><span class=' text-l  font-weight-bold'id=''>Tue</span></th>
                        ".$tue."
                        </tr>
                      <tr>
                        <th scope='row' class='text-center '><span class=' text-l  font-weight-bold'id=''>Wed</span></th>
                        ".$wed."
                        </tr>
                      <tr>
                        <th scope='row' class='text-center '><span class=' text-l  font-weight-bold'id=''>Thur</span></th>
                        ".$thur."
                        </tr>
                      <tr>
                        <th scope='row' class='text-center '><span class=' text-l  font-weight-bold'id=''>Fri</span></th>
                        ".$fri."
                        </tr>
                      <tr>
                        <th scope='row' class='text-center '><span class=' text-l  font-weight-bold'id=''>Sat</span></th>
                        ".$sat."
                    
                        </tr>
                       
                        </table> 
                     

                </div>
                </div> 
                <br> 
                <br> 
                <div id='footer'> 
                <table class='ft'> 
                <tr> 
                <td width='33%'> 
                <p>Time Table Incharge </p> 
                </td> 
                <td width='33%'> 
                <p>Head of Department <br> Computer Technology Department<br> Government Polytechnic, Ahmednagar</p> 
                </td> 
                <td width='33%'> 
                <p>Principal<br> Government Polytechnic,Ahmednagar</p> 
                </td>
                </tr>  
                </table> 
                </div> 
                
                
</body>
</html>
"
;

require_once '../../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($a);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("timetable");


?> 