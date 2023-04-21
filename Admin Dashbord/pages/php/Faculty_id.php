<?php
function get_Faculty_id()
{
$id="GPAN";
$y= date('Y');

$r=rand(00001,99999);
$Faculty_id=$id.$y.$r;
return $Faculty_id;

}
?> 
