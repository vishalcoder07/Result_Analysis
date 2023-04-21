<?php
session_start();
include ('./Connection.php');

if(isset($_POST["submit"]))
{
 $Scheme=$_POST["Scheme"];
 $_SESSION["Scheme"]=$Scheme;



 echo "<script>window.location.href='../Schemedetails.php';</script>";


}
?>
