<?php
session_start();
include('./Connection.php');

  $Faculty_id=$_SESSION["Faculty_id"];
    $Month=$_GET["Month"];
    $Year=$_GET["Year"];
  
    $q="Select * From faculty_details where Faculty_id='$Faculty_id'";
    $result=$con->query($q) ;
    while($row=$result->fetch_assoc())
    {
      $First_name=$row["First_name"];
      $Middle_name=$row["Middle_name"];
      $Last_name=$row["Last_name"];
    }
    $Full_name=$First_name." ".$Middle_name." ".$Last_name;
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

require('../../../fpdf/fpdf.php');

class PDF extends FPDF
{
  function sh($a)
  {
    $this->month=$a[0];
    $this->Date=$a[1];
    $this->name=$a[2];
    $this->thhours=$a[3];
    $this->thrate=$a[4];
    $this->thamount=$a[5];
    $this->prhours=$a[6];
    $this->prrate=$a[7];
    $this->pramount=$a[8];
    $this->total=$a[9];
    $this->word=$a[10];
  }
  
// Page header
function Header()
{
    // Logo
  
    // Arial bold 15
    if($this->PageNo()==1){
    $this->SetAutoPageBreak(true,120);
    }
    else{
      $this->SetAutoPageBreak(false,12);
    }
$this->addfont('times new roman','','times new roman.php');
$this->addfont('times new roman','B','times new roman bold.php');
$this->SetFont('times new roman','B',10);
$this->Image('../../../img/dtelogo.jpg',35,18,22,22);
  $this->cell(189,6,"BILL OF REMUNERATION FOR C.H.B. LECTURERS",1,1,'C');
  $this->cell(70,24,"",1,0);
  $this->cell(119,6,"",1,0);
  $this->cell(0,6,"",0,1);
    $this->cell(70,6,"",0,0);

    $this->cell(30,6,"Bill for the month",1,0);
    $this->cell(89,6,$this->month,1,0);
    $this->cell(0,6,"",0,1);
    $this->cell(70,6,"",0,0);
    $this->cell(30,6,"Date of Submission",1,0);
    $this->cell(89,6,$this->Date,1,0);
    $this->cell(0,6,"",0,1);
    $this->cell(70,6,"",0,0);
    $this->cell(30,6,"Name of Claimant",1,0);
    $this->cell(89,6,$this->name,1,0);
    $this->cell(0,6,"",0,1);

    $this->cell(70,5,"GOVERMENT POLYTECHNIC","LTR",0,'C');
    $this->cell(30,10,"Department",1,0);
    $this->cell(89,10,"CO/CM",1,0);
    $this->cell(0,5,"",0,1);
    $this->cell(70,5,"AHMEDNAGAR","LRB",0,'C');
    $this->cell(0,5,"",0,1);
    $this->SetFont('times new roman','B',8);
    $this->cell(9,10,"Sr NO",1,0,'C');
    $this->cell(25,10,"Date",1,0,'C');
    $this->cell(10,10,"Class",1,0,'C');
    $this->cell(26,5,"Time",1,0,'C');
    $this->cell(9,10,"Hours",1,0,'C');
    $this->cell(8,5,"TH","LTR",0,'C');
    $this->cell(13,10,"Subject",1,0,'C');
    $this->cell(13,5,"Present","LTR",0,'C');
    $this->cell(76,10,"Topic covered in brief",1,0,'C');
    $this->cell(0,5,"",0,1);
    $this->cell(9,5,"",0,0,'C');
    $this->cell(25,5,"",0,0,'C');
    $this->cell(10,5,"",0,0,'C');
    $this->cell(13,5,"From",1,0,'C');
    $this->cell(13,5,"To",1,0,'C');
    $this->cell(9,5,"",0,0,'C');
    $this->cell(8,5,"/PR","LRB",0,'C');
    $this->cell(13,5,"",0,0,'C');
    $this->cell(13,5,"Student","LRB",0,'C');
    $this->cell(76,5,"",0,0,'C');
    $this->cell(0,5,"",0,1);



}
function Footer() {
  if($this->PageNo()==1){
    $this->SetY(-120);
  $this->addfont('times new roman','','times new roman.php');
$this->addfont('times new roman','B','times new roman bold.php');
$this->addfont('Arial','','arial.php');
$this->SetFont('times new roman','B',10);



  $this->cell(189,6,"DECLARATION",1,1,'C');
  $this->cell(0,0,"",0,1);
  $this->SetFont('times new roman','',8);
  $this->cell(189,6,"I declare that the above information is true and correct to the best of my knowledge and belief and that I have not claimed this bill before.",1,1,'L');
  $this->cell(0,6,"",0,1);
  $this->cell(100,5,$this->name,0,0,'L');
  $this->cell(89,5,"",0,1,'L');
  $this->SetFont('times new roman','B',8);
  $this->cell(100,5,"Name of Claimant",0,0,'L');
  $this->cell(89,5,"Signature of Claimant",0,1,'L');
  $this->cell(0,6,"",0,1);
  $this->cell(57,6,"SUMMARY OF BILL",1,0,'C');
  $this->cell(13,6,"",0,0);
  $this->cell(119,6,"CERTIFICATE",1,1);

  $this->cell(13,6,"Type",1,0,'C');
  $this->cell(9,6,"Hours ",1,0,'C');
  $this->cell(10,6,"Rate/hr",1,0,'C');
  $this->cell(25,6,"Amount Rs.",1,0,'C');
  $this->cell(13,6,"",0,0);
  $this->SetFont('times new roman','',8);
  $this->cell(119,6,"The bill may be passed for Rs.".$this->total,"LTR",0);


  $this->cell(13,6,"",0,0);
  $this->cell(119,6,"The bill may be passed for Rs.".$this->total,1,0);

  $this->cell(0,6,"",0,1);
  $this->SetFont('times new roman','B',8);
  $this->cell(13,6,"Theory",1,0,'C');
  $this->SetFont('times new roman','',8);
  $this->cell(9,6,$this->thhours,1,0,'C');
  $this->cell(10,6,$this->thrate,1,0,'C');
  $this->cell(25,6,$this->thamount,1,0,'C');
    
  $this->cell(13,6,"",0,0);
  $this->cell(119,6,"In words Rs. ".$this->word,"LRB",0);
  $this->cell(0,6,"",0,1);


  $this->SetFont('times new roman','B',8);
  $this->cell(13,6,"Practical",1,0,'C');
  $this->SetFont('times new roman','',8);
  $this->cell(9,6,$this->prhours,1,0,'C');
  $this->cell(10,6,$this->prrate,1,0,'C');
  $this->cell(25,6,$this->pramount,1,0,'C');
  $this->cell(13,6,"",0,0);
  $this->cell(39,6,"","LTR",0);
  $this->cell(40,6,"","LTR",0);
  $this->cell(40,6,"","LTR",0);
  $this->cell(0,6,"",0,1);
  
  $this->SetFont('times new roman','B',8);
  $this->cell(13,6,"Total",1,0,'C');
  $this->SetFont('times new roman','',8);
  $this->cell(9,6,"",1,0,'C');
  $this->cell(10,6,"",1,0,'C');

  $this->cell(25,6,$this->total,1,0,'C');
  $this->cell(13,6,"",0,0);
  
  $this->SetFont('times new roman','B',8);
  $this->cell(39,6,"Checked By","LRB",0);
  $this->cell(40,6,"Verified By","LRB",0);
  $this->cell(40,6,"HOD","LRB",0);
  $this->cell(0,10,"",0,1);
  $this->SetFont('times new roman','',8);
  $this->cell(189,6,"The bill is passed for Rs.".$this->total."   In words Rs. ".$this->word,0,1,'L');
  $this->cell(0,10,"",0,1);
  $this->SetFont('times new roman','B',8);
  $this->cell(95,6,"         Registrar",0,0,'L');
  $this->cell(94,6,"         Principal",0,1,'L');
  $this->SetFont('arial','',8);
  $this->cell(0,6,"",0,1,'L');
  $this->cell(189,6,"This bill is Printed using VFB system Website devloped under final Year Project By TYCM Students 1) Aditya durge 2)Vishal Gaikwad 3)Omkar Gorde","T",1,'L');
  $this->cell(189,4,"4)Sandip Kadus 5) Vinay Lavharkar under guidance of Prof.S.D.Muley in Year 2022.",0,1,'L');
  $this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,'C');

  }
  else{
    $this->SetY(-12);
    $this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,'C');
  }
}

}
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
    $w.=$this->single_word($crore,"Cror ");
    $lakh=(int)($this->rupees/100000);
    $this->rupees=$this->rupees%100000;
    $w.=$this->single_word($lakh,"Lakh ");
    $thousand=(int)($this->rupees/1000);
    $this->rupees=$this->rupees%1000;
    $w.=$this->single_word($thousand,"Thousand  ");
    $hundred=(int)($this->rupees/100);
    $w.=$this->single_word($hundred,"Hundred ");
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
      $w.=" and ".$this->single_word($this->paisa," Paisa");
    }
    return $w." Only";
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
$obj=new IndianCurrency($total);

$word=$obj->get_words();
$a=array($Month,$Date,$Full_name,$thhours,$Th_rate,$thamount,$prhours,$Pr_rate,$pramount,$total,$word);

$pdf = new PDF('P','mm','A4');


$pdf->sh($a);

$pdf->AliasNbPages('{pages}');

$pdf->AddPage();
$q4="Select * from $billid";
$result1=$con->query($q4);

$count=1;
while($row=$result1->fetch_assoc())
    {
      $Date=$row["Date"];
      $Class=$row["Class"];
      $Time_from=$row["Time_from"];
      $Time_to=$row["Time_to"];
      $Hours=$row["Hours"];
      $THPR=$row["TH/PR"];
      $Subject=$row["Subject"];
      $Present_Student=$row["Present_Student"];
      $Topic_covered=$row["Topic_covered"];
      $pdf->addfont('times new roman','','times new roman.php');
      $pdf->addfont('times new roman','B','times new roman bold.php');
     $pdf->SetFont('times new roman','',8);
     $cellWidth=76;//wrapped cell width
     $cellHeight=6;//normal one-line cell height
     if($pdf->GetStringWidth($Topic_covered) < $cellWidth){
      //if not, then do nothing
      $line=1;
    }else{
      //if it is, then calculate the height needed for wrapped cell
      //by splitting the text to fit the cell width
      //then count how many lines are needed for the text to fit the cell
      
      $textLength=strlen($Topic_covered);	//total text length
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
          $tmpString=substr($Topic_covered,$startChar,$maxChar);
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
    }


    
 
      $pdf->cell(9,($line * $cellHeight),$count,1,0,'C');
      $pdf->cell(25,($line * $cellHeight),$Date,1,0,'C');
      $pdf->cell(10,($line * $cellHeight),$Class,1,0,'C');
      $pdf->cell(13,($line * $cellHeight),$Time_from,1,0,'C');
      $pdf->cell(13,($line * $cellHeight),$Time_to,1,0,'C');
      $pdf->cell(9,($line * $cellHeight),$Hours,1,0,'C');
      $pdf->cell(8,($line * $cellHeight),$THPR,1,0,'C');
      $pdf->cell(13,($line * $cellHeight),$Subject,1,0,'C');
      $pdf->cell(13,($line * $cellHeight),$Present_Student,1,0,'C');
      $xPos=$pdf->GetX();
      $yPos=$pdf->GetY();
      $pdf->MultiCell($cellWidth,$cellHeight,$Topic_covered,1);
  
      $pdf->cell(0,0,"",0,1);
$count++;
    }



$Fname=$Month.$Year.".pdf";
$pdf->Output('D',$Fname);
?>
