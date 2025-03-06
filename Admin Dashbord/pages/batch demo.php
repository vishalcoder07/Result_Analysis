<?php
session_start();

include ('./php/Connection.php');

if(isset($_POST["submit"]))
{
    $batch=$_POST["batch"];
    $year=$_POST["year"];

    $q="select * From existingbatches";
    $result=$con->query($q);

    $isRecordExit = FALSE;

    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $exitingYear=$row["YEAR"];
       
        if($exitingYear == $year){
          $isRecordExit = TRUE;
          break;
        }
      }
    }


    if($isRecordExit == FALSE){
      $_SESSION["status"]="ERROR";
      
      $batchInFormat = $batch[0].$batch[1].$batch[2].$batch[3]."-".$batch[4].$batch[5];
      
      $_SESSION["status_msg"]=$batchInFormat." ".$year. " "." year Data is Not Available";
      $_SESSION["status_code"]="error";
      echo"<Script>window.location.href='./Batch Wise Anaysis.php'</Script>";
    }

    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.jpg">
  <link href="../assets/css/style.css" rel="stylesheet" />
  <title>
  Batch Wise Anaysis
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
          <a class="nav-link text-white " href="../pages/Upload Result PDF.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>

            <span class="nav-link-text ms-1">Upload Result PDF</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/Subject Wise Anaylsis.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
</div>

            <span class="nav-link-text ms-1">Subject Wise Anaylsis</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/Batch Wise Anaysis.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
</div>

            <span class="nav-link-text ms-1">Batch Wise Anaysis</span>
          </a>
        </li>
        
       
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Batch Wise Anaysis</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Batch Wise Anaysis</h6>
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

<!-- FIRST TABLE -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                <?php $batchInFormat = $batch[0].$batch[1].$batch[2].$batch[3]."-".$batch[4].$batch[5]; ?>

                <h6 class="text-white text-capitalize ps-3"><?php echo $batchInFormat ?> Batch Sem 1 Analysis</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
          
              <?php
                    $subjectName = $year.'yearsubjects';
                    $q="select * From `$subjectName` WHERE `SEM` = 1 ORDER BY `srno`";
                    $result=$con->query($q);
                    $i=0;
                    $subjectNameArray;
                    $subjectCodeArray;
                    
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                        $subjectCode = $row['SUBJECT CODE'];
                        $subjectName = $row['SUBJECT NAME'];
                        
                        $subjectNames[$i] = $subjectName;
                        $subjectCodes[$i] = $subjectCode;

                        $i++;
                       }       
                    }

                
            
              ?>

              <table class="table" style="display: block; overflow: auto;">
                <thead class="thead-light">
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>           
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[0]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[1]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[2]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[3]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[4]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[5]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[6]; ?>.</th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[7]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[8]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[9]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[10]; ?></th>
                    </tr>
                    
                    <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Prn No</th>
                    <th scope="col">Seat No</th>
                    <th scope="col">Name</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>
                    </tr>
                </thead>
                
                <tbody>

                <?php 
                          $tableName = $batch.$year.'yearanalysis';

                          $query = "SELECT * FROM `$tableName`";
                          $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                          $Sr_no = 1;        
                          if (mysqli_num_rows($run_query) > 0 ) 
                          {
                              while ($row = mysqli_fetch_array($run_query))
                                {

                                        $prn = $row["prn"];
                                        $SEAT_NO = $row["seat no"];
                                        $NAME = $row["name"];


                                        $sub1ISE = $row[$subjectCodes[0]. "ISE"];
                                        $sub1ESE = $row[$subjectCodes[0]. "ESE"];
                                        $sub1TOTAL = $row[$subjectCodes[0]."TOTAL"];
                                        $sub1TW= $row[$subjectCodes[0]. "TW"];
                                        $sub1PR = $row[$subjectCodes[0]."PR"];
                                        $sub1OR = $row[$subjectCodes[0]."OR"];
                                        $sub1Tot = $row[$subjectCodes[0]."Tot%"];
                                       
                                        $sub2ISE = $row[$subjectCodes[1] . "ISE"];
                                        $sub2ESE = $row[$subjectCodes[1] . "ESE"];
                                        $sub2TOTAL = $row[$subjectCodes[1] . "TOTAL"];
                                        $sub2TW= $row[$subjectCodes[1] . "TW"];
                                        $sub2PR = $row[$subjectCodes[1] . "PR"];
                                        $sub2OR = $row[$subjectCodes[1] . "OR"];
                                        $sub2Tot = $row[$subjectCodes[1] . "Tot%"];

                                        $sub3ISE = $row[$subjectCodes[2] . "ISE"];
                                        $sub3ESE = $row[$subjectCodes[2] . "ESE"];
                                        $sub3TOTAL = $row[$subjectCodes[2] . "TOTAL"];
                                        $sub3TW= $row[$subjectCodes[2] . "TW"];
                                        $sub3PR = $row[$subjectCodes[2] . "PR"];
                                        $sub3OR = $row[$subjectCodes[2] . "OR"];
                                        $sub3Tot = $row[$subjectCodes[2] . "Tot%"];

                                        $sub4ISE = $row[$subjectCodes[3] . "ISE"];
                                        $sub4ESE = $row[$subjectCodes[3] . "ESE"];
                                        $sub4TOTAL = $row[$subjectCodes[3] . "TOTAL"];
                                        $sub4TW= $row[$subjectCodes[3] . "TW"];
                                        $sub4PR = $row[$subjectCodes[3] . "PR"];
                                        $sub4OR = $row[$subjectCodes[3] . "OR"];
                                        $sub4Tot = $row[$subjectCodes[3] . "Tot%"];

                                        $sub5ISE = $row[$subjectCodes[4] . "ISE"];
                                        $sub5ESE = $row[$subjectCodes[4] . "ESE"];
                                        $sub5TOTAL = $row[$subjectCodes[4] . "TOTAL"];
                                        $sub5TW= $row[$subjectCodes[4] . "TW"];
                                        $sub5PR = $row[$subjectCodes[4] . "PR"];
                                        $sub5OR = $row[$subjectCodes[4] . "OR"];
                                        $sub5Tot = $row[$subjectCodes[4] . "Tot%"];

                                        $sub6ISE = $row[$subjectCodes[5] . "ISE"];
                                        $sub6ESE = $row[$subjectCodes[5] . "ESE"];
                                        $sub6TOTAL = $row[$subjectCodes[5] . "TOTAL"];
                                        $sub6TW= $row[$subjectCodes[5] . "TW"];
                                        $sub6PR = $row[$subjectCodes[5] . "PR"];
                                        $sub6OR = $row[$subjectCodes[5] . "OR"];
                                        $sub6Tot = $row[$subjectCodes[5] . "Tot%"];

                                        $sub7ISE = $row[$subjectCodes[6] . "ISE"];
                                        $sub7ESE = $row[$subjectCodes[6] . "ESE"];
                                        $sub7TOTAL = $row[$subjectCodes[6] . "TOTAL"];
                                        $sub7TW= $row[$subjectCodes[6] . "TW"];
                                        $sub7PR = $row[$subjectCodes[6] . "PR"];
                                        $sub7OR = $row[$subjectCodes[6] . "OR"];
                                        $sub7Tot = $row[$subjectCodes[6] . "Tot%"];

                                        $sub8ISE = $row[$subjectCodes[7] . "ISE"];
                                        $sub8ESE = $row[$subjectCodes[7] . "ESE"];
                                        $sub8TOTAL = $row[$subjectCodes[7] . "TOTAL"];
                                        $sub8TW= $row[$subjectCodes[7] . "TW"];
                                        $sub8PR = $row[$subjectCodes[7] . "PR"];
                                        $sub8OR = $row[$subjectCodes[7] . "OR"];
                                        $sub8Tot = $row[$subjectCodes[7] . "Tot%"];

                                        $sub9ISE = $row[$subjectCodes[8] . "ISE"];
                                        $sub9ESE = $row[$subjectCodes[8] . "ESE"];
                                        $sub9TOTAL = $row[$subjectCodes[8] . "TOTAL"];
                                        $sub9TW= $row[$subjectCodes[8] . "TW"];
                                        $sub9PR = $row[$subjectCodes[8] . "PR"];
                                        $sub9OR = $row[$subjectCodes[8] . "OR"];
                                        $sub9Tot = $row[$subjectCodes[8] . "Tot%"];

                                        $sub10ISE = $row[$subjectCodes[9] . "ISE"];
                                        $sub10ESE = $row[$subjectCodes[9] . "ESE"];
                                        $sub10TOTAL = $row[$subjectCodes[9] . "TOTAL"];
                                        $sub10TW= $row[$subjectCodes[9] . "TW"];
                                        $sub10PR = $row[$subjectCodes[9] . "PR"];
                                        $sub10OR = $row[$subjectCodes[9] . "OR"];
                                        $sub10Tot = $row[$subjectCodes[9] . "Tot%"];

                                        $sub11ISE = $row[$subjectCodes[10] . "ISE"];
                                        $sub11ESE = $row[$subjectCodes[10] . "ESE"];
                                        $sub11TOTAL = $row[$subjectCodes[10] . "TOTAL"];
                                        $sub11TW= $row[$subjectCodes[10] . "TW"];
                                        $sub11PR = $row[$subjectCodes[10] . "PR"];
                                        $sub11OR = $row[$subjectCodes[10] . "OR"];
                                        $sub11Tot = $row[$subjectCodes[10] . "Tot%"];                                   

                                        echo"
                                                      
                                          <tr>
                                            
                                            <td>$Sr_no</td>
                                            <td>$prn</td>
                                            <td>$SEAT_NO</td>   
                                            <td>$NAME</td>  
                                            
                                            <td>$sub1ISE</td>
                                            <td>$sub1ESE</td>
                                            <td>$sub1TOTAL</td>
                                            <td>$sub1TW</td>
                                            <td>$sub1PR</td>
                                            <td>$sub1OR</td>
                                            <td>$sub1Tot</td>

                                            <td>$sub2ISE</td>
                                            <td>$sub2ESE</td>
                                            <td>$sub2TOTAL</td>
                                            <td>$sub2TW</td>
                                            <td>$sub2PR</td>
                                            <td>$sub2OR</td>
                                            <td>$sub2Tot</td>

                                            <td>$sub3ISE</td>
                                            <td>$sub3ESE</td>
                                            <td>$sub3TOTAL</td>
                                            <td>$sub3TW</td>
                                            <td>$sub3PR</td>
                                            <td>$sub3OR</td>
                                            <td>$sub3Tot</td>

                                            <td>$sub4ISE</td>
                                            <td>$sub4ESE</td>
                                            <td>$sub4TOTAL</td>
                                            <td>$sub4TW</td>
                                            <td>$sub4PR</td>
                                            <td>$sub4OR</td>
                                            <td>$sub4Tot</td>

                                            <td>$sub5ISE</td>
                                            <td>$sub5ESE</td>
                                            <td>$sub5TOTAL</td>
                                            <td>$sub5TW</td>
                                            <td>$sub5PR</td>
                                            <td>$sub5OR</td>
                                            <td>$sub5Tot</td>

                                            <td>$sub6ISE</td>
                                            <td>$sub6ESE</td>
                                            <td>$sub6TOTAL</td>
                                            <td>$sub6TW</td>
                                            <td>$sub6PR</td>
                                            <td>$sub6OR</td>
                                            <td>$sub6Tot</td>

                                            <td>$sub7ISE</td>
                                            <td>$sub7ESE</td>
                                            <td>$sub7TOTAL</td>
                                            <td>$sub7TW</td>
                                            <td>$sub7PR</td>
                                            <td>$sub7OR</td>
                                            <td>$sub7Tot</td>

                                            <td>$sub8ISE</td>
                                            <td>$sub8ESE</td>
                                            <td>$sub8TOTAL</td>
                                            <td>$sub8TW</td>
                                            <td>$sub8PR</td>
                                            <td>$sub8OR</td>
                                            <td>$sub8Tot</td>

                                            <td>$sub9ISE</td>
                                            <td>$sub9ESE</td>
                                            <td>$sub9TOTAL</td>
                                            <td>$sub9TW</td>
                                            <td>$sub9PR</td>
                                            <td>$sub9OR</td>
                                            <td>$sub9Tot</td>

                                            <td>$sub10ISE</td>
                                            <td>$sub10ESE</td>
                                            <td>$sub10TOTAL</td>
                                            <td>$sub10TW</td>
                                            <td>$sub10PR</td>
                                            <td>$sub10OR</td>
                                            <td>$sub10Tot</td>

                                            <td>$sub11ISE</td>
                                            <td>$sub11ESE</td>
                                            <td>$sub11TOTAL</td>
                                            <td>$sub11TW</td>
                                            <td>$sub11PR</td>
                                            <td>$sub11OR</td>
                                            <td>$sub11Tot</td>
                                            
                                        </tr>";
                                        
                                        $Sr_no++;
                                
                        }} ?>
                </tbody>
                  
            </table>

                             </div>
                        </div>


                <form action="./php/batch sem one exel.php" method="POST">
                      <div class="col d-flex justify-content-center">

                          <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                          <input type="hidden" name="batch" value="<?php echo $batch; ?>">

                          <input type="submit" name="submit" class="btn w-20 btn-info" value="Download"> 
                      </div>
                  </form>

                
                     </div>

                  </div>

              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- FIRST TABLE END -->


<!-- SECOND TABLE -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                <?php $batchInFormat = $batch[0].$batch[1].$batch[2].$batch[3]."-".$batch[4].$batch[5]; ?>

                <h6 class="text-white text-capitalize ps-3"><?php echo $batchInFormat ?> Batch Sem 2 Analysis</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
          
              <?php
                    $subjectName = $year.'yearsubjects';
                    $q="select * From `$subjectName` WHERE `SEM` = 2 ORDER BY `srno`";
                    $result=$con->query($q);
                    $i=0;
                    $subjectNameArray;
                    $subjectCodeArray;
                    
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                        $subjectCode = $row['SUBJECT CODE'];
                        $subjectName = $row['SUBJECT NAME'];
                        
                        $subjectNames[$i] = $subjectName;
                        $subjectCodes[$i] = $subjectCode;

                        $i++;
                       }       
                    }

                
            
              ?>

              <table class="table" style="display: block; overflow: auto;">
                <thead class="thead-light">
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>           
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[0]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[1]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[2]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[3]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[4]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[5]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[6]; ?>.</th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[7]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[8]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[9]; ?></th>
                    <th scope="col" colspan="7" style="text-align: center;"><?php echo $subjectNames[10]; ?></th>
                    </tr>
                    
                    <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Prn No</th>
                    <th scope="col">Seat No</th>
                    <th scope="col">Name</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>

                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Tot%</th>
                    </tr>
                </thead>
                
                <tbody>

                <?php 
                          $tableName = $batch.$year.'yearanalysis';

                          $query = "SELECT * FROM `$tableName`";
                          $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                          $Sr_no = 1;        
                          if (mysqli_num_rows($run_query) > 0 ) 
                          {
                              while ($row = mysqli_fetch_array($run_query))
                                {

                                        $prn = $row["prn"];
                                        $SEAT_NO = $row["seat no"];
                                        $NAME = $row["name"];


                                        $sub1ISE = $row[$subjectCodes[0]. "ISE"];
                                        $sub1ESE = $row[$subjectCodes[0]. "ESE"];
                                        $sub1TOTAL = $row[$subjectCodes[0]."TOTAL"];
                                        $sub1TW= $row[$subjectCodes[0]. "TW"];
                                        $sub1PR = $row[$subjectCodes[0]."PR"];
                                        $sub1OR = $row[$subjectCodes[0]."OR"];
                                        $sub1Tot = $row[$subjectCodes[0]."Tot%"];
                                       
                                        $sub2ISE = $row[$subjectCodes[1] . "ISE"];
                                        $sub2ESE = $row[$subjectCodes[1] . "ESE"];
                                        $sub2TOTAL = $row[$subjectCodes[1] . "TOTAL"];
                                        $sub2TW= $row[$subjectCodes[1] . "TW"];
                                        $sub2PR = $row[$subjectCodes[1] . "PR"];
                                        $sub2OR = $row[$subjectCodes[1] . "OR"];
                                        $sub2Tot = $row[$subjectCodes[1] . "Tot%"];

                                        $sub3ISE = $row[$subjectCodes[2] . "ISE"];
                                        $sub3ESE = $row[$subjectCodes[2] . "ESE"];
                                        $sub3TOTAL = $row[$subjectCodes[2] . "TOTAL"];
                                        $sub3TW= $row[$subjectCodes[2] . "TW"];
                                        $sub3PR = $row[$subjectCodes[2] . "PR"];
                                        $sub3OR = $row[$subjectCodes[2] . "OR"];
                                        $sub3Tot = $row[$subjectCodes[2] . "Tot%"];

                                        $sub4ISE = $row[$subjectCodes[3] . "ISE"];
                                        $sub4ESE = $row[$subjectCodes[3] . "ESE"];
                                        $sub4TOTAL = $row[$subjectCodes[3] . "TOTAL"];
                                        $sub4TW= $row[$subjectCodes[3] . "TW"];
                                        $sub4PR = $row[$subjectCodes[3] . "PR"];
                                        $sub4OR = $row[$subjectCodes[3] . "OR"];
                                        $sub4Tot = $row[$subjectCodes[3] . "Tot%"];

                                        $sub5ISE = $row[$subjectCodes[4] . "ISE"];
                                        $sub5ESE = $row[$subjectCodes[4] . "ESE"];
                                        $sub5TOTAL = $row[$subjectCodes[4] . "TOTAL"];
                                        $sub5TW= $row[$subjectCodes[4] . "TW"];
                                        $sub5PR = $row[$subjectCodes[4] . "PR"];
                                        $sub5OR = $row[$subjectCodes[4] . "OR"];
                                        $sub5Tot = $row[$subjectCodes[4] . "Tot%"];

                                        $sub6ISE = $row[$subjectCodes[5] . "ISE"];
                                        $sub6ESE = $row[$subjectCodes[5] . "ESE"];
                                        $sub6TOTAL = $row[$subjectCodes[5] . "TOTAL"];
                                        $sub6TW= $row[$subjectCodes[5] . "TW"];
                                        $sub6PR = $row[$subjectCodes[5] . "PR"];
                                        $sub6OR = $row[$subjectCodes[5] . "OR"];
                                        $sub6Tot = $row[$subjectCodes[5] . "Tot%"];

                                        $sub7ISE = $row[$subjectCodes[6] . "ISE"];
                                        $sub7ESE = $row[$subjectCodes[6] . "ESE"];
                                        $sub7TOTAL = $row[$subjectCodes[6] . "TOTAL"];
                                        $sub7TW= $row[$subjectCodes[6] . "TW"];
                                        $sub7PR = $row[$subjectCodes[6] . "PR"];
                                        $sub7OR = $row[$subjectCodes[6] . "OR"];
                                        $sub7Tot = $row[$subjectCodes[6] . "Tot%"];

                                        $sub8ISE = $row[$subjectCodes[7] . "ISE"];
                                        $sub8ESE = $row[$subjectCodes[7] . "ESE"];
                                        $sub8TOTAL = $row[$subjectCodes[7] . "TOTAL"];
                                        $sub8TW= $row[$subjectCodes[7] . "TW"];
                                        $sub8PR = $row[$subjectCodes[7] . "PR"];
                                        $sub8OR = $row[$subjectCodes[7] . "OR"];
                                        $sub8Tot = $row[$subjectCodes[7] . "Tot%"];

                                        $sub9ISE = $row[$subjectCodes[8] . "ISE"];
                                        $sub9ESE = $row[$subjectCodes[8] . "ESE"];
                                        $sub9TOTAL = $row[$subjectCodes[8] . "TOTAL"];
                                        $sub9TW= $row[$subjectCodes[8] . "TW"];
                                        $sub9PR = $row[$subjectCodes[8] . "PR"];
                                        $sub9OR = $row[$subjectCodes[8] . "OR"];
                                        $sub9Tot = $row[$subjectCodes[8] . "Tot%"];

                                        $sub10ISE = $row[$subjectCodes[9] . "ISE"];
                                        $sub10ESE = $row[$subjectCodes[9] . "ESE"];
                                        $sub10TOTAL = $row[$subjectCodes[9] . "TOTAL"];
                                        $sub10TW= $row[$subjectCodes[9] . "TW"];
                                        $sub10PR = $row[$subjectCodes[9] . "PR"];
                                        $sub10OR = $row[$subjectCodes[9] . "OR"];
                                        $sub10Tot = $row[$subjectCodes[9] . "Tot%"];

                                        $sub11ISE = $row[$subjectCodes[10] . "ISE"];
                                        $sub11ESE = $row[$subjectCodes[10] . "ESE"];
                                        $sub11TOTAL = $row[$subjectCodes[10] . "TOTAL"];
                                        $sub11TW= $row[$subjectCodes[10] . "TW"];
                                        $sub11PR = $row[$subjectCodes[10] . "PR"];
                                        $sub11OR = $row[$subjectCodes[10] . "OR"];
                                        $sub11Tot = $row[$subjectCodes[10] . "Tot%"];                                   

                                        echo"
                                                      
                                          <tr>
                                            
                                            <td>$Sr_no</td>
                                            <td>$prn</td>
                                            <td>$SEAT_NO</td>   
                                            <td>$NAME</td>  
                                            
                                            <td>$sub1ISE</td>
                                            <td>$sub1ESE</td>
                                            <td>$sub1TOTAL</td>
                                            <td>$sub1TW</td>
                                            <td>$sub1PR</td>
                                            <td>$sub1OR</td>
                                            <td>$sub1Tot</td>

                                            <td>$sub2ISE</td>
                                            <td>$sub2ESE</td>
                                            <td>$sub2TOTAL</td>
                                            <td>$sub2TW</td>
                                            <td>$sub2PR</td>
                                            <td>$sub2OR</td>
                                            <td>$sub2Tot</td>

                                            <td>$sub3ISE</td>
                                            <td>$sub3ESE</td>
                                            <td>$sub3TOTAL</td>
                                            <td>$sub3TW</td>
                                            <td>$sub3PR</td>
                                            <td>$sub3OR</td>
                                            <td>$sub3Tot</td>

                                            <td>$sub4ISE</td>
                                            <td>$sub4ESE</td>
                                            <td>$sub4TOTAL</td>
                                            <td>$sub4TW</td>
                                            <td>$sub4PR</td>
                                            <td>$sub4OR</td>
                                            <td>$sub4Tot</td>

                                            <td>$sub5ISE</td>
                                            <td>$sub5ESE</td>
                                            <td>$sub5TOTAL</td>
                                            <td>$sub5TW</td>
                                            <td>$sub5PR</td>
                                            <td>$sub5OR</td>
                                            <td>$sub5Tot</td>

                                            <td>$sub6ISE</td>
                                            <td>$sub6ESE</td>
                                            <td>$sub6TOTAL</td>
                                            <td>$sub6TW</td>
                                            <td>$sub6PR</td>
                                            <td>$sub6OR</td>
                                            <td>$sub6Tot</td>

                                            <td>$sub7ISE</td>
                                            <td>$sub7ESE</td>
                                            <td>$sub7TOTAL</td>
                                            <td>$sub7TW</td>
                                            <td>$sub7PR</td>
                                            <td>$sub7OR</td>
                                            <td>$sub7Tot</td>

                                            <td>$sub8ISE</td>
                                            <td>$sub8ESE</td>
                                            <td>$sub8TOTAL</td>
                                            <td>$sub8TW</td>
                                            <td>$sub8PR</td>
                                            <td>$sub8OR</td>
                                            <td>$sub8Tot</td>

                                            <td>$sub9ISE</td>
                                            <td>$sub9ESE</td>
                                            <td>$sub9TOTAL</td>
                                            <td>$sub9TW</td>
                                            <td>$sub9PR</td>
                                            <td>$sub9OR</td>
                                            <td>$sub9Tot</td>

                                            <td>$sub10ISE</td>
                                            <td>$sub10ESE</td>
                                            <td>$sub10TOTAL</td>
                                            <td>$sub10TW</td>
                                            <td>$sub10PR</td>
                                            <td>$sub10OR</td>
                                            <td>$sub10Tot</td>

                                            <td>$sub11ISE</td>
                                            <td>$sub11ESE</td>
                                            <td>$sub11TOTAL</td>
                                            <td>$sub11TW</td>
                                            <td>$sub11PR</td>
                                            <td>$sub11OR</td>
                                            <td>$sub11Tot</td>
                                            
                                        </tr>";
                                        
                                        $Sr_no++;
                                
                        }} ?>
                </tbody>
                  
            </table>

                             </div>
                        </div>


                <form action="./php/batch sem one exel.php" method="POST">
                      <div class="col d-flex justify-content-center">

                          <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                          <input type="hidden" name="batch" value="<?php echo $batch; ?>">

                          <input type="submit" name="submit" class="btn w-20 btn-info" value="Download"> 
                      </div>
                  </form>

                
                     </div>

                  </div>

              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- SECOND TABLE END -->

</div>
  </main>

<?php
include('./php/alert.php');
?>

  <script src="./js/subjectWiseAnaylsis.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>