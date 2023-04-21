var c= 2;
function addrow()
{  
   const a= ` 

   <div class='row mb-4'>
   <div class='col m-md-2 '>
     <div class='form-group'>
       <label for=''>Subject `+c+`</label>
       <input type='text'  name='Subject`+c+`' required='required' class='form-control'>
     </div>
   </div>
   <div class='col-md-4'>
<div class='form-group m-md-2'>
<label for=''>Semester </label>
<select  required class='form-select' id='Semester`+c+`' name='Semester`+c+`' >
<option  value=''disabled selected>Select Semester</option>
           <option value='1'>1</option>
           <option value='2'>2</option>
           <option value='3'>3</option>
           <option value='4'>4</option>
           <option value='5'>5</option>
           <option value='6'>6</option>
   
          </select>

</div>
</div> 

<div class='col-md-4'>
<div class='form-group m-md-2'>
<label for=''>TH/PR </label>
<select required class='form-select' id='TH/PR`+c+`' name='TH/PR`+c+`' >
<option  value=''disabled selected>Select TH/PR</option>
           <option value='TH'>TH</option>
           <option value='PR'>PR</option>
           <option value="TU">TU</option>
           <option value="TH & PR">TH & PR</option>
           <option value="TH & TU">TH & TU</option>
           
   
          </select>

</div>
</div>
</div>


   ` ;
  var d = document.querySelector("#newrow");
  var temp = document.createElement('div'); // create a temporary dom element
  temp.classList.add('Subject'+c);
  temp.innerHTML = a; // give it your html string as content, the browser will then create the corresponding dom representation
d.append(temp);

    c=c+1;
}
function delrow()
{ if(c>2){
  var s =".Subject"+(c-1);
   var d = document.querySelector(s);
   console.log(d);
  d.parentElement.removeChild(d);
   c=c-1;
}

}
