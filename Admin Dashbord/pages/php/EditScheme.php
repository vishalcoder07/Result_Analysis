<?php
session_start();
include('./Connection.php');
if(isset($_POST["addsub"]))
{
 $Scheme=$_SESSION["Scheme"];
 $Subject=$_POST["Subject"];
 $Semester=$_POST["Semester"];
 $THPR=$_POST["TH/PR"];
 $q0="Select * from scheme_details where Scheme='$Scheme' and Subject='$Subject' ";
 $result=$con->query($q0);
 if(!$result->num_rows> 0)
 {
 $q="INSERT INTO `scheme_details` (`Scheme`, `Subject`, `Sem`, `TH/PR`) VALUES ('$Scheme', '$Subject', '$Semester', '$THPR');";
 $r=$con->query($q);
 if ($r==1) {
  $_SESSION["status"]="Successful!";
  $_SESSION["status_msg"]="Subject Added Successfully";
  $_SESSION["status_code"]="success";

echo "<script>window.location.href='../Schemedetails.php';</script>";

 
} else {
  $_SESSION["status"]="ERROR!";
  $_SESSION["status_msg"]="Subject  can not Added  Successfully ";
  $_SESSION["status_code"]="error";
  echo "<script>window.location.href='../Schemedetails.php';</script>";

}
 }
 else {
  $_SESSION["status"]="ERROR!";
  $_SESSION["status_msg"]="Subject  Aleready Added!!!";
  $_SESSION["status_code"]="error";
  echo "<script>window.location.href='../Schemedetails.php';</script>";

}
   
}
if(isset($_GET["del"]))
{
  $Scheme=$_GET["Scheme"];
  $Semester=$_GET["Semester"];
  $Subject=$_GET["Subject"];
  $THPR=$_GET["THPR"];
 

    $q=" DELETE FROM `scheme_details` WHERE `Scheme` ='$Scheme' and `Sem`='$Semester' and `Subject`='$Subject' and `TH/PR`='$THPR' ";

    $result=$con->query($q);
    if($result==1)
    {
        $_SESSION["status"]="Successful!";
        $_SESSION["status_msg"]="Subject Deleted Successfully";
        $_SESSION["status_code"]="success";

        echo "<script>window.location.href='../Schemedetails.php';</script>";
    }
    else{
        $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="Subject  can not Deleted  Successfully ";
        $_SESSION["status_code"]="error";
        echo "<script>window.location.href='../Schemedetails.php';</script>";
    }
}

if(isset($_GET["Up"]))
{   
  $Scheme=$_GET["Scheme"];
  $Semester=$_GET["Semester"];
  $Subject=$_GET["Subject"];
  $THPR=$_GET["THPR"];

  $Semester1=$_GET["Semester1"];
  $Subject1=$_GET["Subject1"];
  $THPR1=$_GET["THPR1"];
  echo$THPR;

$q="Update scheme_details SET `Subject`='$Subject1',`Sem`='$Semester1' ,`TH/PR`='$THPR1' where `Scheme`='$Scheme'and `Subject` ='$Subject' and `Sem` ='$Semester' and `TH/PR`='$THPR'";

echo $q;
if ($con->query($q) === TRUE) {
    $_SESSION["status"]="Successful!";
    $_SESSION["status_msg"]="Subject Updated Successfully";
    $_SESSION["status_code"]="success";
    echo "<script>window.location.href='../Schemedetails.php';</script>";
   
  } else {
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Subject  can not Updated  Successfully ";
    $_SESSION["status_code"]="error";
    echo "<script>window.location.href='../Schemedetails.php';</script>";
 
  }


}




?>