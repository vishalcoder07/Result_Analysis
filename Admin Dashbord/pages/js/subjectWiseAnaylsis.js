function giveBatch() {
  var batch = document.getElementById("batch").value;
  var yearSelect = document.getElementById("year");
  
  // Remove existing options
  while (yearSelect.options.length > 1) {
    yearSelect.remove(1);
  }

  $batchSelected = batch;
}


function updateSubject() {
  var year = document.getElementById("year").value;
  var subjectSelect = document.getElementById("subject");
  
  // Remove existing options
  while (subjectSelect.options.length > 1) {
    subjectSelect.remove(1);
  }

  // Add new options based on selected state
  if (year == "first") {
    addOption(subjectSelect, "none", "subject are not set");
    
  } else if (year == "second") {
    addOption(subjectSelect, "210241", "DISCRETE MATHEMATICS");
    addOption(subjectSelect, "210242", "FUND. OF DATA STRUCTURES");
    addOption(subjectSelect, "210243", "OBJECT ORIENTED PROGRAMMING");
    addOption(subjectSelect, "210244", "COMPUTER GRAPHICS");
    addOption(subjectSelect, "210245", "DIGITAL ELEC. & LOGIC DESIGN");
    addOption(subjectSelect, "210246", "DATA STUCTURES LABORATORY");
    addOption(subjectSelect, "210247", "OOP & COMP. GRAPHICS LAB.");
    addOption(subjectSelect, "210248", "DIGITAL ELEC. LABORATORY ");
    addOption(subjectSelect, "210249", "BUSINESS COMMUNICATION SKILLS");
    addOption(subjectSelect, "210250", "HUMANITY & SOCIAL SCIENCE");
    addOption(subjectSelect, "210251B", "SOCIAL AWAR. & GOV. PROGRAM");
    addOption(subjectSelect, "207003", "ENGINEERING MATHEMATICS III ");
    addOption(subjectSelect, "207003*", "ENGINEERING MATHEMATICS III");
    addOption(subjectSelect, "210252", "DATA STRUCTURES & ALGO.");
    addOption(subjectSelect, "210253", "SOFTWARE ENGINEERING");
    addOption(subjectSelect, "210254", "MICROPROCESSOR");
    addOption(subjectSelect, "210255", "PRINCIPLES OF PROG. LANG. ");
    addOption(subjectSelect, "210256", "DATA STRUCTURES & ALGO. LAB.");
    addOption(subjectSelect, "210257", "MICROPROCESSOR LABORATORY");
    addOption(subjectSelect, "210258", "PROJECT BASED LEARNING II");
    addOption(subjectSelect, "210259", "CODE OF CONDUCT");
    addOption(subjectSelect, "210260D", "SR : YOGA AND MEDITATION");
  } else if (year == "third") {
    addOption(subjectSelect, "310241", "DATABASE MANAGEMENT SYSTEMS");
    addOption(subjectSelect, "310242", "THEORY OF COMPUTATION");
    addOption(subjectSelect, "310243", "SYS. PROG & OPERATING SYS.");
    addOption(subjectSelect, "310244", "COMPUTER NETWORKS AND SEC. ");
    addOption(subjectSelect, "310245A", "INT. OF THINGS & EBD. SYS");
    addOption(subjectSelect, "310249", "SEMINAR AND TECH. COMN.");
    addOption(subjectSelect, "310246", "DATABASE MGMT. SYS. LAB.");
    addOption(subjectSelect, "310248", "LABORATORY PRACTICE I");
    addOption(subjectSelect, "310247", " COMP. NET. AND SEC. LAB.");
    addOption(subjectSelect, "310250B", " PROF. ETH. & ETIQUETTES 3.");


    addOption(subjectSelect, "310251", "DATA SCI & BIG DATA ANA.");
    addOption(subjectSelect, "310252", "WEB TECHNOLOGY");
    addOption(subjectSelect, "310253", "ARTIFICIAL INTELLIGENCE");
    addOption(subjectSelect, "310254A", "INFORMATION SECURITY");
    addOption(subjectSelect, "310255", "INTERNSHIP");
    addOption(subjectSelect, "310251*", "DATA SCI & BIG DATA ANA.");
    addOption(subjectSelect, "310258", "LABORATORY PRACTICE-II");
    addOption(subjectSelect, "310252*", "WEB TECHNOLOGY");
    addOption(subjectSelect, "310259C", "LEAD. & PERSONALITY DEV.");
  }
  else if (year == "fourth") {
    addOption(subjectSelect, "none", "subject are not set");
  }
}

function addOption(select, value, text) {
  var option = document.createElement("option");
  option.text = text;
  option.value = value;
  select.add(option);
}
