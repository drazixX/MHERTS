<?php include './connection/conn.php' ?>
<?php
session_start();
	$user = $_SESSION['username'];
	$query = "SELECT * FROM tbl_users WHERE NOT username='$user' ORDER BY `created_at` DESC";
    $result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
	<!-- Title -->
	<title>Web-Based Maternal Health Record Tracking System</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Favicon icon -->
	
	<link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/favicon.png">	
	
    
    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet" type="text/css"/>	
    
    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>		

    <link class="main-css" href="https://eres.dexignzone.com/codeigniter/demo/public/assets/css/style.css" rel="stylesheet" type="text/css"/>	

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" type="text/css"/>	
    
    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/pickadate/themes/default.css" rel="stylesheet" type="text/css"/>	
    
    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/pickadate/themes/default.date.css" rel="stylesheet" type="text/css"/>	
       
           
       


    </head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
	
	<!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

		<!--**********************************
    Nav-Bar Start
***********************************-->	


<?php
include './template/header.php';
?>


<!--**********************************
    Nav-Bar End
***********************************-->		

<!--**********************************
    ChatBot Start
***********************************-->	


<?php
include './template/chatbot.php';
?>


<!--**********************************
    Chatbot End
***********************************-->      

<!--**********************************
	Header start
***********************************-->
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
					Add Patient Information					</div>
				</div>
				<?php
				include './template/header2.php';
				?>

			</div>
		</nav>
	</div>
</div>
<!--**********************************
	Header end 
***********************************-->       

<!--**********************************
	Sidebar Start
***********************************--> 

<?php
include './template/sidebar.php';
?>

<!--**********************************
	Sidebar End 
***********************************-->

<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">
		<div class="page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Patient</a></li>
			</ol>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-xl-12 col-xxl-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Patient Information</h4>
					</div>
					<div class="card-body">
                        <div class="tab-content">
                            <div class="form-validation">
                                <form  method="POST" action="./functions/submit_form.php" novalidate >
                                    <div class="row">
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label for="title" class="col-form-label" for="validationCustom01">Title  
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" id="title" for="validationCustom01" name="Title" required >
                                                    <option value ="" select disabled>Select Title</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                </select>
                                              
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom02">First Name  
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control"for="validationCustom02" name="FirstName" id="firstName" placeholder="First Name" required>
                                            </div>
                                           
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom03">Middle Name 
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="middleName" for="validationCustom03" name="MiddleName" placeholder="Middle Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom04">Last Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="LastName" for="validationCustom04" id="lastName" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom05">Date of Birth 
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="date" class="form-control" name="DateOfBirth" for="validationCustom05" id="dateOfBirth" required>
                                                <input type="hidden" class="form-control" name="Age" id="age" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom06">Gender
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" id="gender" name="Gender" for="validationCustom06" required>
                                                    <option value="" selected disabled>Select Gender</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom07">Civil Status
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" id="civilStatus" for="validationCustom07" name="CivilStatus" required>
                                                    <option value="" selected disabled>Select Status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Cohabitation">Cohabitation</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom08">Address
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input class="form-control" id="address" name="Address" for="validationCustom08" rows="3" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom09">Phone
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="phone" name="Phone" for="validationCustom09" placeholder="Phone Number" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom10">Educational Level
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="educlevel" for="validationCustom10" name="Educlevel" placeholder="Educational Level" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom11">Occupation
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="occupation" for="validationCustom11" name="Occupation" placeholder="Occupation" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom12">Religion
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="religion" for="validationCustom12" name="Religion" placeholder="Religion" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <!-- <label class="col-form-label">Date Check-in:</label> -->
                                                <input type="hidden" class="form-control" name="DateCheckIn" id="dateCheckIn">
                                            </div>
                                        </div>
                                        
                                        
                                        <label>------------------------------------------------------------------------------------------------------------------------------------------------------------</label>
                                        <br>
                                        <h4>Spouse Information</h4>
                                        <br>

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom13">Name of Husband
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="spouse" for="validationCustom13" name="Spouse" placeholder="Husband's Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom14">Age
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="age" name="spouse_Age" for="validationCustom14" placeholder="Age">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom15">Blood Type
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" id="bloodType2" for="validationCustom15" name="spouse_BloodType" required>
                                                    <option value="" selected disabled>Select Blood Type</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom16">Source of Income
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="src_income" name="SrcIncome" for="validationCustom16" placeholder="Source of Income" required>
                                            </div>
                                        </div>
                                

                                        <label>------------------------------------------------------------------------------------------------------------------------------------------------------------</label>
                                        <br>
                                        <h4>Pregnancy Information</h4>
                                        <br>
                                

                                            <div class="col-lg-3 mb-2">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom017">Obstetrical History
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="basic-form">
                                                        <div class="mb-3 mb-0" for="validationCustom17">
                                                            <div class="form-check d-inline-block">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                                                <label class="form-check-label" for="flexRadioDefault4">
                                                                G
                                                            </label>
                                                            </div>
                                                            <div class="form-check d-inline-block mx-2">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                                                                <label class="form-check-label" for="flexRadioDefault5">
                                                                P (
                                                                </label>
                                                            </div>
                                                            <div class="form-check d-inline-block">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
                                                                <label class="form-check-label" for="flexRadioDefault6">
                                                                F
                                                                </label>
                                                            </div>
                                                            <div class="form-check d-inline-block">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault7">
                                                                <label class="form-check-label" for="flexRadioDefault7">
                                                                P
                                                                </label>
                                                            </div>
                                                            <div class="form-check d-inline-block">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault8">
                                                                <label class="form-check-label" for="flexRadioDefault8">
                                                                A
                                                                </label>
                                                            </div>
                                                            <div class="form-check d-inline-block">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault9">
                                                                <label class="form-check-label" for="flexRadioDefault9">
                                                                L )
                                                                </label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 mb-2">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom18">No. of Pregnancy
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="pregno" for="validationCustom18" name="PregNo" required>
                                                </div>
                                            </div>
                                    
                                            <div class="col-lg-3 mb-2">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom19">LMP (Last Menstrual Period)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="date" class="form-control" for="validationCustom19" id="lmp"  name="lmp" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom20">EDC (Estimated Date of Confinement)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="date" class="form-control"  for="validationCustom20" id="edc"  name="edc" required>
                                                </div>
                                            </div>


                                            <br>
                                            <h4>Vital Signs</h4>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="bp">BP <span class="text-danger">*</span></label>
                                                        <input 
                                                            type="text" 
                                                            class="form-control form-control-sm" 
                                                            id="bp" 
                                                            name="BP" 
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="pr">PR <span class="text-danger">*</span></label>
                                                        <input 
                                                            type="text" 
                                                            class="form-control form-control-sm" 
                                                            id="pr" 
                                                            name="PR" 
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="rr">RR <span class="text-danger">*</span></label>
                                                        <input 
                                                            type="text" 
                                                            class="form-control form-control-sm" 
                                                            id="rr" 
                                                            name="RR" 
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="fh">FH <span class="text-danger">*</span></label>
                                                        <input 
                                                            type="text" 
                                                            class="form-control form-control-sm" 
                                                            id="fh" 
                                                            name="FH" 
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="fht">FHT <span class="text-danger">*</span></label>
                                                        <input 
                                                            type="text" 
                                                            class="form-control form-control-sm" 
                                                            id="fht" 
                                                            name="FHT" 
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="aog">AOG <span class="text-danger">*</span></label>
                                                        <input 
                                                            type="text" 
                                                            class="form-control form-control-sm" 
                                                            id="aog" 
                                                            name="AOG" 
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="col-form-label"  for="validationCustom21">EDD (Estimated Date of Delivery)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="date" class="form-control"  for="validationCustom21" id="edd"  name="edd" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom22">Blood Type
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" id="bloodType1" name="BloodType1"  for="validationCustom22" required>
                                                    <option value="" selected disabled>Select Blood Type</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="validationCustom23">Phil Health No.
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="philHno" name="PhilHNo"  for="validationCustom23" placeholder="#######-####-#####-#">
                                            </div>
                                        </div>
                                 
                                        <label>------------------------------------------------------------------------------------------------------------------------------------------------------------</label>
                                        <br>
                                        <h4>Medical History</h4>
                                        <br>

                                        <div class="row align-items-center">
                                            <div class="col-lg-12 mb-2">
                                                <div class="form-group">
                                                    <label for="hasMedicalHistory" class="col-form-label" for="validationCustom24">Do you have any medical history?
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select class="form-control" id="hasMedicalHistory"  for="validationCustom24" name="MedicalHistory" onchange="toggleMedicalHistoryFields()" required>
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="no">No</option>
                                                        <option value="yes">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="medicalHistoryFields" style="display: none;">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom14">Condition
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="conditions" name="conditions" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom14">Diagnosis Date
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="date" class="form-control" id="diagnosisDate" name="diagnosisDate" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom14">Treatment
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="treatment" name="treatment" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom14">Medications
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="medications" name="medications" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom14">Surgeries
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="surgeries" name="surgeries" required>
                                                </div>
                                            </div>
                                        </div>
                    
                        

                                        <label>------------------------------------------------------------------------------------------------------------------------------------------------------------</label>
                                        <br>
                                        <h4>Specified Doctor</h4>
                                        <br>

                                    
                                        <div class="row emial-setup">
                                            <div class="col-lg-12 mb-2 ">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="validationCustom25">Assigned Doctor 
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="hidden" class="form-control" id="status" name="Status" value="New Patient" required>
                                                    <select class="form-control" name="DoctorAssigned" id="doctorAssigned"  for="validationCustom25" required>
                                                        <option value="" disabled selected>Select Doctor</option>
                                                        <?php
                                                        include "connection/conn.php";

                                                        $sql = "SELECT * FROM doctors WHERE Specialization = 'Obstetrician/Gynecologist'";

                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $doctorFullName = $row['Title'] . " " . $row['FirstName'] . " " . $row['LastName'] ." ";
                                                                echo "<option>" . $doctorFullName . "</option>";
                                                            }
                                                        } else {
                                                            echo "<option value=''>No doctors available</option>";
                                                        }

                                                        $conn->close();
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                
                                    </div>
                                  
                                    <div class="mb-3 row">
                                        <div class="col-lg-3 ms-auto">
                                            <button type="submit" class="btn btn-primary">Save Patients Information</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--**********************************
	Content body end
***********************************-->
        <!--**********************************
    Footer start
***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2023</p>
    </div>
</div>
<!--**********************************
    Footer end
***********************************-->        
		
	</div>
    <script> var base_url = 'https://eres.dexignzone.com/codeigniter/demo/';</script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/jquery-steps/build/jquery.steps.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/plugins-init/jquery.validate-init.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
         
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/moment/moment.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/pickadate/picker.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/pickadate/picker.date.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/plugins-init/material-date-picker-init.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/plugins-init/pickadate-init.js"></script>

    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script>

            <script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form){
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
		

    <!--**********************************
        Main wrapper end
    ***********************************-->
<script src="public/assets/js/script.js"></script>
    
</body>
</html>