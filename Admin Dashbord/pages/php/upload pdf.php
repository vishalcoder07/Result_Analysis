<?php
set_time_limit(0);
session_start();

include ('Connection.php');


if(isset($_POST['submit']))
{
  $Batch= $_POST["Batch"]; 
  $year= $_POST["year"]; 


  $query1="select * From existingbatches";
  $result1=$con->query($query1);

  $isRecordExit = FALSE;

  if($result1->num_rows>0){
    while($row = $result1->fetch_assoc()){
      $exitingYear=$row["YEAR"];
      $exitingBatch = $row["BATCH"];
      if($exitingYear == $year && $exitingBatch == $Batch){
        $isRecordExit = TRUE;
        break;
      }
    }
  }


  // Replace YOUR_API_SECRET with your actual ConvertAPI secret
  $api_secret = "aRW0AF1OOPWVctZA";

  // Define the input and output formats
  $input_format = "pdf";
  $output_format = "csv";

  // Upload the file to the server
  $target_file = basename($_FILES["file"]["name"]);
  move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

  // Set up the cURL request
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://v2.convertapi.com/convert/pdf/to/csv?Secret=aRW0AF1OOPWVctZA&StoreFile=true&Delimiter=%2C");
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, [
    "File" => new CURLfile($target_file)
  ]);

  // Send the request and receive the response
  $response = curl_exec($ch);
  curl_close($ch);

  //echo $response;
  unlink($target_file);

  // Decode the response from JSON format
  $response_obj = json_decode($response);

  if($year == "second" && $isRecordExit == FALSE){
      $tableName = $Batch.'secondyearanalysis';
      $sql = "CREATE TABLE `$tableName` (
        `prn` text,
        `seat no` text,
        `name` text,
        
        `210241ISE` text,
        `210241ESE` text,
        `210241TOTAL` text,
        `210241TW` text,
        `210241PR` text,
        `210241OR` text,
        `210241Tot%` text,
        `210241Crd` int,
        `210241Grd` text,
        `210241GP` int,
        `210241CP` int,
        
        `210242ISE` text,
        `210242ESE` text,
        `210242TOTAL` text,
        `210242TW` text,
        `210242PR` text,
        `210242OR` text,
        `210242Tot%` text,
        `210242Crd` int,
        `210242Grd` text,
        `210242GP` int,
        `210242CP` int,    
    
        `210243ISE` text,
        `210243ESE` text,
        `210243TOTAL` text,
        `210243TW` text,
        `210243PR` text,
        `210243OR` text,
        `210243Tot%` text,
        `210243Crd` int,
        `210243Grd` text,
        `210243GP` int,
        `210243CP` int, 
      
        `210244ISE` text,
        `210244ESE` text,
        `210244TOTAL` text,
        `210244TW` text,
        `210244PR` text,
        `210244OR` text,
        `210244Tot%` text,
        `210244Crd` int,
        `210244Grd` text,
        `210244GP` int,
        `210244CP` int,     
    
        `210245ISE` text,
        `210245ESE` text,
        `210245TOTAL` text,
        `210245TW` text,
        `210245PR` text,
        `210245OR` text,
        `210245Tot%` text,
        `210245Crd` int,
        `210245Grd` text,
        `210245GP` int,
        `210245CP` int,      
    
        `210246ISE` text,
        `210246ESE` text,
        `210246TOTAL` text,
        `210246TW` text,
        `210246PR` text,
        `210246OR` text,
        `210246Tot%` text,
        `210246Crd` int,
        `210246Grd` text,
        `210246GP` int,
        `210246CP` int,    
      
        `210247ISE` text,
        `210247ESE` text,
        `210247TOTAL` text,
        `210247TW` text,
        `210247PR` text,
        `210247OR` text,
        `210247Tot%` text,
        `210247Crd` int,
        `210247Grd` text,
        `210247GP` int,
        `210247CP` int,  
    
        `210248ISE` text,
        `210248ESE` text,
        `210248TOTAL` text,
        `210248TW` text,
        `210248PR` text,
        `210248OR` text,
        `210248Tot%` text,
        `210248Crd` int,
        `210248Grd` text,
        `210248GP` int,
        `210248CP` int,  
    
        `210249ISE` text,
        `210249ESE` text,
        `210249TOTAL` text,
        `210249TW` text,
        `210249PR` text,
        `210249OR` text,
        `210249Tot%` text,
        `210249Crd` int,
        `210249Grd` text,
        `210249GP` int,
        `210249CP` int,
    
        `210250ISE` text,
        `210250ESE` text,
        `210250TOTAL` text,
        `210250TW` text,
        `210250PR` text,
        `210250OR` text,
        `210250Tot%` text,
        `210250Crd` int,
        `210250Grd` text,
        `210250GP` int,
        `210250CP` int,
    
        `210251BISE` text,
        `210251BESE` text,
        `210251BTOTAL` text,
        `210251BTW` text,
        `210251BPR` text,
        `210251BOR` text,
        `210251BTot%` text,
        `210251BCrd` int,
        `210251BGrd` text,
        `210251BGP` int,
        `210251BCP` int, 

    
        `207003ISE` text,
        `207003ESE` text,
        `207003TOTAL` text,
        `207003TW` text,
        `207003PR` text,
        `207003OR` text,
        `207003Tot%` text,
        `207003Crd` int,
        `207003Grd` text,
        `207003GP` int,
        `207003CP` int,
    
        `207003*ISE` text,
        `207003*ESE` text,
        `207003*TOTAL` text,
        `207003*TW` text,
        `207003*PR` text,
        `207003*OR` text,
        `207003*Tot%` text,
        `207003*Crd` int,
        `207003*Grd` text,
        `207003*GP` int,
        `207003*CP` int, 
      
        `210252ISE` text,
        `210252ESE` text,
        `210252TOTAL` text,
        `210252TW` text,
        `210252PR` text,
        `210252OR` text,
        `210252Tot%` text,
        `210252Crd` int,
        `210252Grd` text,
        `210252GP` int,
        `210252CP` int, 
    
        `210253ISE` text,
        `210253ESE` text,
        `210253TOTAL` text,
        `210253TW` text,
        `210253PR` text,
        `210253OR` text,
        `210253Tot%` text,
        `210253Crd` int,
        `210253Grd` text,
        `210253GP` int,
        `210253CP` int,  
    
        `210254ISE` text,
        `210254ESE` text,
        `210254TOTAL` text,
        `210254TW` text,
        `210254PR` text,
        `210254OR` text,
        `210254Tot%` text,
        `210254Crd` int,
        `210254Grd` text,
        `210254GP` int,
        `210254CP` int, 
    
        `210255ISE` text,
        `210255ESE` text,
        `210255TOTAL` text,
        `210255TW` text,
        `210255PR` text,
        `210255OR` text,
        `210255Tot%` text,
        `210255Crd` int,
        `210255Grd` text,
        `210255GP` int,
        `210255CP` int,
      
        `210256ISE` text,
        `210256ESE` text,
        `210256TOTAL` text,
        `210256TW` text,
        `210256PR` text,
        `210256OR` text,
        `210256Tot%` text,
        `210256Crd` int,
        `210256Grd` text,
        `210256GP` int,
        `210256CP` int,
    
        `210257ISE` text,
        `210257ESE` text,
        `210257TOTAL` text,
        `210257TW` text,
        `210257PR` text,
        `210257OR` text,
        `210257Tot%` text,
        `210257Crd` int,
        `210257Grd` text,
        `210257GP` int,
        `210257CP` int,
    
        `210258ISE` text,
        `210258ESE` text,
        `210258TOTAL` text,
        `210258TW` text,
        `210258PR` text,
        `210258OR` text,
        `210258Tot%` text,
        `210258Crd` int,
        `210258Grd` text,
        `210258GP` int,
        `210258CP` int,
    
        `210259ISE` text,
        `210259ESE` text,
        `210259TOTAL` text,
        `210259TW` text,
        `210259PR` text,
        `210259OR` text,
        `210259Tot%` text,
        `210259Crd` int,
        `210259Grd` text,
        `210259GP` int,
        `210259CP` int,        
      
        `210260DISE` text,
        `210260DESE` text,
        `210260DTOTAL` text,
        `210260DTW` text,
        `210260DPR` text,
        `210260DOR` text,
        `210260DTot%` text,
        `210260DCrd` int,
        `210260DGrd` text,
        `210260DGP` int,
        `210260DCP` int
    );";

    $result = $con->query($sql);
    if($result == FALSE){
      $_SESSION["status"]="ERROR"; 
      $_SESSION["status_msg"]="There is Problem Try After Some Time";
      $_SESSION["status_code"]="error";
      echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
    }


      $dataTakeCnt = 0;
      $isFirstTime = true;
      $isSemOne = true;

      //variable Which we need Globally 
      $seatNo = -1;
      $name = "";
      $prn = -1;


      foreach ($response_obj -> Files as $file) {
          if($isFirstTime){
            $isFirstTime = false;
            continue;
          }

          if($dataTakeCnt == 4){
            $dataTakeCnt = 0;
            continue;
          }
          
          $url = $file -> Url;
          $page = fopen($url, "r");    
        
          if($isSemOne){
              $isSemOne = false;

              $isFirstRowTaken = false;
              $skipTwoLine = 2;

              while (($data = fgetcsv($page)) !== FALSE) {
                if($isFirstRowTaken == false){
                    $numColumns = count($data);
                    
                    $seatNoName = explode(" ",$data[0]);
                    $seatNoNameCnt = count($seatNoName);

                    $seatNo = $seatNoName[2];
                    $name = "";
                    for($i=5; $i<$seatNoNameCnt; $i++){
                        $name = $name . " " . $seatNoName[$i];
                    }


                    if($numColumns == 3){
                      $PrnNo = explode(" ", $data[2]);
                      $prn = $PrnNo[1];
                      $prn = ltrim($prn, ':');
                    }
                    else{
                      $PrnNo = explode(" ", $data[1]);
                      $prnCnt = count($PrnNo);

                      $prn = $PrnNo[$prnCnt - 3];
                      $prn = ltrim($prn, ':');
                    }
                    

                    $isFirstRowTaken = true;

                    //insert prn, seat no, name into table
                    $sql = "INSERT INTO `$tableName`(`prn`, `seat no`, `name`) VALUES ('$prn','$seatNo','$name')";
                    $result = $con->query($sql);
                    if($result == FALSE){
                      $_SESSION["status"]="ERROR"; 
                      $_SESSION["status_msg"]="There is Some Problem Try After some time";
                      $_SESSION["status_code"]="error";
                      echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
                    }
                    continue;
                }

                if($skipTwoLine == 0){
                  $subCodeName = explode(" ", $data[0]);
                  $subCode = $subCodeName[0];

                  $ISEMark = explode("/", $data[1]);
                  $ISE = $ISEMark[0];

                  $ESEMark = explode("/", $data[2]);
                  $ESE = $ESEMark[0];

                  $TOTALMarks = explode("/", $data[3]);
                  $TOTAL = $TOTALMarks[0];

                  $TWMarks = explode("/", $data[4]);
                  $TW = $TWMarks[0];

                  $PRMarks = explode("/", $data[5]);
                  $PR = $PRMarks[0];

                  $OR = $data[6];

                  $Tot = $data[7];

                  $Crd = $data[8];

                  $Grd = $data[9];

                  $GP = $data[10];

                  $CP = $data[11];

                  $PRandORD = explode(" ", $data[12]);
                  $PandR = $PRandORD[0];
                  $ORD = $PRandORD[1];



                  $sql = "INSERT INTO `$subCode`(`Batch`, `PRN`, `SEAT NO`, `NAME`, `ISE`, `ESE`, `TOTAL`, `TW`, `PR`, `OR`, `Tot%`, `Crd`, `Grd`, `GP`, `CP`, `P&R`, `ORD`) VALUES ('$Batch','$prn','$seatNo','$name','$ISE','$ESE','$TOTAL','$TW','$PR','$OR','$Tot','$Crd','$Grd','$GP','$CP','$PandR','$ORD')";

                  if ($con->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $con->error;
                  } 

                  // Batch wise analaysis code
                  $colISE = $subCode.'ISE';
                  $colESE = $subCode.'ESE';
                  $colTOTAL = $subCode.'TOTAL';
                  $colTW = $subCode.'TW';
                  $colPR = $subCode.'PR';
                  $colOR = $subCode.'OR';
                  $colTot = $subCode.'Tot%';
                  $colCrd = $subCode.'Crd';
                  $colGrd = $subCode.'Grd';
                  $colGP = $subCode.'GP';
                  $colCP = $subCode.'CP';

                  $sql = "UPDATE `$tableName` SET `$colISE`='$ISE',`$colESE`='$ESE',`$colTOTAL`='$TOTAL',`$colTW`='$TW',`$colPR`='$PR',`$colOR`='$OR',`$colTot`='$Tot' ,`$colCrd` = '$Crd', `$colGrd` = '$Grd', `$colGP` = '$GP', `$colCP` = '$CP' WHERE `prn`='$prn'"; 
                  $result = $con->query($sql);
                  if($result == FALSE){
                    $_SESSION["status"]="ERROR"; 
                    $_SESSION["status_msg"]="There is Some Problem try after some time";
                    $_SESSION["status_code"]="error";
                    echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
                  }


                }
                else{
                  $skipTwoLine -= 1;
                }
            }

          }
          else{
            $isSemOne = true;
                  $dataTake = 1;
                  while (($data = fgetcsv($page)) !== FALSE) {

                    $subCodeName = explode(" ", $data[0]);
                    $subCode = $subCodeName[0];

                    $ISEMark = explode("/", $data[1]);
                    $ISE = $ISEMark[0];
                    $ISE = ltrim($ISE, '*');

                    $ESEMark = explode("/", $data[2]);
                    $ESE = $ESEMark[0];

                    $TOTALMarks = explode("/", $data[3]);
                    $TOTAL = $TOTALMarks[0];
                    
                    if($dataTake == 1){
              
                          $TW = "---";  
      
                          $PR = "---";
      
                          $OR = "---";
      
                          $Tot = $data[7];
      
                          $Crd = $data[8];
      
                          $Grd = $data[9];
      
                          $GP = $data[10];
      
                          $CP = $data[11];
      
                         
                          $PANDR = "---";
                          $ORD = "---";
  
                    }
                    elseif($dataTake == 2){
                          $TWMarks = explode("/", $data[5]);
                          $TW = $TWMarks[0];
      
                          $PR = "---";
      
                          $OR = "---";
      
                          $Tot = $data[8];
      
                          $Crd = $data[9];
      
                          $Grd = $data[10];
      
                          $GP = $data[11];
      
                          $CP = $data[12];
      
                          $PANDR = "---";
                          $ORD = "---";

                          $subCode = "207003*";
                    }
                    elseif($dataTake == 3){
                          $TW = "---";
      
                          $PR = "---";
      
                          $OR = "---";
      
                          $Tot = $data[7];
      
                          $Crd = $data[8];
      
                          $Grd = $data[9];
      
                          $GP = $data[10];
      
                          $CP = $data[11];
      
                          $PANDR = "---";
                          $ORD = "---";
  
                    }
                    elseif($dataTake == 4){
                          $TW = "---";
          
                          $PR = "---";
      
                          $OR = "---";
      
                          $Tot = $data[7];
      
                          $Crd = $data[8];
      
                          $Grd = $data[9];
      
                          $GP = $data[10];
      
                          $CP = $data[11];
      
                          $PANDR = "---";
                          $ORD = "---";
  
                    }
                    elseif($dataTake == 5){
                          $TW = "---";
              
                          $PR = "---";
      
                          $OR = "---";
      
                          $Tot = $data[7];
      
                          $Crd = $data[8];
      
                          $Grd = $data[9];
      
                          $GP = $data[10];
      
                          $CP = $data[11];
      
                          $PANDR = "---";
                          $ORD = "---";
                    }
                    elseif($dataTake == 6){
                          $TW = "---";
                  
                          $PR = "---";
      
                          $OR = "---";
      
                          $Tot = $data[7];
      
                          $Crd = $data[8];
      
                          $Grd = $data[9];
      
                          $GP = $data[10];
      
                          $CP = $data[11];
      
                          $PANDR = "---";
                          $ORD = "---";
                    }
                    elseif($dataTake == 7){
                          $TWMarks = explode("/", $data[5]);
                          $TW = $TWMarks[0];
      
                          $PRMarks = explode("/", $data[6]);
                          $PR = $PRMarks[0];
      
                          $OR = "---";
      
                          $Tot = $data[8];
      
                          $Crd = $data[9];
      
                          $Grd = $data[10];
      
                          $GP = $data[11];
      
                          $CP = $data[12];
      
                          $PANDR = "---";
                          $ORD = "---";
                    }
                    elseif($dataTake == 8){
                          $TWMarks = explode("/", $data[5]);
                          $TW = $TWMarks[0];
      
                          $PR = "---";
      
                          $ORMarks = explode("/", $data[7]);
                          $OR = $ORMarks[0];
      
                          $Tot = $data[8];
      
                          $Crd = $data[9];
      
                          $Grd = $data[10];
      
                          $GP = $data[11];
      
                          $CP = $data[12];
      
                          $PANDR = "---";
                          $ORD = "---";
                    }
                    elseif($dataTake == 9){
                          $TWMarks = explode("/", $data[5]);
                          $TW = $TWMarks[0];
      
                          $PR = "---";
      
                          $OR = "---";
      
                          $Tot = $data[8];
      
                          $Crd = $data[9];
      
                          $Grd = $data[10];
      
                          $GP = $data[11];
      
                          $CP = $data[12];
      
                          $PANDR = "---";
                          $ORD = "---";
                    }
                    elseif($dataTake == 10){
                          $TWMarks = explode("/", $data[5]);
                          $TW = $TWMarks[0];
      
                          $PR = "---";
      
                          $OR = "---";
      
                          $Tot = $data[8];
      
                          $Crd = $data[9];
      
                          $Grd = $data[10];
      
                          $GP = $data[11];
      
                          $CP = $data[12];
      
                          $PANDR = "---";
                          $ORD = "---";
                    }
                    else{
                          $TW = "---";
      
                          $PR = "---";
      
                          $OR = "---";
      
                          $Tot = "AC";
      
                          $Crd = 0;
      
                          $Grd = "AC";
      
                          $GP = 0;
      
                          $CP = 0;
      
                          $PANDR = "---";
                          $ORD = "---";
                    }
                    $dataTake += 1;
                    
                    $sql = "INSERT INTO `$subCode`(`Batch`, `PRN`, `SEAT NO`, `NAME`, `ISE`, `ESE`, `TOTAL`, `TW`, `PR`, `OR`, `Tot%`, `Crd`, `Grd`, `GP`, `CP`, `P&R`, `ORD`) VALUES ('$Batch','$prn','$seatNo','$name','$ISE','$ESE','$TOTAL','$TW','$PR','$OR','$Tot','$Crd','$Grd','$GP','$CP','$PANDR','$ORD')";

                    if ($con->query($sql) === FALSE) {
                      echo "Error: " . $sql . "<br>" . $con->error;
                    } 

                    // Batch wise analaysis code
                    $colISE = $subCode.'ISE';
                    $colESE = $subCode.'ESE';
                    $colTOTAL = $subCode.'TOTAL';
                    $colTW = $subCode.'TW';
                    $colPR = $subCode.'PR';
                    $colOR = $subCode.'OR';
                    $colTot = $subCode.'Tot%';
                    $colCrd = $subCode.'Crd';
                    $colGrd = $subCode.'Grd';
                    $colGP = $subCode.'GP';
                    $colCP = $subCode.'CP';

                    $sql = "UPDATE `$tableName` SET `$colISE`='$ISE',`$colESE`='$ESE',`$colTOTAL`='$TOTAL',`$colTW`='$TW',`$colPR`='$PR',`$colOR`='$OR',`$colTot`='$Tot', `$colCrd` = '$Crd', `$colGrd` = '$Grd', `$colGP` = '$GP', `$colCP` = '$CP' WHERE `prn`='$prn'"; 
                    $result = $con->query($sql);
                    if($result == FALSE){
                      $_SESSION["status"]="ERROR"; 
                      $_SESSION["status_msg"]="There is Some Problem try after some time";
                      $_SESSION["status_code"]="error";
                      echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
                    }
              
              }
          }

          $dataTakeCnt +=  1;
      }

  }
  elseif($year == "first" && $isRecordExit == FALSE){
      
  }
  elseif($year == "third" && $isRecordExit == FALSE){
    $tableName = $Batch.'thirdyearanalysis';
    $sql = "CREATE TABLE `$tableName` (
      `prn` text,
      `seat no` text,
      `name` text,
      
      `310241ISE` text,
      `310241ESE` text,
      `310241TOTAL` text,
      `310241TW` text,
      `310241PR` text,
      `310241OR` text,
      `310241Tot%` text,
      `310241Crd` int,
      `310241Grd` text,
      `310241GP` int,
      `310241CP` int,
      
      `310242ISE` text,
      `310242ESE` text,
      `310242TOTAL` text,
      `310242TW` text,
      `310242PR` text,
      `310242OR` text,
      `310242Tot%` text,
      `310242Crd` int,
      `310242Grd` text,
      `310242GP` int,
      `310242CP` int,    
    
      `310243ISE` text,
      `310243ESE` text,
      `310243TOTAL` text,
      `310243TW` text,
      `310243PR` text,
      `310243OR` text,
      `310243Tot%` text,
      `310243Crd` int,
      `310243Grd` text,
      `310243GP` int,
      `310243CP` int, 
    
      `310244ISE` text,
      `310244ESE` text,
      `310244TOTAL` text,
      `310244TW` text,
      `310244PR` text,
      `310244OR` text,
      `310244Tot%` text,
      `310244Crd` int,
      `310244Grd` text,
      `310244GP` int,
      `310244CP` int,     
    
      `310245AISE` text,
      `310245AESE` text,
      `310245ATOTAL` text,
      `310245ATW` text,
      `310245APR` text,
      `310245AOR` text,
      `310245ATot%` text,
      `310245ACrd` int,
      `310245AGrd` text,
      `310245AGP` int,
      `310245ACP` int,      
    
      `310249ISE` text,
      `310249ESE` text,
      `310249TOTAL` text,
      `310249TW` text,
      `310249PR` text,
      `310249OR` text,
      `310249Tot%` text,
      `310249Crd` int,
      `310249Grd` text,
      `310249GP` int,
      `310249CP` int,    
    
      `310246ISE` text,
      `310246ESE` text,
      `310246TOTAL` text,
      `310246TW` text,
      `310246PR` text,
      `310246OR` text,
      `310246Tot%` text,
      `310246Crd` int,
      `310246Grd` text,
      `310246GP` int,
      `310246CP` int,  
    
      `310248ISE` text,
      `310248ESE` text,
      `310248TOTAL` text,
      `310248TW` text,
      `310248PR` text,
      `310248OR` text,
      `310248Tot%` text,
      `310248Crd` int,
      `310248Grd` text,
      `310248GP` int,
      `310248CP` int,  
    
      `310247ISE` text,
      `310247ESE` text,
      `310247TOTAL` text,
      `310247TW` text,
      `310247PR` text,
      `310247OR` text,
      `310247Tot%` text,
      `310247Crd` int,
      `310247Grd` text,
      `310247GP` int,
      `310247CP` int,
    
      `310250BISE` text,
      `310250BESE` text,
      `310250BTOTAL` text,
      `310250BTW` text,
      `310250BPR` text,
      `310250BOR` text,
      `310250BTot%` text,
      `310250BCrd` int,
      `310250BGrd` text,
      `310250BGP` int,
      `310250BCP` int,
    
      `310251ISE` text,
      `310251ESE` text,
      `310251TOTAL` text,
      `310251TW` text,
      `310251PR` text,
      `310251OR` text,
      `310251Tot%` text,
      `310251Crd` int,
      `310251Grd` text,
      `310251GP` int,
      `310251CP` int, 
    
    
      `310252ISE` text,
      `310252ESE` text,
      `310252TOTAL` text,
      `310252TW` text,
      `310252PR` text,
      `310252OR` text,
      `310252Tot%` text,
      `310252Crd` int,
      `310252Grd` text,
      `310252GP` int,
      `310252CP` int,
    
      `310253ISE` text,
      `310253ESE` text,
      `310253TOTAL` text,
      `310253TW` text,
      `310253PR` text,
      `310253OR` text,
      `310253Tot%` text,
      `310253Crd` int,
      `310253Grd` text,
      `310253GP` int,
      `310253CP` int, 
    
      `310254AISE` text,
      `310254AESE` text,
      `310254ATOTAL` text,
      `310254ATW` text,
      `310254APR` text,
      `310254AOR` text,
      `310254ATot%` text,
      `310254ACrd` int,
      `310254AGrd` text,
      `310254AGP` int,
      `310254ACP` int, 
    
      `310255ISE` text,
      `310255ESE` text,
      `310255TOTAL` text,
      `310255TW` text,
      `310255PR` text,
      `310255OR` text,
      `310255Tot%` text,
      `310255Crd` int,
      `310255Grd` text,
      `310255GP` int,
      `310255CP` int,  
    
      `310251*ISE` text,
      `310251*ESE` text,
      `310251*TOTAL` text,
      `310251*TW` text,
      `310251*PR` text,
      `310251*OR` text,
      `310251*Tot%` text,
      `310251*Crd` int,
      `310251*Grd` text,
      `310251*GP` int,
      `310251*CP` int, 
    
      `310258ISE` text,
      `310258ESE` text,
      `310258TOTAL` text,
      `310258TW` text,
      `310258PR` text,
      `310258OR` text,
      `310258Tot%` text,
      `310258Crd` int,
      `310258Grd` text,
      `310258GP` int,
      `310258CP` int,
    
      `310252*ISE` text,
      `310252*ESE` text,
      `310252*TOTAL` text,
      `310252*TW` text,
      `310252*PR` text,
      `310252*OR` text,
      `310252*Tot%` text,
      `310252*Crd` int,
      `310252*Grd` text,
      `310252*GP` int,
      `310252*CP` int,
    
      `310259CISE` text,
      `310259CESE` text,
      `310259CTOTAL` text,
      `310259CTW` text,
      `310259CPR` text,
      `310259COR` text,
      `310259CTot%` text,
      `310259CCrd` int,
      `310259CGrd` text,
      `310259CGP` int,
      `310259CCP` int
    );";


      $result = $con->query($sql);
      if($result == FALSE){
        $_SESSION["status"]="ERROR"; 
        $_SESSION["status_msg"]="There is Problem Try After Some Time";
        $_SESSION["status_code"]="error";
        echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
      }

    $isSemOne = true;

    //variable Which we need Globally 
    $seatNo = -1;
    $name = "";
    $prn = -1;
    
    foreach ($response_obj -> Files as $file) {
            
            $url = $file -> Url;
            $page = fopen($url, "r");    
    
            if($isSemOne){
                $isSemOne = false;
    
                $isFirstRowTaken = false;
                $skipTwoLine = 2;
    
                while (($data = fgetcsv($page)) !== FALSE) {
                  if($isFirstRowTaken == false){
                      $numColumns = count($data);
                      
                      $seatNoName = explode(" ",$data[0]);
                      $seatNoNameCnt = count($seatNoName);
    
                      $seatNo = $seatNoName[2];
                      $name = "";
                      for($i=5; $i<$seatNoNameCnt; $i++){
                          $name = $name . " " . $seatNoName[$i];
                      }
    
    
                      if($numColumns == 3){
                        $PrnNo = explode(" ", $data[2]);
                        $prn = $PrnNo[1];
                        $prn = ltrim($prn, ':');
                      }
                      elseif($numColumns == 4){
                            $PrnNo = explode(" ", $data[3]);
                            $prn = $PrnNo[1];
                            $prn = ltrim($prn, ':'); 
                      }
                      else{
                        $PrnNo = explode(" ", $data[1]);
                        $prnCnt = count($PrnNo);
    
                        $prn = $PrnNo[$prnCnt - 3];
                        $prn = ltrim($prn, ':');
                      }
                      
    
                      $isFirstRowTaken = true;
    
                      $sql = "INSERT INTO `$tableName`(`prn`, `seat no`, `name`) VALUES ('$prn','$seatNo','$name')";
                      $result = $con->query($sql);
                      if($result == FALSE){
                        $_SESSION["status"]="ERROR"; 
                        $_SESSION["status_msg"]="There is Some Problem Try After some time";
                        $_SESSION["status_code"]="error";
                        echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
                      }
                      continue;
                  }
    
                  if($skipTwoLine == 0){
                    $subCodeName = explode(" ", $data[0]);
                    $subCode = $subCodeName[0];
    
                    $ISEMark = explode("/", $data[1]);
                    $ISE = $ISEMark[0];
    
                    $ESEMark = explode("/", $data[2]);
                    $ESE = $ESEMark[0];
    
                    $TOTALMarks = explode("/", $data[3]);
                    $TOTAL = $TOTALMarks[0];
    
                    $TWMarks = explode("/", $data[4]);
                    $TW = $TWMarks[0];
    
                    $PRMarks = explode("/", $data[5]);
                    $PR = $PRMarks[0];
    
                    $ORMarks = explode("/", $data[6]);
                    $OR = $ORMarks[0];
    
                    $Tot = $data[7];
    
                    $Crd = $data[8];
    
                    $Grd = $data[9];
    
                    $GP = $data[10];
    
                    $CP = $data[11];
    
                    $PRandORD = explode(" ", $data[12]);
                    $PandR = $PRandORD[0];
                    $ORD = $PRandORD[1];
                    
          
    
                    $sql = "INSERT INTO `$subCode`(`Batch`, `PRN`, `SEAT NO`, `NAME`, `ISE`, `ESE`, `TOTAL`, `TW`, `PR`, `OR`, `Tot%`, `Crd`, `Grd`, `GP`, `CP`, `P&R`, `ORD`) VALUES ('$Batch','$prn','$seatNo','$name','$ISE','$ESE','$TOTAL','$TW','$PR','$OR','$Tot','$Crd','$Grd','$GP','$CP','$PandR','$ORD')";
    
                    if ($con->query($sql) === FALSE) {
                      echo "Error: " . $sql . "<br>" . $con->error;
                    } 
    
                    // Batch wise analaysis code
                    $colISE = $subCode.'ISE';
                    $colESE = $subCode.'ESE';
                    $colTOTAL = $subCode.'TOTAL';
                    $colTW = $subCode.'TW';
                    $colPR = $subCode.'PR';
                    $colOR = $subCode.'OR';
                    $colTot = $subCode.'Tot%';
                    $colCrd = $subCode.'Crd';
                    $colGrd = $subCode.'Grd';
                    $colGP = $subCode.'GP';
                    $colCP = $subCode.'CP';
    
                    $sql = "UPDATE `$tableName` SET `$colISE`='$ISE',`$colESE`='$ESE',`$colTOTAL`='$TOTAL',`$colTW`='$TW',`$colPR`='$PR',`$colOR`='$OR',`$colTot`='$Tot' ,`$colCrd` = '$Crd', `$colGrd` = '$Grd', `$colGP` = '$GP', `$colCP` = '$CP' WHERE `prn`='$prn'"; 
                    $result = $con->query($sql);
                    if($result == FALSE){
                      $_SESSION["status"]="ERROR"; 
                      $_SESSION["status_msg"]="There is Some Problem try after some time";
                      $_SESSION["status_code"]="error";
                      echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
                    }
    
    
                  }
                  else{
                    $skipTwoLine -= 1;
                  }
              }
    
            }
            else{
              $isSemOne = true;
    
              $dataTake = 1;
              while (($data = fgetcsv($page)) !== FALSE) {
    
                $subCodeName = explode(" ", $data[0]);
                $subCode = $subCodeName[0];
    
                $ISEMark = explode("/", $data[1]);
                $ISE = $ISEMark[0];
                $ISE = ltrim($ISE, '*');
    
                $ESEMark = explode("/", $data[2]);
                $ESE = $ESEMark[0];
    
                $TOTALMarks = explode("/", $data[3]);
                $TOTAL = $TOTALMarks[0];
                
                if($dataTake == 1){
          
                      $TW = "---";  
    
                      $PR = "---";
    
                      $OR = "---";
    
                      $Tot = $data[7];
    
                      $Crd = $data[8];
    
                      $Grd = $data[9];
    
                      $GP = $data[10];
    
                      $CP = $data[11];
    
                     
                      $PANDR = "---";
                      $ORD = "---";
    
                }
                elseif($dataTake == 2){
                
                      $TW = "---";
    
                      $PR = "---";
    
                      $OR = "---";
    
                      $Tot = $data[7];
    
                      $Crd = $data[8];
    
                      $Grd = $data[9];
    
                      $GP = $data[10];
    
                      $CP = $data[11];
    
                      $PANDR = "---";
                      $ORD = "---";
    
                }
                elseif($dataTake == 3){
                      $TW = "---";
    
                      $PR = "---";
    
                      $OR = "---";
    
                      $Tot = $data[7];
    
                      $Crd = $data[8];
    
                      $Grd = $data[9];
    
                      $GP = $data[10];
    
                      $CP = $data[11];
    
                      $PANDR = "---";
                      $ORD = "---";
    
                }
                elseif($dataTake == 4){
                      $TW = "---";
      
                      $PR = "---";
    
                      $OR = "---";
    
                      $Tot = $data[7];
    
                      $Crd = $data[8];
    
                      $Grd = $data[9];
    
                      $GP = $data[10];
    
                      $CP = $data[11];
    
                      $PANDR = "---";
                      $ORD = "---";
    
                }
                elseif($dataTake == 5){
                      $TWMarks = explode("/", $data[5]);
                      $TW = $TWMarks[0];
          
                      $PR = "---";
    
                      $OR = "---";
    
                      $Tot = $data[8];
    
                      $Crd = $data[9];
    
                      $Grd = $data[10];
    
                      $GP = $data[11];
    
                      $CP = $data[12];
    
                      $PANDR = "---";
                      $ORD = "---";
                }
                elseif($dataTake == 6){
                      $TWMarks = explode("/", $data[5]);
                      $TW = $TWMarks[0];
              
                      $PRMarks = explode("/", $data[6]);
                      $PR = $PRMarks[0];
    
                      $OR = "---";
    
                      $Tot = $data[8];
    
                      $Crd = $data[9];
    
                      $Grd = $data[10];
    
                      $GP = $data[11];
    
                      $CP = $data[12];
    
                      $PANDR = "---";
                      $ORD = "---";
    
                      $subCode = $subCode.'*';
                }
                elseif($dataTake == 7){
                      $TWMarks = explode("/", $data[5]);
                      $TW = $TWMarks[0];
              
                      $PRMarks = explode("/", $data[6]);
                      $PR = $PRMarks[0];
    
                      $OR = "---";
    
                      $Tot = $data[8];
    
                      $Crd = $data[9];
    
                      $Grd = $data[10];
    
                      $GP = $data[11];
    
                      $CP = $data[12];
    
                      $PANDR = "---";
                      $ORD = "---";
                }
                elseif($dataTake == 8){
                      $TWMarks = explode("/", $data[5]);
                      $TW = $TWMarks[0];
    
                      $PR = "---";
    
                      $ORMarks = explode("/", $data[7]);
                      $OR = $ORMarks[0];
    
                      $Tot = $data[8];
    
                      $Crd = $data[9];
    
                      $Grd = $data[10];
    
                      $GP = $data[11];
    
                      $CP = $data[12];
    
                      $PANDR = "---";
                      $ORD = "---";
    
                      $subCode = $subCode.'*';
                }
                elseif($dataTake == 9){
                      $TW = "---";
    
                      $PR = "---";
    
                      $OR = "---";
    
                      $Tot = "AC";
    
                      $Crd = 0;
    
                      $Grd = "AC";
    
                      $GP = 0;
    
                      $CP = 0;
    
                      $PANDR = "---";
                      $ORD = "---";
                }
                else{
                  continue;
                }
                $dataTake += 1;
              
                $sql = "INSERT INTO `$subCode`(`Batch`, `PRN`, `SEAT NO`, `NAME`, `ISE`, `ESE`, `TOTAL`, `TW`, `PR`, `OR`, `Tot%`, `Crd`, `Grd`, `GP`, `CP`, `P&R`, `ORD`) VALUES ('$Batch','$prn','$seatNo','$name','$ISE','$ESE','$TOTAL','$TW','$PR','$OR','$Tot','$Crd','$Grd','$GP','$CP','$PANDR','$ORD')";
    
                if ($con->query($sql) === FALSE) {
                  echo "Error: " . $sql . "<br>" . $con->error;
                }
                
                
                // Batch wise analaysis code
                $colISE = $subCode.'ISE';
                $colESE = $subCode.'ESE';
                $colTOTAL = $subCode.'TOTAL';
                $colTW = $subCode.'TW';
                $colPR = $subCode.'PR';
                $colOR = $subCode.'OR';
                $colTot = $subCode.'Tot%';
                $colCrd = $subCode.'Crd';
                $colGrd = $subCode.'Grd';
                $colGP = $subCode.'GP';
                $colCP = $subCode.'CP';

                $sql = "UPDATE `$tableName` SET `$colISE`='$ISE',`$colESE`='$ESE',`$colTOTAL`='$TOTAL',`$colTW`='$TW',`$colPR`='$PR',`$colOR`='$OR',`$colTot`='$Tot', `$colCrd` = '$Crd', `$colGrd` = '$Grd', `$colGP` = '$GP', `$colCP` = '$CP' WHERE `prn`='$prn'"; 
                $result = $con->query($sql);
                if($result == FALSE){
                  $_SESSION["status"]="ERROR"; 
                  $_SESSION["status_msg"]="There is Some Problem try after some time";
                  $_SESSION["status_code"]="error";
                  echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
                }
                
            }
          }
    }
    
  }
  elseif($year == "fourth" && $isRecordExit == FALSE){
        $tableName = $Batch.'fourthyearanalysis';

   
        $sql = "CREATE TABLE `$tableName` (
            `prn` text,
            `seat no` text,
            `name` text,
            
            `410241ISE` text,
            `410241ESE` text,
            `410241TOTAL` text,
            `410241TW` text,
            `410241PR` text,
            `410241OR` text,
            `410241Tot%` text,
            `410241Crd` int,
            `410241Grd` text,
            `410241GP` int,
            `410241CP` int,
            
            `410242ISE` text,
            `410242ESE` text,
            `410242TOTAL` text,
            `410242TW` text,
            `410242PR` text,
            `410242OR` text,
            `410242Tot%` text,
            `410242Crd` int,
            `410242Grd` text,
            `410242GP` int,
            `410242CP` int,    

            `410243ISE` text,
            `410243ESE` text,
            `410243TOTAL` text,
            `410243TW` text,
            `410243PR` text,
            `410243OR` text,
            `410243Tot%` text,
            `410243Crd` int,
            `410243Grd` text,
            `410243GP` int,
            `410243CP` int, 
          
            `410244DISE` text,
            `410244DESE` text,
            `410244DTOTAL` text,
            `410244DTW` text,
            `410244DPR` text,
            `410244DOR` text,
            `410244DTot%` text,
            `410244DCrd` int,
            `410244DGrd` text,
            `410244DGP` int,
            `410244DCP` int,     

            `410245BISE` text,
            `410245BESE` text,
            `410245BTOTAL` text,
            `410245BTW` text,
            `410245BPR` text,
            `410245BOR` text,
            `410245BTot%` text,
            `410245BCrd` int,
            `410245BGrd` text,
            `410245BGP` int,
            `410245BCP` int,      

            `410246ISE` text,
            `410246ESE` text,
            `410246TOTAL` text,
            `410246TW` text,
            `410246PR` text,
            `410246OR` text,
            `410246Tot%` text,
            `410246Crd` int,
            `410246Grd` text,
            `410246GP` int,
            `410246CP` int,    
          
            `410246*ISE` text,
            `410246*ESE` text,
            `410246*TOTAL` text,
            `410246*TW` text,
            `410246*PR` text,
            `410246*OR` text,
            `410246*Tot%` text,
            `410246*Crd` int,
            `410246*Grd` text,
            `410246*GP` int,
            `410246*CP` int,  

            `410247ISE` text,
            `410247ESE` text,
            `410247TOTAL` text,
            `410247TW` text,
            `410247PR` text,
            `410247OR` text,
            `410247Tot%` text,
            `410247Crd` int,
            `410247Grd` text,
            `410247GP` int,
            `410247CP` int,  

            `410247*ISE` text,
            `410247*ESE` text,
            `410247*TOTAL` text,
            `410247*TW` text,
            `410247*PR` text,
            `410247*OR` text,
            `410247*Tot%` text,
            `410247*Crd` int,
            `410247*Grd` text,
            `410247*GP` int,
            `410247*CP` int,

            `410248ISE` text,
            `410248ESE` text,
            `410248TOTAL` text,
            `410248TW` text,
            `410248PR` text,
            `410248OR` text,
            `410248Tot%` text,
            `410248Crd` int,
            `410248Grd` text,
            `410248GP` int,
            `410248CP` int,

            `410249DISE` text,
            `410249DESE` text,
            `410249DTOTAL` text,
            `410249DTW` text,
            `410249DPR` text,
            `410249DOR` text,
            `410249DTot%` text,
            `410249DCrd` int,
            `410249DGrd` text,
            `410249DGP` int,
            `410249DCP` int, 


            `410250ISE` text,
            `410250ESE` text,
            `410250TOTAL` text,
            `410250TW` text,
            `410250PR` text,
            `410250OR` text,
            `410250Tot%` text,
            `410250Crd` int,
            `410250Grd` text,
            `410250GP` int,
            `410250CP` int,

            `410251ISE` text,
            `410251ESE` text,
            `410251TOTAL` text,
            `410251TW` text,
            `410251PR` text,
            `410251OR` text,
            `410251Tot%` text,
            `410251Crd` int,
            `410251Grd` text,
            `410251GP` int,
            `410251CP` int, 
          
            `410252CISE` text,
            `410252CESE` text,
            `410252CTOTAL` text,
            `410252CTW` text,
            `410252CPR` text,
            `410252COR` text,
            `410252CTot%` text,
            `410252CCrd` int,
            `410252CGrd` text,
            `410252CGP` int,
            `410252CCP` int, 

            `410253BISE` text,
            `410253BESE` text,
            `410253BTOTAL` text,
            `410253BTW` text,
            `410253BPR` text,
            `410253BOR` text,
            `410253BTot%` text,
            `410253BCrd` int,
            `410253BGrd` text,
            `410253BGP` int,
            `410253BCP` int,  

            `410254ISE` text,
            `410254ESE` text,
            `410254TOTAL` text,
            `410254TW` text,
            `410254PR` text,
            `410254OR` text,
            `410254Tot%` text,
            `410254Crd` int,
            `410254Grd` text,
            `410254GP` int,
            `410254CP` int, 

            `410254*ISE` text,
            `410254*ESE` text,
            `410254*TOTAL` text,
            `410254*TW` text,
            `410254*PR` text,
            `410254*OR` text,
            `410254*Tot%` text,
            `410254*Crd` int,
            `410254*Grd` text,
            `410254*GP` int,
            `410254*CP` int,
          
            `410255ISE` text,
            `410255ESE` text,
            `410255TOTAL` text,
            `410255TW` text,
            `410255PR` text,
            `410255OR` text,
            `410255Tot%` text,
            `410255Crd` int,
            `410255Grd` text,
            `410255GP` int,
            `410255CP` int,

            `410255*ISE` text,
            `410255*ESE` text,
            `410255*TOTAL` text,
            `410255*TW` text,
            `410255*PR` text,
            `410255*OR` text,
            `410255*Tot%` text,
            `410255*Crd` int,
            `410255*Grd` text,
            `410255*GP` int,
            `410255*CP` int,

            `410256ISE` text,
            `410256ESE` text,
            `410256TOTAL` text,
            `410256TW` text,
            `410256PR` text,
            `410256OR` text,
            `410256Tot%` text,
            `410256Crd` int,
            `410256Grd` text,
            `410256GP` int,
            `410256CP` int,

            `410256*ISE` text,
            `410256*ESE` text,
            `410256*TOTAL` text,
            `410256*TW` text,
            `410256*PR` text,
            `410256*OR` text,
            `410256*Tot%` text,
            `410256*Crd` int,
            `410256*Grd` text,
            `410256*GP` int,
            `410256*CP` int,

            `410257AISE` text,
            `410257AESE` text,
            `410257ATOTAL` text,
            `410257ATW` text,
            `410257APR` text,
            `410257AOR` text,
            `410257ATot%` text,
            `410257ACrd` int,
            `410257AGrd` text,
            `410257AGP` int,
            `410257ACP` int    
          
        );";

        $result = $con->query($sql);
        if($result == FALSE){
          $_SESSION["status"]="ERROR"; 
          $_SESSION["status_msg"]="There is Problem Try After Some Time";
          $_SESSION["status_code"]="error";
          echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
        }

          $seatNo = -1;
          $name = "";
          $prn = -1;

          foreach ($response_obj -> Files as $file) {
                  
                  $url = $file -> Url;
                  $size = $file -> FileSize;

                  if($size <= 500){
                      continue;
                  }

                  $page = fopen($url, "r");    

                      $isFirstRowTaken = false;
                      $skipTwoLine = 2;
                      $dataTaken = 1;

                      while (($data = fgetcsv($page)) !== FALSE) {
                            if($isFirstRowTaken == false){
                            
                            $seatNo = $data[0];
                        
                            $name = $data[1];

                            $prnNo = explode(" ", $data[3]);
                            $prn = $prnNo[0];
                            

                            $isFirstRowTaken = true;

                            //insert prn, seat no, name into table
                            $sql = "INSERT INTO `$tableName`(`prn`, `seat no`, `name`) VALUES ('$prn','$seatNo','$name')";
                            $result = $con->query($sql);
                            if($result == FALSE){
                              $_SESSION["status"]="ERROR"; 
                              $_SESSION["status_msg"]="There is Some Problem Try After some time";
                              $_SESSION["status_code"]="error";
                              echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
                            }
                            continue;
                        }

                        if($skipTwoLine == 0){
                          
                            if($dataTaken <= 11){
                                  $subCodeName = explode(" ", $data[0]);
                                  $subCode = $subCodeName[0];

                                  if($dataTaken == 7 || $dataTaken == 9){
                                        $subCode = $subCode.'*';
                                  }

                                  $ISEMark = explode("/", $data[1]);
                                  $ISE = $ISEMark[0];

                                  $ESEMark = explode("/", $data[2]);
                                  $ESE = $ESEMark[0];

                                  $TOTALMarks = explode("/", $data[3]);
                                  $TOTAL = $TOTALMarks[0];

                                  $TWMarks = explode("/", $data[4]);
                                  $TW = $TWMarks[0];

                                  $PRMarks = explode("/", $data[5]);
                                  $PR = $PRMarks[0];

                                  $ORMarks = explode("/", $data[6]);
                                  $OR = $ORMarks[0];

                                  $TUTMarks = explode("/", $data[7]);
                                  $TUT = $TUTMarks[0];

                                  $Tot = $data[8];

                                  $Crd = $data[9];

                                  $Grd = $data[10];

                                  $GP = $data[11];

                                  $CP = $data[12];

                                  $PandR = "---";
                                  $ORD = "---";
                          
                            }
                            else{
                                  $subCodeName = explode(" ", $data[0]);
                                  $subCode = $subCodeName[0];

                                  if($dataTaken == 17 || $dataTaken == 19 || $dataTaken == 21){
                                        $subCode = $subCode.'*';
                                  }

                                  $ISEMark = explode("/", $data[2]);
                                  $ISE = $ISEMark[0];

                                  $ESEMark = explode("/", $data[3]);
                                  $ESE = $ESEMark[0];

                                  $TOTALMarks = explode("/", $data[4]);
                                  $TOTAL = $TOTALMarks[0];

                                  $TWMarks = explode("/", $data[5]);
                                  $TW = $TWMarks[0];

                                  $PRMarks = explode("/", $data[6]);
                                  $PR = $PRMarks[0];

                                  $ORMarks = explode("/", $data[7]);
                                  $OR = $ORMarks[0];

                                  $TUTMarks = explode("/", $data[8]);
                                  $TUT = $TUTMarks[0];

                                  $Tot = $data[9];

                                  $Crd = $data[10];

                                  $Grd = $data[11];

                                  $GP = $data[12];

                                  $CP = $data[13];

                                  $PandR = "---";
                                  $ORD = "---";
                            }

                            $sql = "INSERT INTO `$subCode`(`Batch`, `PRN`, `SEAT NO`, `NAME`, `ISE`, `ESE`, `TOTAL`, `TW`, `PR`, `OR`, `Tot%`, `Crd`, `Grd`, `GP`, `CP`, `P&R`, `ORD`) VALUES ('$Batch','$prn','$seatNo','$name','$ISE','$ESE','$TOTAL','$TW','$PR','$OR','$Tot','$Crd','$Grd','$GP','$CP','$PandR','$ORD')";

                            if ($con->query($sql) === FALSE) {
                                  echo "Error: " . $sql . "<br>" . $con->error;
                            } 

                          // Batch wise analaysis code
                          $colISE = $subCode.'ISE';
                          $colESE = $subCode.'ESE';
                          $colTOTAL = $subCode.'TOTAL';
                          $colTW = $subCode.'TW';
                          $colPR = $subCode.'PR';
                          $colOR = $subCode.'OR';
                          $colTot = $subCode.'Tot%';
                          $colCrd = $subCode.'Crd';
                          $colGrd = $subCode.'Grd';
                          $colGP = $subCode.'GP';
                          $colCP = $subCode.'CP';

                          $sql = "UPDATE `$tableName` SET `$colISE`='$ISE',`$colESE`='$ESE',`$colTOTAL`='$TOTAL',`$colTW`='$TW',`$colPR`='$PR',`$colOR`='$OR',`$colTot`='$Tot' ,`$colCrd` = '$Crd', `$colGrd` = '$Grd', `$colGP` = '$GP', `$colCP` = '$CP' WHERE `prn`='$prn'"; 
                          $result = $con->query($sql);
                          if($result == FALSE){
                            $_SESSION["status"]="ERROR"; 
                            $_SESSION["status_msg"]="There is Some Problem try after some time";
                            $_SESSION["status_code"]="error";
                            echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
                          }

                          $dataTaken += 1;
                        }
                        else{
                          $skipTwoLine -= 1;
                        }
                    }

                  }
  }

 

}

 if($isRecordExit == TRUE){
    $_SESSION["status"]="ERROR"; 
    $_SESSION["status_msg"]="Batch Data is Already Exit";
    $_SESSION["status_code"]="error";
    echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
 }
 else{
    $sql = "INSERT INTO existingbatches (`Batch`, `Year`) VALUES ('$Batch', '$year')";
    $result = $con->query($sql);
    if($result == FALSE){
      $_SESSION["status"]="ERROR"; 
      $_SESSION["status_msg"]="Batch are Not Inserting";
      $_SESSION["status_code"]="error";
      echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
    }

    $_SESSION["status"]="success"; 
    $_SESSION["status_msg"]="Data Inserted successfully";
    $_SESSION["status_code"]="success";
    echo"<Script>window.location.href='../Upload Result PDF.php'</Script>";
 }
 
?>