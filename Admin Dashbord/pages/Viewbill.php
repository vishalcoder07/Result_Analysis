<?php
include('./php/previewbillsrc.php');
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
    Assign Subject
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
        `
         

<div class="card-body px-0 pb-2">
<div class="table-responsive p-0">
                <table class="table align-items-center table-bordered mb-0">
                <?php
 
             
 $tablename=$Faculty_id."Bill";
 $billid=$Faculty_id.$Month.$Year;
 $q3="Select * from  $tablename where Bill_id='$billid'";
 $result=$con->query($q3);
 while($row=$result->fetch_assoc())
 {
   $thhours=$row["Total_th_hours"];
   $prhours=$row["Total_pr_hours"];
   $Th_rate=$row["Th_rate"];
   $Pr_rate=$row["Pr_rate"];
   $thamount=$row["Total_amount_of_th"];
   $pramount=$row["Total_amount_of_pr"];
   $total=$row["Total_amount"];
   $Date=$row["Date"];
 }
 ?>
                  <thead>
                  <tr>
                    <th colspan='9' class="text-center text-uppercase text-x  font-weight-bolder ">Bill of remonuration for c.h.b. lectures</th>
                    </tr>
                    <tr>
                     <td colspan='4' rowspan='4'> 
                     <img src="../../img/dtelogo.jpg"  style="height:150px; width:150px; align:center;  display: block; margin-left: auto; margin-right: auto;">
                  
                      </td> 
                     
                      <th colspan='5' class="text-center text-uppercase text-xs  font-weight-bolder "></th>
                      
                    </tr> 
                    <tr>
                    
                    <th colspan='3' class="text-center text-uppercase text-xs  font-weight-bolder ">Bill for the month:</th>
                    <th colspan='3' class="text-center  text-xs  font-weight-bolder "><?php echo $Month." ".$Year?></th>
                    </tr> 
                    <tr>
                      <?php
                       
                      ?>
                    <th colspan='3' class="text-center text-uppercase text-xs  font-weight-bolder ">Date of submission:</th>
                    <th colspan='2' class="text-center text-uppercase text-xs  font-weight-bolder "><?php echo $Date?></th>
                    </tr> 
                  
                    <tr>
                      <?php
            
                      $q="Select * From faculty_details where Faculty_id='$Faculty_id'";
                      $result=$con->query($q) ;
                      while($row=$result->fetch_assoc())
                      {
                        $First_name=$row["First_name"];
                        $Middle_name=$row["Middle_name"];
                        $Last_name=$row["Last_name"];
                      }
                      $Full_name=$First_name." ".$Middle_name." ".$Last_name;
                      ?>
                   
                    <th colspan='3' class="text-center text-uppercase text-xs  font-weight-bolder ">Name of Claimant:</th>
                    <th colspan='2' class="text-center text-uppercase text-xs  font-weight-bolder "><?php echo $Full_name; ?></th>
                    </tr> 

                    <tr>
                    <td colspan='4' class='text-center'> 
                   
                   <span class=' text-center  text-l font-weight-bold' >GOVERNMENT POLYTECHNIC AHMEDNAGAR</span>
                    </td> 
                    <th colspan='3' class="text-center text-uppercase text-xs  font-weight-bolder ">Department:</th>

                    <th colspan='2' class="text-center text-uppercase text-xs  font-weight-bolder ">CO/CM</th>
                    </tr> 
                    <tr>
                      <th class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">Class</th>
                      <th class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">From</th>
                      <th class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">To</th>
                      <th class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">Hours</th>
                      <th class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">TH/PR</th>
                      <th class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">Subject</th>
                      <th class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">No of Student</th>
                      <th class="text-center text-uppercase  text-xxs font-weight-bolder opacity-7">Topic Covered in Brief</th>
               
                    </tr>
                  </thead>
                  <tbody>
              <?php
      
              $f=$Faculty_id;
              $tablename=$f.$Month.$Year;
              $q="SELECT * FROM `$tablename`";
             $result=$con->query($q);
             if($result->num_rows > 0)
             { $count=1;
               while($row=$result->fetch_assoc())
               {
                $Date=$row['Date'];
                $Class=$row['Class'];
                $Class=$row['Class'];
                $From=$row['Time_from'];
                $To=$row['Time_to'];
                $Hours=$row['Hours'];
                $THPR=$row['TH/PR'];
                $Subject=$row['Subject'];
                $Present_Student=$row['Present_Student'];
                $Topic_covered=$row['Topic_covered'];


                 echo"
                <tr>
                <td class='align-middle text-center text-sm'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s1' >$Date</span>
                </td>

                <td class='align-middle text-center text-sm'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s2'>$Class</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s3'>$From</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s4'>$To</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s5'>$Hours</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s6'>$THPR</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s7'>$Subject</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s8'>$Present_Student</span>
                </td>
                <td class='align-middle text-center'>
                <span class='text-secondary text-xs font-weight-bold'id='r".$count."s9'>$Topic_covered</span>
                </td>
            
              </tr>";
              $count++;
               }
   
             }
  
              ?>

               <tr> <td>
            </td> 
               </tr> 
                  </tbody>
         
            </table> 
              </div>
           
              <br> 
              <div class="table-responsive p-0">
              <div class="row"> 
                    <div class="col-12 d-flex justify-content-center">
                </table>
                <table class="table align-items-center table-bordered mb-0"> 
                  <thead> 
                  <tr>
                    <th colspan='4' class="text-center text-uppercase text-x  font-weight-bolder ">Summary of Bill</th>
                    </tr>
                    <tr>
                    <th  class="text-center  text-xs  font-weight-bolder ">Type</th>
                    <th  class="text-center  text-xs  font-weight-bolder ">Hours Taught</th>
                    <th  class="text-center  text-xs  font-weight-bolder ">Rate/Hours Rs.</th>
                    <th  class="text-center  text-xs  font-weight-bolder ">Amount Rs.</th>
                    </tr>
                    
            </thead>
            <tr>
                    <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'>Theory:</span>
                </td>
                <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'><?php echo $thhours;?></span>
                </td>
                <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'><?php echo $Th_rate;?></span>
                </td>
                <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'><?php echo $thamount;?></span>
                </td>
                    </tr>
                    <tr>
                    <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'>Practical:</span>
                </td>
                <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'><?php echo $prhours;?></span>
                </td>
                <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'><?php echo $Pr_rate;?></span>
                </td>
                <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'><?php echo $pramount;?></span>
                </td>
                    </tr>
                    <tr>
                    <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'>Total:</span>
                </td>
                <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'></span>
                </td>
                <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'></span>
                </td>
                <td class='align-middle text-center text-sm'>
                <span class=' text-xs font-weight-bold'><?php echo $total;?></span>
                </td>
                    </tr> 
                    <tr> 
          
            </tr> 
            </table> 
             
            </div> 
            </div> 
            </div>
            <form action="./php/aprejbill.php" method="POST" >
            <div class="row mt-3">
         
            <div class="col-md-6 d-flex justify-content-md-end justify-content-center ">
             
             <input type="submit" name="aproved" class="btn btn-success  btn-sm w-25" id="apbtn" value="Approved">   
  
              </div>
              <div class="col-md-6 d-flex justify-content-md-start justify-content-center ">
             
             <input type="button" name="Rejected" id="rejbtn" onclick="reject()"class="btn btn-danger btn-sm w-25" value="Reject">   
   
              </div>
              <div  id="addta">
     
            </div>
            </form>
        
  </main>
  
<?php
include('./php/alert.php');
?> 


  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  


  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>
