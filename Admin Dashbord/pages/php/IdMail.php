<?php
function Send_id($First_name,$Last_name,$Faculty_id,$Email){
    $f1=FALSE;
    $sub="Your Faculty ID ";
    $Msg="";
    $headers = "From:admin@gpnagar.ac.in";
    $Msg1 = "Hello $First_name $Last_name ". PHP_EOL;
    $Msg2= " welcome to Goverment Polytechnic Ahmednagar". PHP_EOL;
    $Msg3="Your Faculty_id is " .$Faculty_id . PHP_EOL;
    $Msg4="Now you can register yourself on website and make your own password by registration page". PHP_EOL;
    $Msg5="NOTE :- YOUR Faculty_id is Username\n" . PHP_EOL;
     $Msg6=" This is an auto generated e-mail please do not reply to this e-mail.". PHP_EOL;
     $Msg.= $Msg1 .= $Msg2 .= $Msg3 .= $Msg4 .= $Msg5 .= $Msg6 ;

  
        if(mail($Email,$sub,$Msg,$headers))
        {
            $f1=TRUE;
        }

        return $f1;
}

?>
