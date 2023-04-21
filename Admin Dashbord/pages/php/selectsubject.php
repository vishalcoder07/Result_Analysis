<?php
session_start();
include('./Connection.php');
if($_GET["Subject"]==1)
{
$Scheme=$_GET["Scheme"];
$Class=$_GET["Class"];
if($Class=="FYCM" ||$Class=="FYCO")
{
    $q="Select * from scheme_details WHERE Scheme = '$Scheme' AND (Sem = 1 or Sem = 2) ORDER BY SEM";
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select Subject</option>";
    while($row=$result->fetch_assoc())
    {
        $Subject=$row["Subject"];
        echo"<option value='$Subject'>$Subject</option>";
    }

}
if($Class=="SYCM" ||$Class=="SYCO")
{
    $q="Select * from scheme_details WHERE Scheme = '$Scheme' AND (Sem = 3 or Sem = 4) ORDER BY SEM";
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select Subject</option>";
    while($row=$result->fetch_assoc())
    {
        $Subject=$row["Subject"];
        echo"<option value='$Subject'>$Subject</option>";
    }

}

if($Class=="TYCM"||$Class=="TYCO")
{
    $q="Select * from scheme_details WHERE Scheme = '$Scheme' AND (Sem = 5 or Sem = 6) ORDER BY SEM";
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select Subject</option>";
    while($row=$result->fetch_assoc())
    {
        $Subject=$row["Subject"];
        echo"<option value='$Subject'>$Subject</option>";
    }

}

}



if($_GET["th"]==1)
{
$Scheme=$_GET["Scheme"];
$Class=$_GET["Class"];
$Subject=$_GET["Subject"];


$q="Select * from scheme_details WHERE Scheme = '$Scheme'  AND Subject='$Subject'";
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select TH/PR</option>";
        while($row=$result->fetch_assoc())
        {
            $TH=$row["TH/PR"];
           
        }
     
        if($TH=="TH")
        {
            echo"       <option value='TH'>TH</option>";

        }
        if($TH=="PR")
        {
            echo"       <option value='PR'>PR</option>";

        }
        if($TH=="TU")
        {
            echo"        <option value='TU'>TU</option>";

        }
        if($TH=="TH & PR")
        {
            echo"        <option value='TH'>TH</option>
            <option value='PR'>PR</option>
            <option value='TH & PR'>TH & PR</option>";

        }
        if($TH=="TH & TU")
        {
            echo"         <option value='TH'>TH</option>
            <option value='TU'>TU</option>
            <option value='TH & TU'>TH & TU</option>";

        }


}


?>