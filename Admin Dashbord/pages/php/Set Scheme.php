<?php
session_start();
include ('Connection.php');


if(isset($_POST['submit']))
{
  $Scheme_name=$_POST["Scheme_name"];
  $q0="SELECT * FROM `scheme_details` WHERE `Scheme` = '$Scheme_name'";

  $result=$con->query($q0);
  if(!$result->num_rows > 0)
  {
  $a=1;
  $b="Semester".$a;
  while(isset($_POST[$b]))
  {

    $a=$a+1;
    $b="Semester".$a;

  }
  $a=$a-1;
 $c=1;
  $d="Subject".$c;
  $k="Semester".$c;
  $l="TH/PR".$c;


  while($c<=$a)
  {
    $$d=$_POST[$d];
    $$k=$_POST[$k];
    $$l=$_POST[$l];
    $m=$$d;
    $n=$$k;
    $o=$$l;
    $c=$c+1;

    $d="Subject".$c;
    $k="Semester".$c;
  $l="TH/PR".$c;

 $q="INSERT INTO `scheme_details` (`Scheme`, `Subject`, `Sem`, `TH/PR`) VALUES ('$Scheme_name', '$m', '$n', '$o');";

 $result=$con->query($q);
  }
            $_SESSION["status"]="Successful!";
            $_SESSION["status_msg"]="Scheme has been successfully seted";
            $_SESSION["status_code"]="success";
      
            echo "<script>window.location.href='../Set scheme.php';</script>";
            
  }
  else{
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Scheme is already exist";
    $_SESSION["status_code"]="error";
    echo "<script>window.location.href='../Set scheme.php';</script>";
  }

}
?>
