<?php
session_start();
ini_set('display_errors',true);
error_reporting(E_ALL);
$headers = "From:admin@gpnagar.ac.in";
include('./Connection.php');
if(isset($_POST["addtimetablerow"]))
{
 
    $faculty_id=$_SESSION["Faculty_id"];
    $tablename="TT".$faculty_id;
    $Scheme=$_POST["Scheme"];
    $Days=$_POST["Days"];
    $From=$_POST["From"];
    $To=$_POST["To"];
    $Sem=$_POST["Sem"];

    $Class=$_POST["Class"];
    $Subject=$_POST["Subject"];
    $TH=$_POST["THPR"];
    $rnln=$_POST["rnln"];
    
    if($TH=="TH")
    {
        $Batch="N";
  
    }
    else
    {
        $Batch=$_POST["Batch"];
    }

    $q="SELECT * FROM $tablename WHERE `Days`='$Days' AND (`Time_from` = $From OR `Time_to`= $To );";
  
    $result=$con->query($q);

    if(!$result->num_rows > 0){
   
        $q3="INSERT INTO `$tablename` (`Scheme`, `Days`, `Time_from`, `Time_to`, `Subject`, `Class`, `Sem`, `TH/PR`,`Batch`,`Rn/Ln`) VALUES ('$Scheme', '$Days','$From', '$To','$Subject','$Class','$Sem','$TH','$Batch','$rnln')";
     

if( $con->query($q3) === TRUE)
{  
     $_SESSION["status"]="Successful!";
    $_SESSION["status_msg"]="Timetable Assigned successfully";
    $_SESSION["status_code"]="success";
     echo"<script>window.location.href='../FacultyTimetabledetails.php'</script>";
}
    }
else{
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Timetable is Already Assigned ";
    $_SESSION["status_code"]="error";
    echo"<script>window.location.href='../FacultyTimetabledetails.php'</script>";

}
}
if(isset($_GET["del"]))
{
    $faculty_id=$_SESSION["Faculty_id"];
    $tablename="TT".$faculty_id;
    $Days=$_GET["Days"];
    $From=$_GET["From"];
 

    $q=" DELETE FROM `$tablename` WHERE `Days` ='$Days' and `Time_from`=$From ";

    $result=$con->query($q);
    if($result==1)
    {
        $_SESSION["status"]="Successful!";
        $_SESSION["status_msg"]="Assigned Timetablerow Deleted Successfully";
        $_SESSION["status_code"]="success";
        echo"<script>window.location.href='../FacultyTimetabledetails.php'</script>";
    }
    else{
        $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="Assigned Timetablerow  can not Deleted  Successfully ";
        $_SESSION["status_code"]="error";
        echo"<script>window.location.href='../FacultyTimetabledetails.php'</script>";
    }
}

if(isset($_GET["Up"]))
{    $faculty_id=$_SESSION["Faculty_id"];
    $tablename="TT".$faculty_id;
  $Scheme=$_GET["Scheme"];
  $Class=$_GET["Class"];
  $Subject=$_GET["Subject"];
  $THPR=$_GET["THPR"];

  $Sem=$_GET["Sem"];
$Days=$_GET["Days"];
$From=$_GET["From"];
$To=$_GET["To"];
$Days1=$_GET["Days1"];
$From1=$_GET["From1"];
$To1=$_GET["To1"];
$rnln=$_GET["rnln"];
if($THPR=="TH")
{
    $Batch="N";
}
else
{
    $Batch=$_GET["Batch"];
}

$q="SELECT * FROM `$tablename` WHERE `Days` = '$Days1' AND (`Time_from` = $From1 OR `Time_to`= $To1 )";

$result=$con->query($q);

if(!$result->num_rows > 0){
$q="Update $tablename SET `Scheme`='$Scheme',`Days`='$Days' ,`Time_from`='$From',`Time_to`='$To',`Subject`='$Subject',`Class`='$Class',`Sem`=$Sem,`TH/PR`='$THPR',`Batch`='$Batch',`Rn/Ln`='$rnln' where `Days`='$Days1'and `Time_from` =$From1 ";


if ($con->query($q) === TRUE) {
    $_SESSION["status"]="Successful!";
    $_SESSION["status_msg"]="Assigned Timetable Updated Successfully";
    $_SESSION["status_code"]="success";
    echo"<script>window.location.href='../FacultyTimetabledetails.php'</script>";
   
  } else {
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Assigned Timetable  can not Updated  Successfully ";
    $_SESSION["status_code"]="error";
    echo"<script>window.location.href='../FacultyTimetabledetails.php'</script>";
 
  }
}
else{

    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Timetable is Already Assigned ";
    $_SESSION["status_code"]="error";
    echo"<script>window.location.href='../FacultyTimetabledetails.php'</script>";
}

}



if(isset($_POST["mail"]))
{
  
    $faculty_id=$_SESSION["Faculty_id"];
    $q="Select * from `faculty_login` where `Faculty_id`='$faculty_id'";
    $result=$con->query($q);
    if($result->num_rows >0)
    {
        while($row=$result->fetch_assoc())
        {
            $Email=$row["Email"];
        }
        
    }   
    $q2="Select * From `faculty_details` where Faculty_id='$faculty_id'";
    $result2=$con->query($q2);
    $con->error;
    while($row=$result2->fetch_assoc())
    {
      $First_name=$row["First_name"];
      $Middle_name=$row["Middle_name"];
      $Last_name=$row["Last_name"];
      $Full_name=$First_name." ".$Last_name;
    }
    $sub="Timetable is Assigned";
    $Msg="Dear ".$Full_name."".PHP_EOL;
    $Msg1 = "Your Timetable is assigned by Admin ". PHP_EOL;
    $Msg2= "Please login and check your Assigned Timetable". PHP_EOL;
  
 
     $Msg6=" NOTE :- This is an auto generated e-mail please do not reply to this e-mail.". PHP_EOL;
     $Msg.= $Msg1 .= $Msg2 .= $Msg6 ;


        if(mail($Email,$sub,$Msg))
        {
            $_SESSION["status"]="Successful!";
            $_SESSION["status_msg"]="Mail send Successfully";
            $_SESSION["status_code"]="success";
            echo"<script>window.location.href='../FacultyTimetabledetails.php'</script>";
           
        
        }
        
        else{
            $_SESSION["status"]="ERROR!";
            $_SESSION["status_msg"]="Mail can not send Successfully ";
            $_SESSION["status_code"]="error";
            echo"<script>window.location.href='../FacultyTimetabledetails.php'</script>";
        }
}
?>