<?php
session_start();
if(!isset($_SESSION["Faculty_id"]))
{

    echo "<script>window.location.href='../../Faculty Login/index.php';</script>";
}
unset($_SESSION["Month"]); 
unset($_SESSION["Year"]);
$Faculty_id=$_SESSION["Faculty_id"];
include ('./php/Connection.php');
$tablename="TT".$Faculty_id;
$q="select * From $tablename";
$result=$con->query($q);

?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link href="../assets/css/style.css" rel="stylesheet" />
  <title>
     See Timetable
  </title>
  <link href="../assets/css/style.css" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/1c81a4db48.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
     <link rel="stylesheet" href="../assets/scss/material-dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <span class="navbar-brand " >
      
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center " id="bname">
          <i class="fa-solid fa-circle-user m-2"></i>
          <span class="ms-1 font-weight-bold text-white">Faculty</span>
        </div>
        
      </span>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/Dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Faculty</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/See Timetable.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            
            <span class="nav-link-text ms-1">See Timetable</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/Apply For Bill.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            
            <span class="nav-link-text ms-1">Prepare Bill</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/Status.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            
            <span class="nav-link-text ms-1">Status</span>
          </a>
        </li>
      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">See Timetable</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">See Timetable</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
           
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="./php/logout.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa-solid fa-right-from-bracket"></i>
                
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Timetable</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container ">
                <?php
                if(!$result->num_rows>0)
                {
                
      
              echo "<div class='card text-center'>
  <div class='card-header bg-warning text-white  font-weight-bold'>
   Sorry!!!
  </div>
  <div class='card-body'>
  
    <p class='card-text text-danger font-weight-bold'>Admin has Not Assigned Timetable for you</p>

  </div>";
                }
                else{
                  echo"<div class='table-responsive'>
                  <table class='table table-bordered'>
                    <thead>
                      <tr>
                        <th scope='col' >Day/Time</th>
                        <th scope='col' class='bg-info'>9.30-10.30</th>
                        <th scope='col' class='bg-info'>10.30-11.30</th>
                        <th scope='col' class='bg-info'>11.30-12.30</th>
                        <th scope='col' class='bg-info'>12.30-1.30</th>
                        <th scope='col' class='bg-info'>1.30-1.50</th>
                        <th scope='col' class='bg-info'>1.50-2.50</th>
                        <th scope='col' class='bg-info'>2.50-3.50</th>
                        <th scope='col' class='bg-info'>3.50-4.00</th>
                        <th scope='col' class='bg-info'>4.00-5.00</th>
                        <th scope='col' class='bg-info'>5.00-6.00</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope='row' class='text-center bg-warning'><span class=' text-l  font-weight-bold'id=''>Mon</span></th>";
                     
                  
                       $From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
                       $l=count($From);
                       $i=0;
                       $flag=0;
                       $flag1=0;
                       while($i<$l)
                        {
                          $F=$From[$i];
                          if($flag==0)
                          {
                          if($F=="1.30")
                           {
                             echo"<td  rowspan='6' style='vertical-align : middle;text-align:center;' class='text-center '><span class=' text-l  font-weight-bold'>R</span></td>";
                            $flag=1;
                         
                           }
                          }
                          if($flag1==0)
                          {
                          if($F=="3.50")
                           {
                            echo"<td  rowspan='6' style='vertical-align : middle;text-align:center;' class='text-center '><span class=' text-l  font-weight-bold'>R</span></td>";
                            $flag1=1;
                         
                           }
                          }
                     
                       
                        
                        
                       $q2="select * from $tablename where `Days`='Mon' and `Time_from`=$F";
                  
                        $result1=$con->query($q2);
                        if($result1->num_rows > 0)
                        {
                      
                           while($row=$result1->fetch_assoc())
                           {
                             if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
                              {
                                $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
                                echo"<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                                $i++;
                              }
                              else{
                                $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
                                echo"<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                              }
                           }
                  
                        }
                        else
                        {
                          if($F!="1.30"&& $F!="3.50"){
                          echo"<td> </td>";
                          }
                         
                        }
                        $i++;
                        }
                  
                      
                      echo"</tr>
                      <tr>
                        <th scope='row' class='text-center bg-warning'><span class=' text-l  font-weight-bold'id=''>Tue</span></th>";
                     
                  
                       $From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
                       $l=count($From);
                       $i=0;
                      
                       while($i<$l)
                        {
                          $F=$From[$i];
                      
                     
                       
                        
                        
                       $q2="select * from $tablename where `Days`='Tue' and `Time_from`=$F";
                  
                        $result1=$con->query($q2);
                        if($result1->num_rows > 0)
                        {
                      
                           while($row=$result1->fetch_assoc())
                           {
                             if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
                              {
                                $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
                                echo"<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                                $i++;
                              }
                              else{
                                $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
                                echo"<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                              }
                           }
                  
                        }
                        else
                        {
                          if($F!="1.30"&& $F!="3.50"){
                          echo"<td> </td>";
                          }
                         
                        }
                        $i++;
                        }
                  
                   echo"
                      </tr>
                      <tr>
                        <th scope='row' class='text-center bg-warning'><span class=' text-l  font-weight-bold'id=''>Wed</span></th>";
                       
                  
                  $From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
                  $l=count($From);
                  $i=0;
                  
                  while($i<$l)
                   {
                     $F=$From[$i];
                  
                  
                  
                   
                   
                  $q2="select * from $tablename where `Days`='Wed' and `Time_from`=$F";
                  
                   $result1=$con->query($q2);
                   if($result1->num_rows > 0)
                   {
                  
                      while($row=$result1->fetch_assoc())
                      {
                        if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
                         {
                           $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
                           echo"<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                           $i++;
                         }
                         else{
                           $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
                           echo"<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                         }
                      }
                  
                   }
                   else
                   {
                     if($F!="1.30"&& $F!="3.50"){
                     echo"<td> </td>";
                     }
                    
                   }
                   $i++;
                   }
                  
            
                     echo" </tr>
                      <tr>
                        <th scope='row' class='text-center bg-warning'><span class=' text-l  font-weight-bold'id=''>Thus</span></th>";
                       
                  
                  $From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
                  $l=count($From);
                  $i=0;
                  
                  while($i<$l)
                   {
                     $F=$From[$i];
                  
                  
                  
                   
                   
                  $q2="select * from $tablename where `Days`='Thus' and `Time_from`=$F";
                  
                   $result1=$con->query($q2);
                   if($result1->num_rows > 0)
                   {
                  
                      while($row=$result1->fetch_assoc())
                      {
                        if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
                         {
                           $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
                           echo"<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                           $i++;
                         }
                         else{
                           $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
                           echo"<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                         }
                      }
                  
                   }
                   else
                   {
                     if($F!="1.30"&& $F!="3.50"){
                     echo"<td> </td>";
                     }
                    
                   }
                   $i++;
                   }
                  

                  echo"    </tr>
                      <tr>
                        <th scope='row' class='text-center bg-warning'><span class=' text-l  font-weight-bold'id=''>Fri</span></th>";
                       
                  
                  $From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
                  $l=count($From);
                  $i=0;
                  
                  while($i<$l)
                   {
                     $F=$From[$i];
                  
                  
                  
                   
                   
                  $q2="select * from $tablename where `Days`='Fri' and `Time_from`=$F";
                  
                   $result1=$con->query($q2);
                   if($result1->num_rows > 0)
                   {
                  
                      while($row=$result1->fetch_assoc())
                      {
                        if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
                         {
                           $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
                           echo"<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                           $i++;
                         }
                         else{
                           $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
                           echo"<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                         }
                      }
                  
                   }
                   else
                   {
                     if($F!="1.30"&& $F!="3.50"){
                     echo"<td> </td>";
                     }
                    
                   }
                   $i++;
                   }
                  
            
                  echo"    </tr>
                      <tr>
                        <th scope='row' class='text-center bg-warning'><span class=' text-l  font-weight-bold'id=''>Sat</span></th>";
                       
                  
                  $From=array("9.30","10.30","11.30","12.30","1.30","1.50","2.50","3.50","4.00","5.00");
                  $l=count($From);
                  $i=0;
                  
                  while($i<$l)
                   {
                     $F=$From[$i];
                  
                  
                  
                   
                   
                  $q2="select * from $tablename where `Days`='Sat' and `Time_from`=$F";
                  
                   $result1=$con->query($q2);
                   if($result1->num_rows > 0)
                   {
                  
                      while($row=$result1->fetch_assoc())
                      {
                        if($row["TH/PR"]=="PR"||$row["TH/PR"]=="TU")
                         {
                           $sub="".$row["Subject"]." - ".$row["Batch"]." - "." ( ".$row["Rn/Ln"]." ) <br>".$row["Class"];
                           echo"<td colspan='2 ' class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                           $i++;
                         }
                         else{
                           $sub="".$row["Subject"]." - ".$row["Rn/Ln"]." ".$row["Class"];
                           echo"<td  class='text-center'><span class=' text-l  font-weight-bold'id=''>$sub</span></td>";
                         }
                      }
                  
                   }
                   else
                   {
                     if($F!="1.30"&& $F!="3.50"){
                     echo"<td> </td>";
                     }
                    
                   }
                   $i++;
                   }
                  
             
                    echo"  </tr>
                      <tr>
                  </tr>
                      
                    </tbody>
                  </table>
                  </div>";
        echo" <form method='POST'action='./php/see timetable.php'>
        <div class='container pt-3'>          
      <div class='row justify-content-center'>
  <div class='col d-flex justify-content-center '>

<input type='submit' name='download' class='btn btn-success w-25' value='Download'>   
</form>
</div>
</div>
</div>";
                  
                }
?>

</div>

              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
     
    </div>
  </main>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
 

 
<script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
  
</body>

</html>