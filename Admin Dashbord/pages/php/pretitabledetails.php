<?php

$Faculty_id=$_SESSION["Faculty_id"];

$q0="SELECT DISTINCT Scheme  FROM assign_subjects where Faculty_id ='$Faculty_id' ";



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

              <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>Days </label>

             <select required class='form-select' onchange='setclass()' id='Days' name='Days' >

             <option value='' disabled selected>Select Days</option>

             <option value='Mon'>Mon</option>

             <option value='Tue'>Tue</option>

             <option value='wed'>wed</option>

             <option value='Thus'>Thus</option>

             <option value='Fri'>Fri</option>

             <option value='Sat'>Sat</option>

             <option value='Sun'>Sun</option>

                       </select>



          </div>

          </div>

          <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>From </label>

             <select required class='form-select'onchange="selectsubject(this.value)" id='From' name='From' >

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

             <select required class='form-select' id='Scheme' onchange='setclass()' name='Scheme' >

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

             <label for=''>class </label>

             <select required class='form-select' id='class' onchange='setsubject(this.value)'  name='Class' >

             <option value='' disabled selected>Select class</option>





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

             <select required class='form-select' onchange='setbatch(this.value)'; id='THPR' name='THPR' >

             <option value='' disabled selected>Select TH/PR</option>







                       </select>



          </div>

          </div>

          <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>Batch </label>

             <select required class='form-select' id='Batch' name='Batch' >

             <option value='' disabled selected>Select Batch</option>





                       </select>



          </div>

          </div>



            </div>

            <div class='row' >



          <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>Room No/Lab Name </label>

             <input type="text" name= "rnln" required="required" class="form-control">



          </div>

          </div>

          </div>

            <div class='row'>

            <div class='col-8 ms-auto d-flex justify-content-end' >

<input type='submit' onclick='Validate()' class='btn btn-warning m-1 btn-sm'name="addtimetablerow" value='submit'>

             <input type='button' onclick='remsub()' class='btn btn-danger m-1 btn-sm' id='cancle' value='cancle'>

            </div>

          </div>





   ` ;

  var d = document.querySelector("#addsub");

  var temp = document.createElement('div'); // create a temporary dom element



  temp.innerHTML = a; // give it your html string as content, the browser will then create the corresponding dom representation

d.append(temp);

temp.classList.add('content');



var addtimetablebtn=document.querySelector("#addtimetablebtn");

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

function remsub()

{



var content= document.querySelector('.content');

content.parentElement.removeChild(content);

var addtimetablebtn=document.querySelector("#addtimetablebtn");

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

var addtimetablebtn=document.querySelector("#addtimetablebtn");

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

   if(TH=="PR"||TH=="TU")

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

  function del(a)

  {

    var id=a.id;



    var nid=id.replace("btn2","");



    var Days = document.querySelector('#'+nid+"s1").textContent;

   



    var From = document.querySelector('#'+nid+"s2").textContent;

  





    window.location.href = "./php/facultytimetabledetails.php?Days="+Days+"&From="+From+"&del=1";

  }



  function editsub(btn){

    var id=btn.id;

    btn.classList.add("Clickedbutton");



    var nid=id.replace("btn1","");



    var Days = document.querySelector('#'+nid+"s1").textContent;



    var From = document.querySelector('#'+nid+"s2").textContent;



    var To = document.querySelector('#'+nid+"s3").textContent;



    var Scheme = document.querySelector('#'+nid+"s4").textContent;



    var Class = document.querySelector('#'+nid+"s5").textContent;



    var Sem = document.querySelector('#'+nid+"s6").textContent;



    var Subject=document.querySelector('#'+nid+"s7").textContent;



    var TH=document.querySelector('#'+nid+"s8").textContent;

    var Batch=document.querySelector('#'+nid+"s9").textContent;

    var Roomno=document.querySelector('#'+nid+"s10").textContent;



    var cla="<option value='' disabled selected>Select Semester</option>";

    var defaultd=["Mon","Tue","Wed","Thus","Fri","Sat","Sun"];

    var defaultfrom=["9.30","10.30","11.30","12.30","1.50","2.50","4.0","5.0"];

    var defaultto=["10.30","11.30","12.30","1.30","2.50","3.50","5.0","6.0"];



    var day="         <option value='' disabled selected>Select Days</option>";

    var fro="      <option value='' disabled selected>Select From</option>";

    var to="              <option value='' disabled selected>Select To</option>";

    var defaultb=["Y","N"]





    for(i=0;i<defaultd.length;i++)

    {

      if(Days==defaultd[i])

      {

        var str="<option value='"+defaultd[i]+"'selected>"+defaultd[i]+"</option>";

        day+=str;

      }

      else{

        var str="<option value='"+defaultd[i]+"'>"+defaultd[i]+"</option>";

        day+=str;

      }



    }







    for(i=0;i<defaultfrom.length;i++)

    {

      if(From==defaultfrom[i])

      {

        var str="<option value='"+defaultfrom[i]+"'selected>"+defaultfrom[i]+"</option>";

        fro+=str;

      }

      else{

        var str="<option value='"+defaultfrom[i]+"'>"+defaultfrom[i]+"</option>";

        fro+=str;

      }



    }



    for(i=0;i<defaultto.length;i++)

    {

      if(To==defaultto[i])

      {

        var str="<option value='"+defaultto[i]+"'selected>"+defaultto[i]+"</option>";

        to+=str;

      }

      else{

        var str="<option value='"+defaultto[i]+"'>"+defaultto[i]+"</option>";

        to+=str;

      }



    }





    const a= `

    <div class='row' >

              <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>Days </label>

             <select required class='form-select' onchange='setclass()' id='Days' name='Days' >



                           `+day+`

                       </select>



          </div>

          </div>

          <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>From </label>

             <select required class='form-select'onchange="selectsubject(this.value)" id='From' name='From' >

               `+fro+`



                       </select>



          </div>

          </div>

          <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>To </label>

             <select required class='form-select' id='To' name='To' >

              `+to+`

                       </select>



          </div>

          </div>



            </div>

              <div class='row' >

              <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>Scheme </label>

             <select required class='form-select' id='Scheme' onchange='setclass()' name='Scheme' >





                       </select>



          </div>

          </div>

          <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>class </label>

             <select required class='form-select' id='class' onchange='setsubject(this.value)'  name='Class' >

             <option value='' disabled selected>Select class</option>





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

             <select  class='form-select' onchange='setbatch(this.value)'; id='THPR' name='THPR'required >

             <option value='' disabled selected>Select TH/PR</option>







                       </select>



          </div>

          </div>

          <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>Batch </label>

             <select required class='form-select' id='Batch' name='Batch' >

             <option value='' disabled selected>Select Batch</option>





                       </select>



          </div>

          </div>



            </div>

            <div class='row' >



          <div class='col-md-4'>

           <div class='form-group m-md-2'>

             <label for=''>Room No/Lab Name </label>

             <input type="text" name= "rnln" id="rnln" required="required" class="form-control">



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





var addtimetablebtn=document.querySelector("#addtimetablebtn");

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



     xhttp.open('GET','./php/select.php?Scheme='+Scheme+'&Schemes=1',true);

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



     xhttp1.open('GET','./php/select.php?Scheme='+Scheme+'&Class='+Class+'&class=1',true);

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

   

     xhttp2.open('GET','./php/select.php?Scheme='+Scheme+'&Class='+Class+'&Subject='+Subject+'&subject=2',true);

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



     xhttp3.open('GET','./php/select.php?Scheme='+Scheme+'&Subject='+Subject+'&sem=2',true);

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



     xhttp4.open('GET','./php/select.php?Scheme='+Scheme+'&Subject='+Subject+'&Class='+Class+'&TH='+TH+'&th=2',true);

     xhttp4.send();

     xhttp4.onreadystatechange=function()

     {

       if(xhttp4.readyState==4 && xhttp4.status==200)

       {



        var THPR=document.querySelector('#THPR')



  THPR.innerHTML=xhttp4.responseText;





       }

     }

     if(TH=="TH")

   {

    var Batch1=document.querySelector("#Batch");

Batch1.disabled = true;



   }

   if(TH=="PR"||TH=="TU")

   {

    var Batch1=document.querySelector("#Batch");

Batch1.disabled = false;

     const xhttp5= new XMLHttpRequest();



     xhttp5.open('GET','./php/select.php?Scheme='+Scheme+'&Subject='+Subject+'&Class='+Class+'&Batch='+Batch+'&batchs=2',true);

     xhttp5.send();

     xhttp5.onreadystatechange=function()

     {

       if(xhttp5.readyState==4 && xhttp5.status==200)

       {



        var Batch=document.querySelector('#Batch')



  Batch.innerHTML=xhttp5.responseText;





       }

     }

   }

document.querySelector('#rnln').value=Roomno;













  }



function Update(){

 

  var f=document.getElementById('form1');

   if(f.reportValidity())

   {

    

    

    var From = document.querySelector("#From").value;

  var To = document.querySelector("#To").value;

  var THPR = document.querySelector("#THPR").value;

  if(THPR=='PR'||THPR=='TU')

  {

      var Hours=2; 

  }

  else{

    var Hours=1;

  }



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

 

  var dtime=To-From;

  if(dtime!=Hours && dtime!=Hours)

  {

    

     alert("You have selected invalid time or TH/PR field. please selcet valid Form and To field OR TH/PR field !");

    

  }

  else{



      var btn= document.querySelector(".Clickedbutton");



var id=btn.id;





var nid=id.replace("btn1","");

var Days1 = document.querySelector('#'+nid+"s1").textContent;



var From1 = document.querySelector('#'+nid+"s2").textContent;

var To1 = document.querySelector('#'+nid+"s3").textContent;









var Days = document.querySelector('#Days').value;



var From= document.querySelector('#From').value;











var To= document.querySelector('#To').value;



var Scheme = document.querySelector("#Scheme").value;

var Class = document.querySelector("#Class").value;

var Subject = document.querySelector("#Subject").value;

var THPR = document.querySelector("#THPR").value;

var Sem = document.querySelector("#Sem").value;

var Batch = document.querySelector("#Batch").value;

var rnln = document.querySelector("#rnln").value;

window.location.href = "./php/facultytimetabledetails.php?Scheme="+Scheme+"&Class="+Class+"&Subject="+Subject+"&THPR="+THPR+"&Batch="+Batch+"&rnln="+rnln+"&Days="+Days+"&From="+From+"&To="+To+"&Days1="+Days1+"&From1="+From1+"&To1="+To1+"&Sem="+Sem+"&Up=1";



 

   }







 

  }



}

function addnoti(){



  var a=`       <div class='row justify-content-center'>

                  <div class='col d-flex justify-content-center '>

             

               <input type='submit' name='mail' class='btn btn-success w-25' value='Send Mail'>   

     

                </div>

                </div>`;

                  var d = document.querySelector('#addnotify');

          

  var temp = document.createElement('div'); // create a temporary dom element

   temp.classList.add("content");

  temp.innerHTML = a; // give it your html string as content, the browser will then create the corresponding dom representation

d.append(temp);

}

function remnoti(){

  var content= document.querySelector('.content');

content.parentElement.removeChild(content);

}

function Validate()

{



   

  f=document.getElementById("form1");

  f.onsubmit=function(){

     var a=true;

    var From = document.querySelector("#From").value;

  var To = document.querySelector("#To").value;

  

  var THPR = document.querySelector("#THPR").value;

  if(THPR=='PR'||THPR=='TU')

  {

      var Hours=2; 

  }

  else{

    var Hours=1;

  }



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

