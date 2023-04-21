<?php
session_start();

if(!isset($_SESSION["Faculty_id"]))
{
 
       
    echo "<script>window.location.href='../../Faculty Login/index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link href="../assets/css/style.css" rel="stylesheet" />
  <title>
   Application Form
  </title>
  <link href="../assets/css/style.css" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/1c81a4db48.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
     <link rel="stylesheet" href="../assets/scss/material-dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script> 

  





    </script> 

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark ps bg-white" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <span class="navbar-brand " >
      
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center " id="bname">
          <i class="fa-solid fa-circle-user m-2"></i>
          <span class="ms-1 font-weight-bold text-white">Faculty</span>
        </div>
        
      </span>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
      
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Faculty</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary " href="../pages/Application Form.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Application Form</span>
          </a>
        </li>
      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Application Form</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Application Form</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
           
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="./php/logout.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa-solid fa-right-from-bracket"></i>
                
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
            
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Application Form</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                <form action="php/Application Form.php"  class="needs-validation" name="app_form" novalidate id="application_form"  method="POST">
                <div class="row">
                  <div class="col-lg-4">
                <div class="form-group m-md-3">
                  <label for="">Fist Name </label>
                  <input type="text" name="First_name"   class="form-control" id="First_name">
                  <div  class="invalid-feedback">
                    Please enter a correct first name.
                  </div>
                </div>
     
              </div>
              
              <div class="col-lg-4">
                <div class="form-group m-md-3">
                  <label for="">Middle Name</label>
                  <input type="text" name="Middle_name"   class="form-control" id="Middle_name">
                  <div  class="invalid-feedback">
                    Please enter a correct Middle name.
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group m-md-3">
                  <label for="">Last Name </label>
                  <input type="text" name= "Last_name"  class="form-control"id="Last_name">
                  <div  class="invalid-feedback">
                    Please enter correct Last name
                  </div>
                </div>
              </div>
              </div>
                
              <div class="row m-md-1">
                <div class="col-md-6 mb-md-3">
                  <div class="form-group">
                    <label for="">phone No</label>
                    <input type="text"  name="Phone_no"  class="form-control " id="Phone_no">
                    <div  class="invalid-feedback">
                    please Enter Correct Mobile No
                  </div>
                  </div>
                </div>
                <div class="col-md-6 mb-md-3">
                  <div class="form-group">
                    <label for="">Gender</label>
                     
                     <div class="form-check ">
                      <input class="form-check-input" type="radio" name="Gender" id="Radio1" value="Male">
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    
                    </div>
                    <div class="form-check ">
                      <input class="form-check-input" type="radio" name="Gender" id="Radio2" value="Female">
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                      <div  class="invalid-feedback ">
                       Please select gender
                      </div>
                
                 
                   </div>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-12 ">
                <label for="">Address</label>
                </div>
              </div>
              <div class="row ">
           
                <div class="col-md-6">
                <div class="form-group m-md-3">
                  <label for="">House No </label>
                  <input type="text" name= "House_no" id="House_no" required class="form-control">
                  <div  class="invalid-feedback">
                       Please Enter a House no.
                      </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group m-md-3">
                  <label for=""> Area/lane/street </label>
                  <input type="text" name= "Area"  id="Area"required class="form-control">
                  <div  class="invalid-feedback">
                       Please Enter Area/lane/street.
                      </div>
                </div>          
                  </div>

              </div>
              <div class="row ">
           
           <div class="col-md-6">
           <div class="form-group m-md-3">
             <label for="">Landmark </label>
             <input type="text" name= "Landmark" id="Landmark" required class="form-control">
             <div  class="invalid-feedback">
                       Please Enter a Landmark.
                      </div>
           </div>
           </div>
           <div class="col-md-6">
           <div class="form-group m-md-3">
             <label for=""> City </label>
             <input type="text" name= "City" id="City"  required class="form-control">
             <div  class="invalid-feedback">
                       Please Enter a city.
                      </div>
           </div>          
             </div>

         </div>
         <div class="row ">
         <div class="col-md-6">
           <div class="form-group m-md-3">
             <label for="inputState">State </label>
             <select class="form-select" id="State" name="State" onchange="changeList(this);">
             <option value="SelectState"disabled selected>Select State</option>
                        <option value="Andra Pradesh">Andra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madya Pradesh">Madya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                        <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadeep">Lakshadeep</option>
                        <option value="Pondicherry">Pondicherry</option>
               
            </select>
            <div  class="invalid-feedback">
                       Please Select State.
                      </div>
            </div>
           </div>

           <div class="col-md-6">
           <div class="form-group m-md-3">
             <label for="inputDistrict">District </label>
             <select class="form-select" id="District" name="District" aria-label="Default select example">
              <option value=""selected Disabled >Select State first</option>
           
            </select>
            <div  class="invalid-feedback">
                       Please Select District.
                      </div>
           </div>
           </div>
         
         </div>
      


         <div class="row ">
         <div class="col-md-6">
           <div class="form-group m-md-3">
             <label for=""> pincode </label>
             <input type="text" name= "Pincode" id="Pincode" class="form-control">
             <div  class="invalid-feedback">
                      Please Enter Correct pincode.
                      </div>
           </div>          
             </div>

         </div>
         <div class="row">
                <div class="col-12 ">
                <label for="">Qualifications</label>
                </div>
</div>
                <div class="row ">
         <div class="col-md-4">
           <div class="form-group m-md-4">
             <label for="inputState">Course </label>
             <select class="form-select" id="Course" onchange="displayOther()" name="Course" >
             <option value="SelectCourse"disabled selected>Select Course</option>
                        <option value="B.E./B.Tech.">B.E./B.Tech.</option>
                        <option value="M.E/M.Tech">M.E/M.Tech</option>
                        <option value="PhD">PhD</option>
                        <option value="other">other</option>

            </select>
            <div  class="invalid-feedback">
                       Please Select Course.
                      </div>
                      
            </div>

            
           </div>
           <div class="col-md-4">
           <div class="form-group m-md-4">
         
                  <label for=""> Branch </label>
                  <input type="text" name= "Branch" id="Branch"  class="form-control">
                  <div  class="invalid-feedback">
                       Please Enter Branch
                      </div>
               
           </div>
          </div>
          <div class="col-md-4">
           <div class="form-group m-md-4">
             <label for="inputState">Grade </label>
             <select class="form-select" id="Grade" name="Grade" >
             <option value="SelectGrade"disabled selected>Select Grade</option>
                        <option value="First class with Distinction">First class with Distinction</option>
                        <option value="First class">First class</option>
                        <option value="Second Class">Second Class</option>
                        

            </select>
            <div  class="invalid-feedback">
                       Please Select Grade
                      </div>
          </div>
          </div>    
</div>
           <div class="row" id="Otherdiv">
           <div class="col-md-5">
           <div class="form-group m-md-4">
         
                  <label for=""> Other</label>
                  <input type="text" name= "Other" id="Other"  class="form-control">
                  <div  class="invalid-feedback">
                       Please enter your Qualifications
                      </div>
               
           </div>
           </div>
</div>
    
           <div class="row">
         <div class="col-md-6">
           <div class="form-group m-md-3">
         
                  <label for=""> Pan No </label>
                  <input type="text" name= "Pan_no" id="Pan_no"  class="form-control">
                  <div  class="invalid-feedback">
                       Please Enter correct Pan No.
                      </div>
               
           </div>
          </div>
           <div class="col-md-6">
           <div class="form-group m-md-3">
         
                  <label for=""> Aadhaar No (UID) </label>
                  <input type="text" name= "Aadhaar_no" id="Aadhaar_no" class="form-control">
                  <div  class="invalid-feedback">
                       Please Enter correct Aadhaar No.
                      </div>
               
           </div>
           </div>
          </div>
           
           <div class="row">
                <div class="col-12 ">
                <label for="">Bank Details</label>
                </div>
              </div>
              <div class="row ">
           
                <div class="col-md-6">
                <div class="form-group m-md-3">
                  <label for="">Bank Name </label>
                  <input type="text" name= "Bank_name" id="Bank_name" required class="form-control">
                  <div  class="invalid-feedback">
                       Please Enter Bank Name.
                      </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group m-md-3">
                  <label for=""> Bank Addres </label>
                  <input type="text" name= "Bank_address"  id="Bank_address"required class="form-control">
                  <div  class="invalid-feedback">
                       Please Enter Bank Address.
                      </div>
                </div>          
                  </div>

              </div>
              <div class="row ">
           
           <div class="col-md-6">
           <div class="form-group m-md-3">
             <label for="">Bank IFSC Code </label>
             <input type="text" name= "Ifsc_code" id="Ifsc_code" required class="form-control">
             <div  class="invalid-feedback">
                       Please Enter a correct IFSC Code.
                      </div>
           </div>
           </div>
           <div class="col-md-6">
           <div class="form-group m-md-3">
             <label for=""> Account No </label>
             <input type="text" name= "Account_no" id="Account_no"  required class="form-control">
             <div  class="invalid-feedback">
                       Please Enter correct Account Number.
                      </div>
           </div>          
             </div>

         </div>
         <div class="row ">
         <div class="col-md-6">
           <div class="form-group m-md-3">
             <label for="inputState">Account Type </label>
             <select class="form-select" id="Account_type" name="Account_type" >
             <option value="SelectAccountType"disabled selected>Select Account Type</option>
                        <option value="Saving Account">Saving Account</option>
                        <option value="Current Account">Current Account</option>
              
            </select>
            <div  class="invalid-feedback">
                       Please Select Account Type.
                      </div>
            </div>
           </div>

     
          
           <div class="col-md-6">
           <div class="form-group m-md-3">
             <label for=""> MICR Code. </label>
             <input type="text" name= "Micr_code" id="Micr_code" class="form-control">
             <div  class="invalid-feedback">
                      Please Enter Correct MICR Code.
                      </div>
           </div>          

             </div>
         </div>
    


         
              <div class="row justify-content-center">
                  <div class="col d-flex justify-content-center ">
             
               <input type="submit" name="submit"  class="btn btn-success w-25" value="submit">   
     
                </div>
              </form>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
     
    </div>
  </main>
  
<?php
include('./php/alert.php');
?> 

 <script src="js/applicationvalidation.js"> </script> 
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>


 
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>
<script>
