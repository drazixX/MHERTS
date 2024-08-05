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
	<!-- <meta name="author" content="DexignZone"> -->
	<meta name="robots" content="">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Favicon icon -->
	
	<link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="public/assets/images/favicon.png">	
	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>	
			
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>		
	
    <link class="main-css" href="public/assets/css/style.css" rel="stylesheet" type="text/css"/>	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
					Patients					</div>
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
	<!-- row -->
	<div class="container-fluid">
		<div class="page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Patients</a></li>
			</ol>
		</div>

		<!-- Alert Container -->
		<div id="alertContainer" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11"></div>

		<div class="form-head d-flex mb-3 mb-md-4 align-items-center">
			<div class="ms-auto">
				<!-- <a href="javascript:void(0);" class="btn btn-primary btn-rounded add-patient" data-bs-toggle="modal" data-bs-target="#patientModal">+ Add New Patients</a> -->
				<a href="form_createp.php" class="btn btn-primary btn-rounded add-patient">+ Add New Patients</a>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example5" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
								<thead>
									<tr>
										<th>
											<div class="checkbox text-end align-self-center">
												<div class="form-check custom-checkbox ">
													<input type="checkbox" class="form-check-input" id="checkAll" ="">
													<label class="form-check-label" for="checkAll"></label>
												</div>
											</div>
										</th>
										<th>Family Record ID</th>
										<th>Date Check In</th>
										<th>Patient Name</th>
										<th>Assigned Doctor</th>
										<!-- <th>Marital Status</th> -->
										<th>Status</th>
										<th>Address</th>
										<th></th>
									</tr>
								</thead>
								<tbody>

									<?php
									include_once './connection/conn.php';

									// Query to fetch patient data
									$sql = "SELECT pm.*, ps.status
									FROM patients_mother pm
									LEFT JOIN patient_status ps ON pm.FamilyRec_Id = ps.FamilyRec_Id;
									";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										// Output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<tr>";
											echo "<td> <div class='checkbox text-end align-self-center'>
												<div class='form-check custom-checkbox '>
													<input type='checkbox' class='form-check-input' id='customCheckBox1' =''>
													<label class='form-check-label' for='customCheckBox1'></label>
												</div>
											</div>
											</td>"; // Checkbox column
											echo "<td>" . $row['FormattedFR_ID'] . "</td>";
											echo "<td>" . $row['Date_CheckIn'] . "</td>";
											echo '<td>' . $row['First_Name'] . ' ' . $row['Last_Name'] . ', ' . $row['Middle_Name'] . '</td>';
											echo "<td>" . $row['Doc_Assigned'] . "</td>";
											// echo "<td>" . $row['Civil_Status'] . "</td>";
											echo "<td>" . getStatusBadge($row['status']) . "</td>";
											echo "<td>" . $row['Address'] . "</td>";
											echo "<td class='text-end'>";
											echo "<a href='patient_details.php?FamilyRec_Id=" . $row['FamilyRec_Id'] . "' class='me-3'>
														<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
															<path d='M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z' stroke='#3E4954' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
														</svg>
													</a>";
													echo "<a href='javascript:void(0);' type='button'  onclick='showArchiveConfirmation(" . $row['FamilyRec_Id'] . ")'>
														<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
															<path d='M3 6H5H21' stroke='#F46B68' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
															<path d='M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z' stroke='#F46B68' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
														</svg>
													</a>";
												// 	echo "<a href='javascript:void(0);' type='button' onclick='showDeleteConfirmation(" . $row['FamilyRec_Id'] . ")'>
												// 	<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
												// 		<path d='M3 6H5H21' stroke='#F46B68' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
												// 		<path d='M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z' stroke='#F46B68' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
												// 	</svg>
												// </a>";
												
												// JavaScript function to show modal with confirmation message
												// echo "<script>
												// 	function showDeleteConfirmation(familyrec_id) {
												// 		var modal = new bootstrap.Modal(document.getElementById('basicModal'));
												// 		modal.show();
												
												// 		// Set the familyrec_id value in the modal's hidden input field
												// 		document.getElementById('familyrec_idInput').value = familyrec_id;
												// 	}
												// </script>";	
												
												echo "<script>
													function showArchiveConfirmation(familyrec_id) {
														var modal = new bootstrap.Modal(document.getElementById('basicModal1'));
														modal.show();
												
														// Set the familyrec_id value in the modal's hidden input field
														document.getElementById('familyrec_idInput').value = familyrec_id;
													}
												</script>";	
																							
											echo "</td>";
											echo "</tr>";
										}
									} else {
										echo "0 results";
									}
									$conn->close();

									function getStatusBadge($status) {
										// Define the statuses and their corresponding colors
										$statuses = array(
											"New Patient" => "#FFB800",         // Yellow
											"Recovered" => "#00A86B",          // Green
											"On Labor" => "#FF5733",            // Orange
											"First Prenatal" => "#5E33FF",      // Purple
											"Second Prenatal" => "#FF5733",     // Orange
											"Third Prenatal" => "#3498DB"       // Blue
										);
									
										// Check if the provided status exists in the array
										if (array_key_exists($status, $statuses)) {
											// Get the corresponding color
											$color = $statuses[$status];
											// Generate HTML for the status badge with dynamic color
											return '<span class="text-nowrap">
														<svg class="me-2" width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
															<circle cx="4.5" cy="4.5" r="4.5" fill="' . $color . '"/>
														</svg>
														<span style="color:' . $color . '">' . $status . '</span>
													</span>';
										} else {
											// If status is not found, return an empty cell
											return '';
										}
									}
									
									
									
									?>

									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Patient Modal -->
	<div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="patientModalLabel">Add New Patient</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="add_patient.php" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xl-12">
								<div class="form-group">
									<label for="title" class="col-form-label">Title:</label>
									<select class="form-control" id="title" name="Title" required >
										<option value ="" select disabled>Select Title</option>
										<option value="Miss">Miss</option>
										<option value="Mrs.">Mrs.</option>
									</select>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">First Name:</label>
									<input type="text" class="form-control" name="FirstName" id="firstName" placeholder="First Name" required>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Middle Name:</label>
									<input type="text" class="form-control" id="middleName" name="MiddleName" placeholder="Middle Name" required>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="form-group">
									<label class="col-form-label">Last Name:</label>
									<input type="text" class="form-control" name="LastName" id="lastName" placeholder="Last Name" required>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Date of Birth:</label>
									<input type="date" class="form-control" name="DateOfBirth" id="dateOfBirth" required>
									<input type="hidden" class="form-control" name="Age" id="age" >
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Gender:</label>
									<select class="form-control" id="gender" name="Gender" required>
										<option value="" selected disabled>Select Gender</option>
										<option>Female</option>
									</select>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Civil Status:</label>
									<select class="form-control" id="civilStatus" name="CivilStatus" required>
										<option value="" selected disabled>Select Status</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Divorced">Divorced</option>
										<option value="Widowed">Widowed</option>
									</select>
								</div>
							</div>

							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Trimester:</label>
									<select class="form-control" id="trimester" name="Trimester" required>
										<option value="" selected disabled>Select Trimester</option>
										<option>First Trimester</option>
										<option>Second Trimester</option>
										<option>Third Trimester</option>
									</select>
								</div>
							</div>

							<div class="col-xl-12">
								<div class="form-group">
									<label class="col-form-label">Address:</label>
									<textarea class="form-control" id="address" name="Address" rows="3" required></textarea>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Phone:</label>
									<input type="text" class="form-control" id="phone" name="Phone" placeholder="Phone" required>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Email:</label>
									<input type="email" class="form-control" id="email" name="Email" placeholder="Email" required>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="form-group">
									<!-- <label class="col-form-label">Date Check-in:</label> -->
									<input type="hidden" class="form-control" name="DateCheckIn" id="dateCheckIn">
								</div>
								<!-- <div class="form-group">
									<label class="col-form-label">Assigned Doctor:</label>
									<input type="text" class="form-control" name="DoctorAssigned" id="doctorAssigned" required>
								</div> -->

								<div class="form-group">
									<label class="col-form-label">Assigned Doctor:</label>
									<select class="form-control" name="DoctorAssigned" id="doctorAssigned" required>
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
							<div class="col-xl-12">
								<div class="form-group">
									<label class="col-form-label">Obstetric History:</label>
									<textarea class="form-control" id="obstetricHistory" name="ObstetricHistory" rows="3" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="hasMedicalHistory" class="col-form-label">Do you have any medical history?</label>
								<select class="form-control" id="hasMedicalHistory" name="MedicalHistory" onchange="toggleMedicalHistoryFields()" required>
									<option value="no">No</option>
									<option value="yes">Yes</option>
								</select>
							</div>
						
							<!-- Medical history fields -->
							<div id="medicalHistoryFields" style="display: none;">
								<div class="form-group">
									<label class="col-form-label">Condition:</label>
									<input type="text" class="form-control" id="conditions" name="conditions" required>
								</div>
								<div class="form-group">
									<label class="col-form-label">Diagnosis Date:</label>
									<input type="date" class="form-control" id="diagnosisDate" name="diagnosisDate" required>
								</div>
								<div class="form-group">
									<label class="col-form-label">Treatment:</label>
									<input type="text" class="form-control" id="treatment" name="treatment" required>
								</div>
								<div class="form-group">
									<label class="col-form-label">Medications:</label>
									<input type="text" class="form-control" id="medications" name="medications" required>
								</div>
								<div class="form-group">
									<label class="col-form-label">Surgeries:</label>
									<input type="text" class="form-control" id="surgeries" name="surgeries" required>
								</div>
							</div>                     
						</div>
						<!-- </form> -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="submit">Save New Patient</button>
						<!-- <button type="button" class="btn btn-primary" onclick="addPatientInfo()" name="submit">Save New Patient</button> -->
					</div>
					</form>
			</div>
		</div>
	</div>

<!-- Archive Modal -->
<div class='modal fade' id='basicModal1'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>Confirm Deletion</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class='modal-body'>
                Are you sure you want to archive this patient?
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-danger light' data-bs-dismiss='modal'>Close</button>
                <form action='/admin/movearchive_patient.php' method='POST'>
                    <input type='hidden' name='familyrec_id' id='familyrec_idInput'>
                    <button type='submit' class='btn btn-primary'>Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function setFamilyRecId(familyRecId) {
        document.getElementById('familyrec_idInput').value = familyRecId;
    }
</script>




<!-- 
	
	<div class='modal fade' id='basicModal'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
				<div class='modal-header'>
					<h5 class='modal-title'>Confirm Deletion</h5>
					<button type='button' class='btn-close' data-bs-dismiss='modal'></button>
				</div>
				<div class='modal-body'>
					Are you sure you want to delete this patient?
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-danger light' data-bs-dismiss='modal'>Close</button>
					<form action='functions/remove_pregmom.php' method='GET'>
						<input type='hidden' name='familyrec_id' id='familyrec_idInput'>
						<button type='submit' class='btn btn-primary'>Delete</button>
					</form>
				</div>
			</div>
		</div>
	</div>
 -->



</div>
<!--**********************************
	Content body end
***********************************-->
        <!--**********************************
    Footer start
***********************************-->
<!-- <div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2023</p>
    </div>
</div> -->
<!--**********************************
    Footer end
***********************************-->        
		
	</div>
    <!-- <script> var base_url = 'https://eres.dexignzone.com/codeigniter/demo/';</script> -->
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/chart.js/chart.bundle.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/owl-carousel/owl.carousel.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script>
		<script>
	(function($){
		var table = $('#example5').DataTable({
			searching: true,
			paging:true,
			select: false,
			lengthChange:true
		});
		$('#example tbody').on('click', 'tr', function () {
			var data = table.row( this ).data();
		});
	})(jQuery);
</script>
<script src="public/assets/js/script.js"></script>


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>