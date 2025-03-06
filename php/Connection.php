<?php

$server="localhost";

$username="root";

$pass="";

$db="result_analysis";


$con= new Mysqli($server,$username,$pass,$db);

if($con->connect_error){

    die("Connection Failed".$con->connect_error);

}






?>

