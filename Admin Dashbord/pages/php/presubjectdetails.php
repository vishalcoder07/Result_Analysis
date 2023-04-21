<?php

$q0="SELECT DISTINCT Scheme  FROM scheme_details ";
$result=$con->query($q0);

if(!isset($_SESSION["Username"]))
{
    header('location:../../Admin Login/login.php');
}

?>

<script>
function addsub(){
    const a= `
    <div class='row' >
              <div class='col-md-3'>
           <div class='form-group m-md-2'>
             <label for=''>Scheme </label>
             <select required class='form-select' onchange='setclass()' id='Scheme' name='Scheme' >
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
          <div class='col-md-3'>
           <div class='form-group m-md-2'>
             <label for=''>Class </label>
             <select required class='form-select'onchange="selectsubject(this.value)" id='Class' name='Class' >
             <option value='' disabled selected>Select Semester</option>


                       </select>

          </div>
          </div>
          <div class='col-md-3'>
           <div class='form-group m-md-2'>
             <label for=''>Subject </label>
             <select required class='form-select' id='Subject'onchange="selectth(this.value)" name='Subject' >
             <option value='' disabled selected>Select Subject</option>

                       </select>

          </div>
          </div>
          <div class='col-md-3'>
           <div class='form-group m-md-2'>
             <label for=''>TH/PR </label>
             <select required class='form-select' onchange='setbatch()'id='THPR' name='TH/PR' >
             <option value='' disabled selected>Select TH/PR</option>
                        <option value='TH'>TH</option>
                        <option value='PR'>PR</option>
                        <option value='both'>both</option>

                       </select>

          </div>
          </div>
            </div>
              <div class='row' >
              <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Batch1 </label>
             <select required class='form-select' id='Batch1' name='Batch1' >
             <option value='' disabled selected>Select Batch1</option>
                        <option value='Y'>Yes</option>
                        <option value='N'>No</option>

                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Batch2 </label>
             <select required class='form-select' id='Batch2' name='Batch2' >
             <option value='' disabled selected>Select Batch2</option>
                        <option value='Y'>Yes</option>
                        <option value='N'>No</option>


                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Batch3 </label>
             <select required class='form-select' id='Batch3' name='Batch3' >
             <option value='' disabled selected>Select Batch3</option>
                       <option value='Y'>Yes</option>
                        <option value='N'>No</option>

                       </select>

          </div>
          </div>

            </div>

            <div class='row'>
            <div class='col-8 ms-auto d-flex justify-content-end' >
<input type='submit'  class='btn btn-warning m-1 btn-sm'name="addsubject" value='submit'>
             <input type='button' onclick='remsub()' class='btn btn-danger m-1 btn-sm' id='cancle' value='cancle'>
            </div>
          </div>


   ` ;
  var d = document.querySelector("#addsub");
  var temp = document.createElement('div'); // create a temporary dom element

  temp.innerHTML = a; // give it your html string as content, the browser will then create the corresponding dom representation
d.append(temp);
temp.classList.add('content');

var addsubbtn=document.querySelector("#addsubbtn");
addsubbtn.disabled = true;
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
function remsub()
{

var content= document.querySelector('.content');
content.parentElement.removeChild(content);
var addsubbtn=document.querySelector("#addsubbtn");
addsubbtn.disabled = false;
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
function removesub()
{

var content= document.querySelector('.content');
content.parentElement.removeChild(content);
var addsubbtn=document.querySelector("#addsubbtn");
addsubbtn.disabled = false;
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
function selectsubject(value)
{
  var a= document.querySelector('#Scheme');
   var Scheme=a.value;

   if(Scheme!="")
   {

     const xhttp= new XMLHttpRequest();
     xhttp.open('GET','./php/selectsubject.php?Scheme='+Scheme+'&Class='+value+'&Subject=1',true);
    
     xhttp.send();
     xhttp.onreadystatechange=function()
     {
       if(xhttp.readyState==4 && xhttp.status==200)
       {
         var Subject=document.querySelector('#Subject')

         Subject.innerHTML=xhttp.responseText;

       }
     }
   }
   }
   function selectth(value)
{
  var a= document.querySelector('#Scheme');
   var Scheme=a.value;
  var b= document.querySelector('#Class');
   var Class=b.value;

   if(Scheme!="")
   {

     const xhttp= new XMLHttpRequest();
     xhttp.open('GET','./php/selectsubject.php?Scheme='+Scheme+'&Class='+Class+'&Subject='+value+'&th=1',true);
    
     xhttp.send();
     xhttp.onreadystatechange=function()
     {
       if(xhttp.readyState==4 && xhttp.status==200)
       {
         var TH=document.querySelector('#THPR')

         TH.innerHTML=xhttp.responseText;

       }
     }
   }
   }
   function setclass()
   {
    var a= document.querySelector('#Scheme');
   var Scheme=a.value;
     if(Scheme!="")
     {

                var option=`  <option value='' disabled selected>Select Semester</option>
                <option value='FYCM'>FYCM</option>
                        <option value='SYCM'>SYCM</option>
                        <option value='TYCM'>TYCM</option>
                        <option value='FYCO'>FYCO</option>
                        <option value='SYCO'>SYCO</option>
                        <option value='TYCO'>TYCO</option>`;
                        document.querySelector('#Class').innerHTML=option;


     }

   }
   function setbatch()
   {
    var a= document.querySelector('#THPR');
   var TH=a.value;

   if(TH=="TH")
   {
    var Batch1=document.querySelector("#Batch1");
Batch1.disabled = true;
var Batch2=document.querySelector("#Batch2");
Batch2.disabled = true;
var Batch3=document.querySelector("#Batch3");
Batch3.disabled = true;
   }
   else{

    var Batch1=document.querySelector("#Batch1");
Batch1.disabled = false;
var Batch2=document.querySelector("#Batch2");
Batch2.disabled = false;
var Batch3=document.querySelector("#Batch3");
Batch3.disabled = false;

   }
   }
  function delsub(a)
  {
    var id=a.id;

    var nid=id.replace("btn2","");

    var Scheme = document.querySelector('#'+nid+"s1").textContent;

    var Class = document.querySelector('#'+nid+"s2").textContent;

    var Subject = document.querySelector('#'+nid+"s3").textContent;

    window.location.href = "./php/facultysubjectdetails.php?Scheme="+Scheme+"&Class="+Class+"&Subject="+Subject+"&del=1";
  }

  function editsub(btn){
    var id=btn.id;
    btn.classList.add("Clickedbutton");

    var nid=id.replace("btn1","");

    var Scheme = document.querySelector('#'+nid+"s1").textContent;

    var Class = document.querySelector('#'+nid+"s2").textContent;

    var Subject = document.querySelector('#'+nid+"s3").textContent;

    var TH = document.querySelector('#'+nid+"s4").textContent;

    var Batch1 = document.querySelector('#'+nid+"s5").textContent;

    var Batch2 = document.querySelector('#'+nid+"s6").textContent;

    var Batch3 = document.querySelector('#'+nid+"s6").textContent;

    var cla="<option value='' disabled selected>Select Semester</option>";
    var defaultc=["FYCM","SYCM","TYCM","FYCO","SYCO","TYCM"];
  
   
    var th="<option value='' disabled selected>Select TH/PR</option>";
    var defaultb=["Y","N"];
    var batch1="  <option  disabled selected value=''>Select Batch1</option>";
    var batch2="  <option value='' disabled selected>Select Batch2</option>";
    var batch3="  <option value='' disabled selected>Select Batch3</option>";

    for(i=0;i<defaultb.length;i++)
    {
      if(Batch1==defaultb[i])
      {
        if(defaultb[i]=="Y")
        {
          var str="<option value='"+defaultb[i]+"'selected>Yes</option>";
        batch1+=str;

        }
        else
        {
          var str="<option value='"+defaultb[i]+"'selected>No</option>";
        batch1+=str;
        }
      }
      else{
        if(defaultb[i]=="Y")
        {
          var str="<option value='"+defaultb[i]+"'>Yes</option>";
        batch1+=str;

        }
        else
        {
          var str="<option value='"+defaultb[i]+"'>No</option>";
        batch1+=str;
        }
      }

    }


    for(i=0;i<defaultb.length;i++)
    {
      if(Batch2==defaultb[i])
      {
        if(defaultb[i]=="Y")
        {
          var str="<option value='"+defaultb[i]+"'selected>Yes</option>";
        batch2+=str;

        }
        else
        {
          var str="<option value='"+defaultb[i]+"'selected>No</option>";
        batch2+=str;
        }
      }
      else{
        if(defaultb[i]=="Y")
        {
          var str="<option value='"+defaultb[i]+"'>Yes</option>";
        batch2+=str;

        }
        else
        {
          var str="<option value='"+defaultb[i]+"'>No</option>";
        batch2+=str;
        }
      }

    }


    for(i=0;i<defaultb.length;i++)
    {
      if(Batch3==defaultb[i])
      {
        if(defaultb[i]=="Y")
        {
          var str="<option value='"+defaultb[i]+"'selected>Yes</option>";
        batch3+=str;

        }
        else
        {
          var str="<option value='"+defaultb[i]+"'selected>No</option>";
        batch3+=str;
        }
      }
      else{
        if(defaultb[i]=="Y")
        {
          var str="<option value='"+defaultb[i]+"'>Yes</option>";
        batch3+=str;

        }
        else
        {
          var str="<option value='"+defaultb[i]+"'>No</option>";
        batch3+=str;
        }
      }

    }








    // for(i=0;i<defaultth.length;i++)
    // {
    //   if(TH==defaultth[i])
    //   {
    //     var str="<option value='"+defaultth[i]+"'selected>"+defaultth[i]+"</option>";
    //     th+=str;
    //   }
    //   else{
    //     var str="<option value='"+defaultth[i]+"'>"+defaultth[i]+"</option>";
    //     th+=str;
    //   }

    // }
    for(i=0;i<defaultc.length;i++)
    {
      if(Class==defaultc[i])
      {
        var str="<option value='"+defaultc[i]+"'selected>"+defaultc[i]+"</option>";
        cla+=str;
      }
      else{
        var str="<option value='"+defaultc[i]+"'>"+defaultc[i]+"</option>";
        cla+=str;
      }

    }

    const a= `
    <div class='row' >
              <div class='col-md-3'>
           <div class='form-group m-md-2'>
             <label for=''>Scheme </label>
             <select required class='form-select' onchange='setclass()' id='Scheme' name='Scheme' >
             <option value='' disabled selected>Select Scheme</option>

                       </select>

          </div>
          </div>
          <div class='col-md-3'>
           <div class='form-group m-md-2'>
             <label for=''>Class </label>
             <select required class='form-select'onchange="selectsubject(this.value)" id='Class' name='Class' >

             `+cla+`

                       </select>

          </div>
          </div>
          <div class='col-md-3'>
           <div class='form-group m-md-2'>
             <label for=''>Subject </label>
             <select required class='form-select' id='Subject'  onchange="selectth(this.value)" name='Subject' >
             <option value='' disabled selected>Select Subject</option>

                       </select>

          </div>
          </div>
          <div class='col-md-3'>
           <div class='form-group m-md-2'>
             <label for=''>TH/PR </label>
             <select required class='form-select' onchange='setbatch()'id='THPR' name='TH/PR' >

              `+th+`

                       </select>

          </div>
          </div>
            </div>
              <div class='row' >
              <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Batch1 </label>
             <select required class='form-select' id='Batch1' name='Batch1' >
                  `+batch1+`

                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Batch2 </label>
             <select required class='form-select' id='Batch2' name='Batch2' >

             `+batch2+`
                       </select>

          </div>
          </div>
          <div class='col-md-4'>
           <div class='form-group m-md-2'>
             <label for=''>Batch3 </label>
             <select required class='form-select' id='Batch3' name='Batch3' >
             `+batch3+`

                       </select>

          </div>
          </div>

            </div>

            <div class='row'>
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

var addsubbtn=document.querySelector("#addsubbtn");
addsubbtn.disabled = true;
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
   
     xhttp.open('GET','./php/preeditsubject.php?Scheme='+Scheme+'&Schemes=1',true);
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

     xhttp1.open('GET','./php/preeditsubject.php?Scheme='+Scheme+'&Class='+Class+'&Subject='+Subject+'&Sub=1',true);
     xhttp1.send();
     xhttp1.onreadystatechange=function()
     {
       if(xhttp1.readyState==4 && xhttp1.status==200)
       {

        var Subject=document.querySelector('#Subject')

  Subject.innerHTML=xhttp1.responseText;


       }
     }
     if(TH=="TH & PR"||TH=="TH & TU")
 {
   TH=TH.replace(" & ","+%26+");
 }

     const xhttp2= new XMLHttpRequest();

xhttp2.open('GET','./php/preeditsubject.php?Scheme='+Scheme+'&Class='+Class+'&Subject='+Subject+'&THPR='+TH+'&th=1',true);
xhttp2.send();
xhttp2.onreadystatechange=function()
{
  if(xhttp2.readyState==4 && xhttp2.status==200)
  {

   var THPR=document.querySelector('#THPR')

   THPR.innerHTML=xhttp2.responseText;


  }
}
     if (TH=="TH")
    {
      var Batch1 = document.querySelector("#Batch1").disabled= true;
   var Batch2 = document.querySelector("#Batch2").disabled= true;
   var Batch3 = document.querySelector("#Batch3").disabled= true;


    }


  }

function Update(){
  var f=document.getElementById('form2');
  

    if(f.reportValidity())
    {
    var btn= document.querySelector(".Clickedbutton");

    var id=btn.id;


    var nid=id.replace("btn1","");

    var Scheme1 = document.querySelector('#'+nid+"s1").textContent;

    var Class1 = document.querySelector('#'+nid+"s2").textContent;

    var Subject1 = document.querySelector('#'+nid+"s3").textContent;

    var TH1 = document.querySelector('#'+nid+"s4").textContent;

   var Scheme = document.querySelector("#Scheme").value;
   var Class = document.querySelector("#Class").value;
   var Subject = document.querySelector("#Subject").value;
   var THPR = document.querySelector("#THPR").value;
   var Batch1 = document.querySelector("#Batch1").value;
   var Batch2 = document.querySelector("#Batch2").value;
   var Batch3 = document.querySelector("#Batch3").value;
   if(THPR=="TH & PR"||THPR=="TH & TU")
 {
   THPR=THPR.replace(" & ","+%26+");
 }
 if(TH1=="TH & PR"||TH1=="TH & TU")
 {
   TH1=TH1.replace(" & ","+%26+");
 }


   window.location.href = "./php/facultysubjectdetails.php?Scheme="+Scheme+"&Class="+Class+"&Subject="+Subject+"&THPR="+THPR+"&Batch1="+Batch1+"&Batch2="+Batch2+"&Batch3="+Batch3+"&Scheme1="+Scheme1+"&Class1="+Class1+"&Subject1="+Subject1+"&TH1="+TH1+"&Up=1";
    }

}
</script>
