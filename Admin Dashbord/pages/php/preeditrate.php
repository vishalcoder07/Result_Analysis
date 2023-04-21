<?php

$q0="SELECT DISTINCT Scheme  FROM scheme_details ";
$result=$con->query($q0);

?>


<script> 
function editsub(btn){
    var id=btn.id;
    btn.classList.add("Clickedbutton");

    var nid=id.replace("btn1","");

    var Thrate = document.querySelector('#'+nid+"s1").textContent;

    var Prrate = document.querySelector('#'+nid+"s2").textContent;

    var Limit = document.querySelector('#'+nid+"s3").textContent;

    const a= `
    <div class='row' >
    <div class="col-md-4">
                  <div class="form-group">
                    <label for="">TH Rate/Hours</label>
                    <input type= "number"  name="Thr"  id="Thr" required="required" value='`+Thrate+`' class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">PR Rate/Hours</label>
                    <input type= "number"  name="Prr" id="Prr" required="required" value='`+Prrate+`' class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Limit</label>
                    <input type= "number"  name="Limit" id="Limit" required="required" value='`+Limit+`' class="form-control">
                  </div>
                </div>
    

            </div>
  

            <div class='row mt-3'>
            <div class='col-8 ms-auto d-flex justify-content-end' >
<input type='button'  onclick='Update()' class='btn btn-warning m-1 btn-sm'name="update" value='update'>
             <input type='button' onclick='removesub()' class='btn btn-danger m-1 btn-sm' id='cancle' value='cancle'>
            </div>
          </div>


   ` ;
   var d = document.querySelector("#addsub");
  var temp = document.createElement('div'); // create a temporary dom element

  temp.innerHTML = a; // give it your html string as content, the browser will then create the corresponding dom representation
d.append(temp);
temp.classList.add('content');
var editbutton=document.querySelectorAll('.btn-secondary');
var i = editbutton.length;
for(i=0;i<editbutton.length;i++)
{
  editbutton[i].disabled=true;
}
    }
    

    function removesub()
{

var content= document.querySelector('.content');
content.parentElement.removeChild(content);

var editbutton=document.querySelectorAll('.btn-secondary');
var i = editbutton.length;
for(i=0;i<editbutton.length;i++)
{
  editbutton[i].disabled=false;
}

var a= document.querySelector(".Clickedbutton");
a.classList.remove("Clickedbutton");
}



function Update(){
    var btn= document.querySelector(".Clickedbutton");

    var id=btn.id;


    var nid=id.replace("btn1","");
    var Thrate = document.querySelector('#'+nid+"s1").textContent;

var Prrate = document.querySelector('#'+nid+"s2").textContent;

var Limit = document.querySelector('#'+nid+"s3").textContent;


   var Thr = document.querySelector("#Thr").value;
   var Prr = document.querySelector("#Prr").value;
   var Lim = document.querySelector("#Limit").value;

   window.location.href = "./php/Edit rate.php?Thr="+Thr+"&Prr="+Prr+"&Lim="+Lim+"&Thrate="+Thrate+"&Prrate="+Prrate+"&Limit="+Limit+"&Up=1";


}
</script> 