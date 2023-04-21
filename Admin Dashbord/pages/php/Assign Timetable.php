<?php
session_start();
include ('./Connection.php');

if(isset($_POST["submit"]))
{
 $name=$_POST["Faculty_name"];
  $a=explode(" ",$name);
$Fname=$a[0];
$Mname=$a[1];
$Lname=$a[2];
$q="select * From faculty_details where First_name='$Fname' and Middle_name='$Mname' and Last_name='$Lname'";
$result=$con->query($q);
if($row=$result->fetch_assoc())
{
 $_SESSION["Faculty_id"]=$row["Faculty_id"];
  $_SESSION["name"]=$name;

 echo "<script>window.location.href='../FacultyTimetabledetails.php';</script>";


}




}
?>
