<?php

// $Faculty_id=$_SESSION["Faculty_id"];

// $q0="SELECT DISTINCT Scheme  FROM assign_subjects where Faculty_id ='$Faculty_id' ";



// $result=$con->query($q0);



if(!isset($_SESSION["Username"]))

{

    header('location:../../Admin Login/login.php');

}





?>



<script>

function addsub(){

    const a= `

  



              <div class="row mb-4">

                <div class="col m-md-2 ">

                  <div class="form-group">

                    <label for="">Subject</label>

                    <input type= "text"  name="Subject" required="required" class="form-control">

                  </div>

                </div>

                <div class="col-md-4">

           <div class="form-group m-md-2">

             <label for="">Semester </label>

             <select required class="form-select" id="Semester" name="Semester" >

             <option value="" disabled selected>Select Semester</option>

                        <option value="1">1</option>

                        <option value="2">2</option>

                        <option value="3">3</option>

                        <option value="4">4</option>

                        <option value="5">5</option>

                        <option value="6">6</option>

                

                       </select>

          

          </div>

          </div> 

  

          <div class="col-md-4">

           <div class="form-group m-md-2">

             <label for="">TH/PR </label>

             <select required class="form-select" id="TH/PR" name="TH/PR" >

             <option value="" disabled selected>Select TH/PR</option>

                        <option value="TH">TH</option>

                        <option value="PR">PR</option>

                        <option value="TU">TU</option>

                        <option value="TH & PR">TH & PR</option>

                        <option value="TH & TU">TH & TU</option>

                        

                

                       </select>

           

          </div>

          

          </div>    

          

            <div class='row'>

            <div class='col-8 ms-auto d-flex justify-content-end' >

<input type='submit'  class='btn btn-warning m-1 btn-sm'name="addsub" value='submit'>

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

var addtimetablebtn=document.querySelector("#addsubbtn");

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

function removesub()

{



var content= document.querySelector('.content');

content.parentElement.removeChild(content);

var addtimetablebtn=document.querySelector("#addsubbtn");

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









function selectsubject(value)

{

  var a= document.querySelector('#Scheme');

   var Scheme=a.value;



   if(Scheme!="")

   {



     const xhttp= new XMLHttpRequest();

     xhttp.open('GET','./php/selectsubject.php?Scheme='+Scheme+'&Class='+value,true);

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



   function setclass()

   {

    var a= document.querySelector('#Scheme');

   var Scheme=a.value;

     if(Scheme!="")

     {





     const xhttp= new XMLHttpRequest();



     xhttp.open('GET','./php/select.php?Scheme='+Scheme+'&selectclass=1',true);

     xhttp.send();

     xhttp.onreadystatechange=function()

     {

       if(xhttp.readyState==4 && xhttp.status==200)

       {

         var Class=document.querySelector('#Class')



         Class.innerHTML=xhttp.responseText;



       }

     }



     }



   }



  function setsubject(c)

  {

    var Scheme=document.querySelector('#Scheme').value;



    const xhttp= new XMLHttpRequest();



  xhttp.open('GET','./php/select.php?Scheme='+Scheme+'&Class='+c+'&selectsubject=1',true);

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

  function setsem(s)

  {

    var Scheme=document.querySelector('#Scheme').value;





    const xhttp= new XMLHttpRequest();



  xhttp.open('GET','./php/select.php?Scheme='+Scheme+'&Subject='+s+'&selectsem=1',true);

  xhttp.send();

  xhttp.onreadystatechange=function()

  {

    if(xhttp.readyState==4 && xhttp.status==200)

    {

      var Sem=document.querySelector('#Sem')



      Sem.innerHTML=xhttp.responseText;



    }

  }



  }

  function setthpr()

  {

    var Scheme=document.querySelector('#Scheme').value;

    var Class=document.querySelector('#Class').value;

    var Subject=document.querySelector('#Subject').value;



    const xhttp= new XMLHttpRequest();



  xhttp.open('GET','./php/select.php?Scheme='+Scheme+'&Subject='+Subject+'&Class='+Class+'&selectthpr=1',true);

  xhttp.send();

  

  xhttp.onreadystatechange=function()

  {

    if(xhttp.readyState==4 && xhttp.status==200)

    {

      var THPR=document.querySelector('#THPR')



      THPR.innerHTML=xhttp.responseText;



    }

  }





  }

   function setbatch(a)

   {

    var a= document.querySelector('#THPR');

   var TH=a.value;

   var Scheme= document.querySelector('#Scheme').value;

   var Class= document.querySelector('#Class').value;

   var Subject= document.querySelector('#Subject').value;



   if(TH=="TH")

   {

    var Batch1=document.querySelector("#Batch");

Batch1.disabled = true;



   }

   if(TH=="PR")

   {

    var Batch1=document.querySelector("#Batch");

Batch1.disabled = false;



const xhttp= new XMLHttpRequest();



  xhttp.open('GET','./php/select.php?Scheme='+Scheme+'&Subject='+Subject+'&Class='+Class+'&selectbatch=1',true);

  xhttp.send();

  xhttp.onreadystatechange=function()

  {

    if(xhttp.readyState==4 && xhttp.status==200)

    {

      var Batch=document.querySelector('#Batch');



      Batch.innerHTML=xhttp.responseText;



    }



   }

   }



   }

  function delsub(a)

  {

    var id=a.id;



    var nid=id.replace("btn2","");



 





var Subject = document.querySelector('#'+nid+"s2").textContent;



var Scheme = document.querySelector('#'+nid+"s1").textContent;



var Semester = document.querySelector('#'+nid+"s3").textContent;

var THPR = document.querySelector('#'+nid+"s4").textContent;

if(THPR=="TH & PR"||THPR=="TH & TU")

 {

   THPR=THPR.replace(" & ","+%26+");

 }





    window.location.href = "./php/EditScheme.php?Scheme="+Scheme+"&Subject="+Subject+"&Semester="+Semester+"&THPR="+THPR+"&del=1";

  }



  function editsub(btn){

    var id=btn.id;

    btn.classList.add("Clickedbutton");



    var nid=id.replace("btn1","");



  



    var Subject = document.querySelector('#'+nid+"s2").textContent;



    var Sem = document.querySelector('#'+nid+"s3").textContent;



    var Theory = document.querySelector('#'+nid+"s4").textContent;







    var Th="       ";

    var cla="";

    var defaults=["1","2","3","4","5","6"];



  

    var defaultth=["TH","PR","TU","TH & PR","TH & TU"];





    // var defaultfrom=["9.30","10.30","11.30","12.30","1.50","2.50","4.0","5.0"];

    // var defaultto=["10.30","11.30","12.30","1.30","2.50","3.50","5.0","6.0"];



    // var day="         <option value='' disabled selected>Select Days</option>";

    // var fro="      <option value='' disabled selected>Select From</option>";

    // var to="              <option value='' disabled selected>Select To</option>";

    // var defaultb=["Y","N"]





    for(i=0;i<defaults.length;i++)

    {

      if(Sem==defaults[i])

      {

        var str="<option value='"+defaults[i]+"'selected>"+defaults[i]+"</option>";

        cla+=str;

      }

      else{

        var str="<option value='"+defaults[i]+"'>"+defaults[i]+"</option>";

        cla+=str;

      }



    }



    for(i=0;i<defaultth.length;i++)

    {

      if(Theory==defaultth[i])

      {

        var str="<option value='"+defaultth[i]+"'selected>"+defaultth[i]+"</option>";

        Th+=str;

      }

      else{

        var str="<option value='"+defaultth[i]+"'>"+defaultth[i]+"</option>";

        Th+=str;

      }



    }

 



    //   for(i=0;i<defaults.length;i++)

    // {

    //   if(Sem==defaults[i])

    //   {

    //     var str="<option value='"+defaults[i]+"'selected>"+defaults[i]+"</option>";

    //     cla+=str;

    //   }

    //   else{

    //     var str="<option value='"+defaults[i]+"'>"+defaults[i]+"</option>";

    //     cla+=str;

    //   }



    // }

    







    // for(i=0;i<defaultfrom.length;i++)

    // {

    //   if(From==defaultfrom[i])

    //   {

    //     var str="<option value='"+defaultfrom[i]+"'selected>"+defaultfrom[i]+"</option>";

    //     fro+=str;

    //   }

    //   else{

    //     var str="<option value='"+defaultfrom[i]+"'>"+defaultfrom[i]+"</option>";

    //     fro+=str;

    //   }



    // }



    // for(i=0;i<defaultto.length;i++)

    // {

    //   if(To==defaultto[i])

    //   {

    //     var str="<option value='"+defaultto[i]+"'selected>"+defaultto[i]+"</option>";

    //     to+=str;

    //   }

    //   else{

    //     var str="<option value='"+defaultto[i]+"'>"+defaultto[i]+"</option>";

    //     to+=str;

    //   }



    // }





    const a= `

   

    <div class="row mb-4">

                <div class="col m-md-2 ">

                  <div class="form-group">

                    <label for="">Subject</label>

                    <input type= "text" id="Subject" name="Subject" required="required" value=`+Subject+` class="form-control">

                  </div>

                </div>

                <div class="col-md-4">

           <div class="form-group m-md-2">

             <label for="">Semester </label>

             <select required class="form-select" id="Semester" name="Semester" >

             <option value="" disabled selected>Select Semester</option>

      `+cla+`

                       </select>

          

          </div>

          </div> 

  

          <div class="col-md-4">

           <div class="form-group m-md-2">

             <label for="">TH/PR </label>

             <select required class="form-select" id="THPR" name="TH/PR" >

             <option value="" disabled selected>Select TH/PR</option>

             `+Th+`

                       </select>

           

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





var addtimetablebtn=document.querySelector("#addsubbtn");

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

// const xhttp= new XMLHttpRequest();



//      xhttp.open('GET','./php/select.php?Scheme='+Scheme+'&Schemes=1',true);

//      xhttp.send();

//      xhttp.onreadystatechange=function()

//      {

//        if(xhttp.readyState==4 && xhttp.status==200)

//        {



//         var Scheme=document.querySelector('#Scheme')



//   Scheme.innerHTML=xhttp.responseText;





//        }

//      }



//      const xhttp1= new XMLHttpRequest();



//      xhttp1.open('GET','./php/select.php?Scheme='+Scheme+'&Class='+Class+'&class=1',true);

//      xhttp1.send();

//      xhttp1.onreadystatechange=function()

//      {

//        if(xhttp1.readyState==4 && xhttp1.status==200)

//        {



//         var Class=document.querySelector('#Class')



//   Class.innerHTML=xhttp1.responseText;





//        }

//      }

//      const xhttp2= new XMLHttpRequest();

//     console.log('./php/select.php?Scheme='+Scheme+'&Class='+Class+'&Subject='+Subject+'&subject=2');

//      xhttp2.open('GET','./php/select.php?Scheme='+Scheme+'&Class='+Class+'&Subject='+Subject+'&subject=2',true);

//      xhttp2.send();

//      xhttp2.onreadystatechange=function()

//      {

//        if(xhttp2.readyState==4 && xhttp2.status==200)

//        {



//         var Subject=document.querySelector('#Subject')



//   Subject.innerHTML=xhttp2.responseText;





//        }

//      }

//      const xhttp3= new XMLHttpRequest();



//      xhttp3.open('GET','./php/select.php?Scheme='+Scheme+'&Subject='+Subject+'&sem=2',true);

//      xhttp3.send();

//      xhttp3.onreadystatechange=function()

//      {

//        if(xhttp3.readyState==4 && xhttp3.status==200)

//        {



//         var Sem=document.querySelector('#Sem')



//   Sem.innerHTML=xhttp3.responseText;





//        }

//      }

//      const xhttp4= new XMLHttpRequest();



//      xhttp4.open('GET','./php/select.php?Scheme='+Scheme+'&Subject='+Subject+'&Class='+Class+'&TH='+TH+'&th=2',true);

//      xhttp4.send();

//      xhttp4.onreadystatechange=function()

//      {

//        if(xhttp4.readyState==4 && xhttp4.status==200)

//        {



//         var THPR=document.querySelector('#THPR')



//   THPR.innerHTML=xhttp4.responseText;





//        }

//      }

//      if(TH=="TH")

//    {

//     var Batch1=document.querySelector("#Batch");

// Batch1.disabled = true;



//    }

//    if(TH=="PR")

//    {

//     var Batch1=document.querySelector("#Batch");

// Batch1.disabled = false;

//      const xhttp5= new XMLHttpRequest();



//      xhttp5.open('GET','./php/select.php?Scheme='+Scheme+'&Subject='+Subject+'&Class='+Class+'&Batch='+Batch+'&batchs=2',true);

//      xhttp5.send();

//      xhttp5.onreadystatechange=function()

//      {

//        if(xhttp5.readyState==4 && xhttp5.status==200)

//        {



//         var Batch=document.querySelector('#Batch')



//   Batch.innerHTML=xhttp5.responseText;





//        }

//      }

//    }

// document.querySelector('#rnln').value=Roomno;













  }



function Update(){

    var btn= document.querySelector(".Clickedbutton");



    var id=btn.id;

   

    var nid=id.replace("btn1","");



    

    var Subject = document.querySelector('#'+nid+"s2").textContent;



    var Scheme = document.querySelector('#'+nid+"s1").textContent;



var Semester = document.querySelector('#'+nid+"s3").textContent;

var THPR = document.querySelector('#'+nid+"s4").textContent;









    var Subject1 = document.querySelector('#Subject').value;



var Semester1= document.querySelector('#Semester').value;

var THPR1= document.querySelector('#THPR').value;



 if(THPR=="TH & PR"||THPR=="TH & TU")

 {

   THPR=THPR.replace(" & ","+%26+");

 }

 if(THPR1=="TH & PR"||THPR1=="TH & TU")

 {

   THPR1=THPR1.replace(" & ","+%26+");

 }



   window.location.href = "./php/EditScheme.php?Scheme="+Scheme+"&Subject="+Subject+"&Semester="+Semester+"&THPR="+THPR+"&Subject1="+Subject1+"&Semester1="+Semester1+"&THPR1="+THPR1+"&Up=1";





}



</script>

