<?php
session_start(); 
include('../../Admin Login/Connection.php');

if(isset($_POST['submit']))
{
  $username=$_POST["Username"];
  $pass=$_POST["Password"];
  $q="Select * from faculty_login where Faculty_id='$username' ";
  $result=$con->query($q);
  if($result->num_rows > 0)
  {
    while($row=$result->fetch_assoc())
    {
       $d_username=$row["Faculty_id"];
       $d_pass=$row["Password"];
 
       $fname=$row["First_name"];
       $mname=$row["Middle_name"];
       $lname=$row["Last_name"];
       $name=$fname." ".$lname;
       
      
       if(password_verify($pass,$d_pass))
       {
        $_SESSION["Faculty_id"]=$username;
        $_SESSION["name"]=$name;
        $Status=$row["Status"];
      
        if($Status=="Not Applied")
        {
        
         echo "<script>alert('Login successfully');window.location.href='../../Faculty Dashboard/pages/Application Form.php'</script>"; 
        }
        if($Status=="Applied")
        {
          echo "<script>alert('Login successfully');window.location.href='../../Faculty Dashboard/pages/Dashboard.php'</script>"; 
        }
       }
       else{
        echo "<script>alert('Please check your password and try again...!');window.location.href='../index.php'</script>"; 
       }
    }
  }
  else{
    echo "<script>alert('invalid Username');window.location.href='../index.php'</script>";
  }  
}
?> 