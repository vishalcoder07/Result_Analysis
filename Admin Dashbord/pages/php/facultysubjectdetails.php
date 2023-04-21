<?php
session_start();
include('./Connection.php');
if(isset($_POST["addsubject"]))
{
    $faculty_id=$_SESSION["Faculty_id"];

    $Scheme=$_POST["Scheme"];
    $Class=$_POST["Class"];
    $Subject=$_POST["Subject"];
    $TH=$_POST["TH/PR"];
    if($TH=="TH")
    {
        $Batch1="N";
        $Batch2="N";
        $Batch3="N";
    }
    else{
        $Batch1=$_POST["Batch1"];
        $Batch2=$_POST["Batch2"];
        $Batch3=$_POST["Batch3"];
    }
    $q="SELECT * FROM `assign_subjects` WHERE `Faculty_id` = '$faculty_id' AND `Scheme` = '$Scheme' AND `Class` = '$Class' AND `Subject` = '$Subject'";
    $result=$con->query($q);
    
    if(!$result->num_rows > 0){
    $stmt=$con->prepare("INSERT INTO `assign_subjects` (`Faculty_id`, `Scheme`, `Class`, `Subject`, `TH/PR`, `Batch_1`, `Batch_2`, `Batch_3`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss",$faculty_id, $Scheme,$Class, $Subject,$TH,$Batch1,$Batch2,$Batch3);
$f=$stmt->execute();
if($f==1)
{   $_SESSION["status"]="Successful!";
    $_SESSION["status_msg"]="Subject Assigned successfully";
    $_SESSION["status_code"]="success";

    echo "<script>window.location.href='../facultySubjectdetails.php';</script>";
}
    }
else{
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Subject is Already Assigned ";
    $_SESSION["status_code"]="error";
 
    echo "<script>window.location.href='../facultySubjectdetails.php';</script>";

}
}

if(isset($_GET["del"]))
{
    $faculty_id=$_SESSION["Faculty_id"];
    $Scheme=$_GET["Scheme"];
    $Class=$_GET["Class"];
    $Subject=$_GET["Subject"];
   
    $q=" DELETE FROM `assign_subjects` WHERE Faculty_id ='$faculty_id' and Scheme='$Scheme' and Class='$Class' and Subject='$Subject'";
 
    $result=$con->query($q);
    if($result==1)
    {
        $_SESSION["status"]="Successful!";
        $_SESSION["status_msg"]="Assigned Subject Deleted Successfully";
        $_SESSION["status_code"]="success";
      
    echo "<script>window.location.href='../facultySubjectdetails.php';</script>";
    }
    else{
        $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="Assigned Subject  can not Deleted  Successfully ";
        $_SESSION["status_code"]="error";
      
    echo "<script>window.location.href='../facultySubjectdetails.php';</script>";
    }
}
if(isset($_GET["Up"]))
{    $faculty_id=$_SESSION["Faculty_id"];
  $Scheme=$_GET["Scheme"];
  $Class=$_GET["Class"];
  $Subject=$_GET["Subject"];
  $THPR=$_GET["THPR"];

$Scheme1=$_GET["Scheme1"];
$Class1=$_GET["Class1"];
$Subject1=$_GET["Subject1"];
$TH1=$_GET["TH1"];
if($THPR=="TH")
{
    $Batch1="N";
    $Batch2="N";
    $Batch3="N";
}
else{
    $Batch1=$_GET["Batch1"];
    $Batch2=$_GET["Batch2"];
    $Batch3=$_GET["Batch3"];
}


$q2="Update assign_subjects SET Scheme='$Scheme', Class='$Class', Subject='$Subject', `TH/PR`='$THPR', Batch_1='$Batch1' ,Batch_2='$Batch2' ,Batch_3='$Batch3' WHERE Faculty_id='$faculty_id' and Scheme='$Scheme1' and Class='$Class1' and Subject='$Subject1' and `TH/PR`='$TH1'";
if ($con->query($q2) === TRUE) {
    $_SESSION["status"]="Successful!";
    $_SESSION["status_msg"]="Assigned Subject Updated Successfully";
    $_SESSION["status_code"]="success";
  echo "<script>window.location.href='../facultySubjectdetails.php';</script>";
   
  } else {
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Assigned Subject  can not Updated  Successfully ";
    $_SESSION["status_code"]="error";
    echo "<script>window.location.href='../facultySubjectdetails.php';</script>";
 
  }

}
?>