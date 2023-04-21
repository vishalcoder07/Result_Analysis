<?php
session_start();
include('./Connection.php');
if(isset($_GET["Schemes"]))
{
    $Scheme=$_GET["Scheme"];
    $q0="SELECT DISTINCT Scheme  FROM scheme_details ";
$result=$con->query($q0);
echo"<option value='' disabled selected>Select Scheme</option>";
while($row=$result->fetch_assoc())

{
    $Scheme_name=$row["Scheme"];
    if($Scheme_name==$Scheme)
    {
echo" <option value='$Scheme_name' selected>$Scheme_name</option>";

}
else
{
    echo" <option value='$Scheme_name' >$Scheme_name</option>";
    
    }
}
}
if(isset($_GET["Sub"]))
{
    $Scheme=$_GET["Scheme"];
    $Class=$_GET["Class"];
    $Subject=$_GET["Subject"];
    if($Class=="FYCM" ||$Class=="FYCO")
{
    $q="Select * from scheme_details WHERE Scheme = '$Scheme' AND (Sem = 1 or Sem = 2) ORDER BY SEM";
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select Subject</option>";
    while($row=$result->fetch_assoc())
    {
        $Subject1=$row["Subject"];
        if($Subject==$Subject1)
        {  echo"<option value='$Subject1' Selected>$Subject1</option>";
        }
        else{
            echo"<option value='$Subject1'>$Subject1</option>";
        }
      
    }

}
if($Class=="SYCM" ||$Class=="SYCO")
{
    $q="Select * from scheme_details WHERE Scheme = '$Scheme' AND (Sem = 3 or Sem = 4) ORDER BY SEM";
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select Subject</option>";
    while($row=$result->fetch_assoc())
    {
        $Subject1=$row["Subject"];  
         if($Subject==$Subject1)
        {  echo"<option value='$Subject1' Selected>$Subject1</option>";
        }
        else{
            echo"<option value='$Subject1'>$Subject1</option>";
        }
    }

}

if($Class=="TYCM"||$Class=="TYCO")
{
    $q="Select * from scheme_details WHERE Scheme = '$Scheme' AND (Sem = 5 or Sem = 6) ORDER BY SEM";
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select Subject</option>";
    while($row=$result->fetch_assoc())
    {
        $Subject1=$row["Subject"];
        if($Subject==$Subject1)
        {  echo"<option value='$Subject1' Selected>$Subject1</option>";
        }
        else{
            echo"<option value='$Subject1'>$Subject1</option>";
        }
    }

}

}
if(isset($_GET["th"]))
{
    $Scheme=$_GET["Scheme"];
    $Class=$_GET["Class"];
    $Subject=$_GET["Subject"];
    $THPR=$_GET["THPR"];
    $q="Select * from scheme_details WHERE Scheme = '$Scheme' AND Subject='$Subject'";
    $result= $con->query($q);
    while($row=$result->fetch_assoc())
    {
        $THPR1=$row["TH/PR"];
    
    }
    if($THPR1=="TH")
        {
            echo"       <option value='TH' Selected>TH</option>";

        }
        if($THPR1=="PR")
        {
            echo"       <option value='PR' Selected>PR</option>";

        }
        if($THPR1=="TU")
        {
            echo"        <option value='TU' Selected>TU</option>";

        }
        if($THPR1=="TH & PR")
        {
            if($THPR=="TH")
            {
                echo"        <option value='TH'Selected>TH</option>
                <option value='PR'>PR</option>
                <option value='TH & PR'>TH & PR</option>";

            }
           
            if($THPR=="PR")
            {
                echo"        <option value='TH'>TH</option>
                <option value='PR'Selected>PR</option>
                <option value='TH & PR'>TH & PR</option>";

            }
           
            if($THPR=="TH & PR")
            {
                echo"        <option value='TH'>TH</option>
                <option value='PR'>PR</option>
                <option value='TH & PR'Selected>TH & PR</option>";

            }
           

        }
        if($THPR1=="TH & TU")
        {
            if($THPR=="TH")
            {
                echo"        <option value='TH'Selected>TH</option>
                <option value='TU'>TU</option>
                <option value='TH & TU'>TH & TU</option>";

            }
           
            if($THPR=="TU")
            {
                echo"        <option value='TH'>TH</option>
                <option value='TU'Selected>TU</option>
                <option value='TH & TU'>TH & TU</option>";

            }
           
            if($THPR=="TH & TU")
            {
                echo"        <option value='TH'>TH</option>
                <option value='TU'>TU</option>
                <option value='TH & TU'Selected>TH & TU</option>";

            }
           
        }

 

}
?>