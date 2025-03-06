<?php
session_start();
include ('./php/Connection.php');

if(isset($_POST["submit"]))
{
    $batch=$_POST["batch"];
    $year=$_POST["year"];
    $subject=$_POST["subject"];

    $q="select * From existingbatches where BATCH='$batch'";
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
      echo"<Script>window.location.href='./Subject Wise Anaylsis.php'</Script>";
    }



}


$q="select * From existingbatches";
$result=$con->query($q);

$batchSelected = "";
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
  Subject Wise Anaylsis
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
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/Subject Wise Anaylsis.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
</div>

            <span class="nav-link-text ms-1">Subject Wise Anaylsis</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/Batch Wise Anaysis.php">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Subject Wise Anaylsis</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Subject Wise Anaylsis</h6>
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
                <h6 class="text-white text-capitalize ps-3">TOPPER LIST</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
          
          
              <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Prn No</th>
                    <th scope="col">Seat No</th>
                    <th scope="col">Name</th>
                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Percentage</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
  
                          $query = "SELECT * FROM `$subject` where BATCH='$batch' ORDER BY TOTAL DESC" ;
                          $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                
                          $firstTopperTotal = -1;
                          $secondTopperTotal = -1;
                          $thirdTopperTotal = -1;
                          
                          if (mysqli_num_rows($run_query) > 0 ){

                              while ($row = mysqli_fetch_array($run_query)){
                                                            
                                    $TOTALPER = $row["Tot%"];

                                    if($TOTALPER > $firstTopperTotal){
                                      $thirdTopperTotal = $secondTopperTotal;
                                      $secondTopperTotal = $firstTopperTotal;
                                      $firstTopperTotal = $TOTALPER;
                                    }
                                    else if($TOTALPER  > $secondTopperTotal && $TOTALPER != $firstTopperTotal){
                                      $thirdTopperTotal = $secondTopperTotal;
                                      $secondTopperTotal = $TOTALPER;
                                    }
                                    else if($TOTALPER > $thirdTopperTotal && $TOTALPER != $secondTopperTotal){
                                      $thirdTopperTotal = $TOTALPER;
                                    }
                                    
                        }} 
                        
                        $query1 = "SELECT * FROM `$subject` where `Tot%`='$firstTopperTotal'" ;
                        $run_query1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                        
                        if (mysqli_num_rows($run_query1) > 0 ) 
                        {
                            while ($row = mysqli_fetch_array($run_query1))
                              {
                                                          
                                    $prn = $row["PRN"];
                                    $seat = $row["SEAT NO"];
                                    $name = $row["NAME"];
                                    $ISE = $row["ISE"];
                                    $ESE = $row["ESE"];
                                    $TOTAL = $row["TOTAL"];
                                    $TW = $row["TW"];
                                    $PR = $row["PR"];
                                    $OR = $row["OR"];
                                    $Percentage = $row["Tot%"];
                                    
                                    echo "<tr>
                                    <th scope='row'>1</th>
                                    <td>$prn</td>
                                    <td>$seat</td>
                                    <td>$name</td>
                                    <td>$ISE</td>
                                    <td>$ESE</td>
                                    <td>$TOTAL</td>
                                    <td>$TW</td>
                                    <td>$PR</td>
                                    <td>$OR</td>
                                    <td>$Percentage</td>

                                    </tr>"; 
                              }
                        }

                        $query2 = "SELECT * FROM `$subject` where `Tot%`='$secondTopperTotal'" ;  
                        $run_query2 = mysqli_query($con, $query2) or die(mysqli_error($con));

                        if (mysqli_num_rows($run_query2) > 0 ) 
                        {
                            while ($row = mysqli_fetch_array($run_query2))
                              {
                                                          
                                    $prn = $row["PRN"];
                                    $seat = $row["SEAT NO"];
                                    $name = $row["NAME"];
                                    $ISE = $row["ISE"];
                                    $ESE = $row["ESE"];
                                    $TOTAL = $row["TOTAL"];
                                    $TW = $row["TW"];
                                    $PR = $row["PR"];
                                    $OR = $row["OR"];
                                    $Percentage = $row["Tot%"];
                                    
                                    echo "<tr>
                                    <th scope='row'>2</th>
                                    <td>$prn</td>
                                    <td>$seat</td>
                                    <td>$name</td>
                                    <td>$ISE</td>
                                    <td>$ESE</td>
                                    <td>$TOTAL</td>
                                    <td>$TW</td>
                                    <td>$PR</td>
                                    <td>$OR</td>
                                    <td>$Percentage</td>

                                    </tr>"; 
                              }
                        }


                        $query3 = "SELECT * FROM `$subject` where `Tot%`='$thirdTopperTotal'" ;
                        $run_query3 = mysqli_query($con, $query3) or die(mysqli_error($con));

                        if (mysqli_num_rows($run_query3) > 0 ) 
                        {
                            while ($row = mysqli_fetch_array($run_query3))
                              {
                                                          
                                      $prn = $row["PRN"];
                                      $seat = $row["SEAT NO"];
                                      $name = $row["NAME"];
                                      $ISE = $row["ISE"];
                                      $ESE = $row["ESE"];
                                      $TOTAL = $row["TOTAL"];
                                      $TW = $row["TW"];
                                      $PR = $row["PR"];
                                      $OR = $row["OR"];
                                      $Percentage = $row["Tot%"];
                                      
                                      echo "<tr>
                                      <th scope='row'>3</th>
                                      <td>$prn</td>
                                      <td>$seat</td>
                                      <td>$name</td>
                                      <td>$ISE</td>
                                      <td>$ESE</td>
                                      <td>$TOTAL</td>
                                      <td>$TW</td>
                                      <td>$PR</td>
                                      <td>$OR</td>
                                      <td>$Percentage</td>

                                      </tr>";  
                              }
                        }
                        
                        echo "<script> </script>"
                        ?>

                            

                      </tbody>
                  
            </table>

                      


                        </div>
                        </div>
                    

                  <form action="./php/subjecttopper.php" method="POST">
                      <div class="col d-flex justify-content-center">

                          <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                          <input type="hidden" name="batch" value="<?php echo $batch; ?>">
                          <input type="hidden" name="firstTopperTotal" value="<?php echo $firstTopperTotal; ?>">
                          <input type="hidden" name="secondTopperTotal" value="<?php echo $secondTopperTotal; ?>">
                          <input type="hidden" name="thirdTopperTotal" value="<?php echo $thirdTopperTotal; ?>">

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
    </div>
<!-- FIRST TABLE END-->

<!-- SECOND TABLE -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">PASS STUDENT LIST</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
          
          
              <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Prn No</th>
                    <th scope="col">Seat No</th>
                    <th scope="col">Name</th>
                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Percentage</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
  
                          $query = "SELECT * FROM `$subject` where BATCH='$batch'" ;
                          $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                          $Sr_no = 1;        
                          if (mysqli_num_rows($run_query) > 0 ) 
                          {
                              while ($row = mysqli_fetch_array($run_query))
                                {
                                    $Grd = $row["Grd"];
                                    if($Grd != 'F'){ 

                                      $prn = $row["PRN"];
                                      $seat = $row["SEAT NO"];
                                      $name = $row["NAME"];
                                      $ISE = $row["ISE"];
                                      $ESE = $row["ESE"];
                                      $TOTAL = $row["TOTAL"];
                                      $TW = $row["TW"];
                                      $PR = $row["PR"];
                                      $OR = $row["OR"];
                                      $Percentage = $row["Tot%"];
                                      
                                      echo "<tr>
                                      <td>$Sr_no</td>
                                      <td>$prn</td>
                                      <td>$seat</td>
                                      <td>$name</td>
                                      <td>$ISE</td>
                                      <td>$ESE</td>
                                      <td>$TOTAL</td>
                                      <td>$TW</td>
                                      <td>$PR</td>
                                      <td>$OR</td>
                                      <td>$Percentage</td>
  
                                      </tr>"; 
                                        
                                      $Sr_no++;
                                }
                        }} ?>
                      </tbody>
                  
            </table>

                             </div>
                        </div>


                <form action="./php/subjectpass.php" method="POST">
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

<!-- THIRD TABLE -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">FAIL STUDENT LIST</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
          
          
              <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Prn No</th>
                    <th scope="col">Seat No</th>
                    <th scope="col">Name</th>
                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Percentage</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
  
                          $query = "SELECT * FROM `$subject` where BATCH='$batch'" ;
                          $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                          $Sr_no = 1;        
                          if (mysqli_num_rows($run_query) > 0 ) 
                          {
                              while ($row = mysqli_fetch_array($run_query))
                                {
                                    $Grd = $row["Grd"];
                                    if($Grd == 'F'){ 

                                      $prn = $row["PRN"];
                                      $seat = $row["SEAT NO"];
                                      $name = $row["NAME"];
                                      $ISE = $row["ISE"];
                                      $ESE = $row["ESE"];
                                      $TOTAL = $row["TOTAL"];
                                      $TW = $row["TW"];
                                      $PR = $row["PR"];
                                      $OR = $row["OR"];
                                      $Percentage = $row["Tot%"];
                                      
                                      echo "<tr>
                                      <td>$Sr_no</td>
                                      <td>$prn</td>
                                      <td>$seat</td>
                                      <td>$name</td>
                                      <td>$ISE</td>
                                      <td>$ESE</td>
                                      <td>$TOTAL</td>
                                      <td>$TW</td>
                                      <td>$PR</td>
                                      <td>$OR</td>
                                      <td>$Percentage</td>
  
                                      </tr>"; 
                                        
                                      $Sr_no++;
                                }
                        }} ?>
                      </tbody>
                  
            </table>

                      


                             </div>
                        </div>

                        <form action="./php/subjectfail.php" method="POST">
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

<!-- THIRD TABLE END -->



<!-- FOURTH TABLE -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">ALL STUDENT LIST</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
          
          
              <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Prn No</th>
                    <th scope="col">Seat No</th>
                    <th scope="col">Name</th>
                    <th scope="col">ISE</th>
                    <th scope="col">ESE</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">TW</th>
                    <th scope="col">PR</th>
                    <th scope="col">OR</th>
                    <th scope="col">Percentage</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
  
                          $query = "SELECT * FROM `$subject` where BATCH='$batch'" ;
                          $run_query = mysqli_query($con, $query) or die(mysqli_error($con));

                          $Sr_no = 1;        
                          if (mysqli_num_rows($run_query) > 0 ) 
                          {
                              while ($row = mysqli_fetch_array($run_query))
                                {
                                                            
                                      $prn = $row["PRN"];
                                      $seat = $row["SEAT NO"];
                                      $name = $row["NAME"];
                                      $ISE = $row["ISE"];
                                      $ESE = $row["ESE"];
                                      $TOTAL = $row["TOTAL"];
                                      $TW = $row["TW"];
                                      $PR = $row["PR"];
                                      $OR = $row["OR"];
                                      $Percentage = $row["Tot%"];
                                      
                                      echo "<tr>
                                      <td>$Sr_no</td>
                                      <td>$prn</td>
                                      <td>$seat</td>
                                      <td>$name</td>
                                      <td>$ISE</td>
                                      <td>$ESE</td>
                                      <td>$TOTAL</td>
                                      <td>$TW</td>
                                      <td>$PR</td>
                                      <td>$OR</td>
                                      <td>$Percentage</td>

                                      </tr>"; 
                                        
                                      $Sr_no++;
                        }} ?>
                      </tbody>
                  
            </table>

                      


                             </div>
                        </div>

                        <form action="./php/subjectall.php" method="POST">
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

<!-- FOURTH TABLE END -->



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
