<?php
session_start();
include ('Connection.php');
include ('mvar.php');
$headers = "From:admin@gpnagar.ac.in";

if(isset($_POST['submit']))
{
  $Faculty_id=$_SESSION["Faculty_id"];
  $First_name= $_POST["First_name"];
  $Middle_name= $_POST["Middle_name"];
  $Last_name= $_POST["Last_name"];
  $Phone_no= $_POST["Phone_no"];
  $Gender=$_POST["Gender"];
  $House_no=$_POST["House_no"];
  $Area=$_POST["Area"];
  $Landmark=$_POST["Landmark"];
  $City=$_POST["City"];
  $State=$_POST["State"];
  $District=$_POST["District"];
  $Pincode=$_POST["Pincode"];
  $Course=$_POST["Course"];
  $Branch=$_POST["Branch"];
  $Grade=$_POST["Grade"];
  $Other=$_POST["Other"];
  $Pan_no=$_POST["Pan_no"];
  $Aadhaar_no=$_POST["Aadhaar_no"];
  $Bank_name=$_POST["Bank_name"];
  $Bank_address=$_POST["Bank_address"];
  $Ifsc_code=$_POST["Ifsc_code"];
  $Account_no=$_POST["Account_no"];
  $Account_type=$_POST["Account_type"];
  $Micr_code=$_POST["Micr_code"];


  $q=" SELECT * FROM `faculty_details` WHERE `Faculty_id` = '$Faculty_id'";
  $result=$con->query($q);
  if(!$result->num_rows>0)
{
  $q0="SELECT * FROM `district` WHERE `District` = '$District'";

  $result1=$con->query($q0);

  if(!$result1->num_rows >0)
  {
    $q1="INSERT INTO `district` (`District`, `State`) VALUES ('$District', '$State')";
   $con->query($q1);
  }

  $q2="INSERT INTO `faculty_details` (`Faculty_id`, `First_name`, `Middle_name`, `Last_name`, `Phone_no`, `Gender`, `House_no`, `Area`, `Landmark`, `City`, `District`, `Course`, `Branch`, `Grade`, `Other`, `Pan_no`, `Aadhaar_no`, `Bank_name`, `Bank_address`, `Bank_ifsc`, `Account_no`, `Account_type`, `Micr_code`) VALUES ('$Faculty_id', '$First_name', '$Middle_name', '$Last_name', '$Phone_no', '$Gender', '$House_no', '$Area', '$Landmark', '$City', '$District', '$Course', '$Branch', '$Grade', '$Other', '$Pan_no', '$Aadhaar_no', '$Bank_name', '$Bank_address', '$Ifsc_code', '$Account_no', '$Account_type', '$Micr_code')";

  $q3="UPDATE `faculty_login` SET `Status` = 'Applied',`First_name`='$First_name',`Middle_name`='$Middle_name',`Last_name`='$Last_name' WHERE `faculty_login`.`Faculty_id` = '$Faculty_id'";

  $str="TT".$Faculty_id;
  $q4="CREATE TABLE `$str` (
    `Scheme` varchar(20) NOT NULL,
    `Days` varchar(10) NOT NULL,
    `Time_from` float(10,2) NOT NULL,
    `Time_to` float(10,2)	 NOT NULL,
    `Subject` varchar(10) NOT NULL,
    `Class` varchar(10) NOT NULL,
    `Sem` int(1) NOT NULL,
    `TH/PR` varchar(5) NOT NULL,
    `Batch` varchar(10) NOT NULL,
    `Rn/Ln` varchar(20) NOT NULL,
       PRIMARY KEY(Days,Time_from)
  )";
  $str1=$Faculty_id."Bill";
$q5="CREATE TABLE `$str1` (
  `Bill_id` varchar(30) NOT NULL,
  `Date` date ,
  `Apdate`date,
  `Month` varchar(10) NOT NULL,
  `Year` varchar(6) NOT NULL,
  `Subject` varchar(25),
  `Class` varchar(25),
  `Total_th_hours` int(5) ,
  `Total_pr_hours` int(5) ,
  `Th_rate` int(11) NOT NULL,
  `Pr_rate` int(11) NOT NULL,
  `Total_amount_of_th` int(11) ,
  `Total_amount_of_pr` int(11) ,
  `Total_amount` int(11) ,
  `Status` text NOT NULL,
  `Reason` text ,
  PRIMARY KEY(Bill_id)
)";

  if ($con->query($q4) === TRUE &&  $con->query($q3)===TRUE && $con->query($q2)===TRUE && $con->query($q5) === TRUE) {
      $_SESSION["status"]="Successful!";
      $_SESSION["status_msg"]="Application Form submited successfully";
      $_SESSION["status_code"]="success";
      $Asub="Application Form submited Successfully";
      $Full_name=$First_name." ".$Middle_name." " .$Last_name;
      $Amsg="Dear Admin".PHP_EOL."". $Full_name. " Submitted his Application Form Successfully".PHP_EOL."Now you can assign timetable and subject to Faculty".PHP_EOL."THANK YOU";
      mail($Adminmail,$Asub,$Amsg,$headers);
    
 
    echo "<script>window.location.href='../Dashboard.php';</script>";

    } else {
      $_SESSION["status"]="ERROR!";
      $_SESSION["status_msg"]="Application Form can not submited successfully";
      $_SESSION["status_code"]="error";
   
      echo "<script>window.location.href='../Application From.php';</script>";
   

    }
}

}

?>
