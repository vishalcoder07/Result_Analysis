<?php
session_start(); 
include("./Connection.php");
$Faculty_id=$_SESSION["Faculty_id"];
$month=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec");
$m=$_POST["month"];
 $ma=explode ("-",$m);
 $mn=$ma[1];
$Month=$month[$mn-1];
$Year=$ma[0];
$tablename=$Faculty_id.$Month.$Year;

$billtable=$Faculty_id."Bill";


// functions start()
function getMondays($year, $month)
{
    $mondays = array();
    # First weekday in specified month: 1 = monday, 7 = sunday
    $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));
    
    /* Add 0 days if monday ... 6 days if tuesday, 1 day if sunday
        to get the first monday in month */
        if($firstDay==1)
        {
           $addDays=0; 
        }
        if($firstDay==2)
        {
           $addDays=6; 
        }
        if($firstDay==3)
        {
           $addDays=5; 
        }
        if($firstDay==4)
        {
           $addDays=4; 
        }
        if($firstDay==5)
        {
           $addDays=3; 
        }
        if($firstDay==6)
        {
           $addDays=2; 
        }
        
        if($firstDay==7)
        {
           $addDays=1; 
        }
  
    $mondays[] = date('Y-m-d', mktime(0, 0, 0, $month, 1 + $addDays, $year));

    $nextMonth = mktime(0, 0, 0, $month + 1, 1, $year);

    # Just add 7 days per iteration to get the date of the subsequent week
    for ($week = 1, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year);
        $time < $nextMonth;
        ++$week, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year))
    {
        $mondays[] = date('Y-m-d', $time);
    }

    return $mondays;
} 
function getTuesdays($year, $month)
{
    $mondays = array();
    # First weekday in specified month: 1 = monday, 7 = sunday
    $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));
    
    /* Add 0 days if monday ... 6 days if tuesday, 1 day if sunday
        to get the first monday in month */
        if($firstDay==1)
        {
           $addDays=1; 
        }
        if($firstDay==2)
        {
           $addDays=0; 
        }
        if($firstDay==3)
        {
           $addDays=6; 
        }
        if($firstDay==4)
        {
           $addDays=5; 
        }
        if($firstDay==5)
        {
           $addDays=4; 
        }
        if($firstDay==6)
        {
           $addDays=3; 
        }
        
        if($firstDay==7)
        {
           $addDays=2; 
        }

    $mondays[] = date('Y-m-d', mktime(0, 0, 0, $month, 1 + $addDays, $year));

    $nextMonth = mktime(0, 0, 0, $month + 1, 1, $year);

    # Just add 7 days per iteration to get the date of the subsequent week
    for ($week = 1, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year);
        $time < $nextMonth;
        ++$week, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year))
    {
        $mondays[] = date('Y-m-d', $time);
    }

    return $mondays;
} 
function getWednsday($year, $month)
{
    $mondays = array();
    # First weekday in specified month: 1 = monday, 7 = sunday
    $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));

    
    /* Add 0 days if monday ... 6 days if tuesday, 1 day if sunday
        to get the first monday in month */
        if($firstDay==1)
        {
           $addDays=2; 
        }
        if($firstDay==2)
        {
           $addDays=1; 
        }
        if($firstDay==3)
        {
           $addDays=0; 
        }
        if($firstDay==4)
        {
           $addDays=6; 
        }
        if($firstDay==5)
        {
           $addDays=5; 
        }
        if($firstDay==6)
        {
           $addDays=4; 
        }
        
        if($firstDay==7)
        {
           $addDays=3; 
        }
    $mondays[] = date('Y-m-d', mktime(0, 0, 0, $month, 1 + $addDays, $year));

    $nextMonth = mktime(0, 0, 0, $month + 1, 1, $year);

    # Just add 7 days per iteration to get the date of the subsequent week
    for ($week = 1, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year);
        $time < $nextMonth;
        ++$week, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year))
    {
        $mondays[] = date('Y-m-d', $time);
    }

    return $mondays;
}
 
function getThursdays($year, $month)
{
    $mondays = array();
    # First weekday in specified month: 1 = monday, 7 = sunday
    $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));
    
    /* Add 0 days if monday ... 6 days if tuesday, 1 day if sunday
        to get the first monday in month */
        if($firstDay==1)
        {
           $addDays=3; 
        }
        if($firstDay==2)
        {
           $addDays=2; 
        }
        if($firstDay==3)
        {
           $addDays=1; 
        }
        if($firstDay==4)
        {
           $addDays=0; 
        }
        if($firstDay==5)
        {
           $addDays=6; 
        }
        if($firstDay==6)
        {
           $addDays=5; 
        }
        
        if($firstDay==7)
        {
           $addDays=4; 
        }
  
    $mondays[] = date('Y-m-d', mktime(0, 0, 0, $month, 1 + $addDays, $year));

    $nextMonth = mktime(0, 0, 0, $month + 1, 1, $year);

    # Just add 7 days per iteration to get the date of the subsequent week
    for ($week = 1, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year);
        $time < $nextMonth;
        ++$week, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year))
    {
        $mondays[] = date('Y-m-d', $time);
    }

    return $mondays;
}
function getFridays($year, $month)
{
    $mondays = array();
    # First weekday in specified month: 1 = monday, 7 = sunday
    $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));
    
    /* Add 0 days if monday ... 6 days if tuesday, 1 day if sunday
        to get the first monday in month */
        if($firstDay==1)
        {
           $addDays=4; 
        }
        if($firstDay==2)
        {
           $addDays=3; 
        }
        if($firstDay==3)
        {
           $addDays=2; 
        }
        if($firstDay==4)
        {
           $addDays=1; 
        }
        if($firstDay==5)
        {
           $addDays=0; 
        }
        if($firstDay==6)
        {
           $addDays=6; 
        }
        
        if($firstDay==7)
        {
           $addDays=5; 
        }
  
    $mondays[] = date('Y-m-d', mktime(0, 0, 0, $month, 1 + $addDays, $year));

    $nextMonth = mktime(0, 0, 0, $month + 1, 1, $year);

    # Just add 7 days per iteration to get the date of the subsequent week
    for ($week = 1, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year);
        $time < $nextMonth;
        ++$week, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year))
    {
        $mondays[] = date('Y-m-d', $time);
    }

    return $mondays;
}
function getSaturdays($year, $month)
{
    $mondays = array();
    # First weekday in specified month: 1 = monday, 7 = sunday
    $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));
    
    /* Add 0 days if monday ... 6 days if tuesday, 1 day if sunday
        to get the first monday in month */
        if($firstDay==1)
        {
           $addDays=5; 
        }
        if($firstDay==2)
        {
           $addDays=4; 
        }
        if($firstDay==3)
        {
           $addDays=3; 
        }
        if($firstDay==4)
        {
           $addDays=2; 
        }
        if($firstDay==5)
        {
           $addDays=1; 
        }
        if($firstDay==6)
        {
           $addDays=0; 
        }
        
        if($firstDay==7)
        {
           $addDays=6; 
        }
  
    $mondays[] = date('Y-m-d', mktime(0, 0, 0, $month, 1 + $addDays, $year));

    $nextMonth = mktime(0, 0, 0, $month + 1, 1, $year);

    # Just add 7 days per iteration to get the date of the subsequent week
    for ($week = 1, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year);
        $time < $nextMonth;
        ++$week, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year))
    {
        $mondays[] = date('Y-m-d', $time);
    }

    return $mondays;
}
function getSundays($year, $month)
{
    $mondays = array();
    # First weekday in specified month: 1 = monday, 7 = sunday
    $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));
    
    /* Add 0 days if monday ... 6 days if tuesday, 1 day if sunday
        to get the first monday in month */
        if($firstDay==1)
        {
           $addDays=6; 
        }
        if($firstDay==2)
        {
           $addDays=5; 
        }
        if($firstDay==3)
        {
           $addDays=4; 
        }
        if($firstDay==4)
        {
           $addDays=3; 
        }
        if($firstDay==5)
        {
           $addDays=2; 
        }
        if($firstDay==6)
        {
           $addDays=1; 
        }
        
        if($firstDay==7)
        {
           $addDays=0; 
        }
    $mondays[] = date('Y-m-d', mktime(0, 0, 0, $month, 1 + $addDays, $year));

    $nextMonth = mktime(0, 0, 0, $month + 1, 1, $year);

    # Just add 7 days per iteration to get the date of the subsequent week
    for ($week = 1, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year);
        $time < $nextMonth;
        ++$week, $time = mktime(0, 0, 0, $month, 1 + $addDays + $week * 7, $year))
    {
        $mondays[] = date('Y-m-d', $time);
    }

    return $mondays;
}
//functions ends()


$q="Select * from `$billtable` where `Bill_id`='$tablename'";

$result=$con->query($q);
if(!$result->num_rows > 0)
{
   $q4="Select Distinct Class From `assign_subjects` where `Faculty_id`='$Faculty_id'";
   $result4=$con->query($q4);
   $class="";

   while($row=$result4->fetch_assoc())
   {
       $class.=$row["Class"];
       $class.=" ";

       
   }
   $class=rtrim($class," ");

   $class=str_replace(" ","/",$class);

     
  
   $q4="Select Distinct Subject From `assign_subjects` where `Faculty_id`='$Faculty_id'";
   $result4=$con->query($q4);
   $Subject="";
 

   while($row=$result4->fetch_assoc())
   {
       $Subject.=$row["Subject"];
       $Subject.=" ";
       
   }
   $Subject=rtrim($Subject," ");

   $Subject=str_replace(" ","/",$Subject);
   
   


   
   $q="Insert into $billtable (Bill_id,Month,Year,Subject,Class,Status) values('$tablename','$Month',$Year,'$Subject','$class','Not Prepared')";
    $con->query($q);  
    $q1="CREATE TABLE `$tablename` ( `Date` DATE NOT NULL , `Class` VARCHAR(10) NOT NULL , `Time_from` FLOAT(10,2) NOT NULL , `Time_to` FLOAT(10,2) NOT NULL , `Hours` INT NOT NULL ,`TH/PR` TEXT NOT NULL , `Subject` TEXT NOT NULL , `Present_Student` INT  , `Topic_covered` TEXT , PRIMARY KEY (`Date`, `Time_from`, `Class`))";
   $con->query($q1);
    
    $timetable="TT".$Faculty_id;
    $days=array("Mon","Tue","Wed","Thus","Fri","Sat","Sun");
    $cdays=array("getMondays","getTuesdays","getWednsday","getThursdays","getFridays","getSaturdays","getSundays");
    $l=count($days);
  
    for($i=0;$i<$l;$i++)
    {
        $q="Select * from $timetable where Days='$days[$i]'";
        $result=$con->query($q);

        if($result->num_rows>0)
        {  
            $fun=$cdays[$i];
            $dates=$fun($Year,$mn);
            while($rows=$result->fetch_assoc())
            {
                $Class=$rows["Class"];
                if($Class=="TYCM"||$Class=="TYCO")
                {
                    $branch=ltrim($Class,"TY");
                }
                if($Class=="SYCM"||$Class=="SYCO")
                {
                    $branch=ltrim($Class,"SY");
                }
                if($Class=="FYCM"||$Class=="FYCO")
                {
                    $branch=ltrim($Class,"FY");
                }
                $Sem=$rows["Sem"];
                $Scheme=$rows["Scheme"];
              $Class1=$branch.$Sem.$Scheme;
              $From=$rows["Time_from"];
              $To=$rows["Time_to"];
              $Thpr=$rows["TH/PR"];
              if($Thpr=="TH")
              {
                  $Hours=1;
                
              }
              else{
                  $Hours=2;
              }

              $Subject=$rows["Subject"];
              $l1=count($dates);
              for($j=0;$j<$l1;$j++)
              {
                  $date=$dates[$j];
                  $q4="Insert into $tablename (`Date`,`Class`,`Time_from`,`Time_to`,`Hours`,`TH/PR`,`Subject`) values('$date','$Class1','$From','$To','$Hours','$Thpr','$Subject')";
                  $con->query($q4);

              }
            }
        }
       
        
        
    }   
 
    $_SESSION["Year"]=$Year;
    $_SESSION["Month"]=$Month;
  
    echo "<script>window.location.href='../Billdetails.php';</script>";

}
else{
     while($row=$result->fetch_assoc())
     {
         $Status=$row["Status"];
     }
     if($Status=="Not Prepared")
     {
        $_SESSION["Year"]=$Year;
        $_SESSION["Month"]=$Month;
        echo "<script>window.location.href='../Billdetails.php';</script>";
     }
     if($Status=="In Process")
     {
        $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="Your Prepared bill is sent to Admin for Verification";
        $_SESSION["status_code"]="error";
  
        echo "<script>window.location.href='../Apply For Bill.php';</script>";
     }
     if($Status=="Approved")
     {
        $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="Your Bill is Approved";
        $_SESSION["status_code"]="error";
        echo "<script>window.location.href='../Apply For Bill.php';</script>";
     }
     if($Status=="Rejected")
     {
        $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="Your Bill is rejected Go to status option Correct it!";
        $_SESSION["status_code"]="error";
        echo "<script>window.location.href='../Apply For Bill.php';</script>";
     }
     if($Status=="Submited")
     {
        $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="Your Bill is Submitted";
        $_SESSION["status_code"]="error";
        echo "<script>window.location.href='../Apply For Bill.php';</script>";
     }
}




?> 