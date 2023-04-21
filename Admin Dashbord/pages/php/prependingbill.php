<?php
if(!isset($_SESSION["Username"]))
{
echo "<script>window.location.href='../../Admin Login/login.php';</script>";

}

?>
<script> 
function view(val)
{
    btn=val;
    var  id=btn.id;
    var nid=id.replace("btn1","");
    var Name = document.querySelector('#'+nid+"s1").textContent;
    var Month = document.querySelector('#'+nid+"s3").textContent;
    var Year = document.querySelector('#'+nid+"s4").textContent;
    window.location.href = "./php/previewbill.php?Name="+Name+"&Month="+Month+"&Year="+Year+"&set=1";


}
</script>