<?php
$server="localhost";
$username="tablasdf_teacher";
$pass="tablasdf_teacher@123";
$db="tablasdf_teacher";
$con= new Mysqli($server,$username,$pass,$db);
if($con->connect_error)
{
    die("Connection Failed".$con->connect_error);
}


?>
