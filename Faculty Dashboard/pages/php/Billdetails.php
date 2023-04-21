<?php
session_start();
include('./Connection.php');
if(isset($_POST["addEntry"]))
{
    $Faculty_id=$_SESSION["Faculty_id"];
    $Month=$_SESSION["Month"];
    $Year=$_SESSION["Year"];
    $tablename=$Faculty_id.$Month.$Year;
    $date=$_POST["date"];
    $From=$_POST["From"];
    $To=$_POST["To"];
    $Scheme=$_POST["Scheme"];
    $Class=$_POST["Class"];
    $Subject=$_POST["Subject"];
    $Sem=$_POST["Sem"];
    $THPR=$_POST["THPR"];

    $Hours=$_POST["Hours"];
    $Nostud=$_POST["Nostud"];
    $Topic_covered=$_POST["Topic_covered"];
    if($Class=="TYCM"||$Class=="TYCO")
    {
        $branch=ltrim($Class,"TY");
    }
    if($Class=="SYCM"||$Class=="SYCO")
    {
        $branch=ltrim($Class,"SY");
    }
    if($Class=="FYCM"||$Class=="FYCO")
    {
        $branch=ltrim($Class,"FY");
    }

    $Class1=$branch.$Sem.$Scheme;

  $q="Select * from $tablename Where Date='$date' AND ( Time_from=$From OR Time_to=$To)";

  $result=$con->query($q);
  if(!$result->num_rows >0){
       $q1="Insert into $tablename values('$date','$Class1','$From','$To','$Hours','$THPR','$Subject','$Nostud','$Topic_covered')";
       if($con->query($q1))
       {
        $_SESSION["status"]="Successful!";
        $_SESSION["status_msg"]="Entry added Successfully";
        $_SESSION["status_code"]="success";
        echo "<script>window.location.href='../Billdetails.php';</script>";
       }
  }
  else{
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Entry already Exists !!";
    $_SESSION["status_code"]="error";
    echo "<script>window.location.href='../Billdetails.php';</script>";
  }


}
if(isset($_GET["delentry"]))
{
  $Faculty_id=$_SESSION["Faculty_id"];
  $Month=$_SESSION["Month"];
  $Year=$_SESSION["Year"];
  $tablename=$Faculty_id.$Month.$Year;
  $Date=$_GET["Date"];
  $From=$_GET["From"];
  $q="DELETE From $tablename where `Date`='$Date' AND Time_From=$From";

  $result=$con->query($q);
  if($result==1)
  {
      $_SESSION["status"]="Successful!";
      $_SESSION["status_msg"]="Entry Deleted Successfully";
      $_SESSION["status_code"]="success";
    echo "<script>window.location.href='../Billdetails.php';</script>";
  }
  else{
      $_SESSION["status"]="ERROR!";
      $_SESSION["status_msg"]="Entry  can not Deleted  Successfully ";
      $_SESSION["status_code"]="error";
      echo "<script>window.location.href='../Billdetails.php';</script>";
  }
}
if(isset($_GET["Up"]))
{     $Faculty_id=$_SESSION["Faculty_id"];
  $Month=$_SESSION["Month"];
  $Year=$_SESSION["Year"];
    $tablename=$Faculty_id.$Month.$Year;
  $Scheme=$_GET["Scheme"];
  $Class=$_GET["Class"];
  $Subject=$_GET["Subject"];
  $THPR=$_GET["THPR"];

  $Sem=$_GET["Sem"];
$Date=$_GET["Date"];
$From=$_GET["From"];
$To=$_GET["To"];
$Date1=$_GET["Date1"];
$From1=$_GET["From1"];
$To1=$_GET["To1"];
$Nos=$_GET["Nos"];
$Topic=$_GET["Topic"];
$Hours=$_GET["Hours"];
if($Class=="TYCM"||$Class=="TYCO")
{
    $branch=ltrim($Class,"TY");
}
if($Class=="SYCM"||$Class=="SYCO")
{
    $branch=ltrim($Class,"SY");
}
if($Class=="FYCM"||$Class=="FYCO")
{
    $branch=ltrim($Class,"FY");
}

$Class1=$branch.$Sem.$Scheme;


$q="Update $tablename SET `Date`='$Date',`Class`='$Class1' ,`Time_from`='$From',`Time_to`='$To',`Hours`='$Hours',`TH/PR`='$THPR',`Subject`='$Subject',`Present_Student`='$Nos',`Topic_covered`='$Topic' where `Date`='$Date1'and `Time_from` =$From1 ";


if ($con->query($q) === TRUE) {
    $_SESSION["status"]="Successful!";
    $_SESSION["status_msg"]="Bill Entry Updated Successfully";
    $_SESSION["status_code"]="success";
  echo "<script>window.location.href='../Billdetails.php';</script>";

  
   
  } else {
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Bill Entry  can not Updated  Successfully ";
    $_SESSION["status_code"]="error";
    echo "<script>window.location.href='../Billdetails.php';</script>";
 
  }





}

if(isset($_POST["submit"]))
{
  $Faculty_id=$_SESSION["Faculty_id"];
  $tablename=$Faculty_id."Bill";
  $Month=$_SESSION["Month"];
  $Year=$_SESSION["Year"];
  $billid=$Faculty_id.$Month.$Year;
  $q="Update $tablename SET Status='Applied' where Bill_id='$billid'";
  if ($con->query($q) === TRUE) {
    $_SESSION["status"]="Successful!";
    $_SESSION["status_msg"]="Bill Send Successfully to Admin";
    $_SESSION["status_code"]="success";

  echo "<script>window.location.href='../Apply For Bill.php';</script>";
   
  } else {
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Bill can not Send Successfully ";
    $_SESSION["status_code"]="error";
    echo "<script>window.location.href='../Apply For Bill.php';</script>";
 
  }
}
?>