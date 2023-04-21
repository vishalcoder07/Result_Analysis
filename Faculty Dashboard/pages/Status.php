<?php
session_start();
if(!isset($_SESSION["Faculty_id"]))
{
  echo "<script>window.location.href='../../Faculty Login/index.php';</script>";
}
$Faculty_id=$_SESSION["Faculty_id"];
include ('./php/Connection.php');
unset($_SESSION["Month"]); 
unset($_SESSION["Year"]);

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
     Appy For Bill
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
          <a class="nav-link text-white " href="../pages/See Timetable.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            
            <span class="nav-link-text ms-1">See Timetable</span>
          </a>
        </li>      <li class="nav-item">
          <a class="nav-link text-white" href="../pages/Apply For Bill.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            
            <span class="nav-link-text ms-1">Prepare Bill</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/Status.php">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Status of Bill</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Status of Bill</h6>
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
                <h6 class="text-white text-capitalize ps-3">Status of Bill</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container ">
               <?php
               $Faculty_id=$_SESSION["Faculty_id"];
               $tablename=$Faculty_id."Bill";
               $q="Select * From $tablename where `Status`='Not Prepared'";
               $result=$con->query($q);
               if($result->num_rows>0){
                while($row=$result->fetch_assoc())
                {
                  $Month=$row["Month"];
                  $Year=$row["Year"];
                  echo"<div class='row'>
                                    <div class='col-lg-12 box-sectiopn pb-4'>
                  <div class='row m-0'>
                  <div class='col-lg-3 text-center bg-warning block text-white'>
                  <i class='fa fa-exclamation-circle' aria-hidden='true'></i>
                  </div>
                  <div class='col-lg-9 card-body border-right border border-warning'>
                  <h5 class='card-title text-secondary'>Not Prepared</h5>
                  <h5 class='card-title text-secondary'>$Month $Year.</h5>
                  <p class='card-text'>Your bill prepration is in process please complete it!</p>
                  </div>
                  </div>
                  </div>
                  </div>";
                }
               }
            
               ?>
                             <?php
               $Faculty_id=$_SESSION["Faculty_id"];
               $tablename=$Faculty_id."Bill";
               $q="Select * From $tablename where `Status`='In Process'";
               $result=$con->query($q);
               if($result->num_rows>0){
                while($row=$result->fetch_assoc())
                {
                  $Month=$row["Month"];
                  $Year=$row["Year"];
                  echo"<div class='row'>
                  <div class='col-lg-12 box-sectiopn pb-4'>
                  <div class='row m-0'>
                  <div class='col-lg-3 text-center bg-info block text-white'>
                  <i class='fa fa-info-circle' aria-hidden='true'></i>
                  </div>
                  <div class='col-lg-9 card-body border-right border border-info'>
                  <h5 class='card-title text-secondary'>In Process</h5>
                  <h5 class='card-title text-secondary'>$Month $Year</h5>
                  <p class='card-text'>Your Bill is sended to Admin for Verification purpose</p>
                  </div>
                  </div>
                  </div>
                  </div>";
                }
               }
            
               ?>
                                    <?php
               $Faculty_id=$_SESSION["Faculty_id"];
               $tablename=$Faculty_id."Bill";
               $q="Select * From $tablename where `Status`='Rejected'";
               $result=$con->query($q);
               $count=1;
               if($result->num_rows>0){
                while($row=$result->fetch_assoc())
                {
                  $Month=$row["Month"];
                  $Year=$row["Year"];
                  $Reason=$row["Reason"];
                  echo"<div class='row'>
                  <div class='col-lg-12 box-sectiopn pb-4'>
                  <div class='row m-0'>
                  <div class='col-lg-3 text-center bg-danger block text-white'>
                  <i class='fa fa-dot-circle-o' aria-hidden='true'></i>
                  </div>
                  <div class='col-lg-9 card-body border-right border border-danger'>
                  <h5 class='card-title text-danger'>Rejected</h5>
                  <h5 class='card-title text-secondary'id='m".$count."'>$Month  $Year</h5>
                  <h5 class='card-title text-secondary'>Reason</h5>
                  <p class='card-text'>$Reason</p>
                  <input type='submit' class='btn btn-warning text-white btn-sm 'id='btn".$count."' onclick='edit(this)' value='Edit'>
                  </div>
                  </div>
                  </div>
                  </div>";
                  $count++;
                }
               }
            
               ?>
               
              
              <?php
               $Faculty_id=$_SESSION["Faculty_id"];
               $tablename=$Faculty_id."Bill";
               $date=Date('Y-m-d', strtotime('-31 days'));

               $q="Select * From $tablename where `Status`='Approved' and Apdate>='$date'";
       

               $result=$con->query($q);
               $count=1;
               if($result->num_rows>0){
                while($row=$result->fetch_assoc())
                {
                  $Month=$row["Month"];
                  $Year=$row["Year"];
                  $Reason=$row["Reason"];
                  echo"<div class='row'>
                  <div class='col-lg-12 box-sectiopn pb-4'>
                  <div class='row m-0'>
                  <div class='col-lg-3 text-center bg-success block text-white'>
                  <i class='fa fa-thumbs-o-up' aria-hidden='true'></i>
                  </div>
                  <div class='col-lg-9 card-body border-right border border-success'>
                  <h5 class='card-title text-success'>Approved</h5>
                  <h5 class='card-title text-secondary'id='ms".$count."'>$Month  $Year</h5>
         
                  <input type='submit' class='btn btn-success text-white btn-sm 'id='btns".$count."' onclick='download(this)' value='Download Bill'>
               
                  </div>
                  </div>

                  </div>
                  </div>";
                  $count++;
                }
               }
            
               ?>
              
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
     
    </div>
  </main>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
 
  <?php
include('./php/alert.php');
?>
 
<script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
  
</body>

</html>
<script>
  function edit(val)
  {
    id=val.id;
    console.log(id);
    newid=id.replace("btn","");
    console.log(newid);
    var my=document.querySelector("#"+"m"+newid).textContent;
    const a= my.split(" ");
    const m= a[0];
    const y=a[2];
    document.location.href="./php/editbill.php?Month="+m+"&Year="+y+"&edit=1";

  }
  function download(val)
  {  id=val.id;
    newid=id.replace("btns","");
    console.log(newid);
    var my=document.querySelector("#"+"ms"+newid).textContent;
    const a= my.split(" ");
    const m= a[0];
    const y=a[2];
    document.location.href="./php/downbill.php?Month="+m+"&Year="+y+"&down=1";
  }
  </script>