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
            <!-- <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div> -->
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
					Prenatal Records					</div>
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
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Prenatal Records</a></li>
			</ol>
		</div>

		<!-- Alert Container -->
		<div id="alertContainer" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11"></div>

		<div class="form-head d-flex mb-3 mb-md-4 align-items-center">
    <div class="ms-auto">
        <!-- Commented out original button -->
        <!-- <a href="javascript:void(0);" class="btn btn-primary btn-rounded add-patient" data-bs-toggle="modal" data-bs-target="#patientModal">+ Add New Patients</a> -->
        <a href="pretanalp_btn.php" class="btn btn-primary btn-rounded add-patient">+ Add Prenatal</a>
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
										<th>Patient Name</th>
										<th>Date Generated</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									<?php
									include_once './connection/conn.php';

									// Query to fetch patient data
									$sql = "SELECT * FROM prenatal;";
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
											echo "<td>" . $row['FamilyRec_Id'] . "</td>";
											echo "<td>" . $row['full_name'] .  "</td>";
                      echo "<td>" . $row['date_of_gen'] . "</td>";
											echo "<td>" . getStatusBadge($row['status']) . "</td>";
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