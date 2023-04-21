<?php
session_start(); 

?> 



<?php

include('Connection.php');

if(isset($_POST['submit']))
{
  $username=$_POST["username"];
  $pass=$_POST["password"];
  $q="Select * from admin_details where username='$username' ";
  $result=$con->query($q);
  if($result->num_rows > 0)
  {
    while($row=$result->fetch_assoc())
    {
       $d_username=$row["Username"];
       $d_pass=$row["Password"];
      
      
       if(password_verify($pass,$d_pass))
       {
        $_SESSION["Username"]=$username;
          echo "<script>alert('Login successfully');window.location.href='../Admin Dashbord/pages/dashboard.php'</script>"; 
       }
       else{
        echo "<script>alert('Please check your password and try again...!');window.location.href='login.php'</script>"; 
       }
    }
  }
  else{
    echo "<script>alert('invalid Username');window.location.href='login.php'</script>";
  }  
}
?>


