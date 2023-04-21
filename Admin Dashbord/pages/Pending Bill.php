<?php
session_start();
include ('./php/Connection.php');
include('./php/prependingbill.php');

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
   Pending Bill
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
     <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark ps bg-white" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <span class="navbar-brand " >

        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center " id="bname">
          <i class="fa-solid fa-circle-user m-2"></i>
          <span class="ms-1 font-weight-bold text-white">Admin</span>
        </div>

      </span>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard.php">
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
          <a class="nav-link text-white " href="../pages/Add new faculty.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>

            <span class="nav-link-text ms-1">Add new Faculty</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/Assign Subject.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
</div>

            <span class="nav-link-text ms-1">Assign Subject</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/Assign Timetable.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
</div>

<span class="nav-link-text ms-1">Assign Timetable</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Scheme</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/Set scheme.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>

            <span class="nav-link-text ms-1">Set Scheme</span>
          </a>
        </li>
           <li class="nav-item">
          <a class="nav-link text-white " href="../pages/Edit Scheme.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>

            <span class="nav-link-text ms-1">Edit Scheme</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Rate</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white   " href="../pages/Edit rate.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            
            <span class="nav-link-text ms-1">Edit Rate</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Bill</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary  " href="../pages/Pending Bill.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            
            <span class="nav-link-text ms-1">Pending Bill</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/Covering letter.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            
            <span class="nav-link-text ms-1">Covering Letter</span>
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pending Bill</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Pending Bill</h6>
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
    <div class="container-fluid py-4">
      <div class="row">`
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Pending Bill</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                <form action="./php/facultysubjectdetails.php" method="POST">
         

<div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Faculty Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of submission</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Month</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                     
                      <th class="text-secondary opacity-7"></th>
                     
                    </tr>
                  </thead>
                  <tbody>
              <?php
               $count=1;
              $q="SELECT * FROM `faculty_details`";
             $result=$con->query($q);
             if($result->num_rows > 0)
             { 
               while($row=$result->fetch_assoc())
               {  
                 $First_name=$row["First_name"];
                 $Middle_name=$row["Middle_name"];
                 $Last_name=$row["Last_name"];
                 $Faculty_name=$First_name." ".$Middle_name." ".$Last_name;
                 $Faculty_id=$row["Faculty_id"];
                 $tablename=$Faculty_id."Bill";
                 $q1="Select * from `$tablename` where `Status`='In Process' ";

                 $result1=$con->query($q1);
                 while($row=$result1->fetch_assoc())
                 {  
                   $Date=$row["Date"];
                    $Month=$row["Month"];
                  $Year=$row["Year"];
                  $Amount=$row["Total_amount"];
                 echo"
                <tr>
                <td class='align-middle text-center text-sm'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s1' >$Faculty_name</span>
                </td>

                <td class='align-middle text-center text-sm'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s2'>$Date</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s3'>$Month</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s4'>$Year</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s5'>$Amount</span>
                </td>
    
                <td class='align-middle'>
              <input type='button' class='btn btn-secondary btn-sm' onclick='view(this)' value='View'id='r".$count."btn1' >
             </td>
            
              </tr>";
              $count++;

                      
                 }
             


               }

             }

              ?>


                  </tbody>
                </table>


              </div>


              </form>
              <div class="row">
                <div class="col">
                  
                </div>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </main>

<?php
include('./php/alert.php');
?>


  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  


  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>
