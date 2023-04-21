<?php
include ('./php/Connection.php');
$Faculty_id=$_SESSION["Faculty_id"];
$timetable="TT".$Faculty_id;
$Month=$_SESSION["Month"];
$Year=$_SESSION["Year"];
$q0="SELECT DISTINCT Scheme  FROM $timetable ";

$result=$con->query($q0);
?>
<script>
function addentry(){
    const a= `
    <div class='row' >
              <div class='col-md-4'>
           <div class='form-group m-md-2'>
         
             <label for=''>Select Date</label>
                  <input  type='date' name='date' class='form-control' required> 

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>From </label>
             <select required class='form-select' id='From' name='From' >
             <option value='' disabled selected>Select From</option>
             <option value='9.30'  >9.30</option>
             <option value='10.30'  >10.30</option>
             <option value='11.30'  >11.30</option>
             <option value='12.30'  >12.30</option>
             <option value='1.50'  >1.50</option>
             <option value='2.50'  >2.50</option>
             <option value='4.00'  >4.00</option>
             <option value='5.00'  >5.00</option>


                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>To </label>
             <select required class='form-select' id='To' name='To' >
             <option value='' disabled selected>Select To</option>
             <option value='10.30'  >10.30</option>
             <option value='11.30'  >11.30</option>
             <option value='12.30'  >12.30</option>
             <option value='1.30'  >1.30</option>
             <option value='2.50'  >2.50</option>
             <option value='3.50'  >3.50</option>
             <option value='5.00'  >5.00</option>
             <option value='6.00'  >6.00</option>
                       </select>

          </div>
          </div>

            </div>
              <div class='row' >
              <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Scheme </label>
             <select required class='form-select' onchange='setclass(this.value)' id='Scheme'  name='Scheme' >
             <option value='' disabled selected>Select Scheme</option>
             <?php
                       while($row=$result->fetch_assoc())

                       {
                           $Scheme_name=$row["Scheme"];
                       echo" <option value='$Scheme_name'>$Scheme_name</option>";
                       }
            ?>

                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Class </label>
             <select required Class='form-select' id='Class' onchange='setsubject(this.value)'  name='Class' >
             <option value='' disabled selected>Select Class</option>


                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Subject </label>
             <select required class='form-select' onchange='setsem(this.value)' id='Subject' name='Subject' >
             <option value='' disabled selected>Select Subject</option>


                       </select>

          </div>
          </div>

            </div>
            <div class='row' >

          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Sem </label>
             <select required class='form-select'onchange='setthpr()' id='Sem' name='Sem' >
             <option value='' disabled selected>Select Sem</option>

                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>TH/PR</label>
             <select required class='form-select' onchange='sethours(this.value)'; id='THPR' name='THPR' >
             <option value='' disabled selected>Select TH/PR</option>



                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Hours </label>
             <select required class='form-select' id='Hours' name='Hours' >
             <option value='' disabled selected>Select Hours</option>


                       </select>

          </div>
          </div>

            </div>
            <div class='row' >

          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>No of Present Student </label>
             <input type="number" name= "Nostud" required="required" class="form-control">

          </div>
          </div>
          <div class='col-md-8'>
           <div class='form-group m-md-2'>
             <label for=''>Topic Covered Iin Brief </label>
             <input type="text" name= "Topic_covered" required="required" class="form-control">

          </div>
          </div>
          </div>
            <div class='row'>
            <div class='col-8 ms-auto d-flex justify-content-end' >
<input type='submit'  class='btn btn-warning m-1 btn-sm'name="addEntry" onclick="Validate()" value='submit'>
             <input type='button' onclick='remsub()' class='btn btn-danger m-1 btn-sm' id='cancle' value='cancle'>
            </div>
          </div>


   ` ;
  var d = document.querySelector("#addentry");
  var temp = document.createElement('div'); // create a temporary dom element

  temp.innerHTML = a; // give it your html string as content, the browser will then create the corresponding dom representation
d.append(temp);
temp.classList.add('content');

var addtimetablebtn=document.querySelector("#addentrybtn");
addtimetablebtn.disabled = true;
var editbutton=document.querySelectorAll('.btn-secondary');
var i = editbutton.length;
for(i=0;i<editbutton.length;i++)
{
  editbutton[i].disabled=true;
}

var deletebutton=document.querySelectorAll('.btn-danger');
var i = deletebutton.length;
for(i=0;i<deletebutton.length;i++)
{
  deletebutton[i].disabled=true;
}
var cancle=document.querySelector('#cancle');
cancle.disabled=false;
}


function setclass(v){
  var Scheme =v;
  const xhttp1= new XMLHttpRequest();

     xhttp1.open('GET','./php/select.php?Scheme='+Scheme+'&setclass=1',true);
     xhttp1.send();
     xhttp1.onreadystatechange=function()
     {
       if(xhttp1.readyState==4 && xhttp1.status==200)
       {

        var Subject=document.querySelector('#Class')

  Subject.innerHTML=xhttp1.responseText;
       }
     }
}
function setsubject(v){
  var Class =v;
  var Scheme=document.querySelector('#Scheme').value;
  const xhttp1= new XMLHttpRequest();
  
     xhttp1.open('GET','./php/select.php?Scheme='+Scheme+'&Class='+Class+'&setsubject=1',true);
     xhttp1.send();
     xhttp1.onreadystatechange=function()
     {
       if(xhttp1.readyState==4 && xhttp1.status==200)
       {

        var Subject=document.querySelector('#Subject');

  Subject.innerHTML=xhttp1.responseText;
       }
     }
}
function setsem(v){
  var Subject =v;
  var Scheme=document.querySelector('#Scheme').value;
  var Class=document.querySelector('#Class').value;

  const xhttp1= new XMLHttpRequest();
   
     xhttp1.open('GET','./php/select.php?Scheme='+Scheme+'&Class='+Class+'&Subject='+Subject+'&setsem=1',true);
     xhttp1.send();
     xhttp1.onreadystatechange=function()
     {
       if(xhttp1.readyState==4 && xhttp1.status==200)
       {

        var Sem=document.querySelector('#Sem');

  Sem.innerHTML=xhttp1.responseText;
       }
     }
}
function setthpr(){

  var Scheme=document.querySelector('#Scheme').value;
  var Class=document.querySelector('#Class').value;
  var Subject=document.querySelector('#Subject').value;

  const xhttp1= new XMLHttpRequest();
   
     xhttp1.open('GET','./php/select.php?Scheme='+Scheme+'&Class='+Class+'&Subject='+Subject+'&setthpr=1',true);
     xhttp1.send();
     xhttp1.onreadystatechange=function()
     {
       if(xhttp1.readyState==4 && xhttp1.status==200)
       {

        var THPR=document.querySelector('#THPR');

  THPR.innerHTML=xhttp1.responseText;
       }
     }
}
function sethours(v){

var THPR=v;
var Hours=document.querySelector('#Hours');
if(THPR=="TH")
{
  Hours.innerHTML=`             <option value='' disabled selected>Select Hours</option>
  <option value='1'>1</option>
  
`;
}
else
{
    Hours.innerHTML=`             <option value='' disabled selected>Select Hours</option>
  <option value='2'>2</option>
  
`;

}


}
function remsub()
{

var content= document.querySelector('.content');
content.parentElement.removeChild(content);
var addtimetablebtn=document.querySelector("#addentrybtn");
addtimetablebtn.disabled = false;
var editbutton=document.querySelectorAll('.btn-secondary');
var i = editbutton.length;
for(i=0;i<editbutton.length;i++)
{
  editbutton[i].disabled=false;
}

var deletebutton=document.querySelectorAll('.btn-danger');
var i = deletebutton.length;
for(i=0;i<deletebutton.length;i++)
{
  deletebutton[i].disabled=false;
}

}
function delentry(v)
{

var delbtn=v;
var id=delbtn.id;
var nid=id.replace("btn2","");
var Date = document.querySelector('#'+nid+"s1").textContent;
var From = document.querySelector('#'+nid+"s3").textContent;
window.location.href='./php/Billdetails.php?Date='+Date+'&From='+From+'&delentry=1';
}
function editentry(btn)
{

  var id=btn.id;
    btn.classList.add("Clickedbutton");

    var nid=id.replace("btn1","");
    var Date = document.querySelector('#'+nid+"s1").textContent;

    var C = document.querySelector('#'+nid+"s2").textContent;
 

    var From = document.querySelector('#'+nid+"s3").textContent;
    var To = document.querySelector('#'+nid+"s4").textContent;
    var Subject = document.querySelector('#'+nid+"s7").textContent;
    var TH = document.querySelector('#'+nid+"s6").textContent;
    var Nos = document.querySelector('#'+nid+"s8").textContent;
    var Topic = document.querySelector('#'+nid+"s9").textContent;
    var defaultf=["9.30","10.30","11.30","12.30","1.50","2.50","4.00","5.00"];
    var defaultt=["10.30","11.30","12.30","1.30","2.50","3.50","5.00","6.00"];
  
    var From1="  <option value='' disabled selected>Select From</option>";
    var To1="  <option value='' disabled selected>Select To </option>";
    var TH1="  <option value='' disabled selected>Select Hours </option>";
    if(TH=="TH")
    {
      var str="<option value='1'  selected>1 </option>";
      TH1+=str;
    }
    else{
      var str="<option value='2'  selected>2 </option>";
      TH1+=str;
    }

    if(C.search(/CO/)!= -1)
    {
      var c="CO";
      C=C.replace("CO","");
    
    }
if(C.search(/CM/)!= -1)
    {
      var c="CM";
      C=C.replace("CM","")
    
    }

    
    if(C.search(/1/)!= -1)
    {
      var sem="1";
      C=C.replace("1","")
      Classs="FY"+c
    }
    else if(C.search(/2/)!= -1)
    {
      var sem="2";
      C=C.replace("2","")
      Classs="FY"+c
    }
    else if(C.search(/3/)!= -1)
    {
      var sem="3";
      C=C.replace("3","")
      Classs="SY"+c
    }
    else if(C.search(/4/)!= -1)
    {
      var sem="4";
      C=C.replace("4","")
      Classs="SY"+c
    }
    else if(C.search(/5/)!= -1)
    {
      var sem="5";
      C=C.replace("5","")
      Classs="TY"+c
    }
    else
    {
      var sem="6";
      C=C.replace("6","")
      Classs="TY"+c
    }
 





    for(i=0;i<defaultf.length;i++)
    {
      if(From==defaultf[i])
      {
        var str="<option value='"+defaultf[i]+"'selected>"+defaultf[i]+"</option>";
        From1+=str;
      }
      else{
        var str="<option value='"+defaultf[i]+"'>"+defaultf[i]+"</option>";
        From1+=str;
      }

    }

    for(i=0;i<defaultt.length;i++)
    {
      if(To==defaultt[i])
      {
        var str="<option value='"+defaultt[i]+"'selected>"+defaultt[i]+"</option>";
        To1+=str;
      }
      else{
        var str="<option value='"+defaultt[i]+"'>"+defaultt[i]+"</option>";
        To1+=str;
      }

    }
  

      const a= `
    <div class='row' >
              <div class='col-md-4'>
           <div class='form-group m-md-2'>
         
             <label for=''>Select Date</label>
                  <input type='date' name='date' id='date' required value='`+Date+`' class='form-control'> 

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>From </label>
             <select required class='form-select'onchange="selectsubject(this.value)" id='From' name='From' >
        `+From1+`
  

                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>To </label>
             <select required class='form-select' id='To' name='To' >
        `+To1+`
                       </select>

          </div>
          </div>

            </div>
              <div class='row' >
              <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Scheme </label>
             <select required class='form-select' onchange='setclass(this.value)' id='Scheme'  name='Scheme' >
             <option value='' disabled selected>Select Scheme</option>
         

                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Class </label>
             <select required Class='form-select' id='Class' onchange='setsubject(this.value)'  name='Class' >
             <option value='' disabled selected>Select Class</option>


                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Subject </label>
             <select required class='form-select' onchange='setsem(this.value)' id='Subject' name='Subject' >
             <option value='' disabled selected>Select Subject</option>


                       </select>

          </div>
          </div>

            </div>
            <div class='row' >

          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Sem </label>
             <select required class='form-select'onchange='setthpr()' id='Sem' name='Sem' >
             <option value='' disabled selected>Select Sem</option>

                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>TH/PR</label>
             <select required class='form-select' onchange='sethours(this.value)'; id='THPR' name='THPR' >
             <option value='' disabled selected>Select TH/PR</option>



                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Hours </label>
             <select required class='form-select' id='Hours' name='Hours' >
             `+TH1+`


                       </select>

          </div>
          </div>

            </div>
            <div class='row' >

          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>No of Present Student </label>
             <input type="number" id="Nos" name= "Nostud" required value='`+Nos+`'class="form-control">

          </div>
          </div>
          <div class='col-md-8'>
           <div class='form-group m-md-2'>
             <label for=''>Topic Covered Iin Brief </label>
             <input type="text" id="Topic" name= "Topic_covered" required value='`+Topic+`' class="form-control">

          </div>
          </div>
          </div>
            <div class='row'>
            <form>
            <div class='col-8 ms-auto d-flex justify-content-end' >
<input type='button'  class='btn btn-warning m-1 btn-sm'name="addEntry" onclick='updateentry()' value='Update'>
             <input type='button' onclick='removesub()' class='btn btn-danger m-1 btn-sm' id='cancle' value='cancle'>
             </form>
            </div>
          </div>


   ` ;
  var d = document.querySelector("#addentry");
  var temp = document.createElement('div'); // create a temporary dom element

  temp.innerHTML = a; // give it your html string as content, the browser will then create the corresponding dom representation
d.append(temp);
temp.classList.add('content');

var addtimetablebtn=document.querySelector("#addentrybtn");
addtimetablebtn.disabled = true;
var editbutton=document.querySelectorAll('.btn-secondary');
var i = editbutton.length;
for(i=0;i<editbutton.length;i++)
{
  editbutton[i].disabled=true;
}

var deletebutton=document.querySelectorAll('.btn-danger');
var i = deletebutton.length;
for(i=0;i<deletebutton.length;i++)
{
  deletebutton[i].disabled=true;
}
var cancle=document.querySelector('#cancle');
cancle.disabled=false;

const xhttp= new XMLHttpRequest();

     xhttp.open('GET','./php/select.php?Scheme='+C+'&Schemes=1',true);
     xhttp.send();
     xhttp.onreadystatechange=function()
     {
       if(xhttp.readyState==4 && xhttp.status==200)
       {

        var Scheme=document.querySelector('#Scheme')

  Scheme.innerHTML=xhttp.responseText;


       }
     }
     const xhttp1= new XMLHttpRequest();

xhttp1.open('GET','./php/select.php?Scheme='+C+'&Class='+Classs+'&class=1',true);
xhttp1.send();
xhttp1.onreadystatechange=function()
{
  if(xhttp1.readyState==4 && xhttp1.status==200)
  {

   var Class=document.querySelector('#Class')

Class.innerHTML=xhttp1.responseText;


  }
}

const xhttp2= new XMLHttpRequest();
  
     xhttp2.open('GET','./php/select.php?Scheme='+C+'&Class='+Classs+'&Subject='+Subject+'&subject=2',true);
     xhttp2.send();
     xhttp2.onreadystatechange=function()
     {
       if(xhttp2.readyState==4 && xhttp2.status==200)
       {

        var Subject=document.querySelector('#Subject')

  Subject.innerHTML=xhttp2.responseText;


       }
     }


     const xhttp3= new XMLHttpRequest();

xhttp3.open('GET','./php/select.php?Scheme='+C+'&Subject='+Subject+'&sem=2',true);
xhttp3.send();
xhttp3.onreadystatechange=function()
{
  if(xhttp3.readyState==4 && xhttp3.status==200)
  {

   var Sem=document.querySelector('#Sem')

Sem.innerHTML=xhttp3.responseText;


  }
}
const xhttp4= new XMLHttpRequest();

xhttp4.open('GET','./php/select.php?Scheme='+C+'&Subject='+Subject+'&Class='+Classs+'&TH='+TH+'&th=2',true);
xhttp4.send();
xhttp4.onreadystatechange=function()
{
  if(xhttp4.readyState==4 && xhttp4.status==200)
  {

   var THPR=document.querySelector('#THPR')

THPR.innerHTML=xhttp4.responseText;


  }
}
}
function removesub()
{

var content= document.querySelector('.content');
content.parentElement.removeChild(content);
var addtimetablebtn=document.querySelector("#addentrybtn");
addtimetablebtn.disabled = false;
var editbutton=document.querySelectorAll('.btn-secondary');
var i = editbutton.length;
for(i=0;i<editbutton.length;i++)
{
  editbutton[i].disabled=false;
}

var deletebutton=document.querySelectorAll('.btn-danger');
var i = deletebutton.length;
for(i=0;i<deletebutton.length;i++)
{
  deletebutton[i].disabled=false;
}
var a= document.querySelector(".Clickedbutton");
a.classList.remove("Clickedbutton");
}
function updateentry()
{

    var btn= document.querySelector(".Clickedbutton");

    var id=btn.id;


    var nid=id.replace("btn1","");
    var f=document.querySelector('#form1');
    if(f.reportValidity())
    {

      var From = document.querySelector("#From").value;
  var To = document.querySelector("#To").value;
  var Hours = document.querySelector("#Hours").value;
  To= parseFloat(To);
  if(To>=1&& To<=6)
  {
     To=To+12;
  }
  From= parseFloat(From);
  if(From>=1&& From<=6)
  {
     From=From+12;
  }
  var dtime=To-From;
  if(dtime!=Hours && dtime!=Hours)
  {
    
     alert("You have selected invalid time or TH/PR field. please selcet valid Form and To field OR TH/PR field !");
    
  }
  else{

    
    var Date1 = document.querySelector('#'+nid+"s1").textContent;

var From1 = document.querySelector('#'+nid+"s3").textContent;
var To1 = document.querySelector('#'+nid+"s4").textContent;




    var Date = document.querySelector('#date').value;

var From= document.querySelector('#From').value;





var To= document.querySelector('#To').value;

   var Scheme = document.querySelector("#Scheme").value;
   var Class = document.querySelector("#Class").value;
   var Subject = document.querySelector("#Subject").value;
   var THPR = document.querySelector("#THPR").value;
   var Sem = document.querySelector("#Sem").value;
   var Topic = document.querySelector("#Topic").value;
   var Hours = document.querySelector("#Hours").value;
   var Nos = document.querySelector("#Nos").value;
  



   window.location.href = "./php/Billdetails.php?Date="+Date+"&From="+From+"&To="+To+"&Scheme="+Scheme+"&Class="+Class+"&Subject="+Subject+"&THPR="+THPR+"&Topic="+Topic+"&Nos="+Nos+"&Sem="+Sem+"&Hours="+Hours+"&Date1="+Date1+"&From1="+From1+"&To1="+To1+"&Up=1";
  }


    }
}
function addbtn(){

var a=`      
<form method="POST" action="./php/Bill.php">
 <div class='row justify-content-center'>
                <div class='col d-flex justify-content-center '>
           
             <input type='submit' name='submit' class='btn btn-success w-25' value='GENERATE BILL'>   
   
              </div>
              </div>
              </form>`;
                var d = document.querySelector('#addbtn');
           
var temp = document.createElement('div'); // create a temporary dom element
 temp.classList.add("content1");
temp.innerHTML = a; // give it your html string as content, the browser will then create the corresponding dom representation
d.append(temp);
}
function remnbtn(){
// var content= document.querySelector('.content1');
// content.parentElement.removeChild(content);
}

function Validate()
{

   
  f=document.getElementById("form1");
  f.onsubmit=function(){
     var a=true;
    var From = document.querySelector("#From").value;
  var To = document.querySelector("#To").value;
  var Hours = document.querySelector("#Hours").value;
  To= parseFloat(To);
  if(To>=1&& To<=6)
  {
     To=To+12;
  }
  
  From= parseFloat(From);
  if(From>=1&& From<=6)
  {
     From=From+12;
  }



  var dtime=To-From;

  if(dtime!=Hours && dtime!=Hours)
  {
    
     alert("You have selected invalid time or TH/PR field. please selcet valid Form and To field OR TH/PR field !");
    //  return false;
     a=false;
  }
  // return true;
    return a;
  };



} 

</script>
