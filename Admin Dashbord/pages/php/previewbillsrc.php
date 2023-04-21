<?php
session_start(); 
if(!isset($_SESSION["Username"]))
{
   echo "<script>window.location.href='../../Admin Login/login.php';</script>";

}
include('./php/Connection.php');
if(!isset($_SESSION["Name"]))
{

  echo "<script>window.location.href='Pending Bill.php';</script>";
}
else{
  $Name=$_SESSION["Name"];
  $Month=$_SESSION["Month"];
  $Year=$_SESSION["Year"];

  $a=explode(" ",$Name);
  $First_name=$a[0];
  $Middle_name=$a[1];
  $Last_name=$a[2];
  $q="select * from faculty_details where `First_name`='$First_name'and  `Middle_name`='$Middle_name'and `Last_name`='$Last_name'";

  $result=$con->query($q);
  if($result->num_rows >0)
  {
    while($row=$result->fetch_assoc())
    {
      $Faculty_id=$row["Faculty_id"];
    }
  }
  

}
?> 
<script>
    function reject()
    {
        const a= `
        <div class="row  justify-content-center">
              <div class="col-10 ">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Reason for Rejection</label>
                 <textarea class="form-control" id="exampleFormControlTextarea1" name="Reason" required rows="3"></textarea>
                   </div>
                </div>
                </div>
                <div class="row mt-3">
                <div class='col-8 ms-auto d-flex justify-content-end' >
            <input type='submit'  class='btn btn-warning m-1 btn-sm'name="submit" value='submit'>
             <input type='button' onclick='remta()' class='btn btn-danger m-1 btn-sm' id='cancle' value='cancle'>
            </div>
                </div>
              </div>

   ` ;
  var d = document.querySelector("#addta");
  var temp = document.createElement('div'); // create a temporary dom element

  temp.innerHTML = a; // give it your html string as content, the browser will then create the corresponding dom representation
d.append(temp);
temp.classList.add('content');

var apbtn=document.querySelector("#apbtn");
apbtn.disabled = true;
var rejbtn=document.querySelector("#rejbtn");
rejbtn.disabled = true;


    }
    function remta()
    {
        var content= document.querySelector('.content');
content.parentElement.removeChild(content);
var apbtn=document.querySelector("#apbtn");
apbtn.disabled = false;
var rejbtn=document.querySelector("#rejbtn");
rejbtn.disabled = false;

    }
    </script>