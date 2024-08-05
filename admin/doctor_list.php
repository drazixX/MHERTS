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
	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>	
			
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>		
	
    <link class="main-css" href="https://eres.dexignzone.com/codeigniter/demo/public/assets/css/style.css" rel="stylesheet" type="text/css"/>	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
	
</style>
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
	Header Start
***********************************--> 
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
					Midwife List				</div>
				</div>
				<?php
				include './template/header2.php';
				?>

			</div>
		</nav>
	</div>
</div>
<!--**********************************
	Header End
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
				<li class="breadcrumb-item  active"><a href="javascript:void(0)">Midwife List</a></li>
			</ol>
		</div>
		
		<div class="form-head d-flex mb-3 mb-md-4 align-items-start">
			<div class="me-auto d-lg-block">
				<a href="javascript:void(0);" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#doctorsModal">+ Add New</a>
				<!-- <a href="app_calendar.php" class="btn btn-primary btn-rounded" >View Calendar</a> -->
			</div>
			<!-- <div class="input-group search-area ms-auto d-inline-flex me-2">
				<input type="text" class="form-control" placeholder="Search here">
				<div class="input-group-append">
					<button type="button" class="input-group-text"><i class="fas fa-search"></i></button>
				</div>
			</div> -->
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example5" class="table shadow-hover doctor-list table-bordered mb-4 dataTablesCard fs-14">
								<thead>
									<tr>
										<th>
											<div class="checkbox align-self-center">
												<div class="form-check custom-checkbox ">
													<input type="checkbox" class="form-check-input" id="checkAll" required="">
													<label class="form-check-label" for="checkAll"></label>
												</div>
											</div>
										</th>
										<th>Midwives ID</th>
										<th>Date Join</th>
										<th>Midwife Name</th>
										<th>Specialist</th>
										<!-- <th>Schedule</th> -->
										<th>Contact</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
								<?php
									include_once "connection/conn.php";

									$sql = "SELECT * FROM doctors";

									// Execute the query
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>";
													echo '<td>
																	<div class="d-flex align-items-center">
																			<div class="checkbox text-end align-self-center">
																					<div class="form-check custom-checkbox">
																							<input type="checkbox" class="form-check-input" id="customCheckBox1">
																							<label class="form-check-label" for="customCheckBox1"></label>
																					</div>
																			</div>
																			<img alt="" src="' . $row['File'] . '" height="43" width="43" class="rounded-circle ms-4">
																	</div>
																</td>';
													echo '<td>' . $row['DoctorID'] . '</td>';
													echo '<td>' . date('d/m/Y', strtotime($row['JoinDate'])) . '</td>';
													echo '<td>' . $row['Title'] . ' ' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
													echo '<td>' . $row['Specialization'] . '</td>';
													echo '<td><span class="font-w500">' . $row['Mobile'] . '</span></td>';
													echo "<td>
																	<div class='d-flex align-items-center'>
																			<span>" . getStatusBadge($row['Status']) . "</span>
																			<div class='dropdown ms-auto c-pointer text-end'>
																					<div class='btn-link' data-bs-toggle='dropdown'>
																							<svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
																							<path d='M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z' stroke='#3E4954' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
																							<path d='M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z' stroke='#3E4954' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
																							<path d='M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z' stroke='#3E4954' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
																							</svg>
																					</div>
																					<div class='dropdown-menu dropdown-menu-right'>
																							<a class='dropdown-item' href='javascript:void(0);' onclick='updateDoctorStatus(" . $row["DoctorID"] . ", \"Unavailable\")'>Unavailable</a>
																							<a class='dropdown-item' href='javascript:void(0);' onclick='updateDoctorStatus(" . $row["DoctorID"] . ", \"Available\")'>Available</a>
																							<a class='dropdown-item' href='javascript:void(0);' onclick='updateDoctorStatus(" . $row["DoctorID"] . ", \"Resigned\")'>Resigned</a>
																					</div>
																			</div>
																	</div>
																</td>";
													echo '</tr>';
											}
									} else {
											echo '<tr><td colspan="8">No doctors found.</td></tr>';
									}

									// Close database connection
									mysqli_close($conn);

									function getStatusBadge($status) {
											if ($status == 'Unavailable') {
													return "<span class='text-danger font-w600'>Unavailable</span>";
											} elseif ($status == 'Available') {
													return "<span class='text-success font-w600'>Available</span>";
											} else {
													return "<span class='font-w600'>" . $status . "</span>";
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

	<!-- Doctor's Modal -->
	<div class="modal fade" id="doctorsModal" tabindex="-1" aria-labelledby="doctorsModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="doctorsModalLabel">Add Doctor's Information</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="add_doctors.php" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xl-12">
									<div class="form-group">
										<label for="title" class="col-form-label">Title:</label>
										<select class="form-control" id="title" name="Title" required >
											<option>Select Title</option>
											<option value="Dr.">Dr.</option>
											<option value="Dra.">Dra.</option>
											<option value="Nurse">Nurse</option>
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
									<input type="text" class="form-control" id="middleName" name="MiddleName" placeholder="Middle Name" >
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
										<option value = "" select disabled >Select Gender</option>
										<option value = "Male" >Male</option>
										<option value = "Female" >Female</option>
									</select>
								</div>
							</div>
						
							<div class="col-xl-12">
								<div class="form-group">
									<label  class="col-form-label">Address :</label>
									<textarea class="form-control" id="address" name = "Address" rows="3" required></textarea>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label  class="col-form-label">Mobile No:</label>
										<input type="text" class="form-control" id="moblie" name="Mobile" placeholder="Mobile" required>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Email:</label>
										<input type="email" class="form-control" id="email" name="Email" placeholder="Email" required>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Specialization:</label>
									<select class="form-control" id="specialize" name="Specialize" required>
										<option value="" selected disabled>Select Specialization</option>
										<option value="Obstetrician/Gynecologist">Obstetrician/Gynecologist(OB/GYN)</option>
										<option value="Nurse Midwife">Staff/Nurse Midwife</option>
										<option value="Maternal-Fetal Medicine Specialist">Maternal-Fetal Medicine Specialist</option>
										<option value="Perinatal Nurse">Perinatal Nurse</option>
										<option value="Ultrasound Technician">Ultrasound Technician</option>
										<option value="Genetic Counselor">Genetic Counselor</option>
										<option value="Doula">Doula</option>
										<option value="Lactation Consultant">Lactation Consultant</option>
										<option value="Patient-Care Liaison">Patient-Care Liaison</option>
									</select>
								</div>
							</div>

							<div class="col-xl-6">
								<div class="form-group">
									<label class="col-form-label">Status:</label>
									<select class="form-control" id="status" name="Status" required>
										<option value="" selected disabled>Select Status</option>
										<option value="Available">Available</option>
										<option value="Unavailable">Unavailable</option>
									</select>
								</div>
							</div>

							<div class="col-xl-12">
								<div class="mb-3">
									<label for="formFile" class="form-label">Choose a photo</label>
									<input class="form-control" type="file" id="formFile" name="FormFile">
								</div>
							</div>
						</div>
					<!-- </form> -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" >Add Doctor</button>
						<!-- <button type="button" class="btn btn-primary" onclick="addDoctorsInfo()" name="submit">Add Doctor</button> -->
					</div>

					</form>
				
				</div>
			</div>
		</div>
	<!-- Modal End -->

	</div>
</div>
<!--**********************************
	Content body end
***********************************-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Add New Doctor</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xl-6">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Name</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name">
						</div>
					</div>
					<div class="col-xl-6">
						<div class="mb-3">
							<label for="exampleFormControlInput2" class="form-label">Phone</label>
							<input type="number" class="form-control" id="exampleFormControlInput2" placeholder="+123456789">
						</div>
					</div>
					<div class="col-xl-12">
						<label class="form-label">Gender</label>
						<select class="default-select wide w-100" aria-label="Default select example">
							<option selected>Male</option>
							<option value="1">Female</option>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>
        <!--**********************************
    Footer start
***********************************-->

<!--**********************************
    Footer end
***********************************-->        
		
	</div>
    <!-- <script> var base_url = 'https://eres.dexignzone.com/codeigniter/demo/';</script> -->
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<!-- <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script> -->
			<script>
    function updateDoctorStatus(doctorID, status) {
        $.ajax({
            url: 'update_status.php',  // Create this file to handle status updates
            type: 'POST',
            data: {
                DoctorID: doctorID,
                Status: status
            },
            success: function(response) {
                if (response == 'success') {
                    alert('Status updated successfully.');
                    location.reload();  // Reload the page to reflect the changes
                } else {
                    alert('Failed to update status.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error updating status:', error);
                alert('An error occurred. Please try again.');
            }
        });
    }
</script>


		<script>
	(function($) {
		
		var table = $('#example5').DataTable({
			searching: true,
			paging:true,
			select: false,
			// info: false,         
			lengthChange:true 
			
		});
		$('#example tbody').on('click', 'tr', function () {
			var data = table.row( this ).data();
			
		});
		
	})(jQuery);
</script>
<script src="./public/assets/js/doctors.js"></script>


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>