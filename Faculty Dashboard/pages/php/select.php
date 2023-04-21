<?php
session_start();
include('./Connection.php');
if(isset($_GET["setclass"]))
{
   
    $Faculty_id=$_SESSION["Faculty_id"];
    $timetable="TT".$Faculty_id;
    $Scheme=$_GET["Scheme"];

    $q="Select  DISTINCT `Class` From assign_subjects WHERE Scheme = '$Scheme'  AND Faculty_id='$Faculty_id'";
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select Class</option>";
    while($row=$result->fetch_assoc())
    {
        $Class=$row["Class"];
        echo"<option value='$Class'>$Class</option>";
    }
}
if(isset($_GET["setsubject"]))
{
   
    $Faculty_id=$_SESSION["Faculty_id"];
    $timetable="TT".$Faculty_id;
    $Scheme=$_GET["Scheme"];
    $Class=$_GET["Class"];

    $q="Select * From assign_subjects WHERE Scheme = '$Scheme' AND Class='$Class' AND Faculty_id='$Faculty_id'";
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select Subject</option>";
    while($row=$result->fetch_assoc())
    {
        $Subject=$row["Subject"];
        echo"<option value='$Subject'>$Subject</option>";
    }
}
if(isset($_GET["setsem"]))
{
   
    $Faculty_id=$_SESSION["Faculty_id"];
    $timetable="TT".$Faculty_id;
    $Scheme=$_GET["Scheme"];
    $Class=$_GET["Class"];
    $Subject=$_GET["Subject"];
    $q="Select DISTINCT `Sem`From $timetable WHERE Scheme = '$Scheme' AND Class='$Class' AND Subject='$Subject'";
   
    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select Sem</option>";
    while($row=$result->fetch_assoc())
    {
        $Sem=$row["Sem"];
        echo"<option value='$Sem'>$Sem</option>";
    }
}
if(isset($_GET["setthpr"]))
{
   
    $Faculty_id=$_SESSION["Faculty_id"];
  
    $Scheme=$_GET["Scheme"];
    $Class=$_GET["Class"];
    $Subject=$_GET["Subject"];
    $q="Select * From assign_subjects WHERE Scheme = '$Scheme' AND Class='$Class' AND Subject='$Subject' AND Faculty_id='$Faculty_id'";

    $result= $con->query($q);
    echo"        <option value='' disabled selected>Select TH/PR</option>";
    while($row=$result->fetch_assoc())
    {
        $THPR=$row["TH/PR"];
     
    }


    if($THPR=="TH")
    {
        echo"<option value='TH'>TH</option>";
    }
    if($THPR=="PR")
    {
        echo"<option value='PR'>PR</option>";
    }
    if($THPR=="TU")
    {
        echo"<option value='TU'>TU</option>";
    }
    if($THPR=="TH & PR")
    {
        echo"<option value='TH'>TH</option>
        <option value='PR'>PR</option>
        ";
    }
    if($THPR=="TH & TU")
    {
        echo"<option value='TH'>TH</option>
        <option value='TU'>TU</option>
        ";
    }
   
}
if(isset($_GET["Schemes"]))
{
    $Faculty_id=$_SESSION["Faculty_id"];
    $Scheme1=$_GET["Scheme"];
    
    $q0="SELECT DISTINCT Scheme  FROM assign_subjects where Faculty_id ='$Faculty_id' ";
    
    $result=$con->query($q0);
    
    
        echo"   <option value='' disabled selected>Select Scheme</option>";
        while($row=$result->fetch_assoc())
        {
            $Scheme=$row["Scheme"];
            if($Scheme==$Scheme1)
            {
            echo"<option selected value='$Scheme'>$Scheme</option>";
            }
            else{
                echo"<option value='$Scheme'>$Scheme</option>";
            }
        }
    
}
if(isset($_GET["class"]))
{
$Faculty_id=$_SESSION["Faculty_id"];
$Scheme=$_GET["Scheme"];
$Class1=$_GET["Class"];
$q0="SELECT *  FROM assign_subjects where Faculty_id ='$Faculty_id' and `Scheme`='$Scheme' ";

$result=$con->query($q0);


    echo"   <option value='' disabled selected>Select class</option>";
    while($row=$result->fetch_assoc())
    {
        $Class=$row["Class"];
        if($Class==$Class1)
        {
        echo"<option selected value='$Class'>$Class</option>";
        }
        else{
            echo"<option value='$Class'>$Class</option>";
        }
    }

}
if(isset($_GET["subject"]))
{
$Faculty_id=$_SESSION["Faculty_id"];
$Scheme=$_GET["Scheme"];
$Class=$_GET["Class"];
$Subject1=$_GET["Subject"];
$q0="SELECT *  FROM assign_subjects where Faculty_id ='$Faculty_id' and `Scheme`='$Scheme' and `Class`='$Class' ";

$result=$con->query($q0);


    echo"<option value='' disabled selected>Select Subject</option>";
    while($row=$result->fetch_assoc())
    {
        $Subject=$row["Subject"];
        if($Subject==$Subject1)
        {
        echo"<option selected value='$Subject'>$Subject</option>";
        }
        else{
            echo"<option value='$Subject'>$Subject</option>";
        }
    }

}
if(isset($_GET["sem"]))
{
    $Faculty_id=$_SESSION["Faculty_id"];
    $Scheme=$_GET["Scheme"];
    $Subject=$_GET["Subject"];
    
    
    
    
        $q="Select * from scheme_details WHERE Scheme = '$Scheme'  AND `Subject`='$Subject'";
    
        $result= $con->query($q);
        echo"        <option value='' disabled selected>Select Sem</option>";
        while($row=$result->fetch_assoc())
        {
            $Sem=$row["Sem"];
            echo"<option selected value='$Sem'>$Sem</option>";
        }
    
}
if(isset($_GET["th"]))
{
    $Faculty_id=$_SESSION["Faculty_id"];
    $Scheme=$_GET["Scheme"];
    $Subject=$_GET["Subject"];
    $Class=$_GET["Class"];
    $TH=$_GET["TH"];
    
    
    
    
    $q="Select * from assign_subjects WHERE Scheme = '$Scheme' AND `Faculty_id`='$Faculty_id' AND `Class`='$Class' AND `Subject`='$Subject'";
        $result= $con->query($q);
        echo"        <option value='' disabled selected>Select TH/PR</option>";
        while($row=$result->fetch_assoc())
        {
            $THPR=$row["TH/PR"];
           
        }


        if($THPR=="TH")
        {
            echo"<option value='TH' Selected>TH</option>";
        }
        if($THPR=="PR")
        {
            echo"<option value='PR' Selected>PR</option>";
        }
        if($THPR=="TU")
        {
            echo"<option value='TU' Selected>TU</option>";
        }
        if($THPR=="TH & PR")
        {
            if($TH=="TH")
            {
            echo"<option value='TH' Selected>TH</option>
            <option value='PR'>PR</option>
            ";
            }
            else
            {
                echo"<option value='TH'>TH</option>
                <option value='PR' Selected>PR</option>
                ";
                 }
        }
        if($THPR=="TH & TU")
        {

            if($TH=="TH")
            {
                echo"<option value='TH'>TH</option>
                <option value='TU' Selected>TU</option>
                ";
            }
            else
            {
                echo"<option value='TH'>TH</option>
                <option value='TU' Selected>TU</option>
                ";
                 }
           
        }
}

?>