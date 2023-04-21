<?php
session_start(); 
include ('Connection.php');
include('Faculty_id.php');
include('IdMail.php');

if(isset($_POST['submit']))
{
  $First_name= $_POST["First_name"]; 
  $Middle_name=$_POST["Middle_name"]; 
  $Last_name=$_POST["Last_name"];
  $Email=$_POST["Email"];
  $q0="SELECT * FROM `faculty_login` WHERE `First_name` = '$First_name' AND `Middle_name` = '$Middle_name' AND `Last_name` = '$Last_name'"; 

  $result=$con->query($q0);
  if(!$result->num_rows > 0)
  {
    $Faculty_id=get_Faculty_id();
    $q1="select * from faculty_login where Faculty_id= '$Faculty_id'";
    $result=$con->query($q1);
    while($result->num_rows > 0)
     {
        $Faculty_id = get_Faculty_id();
        $result=$con->query($q1);
     }
  
     
           if(Send_id($First_name,$Last_name,$Faculty_id,$Email))
           {
            $stmt=$con->prepare("INSERT INTO `faculty_login` (`Faculty_id`, `First_name`, `Middle_name`, `Last_name`, `Email`) VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssss",$Faculty_id,$First_name,$Middle_name,$Last_name,$Email); 
        
            $t=$stmt->execute(); 
                if($t)
                 {
           

           
            $_SESSION["status"]="Faculty Id = ".$Faculty_id; 
            $_SESSION["status_msg"]="faculty added and Email send successfully";
            $_SESSION["status_code"]="success";
          
            echo "<script>window.location.href='../Add new faculty.php';</script>";
                }
               else{
                $_SESSION["status"]="ERROR"; 
                $_SESSION["status_msg"]="faculty Coudnt added successfully";
                $_SESSION["status_code"]="error";
                echo "<script>window.location.href='../Add new faculty.php';</script>";
         
                }
          }
     

  }
  else
  {
   $_SESSION["status"]="ERROR"; 
   $_SESSION["status_msg"]="faculty already exist";
   $_SESSION["status_code"]="error";
   echo "<script>window.location.href='../Add new faculty.php';</script>";
  }

   


  }
?>

