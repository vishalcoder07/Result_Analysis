<?php
session_start();
include('./Connection.php');
include('./mvar.php');
$headers = "From:admin@gpnagar.ac.in";
if(isset($_POST["submit"]))
{
  $Faculty_id=$_SESSION["Faculty_id"];
  $tablename=$Faculty_id."Bill";
  $Month=$_SESSION["Month"];
  $Year=$_SESSION["Year"];
  $billid=$Faculty_id.$Month.$Year;

  $q2="Select * From `faculty_details` where Faculty_id='$Faculty_id'";
  $result2=$con->query($q2);

  while($row=$result2->fetch_assoc())
  {
    $First_name=$row["First_name"];
    $Middle_name=$row["Middle_name"];
    $Last_name=$row["Last_name"];
    $Full_name=$First_name." ".$Middle_name." ".$Last_name;
  }

 
  $q0="Select * from rate_details where Sr_no=1";
  $result0=$con->query($q0);
  while($row=$result0->fetch_assoc())
  {
      $Limit=$row["Limit"];
  }
  $q1="Select * From $tablename where Bill_id='$billid'";
  $result1=$con->query($q1);
  while($row=$result1->fetch_assoc())
  {
      $Total_amount=$row["Total_amount"];
      $Status=$row["Status"];
  }
  if($Status=="Rejected")
  {  if($Total_amount<=$Limit)
    {

  
    $q="Update $tablename SET  Reason='',Status='In Process' where Bill_id='$billid'";
    $Faculty_id=$_SESSION["Faculty_id"];
   
    if ($con->query($q) === TRUE) {
      $_SESSION["status"]="Successful!";
      $_SESSION["status_msg"]="Bill Sent to admin for Verification purpose Successfully";
      $_SESSION["status_code"]="success";
      $q1="Select * from `faculty_login` where `Faculty_id`='$Faculty_id'";
      $result=$con->query($q1);
      if($result->num_rows >0)
      {
          while($row=$result->fetch_assoc())
          {
              $Email=$row["Email"];
          }
          
      }   
      $sub="Bill Sent For Varification successfully";
      $Msg="";
      $Msg1 = "Bill of Month:- ".$Month." ".$Year."Sent to admin for Verification purpose to Admin Successfully". PHP_EOL;
      $Msg2= "Please login and check your Assigned Timetable". PHP_EOL;
    
   
       $Msg6=" NOTE :- This is an auto generated e-mail please do not reply to this e-mail.". PHP_EOL;
       $Msg.= $Msg1 .= $Msg2 .= $Msg6 ;
  
     mail($Email,$sub,$Msg,$headers);
     $Asub="Pending Bill For Verification";
     $Amsg="Dear Admin".PHP_EOL."". $Full_name. "Sent His Bill ".$Month." ".$Year."For Verification".PHP_EOL."Please Verify it.";
     mail($Adminmail,$Asub,$Amsg,$headers);
  
    echo "<script>window.location.href='../Apply For Bill.php';</script>";
     
    } else {
      $_SESSION["status"]="ERROR!";
      $_SESSION["status_msg"]="Bill can not Submited Successfully ";
      $_SESSION["status_code"]="error";
      echo "<script>window.location.href='../Bill.php';</script>";
   
    }
  }
  else{
      $_SESSION["status"]="ERROR!";
      $_SESSION["status_msg"]="Your Bill Exceed the limit please remove some entries !!!";
      $_SESSION["status_code"]="error";
   
      echo "<script>window.location.href='../Billdetails.php';</script>";
     
  }

  }
  else{
  if($Total_amount<=$Limit)
  {
      $date=date('Y-m-d');

  $q="Update $tablename SET Date='$date' ,Status='In Process' where Bill_id='$billid'";

  
  if ($con->query($q) === TRUE) {
    $_SESSION["status"]="Successful!";
    $_SESSION["status_msg"]="Bill Sent to admin for Verification purpose Successfully";
    $_SESSION["status_code"]="success";
    $q1="Select * from `faculty_login` where `Faculty_id`='$Faculty_id'";
  $result=$con->query($q1);
  if($result->num_rows >0)
  {
      while($row=$result->fetch_assoc())
      {
          $Email=$row["Email"];
      }
      
  }   
  $sub="Bill Sent For Varification successfully";
  $Msg="";
  $Msg1 = "Bill of Month:- ".$Month." ".$Year." Sent to admin for Verification purpose to Admin Successfully". PHP_EOL;
  $Msg2= "You can Check Status of Your Bill By Faculty Login". PHP_EOL;


   $Msg6=" NOTE :- This is an auto generated e-mail please do not reply to this e-mail.". PHP_EOL;
   $Msg.= $Msg1 .= $Msg2 .= $Msg6 ;
   
  mail($Email,$sub,$Msg,$headers);
  
  // message for admin
  
  $Asub="Pending Bill For Verification";
  $Amsg="Dear Admin".PHP_EOL."". $Full_name. " sent his Bill of ".$Month." ".$Year." For Verification".PHP_EOL."Please Verify it.";
   mail($Adminmail,$Asub,$Amsg,$headers);

  echo "<script>window.location.href='../Apply For Bill.php';</script>";
   
  } else {
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Bill can not Submit Successfully ";
    $_SESSION["status_code"]="error";
   
    echo "<script>window.location.href='../Bill.php';</script>";
 
  }
}
else{
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Your Bill Exceed the limit please remove some entries !!!";
    $_SESSION["status_code"]="error";
   
    echo "<script>window.location.href='../Billdetails.php';</script>";

}
}
}
?>