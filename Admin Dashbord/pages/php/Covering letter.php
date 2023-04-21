<?php
session_start();
include('./Connection.php');
require('../../../fpdf/tfpdf.php');
require('../../../fpdf/fpdf.php');
ini_set('display_errors',1);
error_reporting(E_ALL);
class IndianCurrency{

    public function __construct($amount){
      $this->amount=$amount;
      $this->hasPaisa=false;
      $arr=explode(".",$this->amount);
      $this->rupees=$arr[0];
      if(isset($arr[1])&&((int)$arr[1])>0){
        if(strlen($arr[1])>2){
          $arr[1]=substr($arr[1],0,2);
        }
        $this->hasPaisa=true;
        $this->paisa=$arr[1];
      }
    }
    
    public function get_words(){
      $w="";
      $crore=(int)($this->rupees/10000000);
      $this->rupees=$this->rupees%10000000;
      $w.=$this->single_word($crore,"Crore ");
      $lakh=(int)($this->rupees/100000);
      $this->rupees=$this->rupees%100000;
      $w.=$this->single_word($lakh,"Lakh ");
      $thousand=(int)($this->rupees/1000);
      $this->rupees=$this->rupees%1000;
      $w.=$this->single_word($thousand,"Thousand ");
      $hundred=(int)($this->rupees/100);
      $w.=$this->single_word($hundred,"Hundred");
      $ten=$this->rupees%100;
      $w.=$this->single_word($ten,"");
      $w.="Rupees ";
      if($this->hasPaisa){
        if($this->paisa[0]=="0"){
          $this->paisa=(int)$this->paisa;
        }
        else if(strlen($this->paisa)==1){
          $this->paisa=$this->paisa*10;
        }
        $w.=" and ".$this->single_word($this->paisa,"Paisa");
      }
      return $w."Only";
    }
  
    private function single_word($n,$txt){
      $t="";
      if($n<=19){
        $t=$this->words_array($n);
      }else{
        $a=$n-($n%10);
        $b=$n%10;
        $t=$this->words_array($a)." ".$this->words_array($b);
      }
      if($n==0){
        $txt="";
      }
      return $t." ".$txt;
    }
  
    private function words_array($num){
      $n=[0=>"", 1=>"One", 2=>"Two", 3=>"Three", 4=>"Four", 5=>"Five", 6=>"Six", 7=>"Seven", 8=>"Eight", 9=>"Nine", 10=>"Ten", 11=>"Eleven", 12=>"Twelve", 13=>"Thirteen", 14=>"Fourteen", 15=>"Fifteen", 16=>"Sixteen", 17=>"Seventeen", 18=>"Eighteen", 19=>"Nineteen", 20=>"Twenty", 30=>"Thirty", 40=>"Forty", 50=>"Fifty", 60=>"Sixty", 70=>"Seventy", 80=>"Eighty", 90=>"Ninety", 100=>"Hundred",];
      return $n[$num];
    }
  }

$pdf= new FPDF();
function getline($text,$cellWidth,$cellHeight)
{
    GLOBAL $pdf;
//normal one-line cell height
    if($pdf->GetStringWidth($text) < $cellWidth){
        //if not, then do nothing
        $line=1;
        return $line;
      }else{
        //if it is, then calculate the height needed for wrapped cell
        //by splitting the text to fit the cell width
        //then count how many lines are needed for the text to fit the cell
        
        $textLength=strlen($text);	//total text length
        $errMargin=10;		//cell width error margin, just in case
        $startChar=0;		//character start position for each line
        $maxChar=0;			//maximum character in a line, to be incremented later
        $textArray=array();	//to hold the strings for each line
        $tmpString="";		//to hold the string for a line (temporary)
        
        while($startChar < $textLength){ //loop until end of text
          //loop until maximum character reached
          while( 
          $pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
          ($startChar+$maxChar) < $textLength ) {
            $maxChar++;
            $tmpString=substr($text,$startChar,$maxChar);
          }
          //move startChar to next line
          $startChar=$startChar+$maxChar;
          //then add it into the array so we know how many line are needed
          array_push($textArray,$tmpString);
          //reset maxChar and tmpString
          $maxChar=0;
          $tmpString='';
          
        }
        //get number of line
        $line=count($textArray);
        return $line;
      }
}








if(isset($_POST["submit"]))
{

$month=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec");
$m=$_POST["month"];
 $ma=explode ("-",$m);
 $mn=$ma[1];

$Month=$month[$mn-1];
$Year=$ma[0];


if($mn==12)
{
   $nextm=01;
   $nexty=$Year+1;
}
else
{
    $nextm=$mn+1;
    $nexty=$Year;
}
$date=$Year."-".$mn."-"."5";
$next_date=$nexty."-".$nextm."-5";



$q="SELECT * FROM `faculty_details`";
$result=$con->query($q);
echo $con->error;
if($result->num_rows >0)
{   
    $count=0;
    while($row=$result->fetch_assoc())
    {
       $Faculty_id=$row["Faculty_id"];
       $tablename=$Faculty_id."Bill";
       $q1="Select * From $tablename where `Apdate`>'$date' and `Apdate`<='$next_date' ";
       $result1=$con->query($q1);
       
       echo $con->error;
       $count=$count+$result1->num_rows;
       if($count>0)
       {
           break;
       }
    }
    if($count>0)
    { 
        $total=0;
        $pdf = new tFPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->AddFont('Kruti Dev 714 Normal','','Kruti Dev 714 Normal.ttf',true);
        $pdf->AddFont('Kruti Dev 714 Normal','B','Kruti Dev 710 Normal.ttf',true);
        $pdf->SetFont('Kruti Dev 714 Normal','',12);
        $CYear=date('Y');
        $cdate=date("d @ m @ Y");
  
        $txt="tk- Ø- 'kkrafuv @ lax.kd foHkkx @ vH;kxr ns;ds @".$CYear." @          ";
        $pdf->cell(99,5,"",0,0,"R");
        $pdf->cell(90,5,$txt,0,1,"R");
        $pdf->cell(99,5,"",0,0,"R");
        $pdf->cell(75,5,"‘kkldh; ra=fudsru] vgenuxj",0,1,"L");
        $pdf->cell(99,5,"",0,0,"R");
        $pdf->cell(75,5,"fnukad %& ".$cdate,0,1,"L");
        $pdf->cell(0,5,"",0,1);
        $pdf->SetFont('Kruti Dev 714 Normal','B',14);
        $pdf->cell(8,4.2,"lknj","B",1,"C");
        $pdf->SetFont('Kruti Dev 714 Normal','',12);
        $pdf->cell(0,5,"",0,1);
        $pdf->cell(94.5,5,"fo”k; %& vH;kxr vf/kO;k[;krs",0,0,"R");
        $pdf->addfont('times new roman','','times new roman.php');
        $pdf->SetFont('times new roman','',9);
        $pdf->cell(28,5,"( Visiting Lecturer )",0,0,"L");
        $pdf->AddFont('Kruti Dev 714 Normal','','Kruti Dev 714 Normal.ttf',true);
        $pdf->SetFont('Kruti Dev 714 Normal','',12);
        $pdf->cell(69.5,5,"eku/ku ns;dk ckcr",0,1,"L");
        $pdf->cell(0,5,"",0,1);
        // $pdf->cell(15,5,"",0,0,"L");
        // $pdf->cell(174,5,"mij¨ä fo”k;kuqlkj lax.kd foÒkxkr dk;Zjr vlY¨Y;k vH;kxr vf/kO;k[;krs ;kauh ?¨rY¨Y;k rklhdkaph ph ns;ds ;k foÒkxkl ÁkIr",0,1,"L");
        // $pdf->cell(174,5,">kY¨Ykh vkgsr- rjh lnjph ns;ds eatqjh o iq<hYk dk;ZokghlkBh lknj djhr vkgs-",0,1,"L");
        // $pdf->cell(0,5,"",0,1);
        $pdf->MultiCell(189,5,"             mij¨ä fo”k;kuqlkj lax.kd foÒkxkr dk;Zjr vlY¨Y;k vH;kxr vf/kO;k[;krs ;kauh ?¨rY¨Y;k rklhdkaph ph ns;ds ;k foÒkxkl ÁkIr >kY¨Ykh vkgsr- rjh lnjph ns;ds eatqjh o iq<hYk dk;ZokghlkBh lknj djhr vkgs-",0);
        $pdf->cell(0,5,"",0,1);
        $pdf->addfont('times new roman','B','times new roman bold.php');
        $pdf->SetFont('times new roman','B',9);
    
        $pdf->cell(14,5,"Sr. No.",1,0,"C");
        $pdf->cell(60,5,"Name of Visiting Lecturer",1,0,"C");
 
        $pdf->cell(28,5,"Subject",1,0,"C");
        $pdf->cell(45,5,"Department",1,0,"C");
        $pdf->cell(16,5,"Month",1,0,"C");
        $pdf->cell(26,5,"Amount",1,1,"C");

        $pdf->SetFont('times new roman','',9);

        $q2="SELECT * FROM `faculty_details`";
        $result2=$con->query($q);
        echo $con->error;
        $srn=1;
                while($row=$result2->fetch_assoc())
            {
                $Faculty_id=$row["Faculty_id"];
                $First_name=$row["First_name"];
                $Middle_name=$row["Middle_name"];
                $Last_name=$row["Last_name"];
                $Full_name=$First_name." ".$Middle_name." ".$Last_name;
                $tablename=$Faculty_id."Bill";
                $q3="Select * From $tablename where `Apdate`>'$date' and `Apdate`<='$next_date' ";
                $result3=$con->query($q3);
                echo $con->error;
    
                while($row=$result3->fetch_assoc())
                {   $line=0; 
                    $Amount=$row["Total_amount"];
                    $month=$row["Month"];
                    $class=$row["Class"];
                    $Subject=$row["Subject"];
                    $total+=$Amount;
                    $line=getline($Full_name,60,5);
                    $la[0]=$line;
               
                   
                    $la[1]=getline($Subject,28,5);
                   
                    $la[2]=getline($class,45,5);
                    $line=max($la);
                    $cellHeight=5;
                    $pdf->cell(14,($line * $cellHeight),$srn,1,0,'C');
                    if($la[0]>1)
                    {
                        $xPos=$pdf->GetX();
                        $yPos=$pdf->GetY();
                        $pdf->MultiCell(60,5,$Full_name,1);
                        $pdf->SetXY($xPos+60,$yPos);
                  
                    }
                    else{
                        $pdf->cell(60,($line * $cellHeight),$Full_name,1,0,'C');
                    }
                    if($la[1]>1)
                    {
                        $xPos=$pdf->GetX();
                        $yPos=$pdf->GetY();
                        $pdf->MultiCell(28,5,$Subject,1);
                        $pdf->SetXY($xPos+28,$yPos);
                  
                    }
                    else{
                        $pdf->cell(28,($line * $cellHeight),$Subject,1,0,'C');
                    }
                    if($la[2]>1)
                    {
                        $xPos=$pdf->GetX();
                        $yPos=$pdf->GetY();
                        $pdf->MultiCell(45,5,$class,1,0);
                        $pdf->SetXY($xPos+45,$yPos);
                  
                    }
                    else{
                        $pdf->cell(45,($line * $cellHeight),$class,1,0,'C');
                    }
                   
                    $pdf->cell(16,($line * $cellHeight),$month,1,0,'C');
                    $pdf->cell(26,($line * $cellHeight),$Amount,1,1,'C');
                    $xPos=$pdf->GetX();
                    $yPos=$pdf->GetY();
     
                 
                   $srn++;
                }
            }
                $pdf->cell(14,6,"",1,0,"C");
                $pdf->SetFont('times new roman','B',9);
                $pdf->cell(60,6,"Total Rs.",1,0,"R");
                $pdf->cell(89,6,"",1,0,"C");
                $pdf->SetFont('times new roman','',9);
                $pdf->cell(26,6,$total,1,1,"C");
                $pdf->SetFont('times new roman','B',9);
                $obj=new IndianCurrency($total);
  
                $word=$obj->get_words();
                $taw="Total amount In words - ".$word;
                $l=getline($taw,189,6);
                if($l>1)
                {
                    $xPos=$pdf->GetX();
                    $yPos=$pdf->GetY();
                    $pdf->MultiCell(189,5,$taw,1);
                    $pdf->SetXY($xPos,$yPos+($l*5)+5);
                  

                }
                else
                {
                    $pdf->cell(189,6,$taw,1,1,"C");
                }
                $pdf->SetFont('Kruti Dev 714 Normal','',12);
                $pdf->cell(10,5,"",0,1);
                $pdf->cell(14,5,"",0,0);
                $pdf->cell(165,5,"l¨cr & ns;ds t¨MY¨ vkgs-",0,0);
                $pdf->cell(10,11,"",0,1);
                $pdf->cell(189,5,"foÒkx Áeq[k lax.kd        ",0,1,"R");
                $pdf->cell(189,5,"‘kkldh; ra=fudsru] vgenuxj",0,1,"R");
                $pdf->cell(14,5,"",0,0);
                $pdf->cell(165,5,"Áfr]",0,1);
                $pdf->cell(14,5,"",0,0);
                $pdf->cell(165,5,"ek- Ákpk;Z",0,1);
                $pdf->cell(14,5,"",0,0);
                $pdf->cell(165,5,"'kkldh; ra=fudsru]",0,1);
                $pdf->cell(14,5,"",0,0);
                $pdf->cell(165,5,"vgenuxj",0,1);
            
            
         $fname=$Month.$Year."Covering Letter.pdf";
        $pdf->Output('',$fname);
    }
    else
    {    $_SESSION["status"]="ERROR!";
        $_SESSION["status_msg"]="No record Found!";
        $_SESSION["status_code"]="error";
        echo "<script>window.location.href='../Covering letter.php';</script>";

    }
}
else
{
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="No record Found!";
    $_SESSION["status_code"]="error";
    echo "<script>window.location.href='../Covering letter.php';</script>";
    
}

}
?> 