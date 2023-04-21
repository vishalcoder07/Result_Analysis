<?php
session_start();
include('./Connection.php');
$headers = "From:admin@gpnagar.ac.in";
$Name=$_SESSION["Name"];
$Month=$_SESSION["Month"];
$Year=$_SESSION["Year"];
if(isset($_POST["aproved"]))
{
    $a=explode(" ",$Name);
    $First_name=$a[0];
    $Middle_name=$a[1];
    $Last_name=$a[2];
    $q="select * from faculty_details where `First_name`='$First_name'and  `Middle_name`='$Middle_name'and `Last_name`='$Last_name'";
  
    $result=$con->query($q);
    if($result->num_rows >0)
    {
      while($row=$result->fetch_assoc())
      {
        $Faculty_id=$row["Faculty_id"];
      }
    }
    
 
    $tablename=$Faculty_id."Bill";
    $billid=$Faculty_id.$Month.$Year;
    $apdate=date('Y-m-d');
    $q2="Update $tablename Set `Apdate`='$apdate' ,Status='Approved' where Bill_id='$billid'";
    if ($con->query($q2) === TRUE) {
        $_SESSION["status"]="Successful!";
        $_SESSION["status_msg"]="Bill Aproved Successfully";
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
    $sub="Bill Aproved";
    $Msg="";
    $Msg1 = "Bill of Month:- ".$Month." ".$Year." is Aproved By Admin ". PHP_EOL;
    $Msg2= "You can Download your Bill By Faculty Login". PHP_EOL;
  
  
     $Msg6=" NOTE :- This is an auto generated e-mail please do not reply to this e-mail.". PHP_EOL;
     $Msg.= $Msg1 .= $Msg2 .= $Msg6 ;
  
  mail($Email,$sub,$Msg,$headers);
  echo "<script>window.location.href='../Pending Bill.php';</script>";
       
      } else {
        $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="Something went wrong bill cant aproved Successfully ";
        $_SESSION["status_code"]="error";
      
        
        echo "<script>window.location.href='../Viewbill.php';</script>";
      }
}
if(isset($_POST["submit"]))
{
     $Reason=$_POST["Reason"];
    $a=explode(" ",$Name);
    $First_name=$a[0];
    $Middle_name=$a[1];
    $Last_name=$a[2];
    $q="select * from faculty_details where `First_name`='$First_name'and  `Middle_name`='$Middle_name'and `Last_name`='$Last_name'";
  
    $result=$con->query($q);
    if($result->num_rows >0)
    {
      while($row=$result->fetch_assoc())
      {
        $Faculty_id=$row["Faculty_id"];
      }
    }
    $tablename=$Faculty_id."Bill";
    $billid=$Faculty_id.$Month.$Year;

    $q1="Update $tablename Set Reason='$Reason', Status='Rejected' where Bill_id='$billid'";
    if ($con->query($q1) === TRUE) {
      
        $q1="Select * from `faculty_login` where `Faculty_id`='$Faculty_id'";
        $result=$con->query($q1);
        if($result->num_rows >0)
        {
            while($row=$result->fetch_assoc())
            {
                $Email=$row["Email"];
            }
            
        }   
        $sub="Bill Rejected";
        $Msg="";
        $Msg1 = "Bill of Month:- ".$Month." ".$Year." is Rejected By Admin ". PHP_EOL;
        $Msg2= "You can submit your bill again by doing changes noted in Reason Section of Your Bill Status ". PHP_EOL;
      
      
         $Msg6=" NOTE :- This is an auto generated e-mail please do not reply to this e-mail.". PHP_EOL;
         $Msg.= $Msg1 .= $Msg2 .= $Msg6 ;
      
      mail($Email,$sub,$Msg,$headers);
        $_SESSION["status"]="Successful!";
        $_SESSION["status_msg"]="Bill Rejected Successfully";
        $_SESSION["status_code"]="success";
    
      echo "<script>window.location.href='../Pending Bill.php';</script>";
       
      } else {
        $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="Something went wrong bill cant Rejected Successfully ";
        $_SESSION["status_code"]="error";

        echo "<script>window.location.href='../Viewbill.php';</script>";
     
      }
}
?>