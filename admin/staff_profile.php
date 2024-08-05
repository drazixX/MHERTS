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
	
		<link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/favicon.png">	
	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>	
			
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>		
	
    <link class="main-css" href="https://eres.dexignzone.com/codeigniter/demo/public/assets/css/style.css" rel="stylesheet" type="text/css"/>	
	
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
	Header Start
***********************************--> 
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
					Staff Profile			</div>
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
		<div class="d-md-flex align-items-center">
			<div class="page-titles mb-2">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Staff Profile</a></li>
				</ol>
			</div>
			<div class="ms-auto mb-3">
				<a href="javascript:void();" class="btn btn-primary btn-rounded add-staff" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fas fa-pencil"></i>&nbsp; Edit Staff Info</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-xl-8">
								<div class="profile">
									<div class="staff">
										<img src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/nurse.jpg" alt="">
									</div>
									<div class="staf-info">
										<div>
											<div class="d-flex align-items-center mb-2">
												<h4 class="mb-0">Name :</h4><p class="ms-2 mb-0">Kate Velasquez</p>
											</div>
											
											<div class="d-flex align-items-center mb-2">
												<h4 class="mb-0">Gender :</h4><p class="ms-2 mb-0">Female</p>
											</div>
											<div class="d-flex align-items-center mb-2">
												<h4 class="mb-0">Degrer :</h4><p class="ms-2 mb-0">BSN</p>
											</div>
											<div class="d-flex align-items-center mb-2">
												<h4 class="mb-0">Designation :</h4><p class="ms-2 mb-0">Nurse</p>
											</div>
										</div>
										<div class="location mt-4">
											<div class="mb-3">
												<span><i class="fa-solid fa-location-dot me-2 text-primary"></i>San Francisco, USA</span>
												<span><i class="fa fa-building text-secondary me-2"></i> ICU Department</span>
											</div>
											<div>
												<span><i class="fa fa-phone me-2 text-primary"></i> +1 1234598767</span>
												<span><i class="fa fa-envelope me-2 text-secondary"></i>hello@gmail.com</span>
											</div>	
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4">
								<div class="d-flex justify-content-between border-bottom mb-3 pb-2 mt-xl-0 mt-3">
									<span class="font-w600 text-black">Followers</span>
									<span>500</span>
								</div>
								<div class="d-flex justify-content-between border-bottom mb-3 pb-2">
									<span class="font-w600 text-black">Following</span>
									<span>300</span>
								</div>
								<div class="d-flex justify-content-between mb-3 pb-2">
									<span class="font-w600 text-black">Friends</span>
									<span>300</span>
								</div>
								<div class="mt-4">
									<button id="follow-button" class="btn btn-primary">Follow</button>
									<a href="javascript:void(0);" class="btn btn-secondary">Message</a>
								</div>
							</div>
							<div class="mt-5">
								<h4 class="fs-20 font-w600">About Me</h4>
								<div class="staff-info">
									<p><i class="fas fa-dot-circle me-2 text-primary"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
									</p>
									<p><i class="fas fa-dot-circle me-2 text-primary"></i>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
									</p>
								</div>

							</div>
							<hr>
							<h4 class="fs-20 font-w600">Appointment Schdule</h4>
							<div class="staff-info">
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>Identify patients’ care requirements, focus on their needs and act on them</p>
								<p><i class="fas fa-dot-circle me-2 text-primary "></i>Nurture a compassionate environment by providing psychological support</p>
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>Resolve or report on patients’ needs or problems</p>
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>Prepare patients for examinations and perform routine diagnostic checks (monitor pulse, blood pressure and temperature, provide drugs and injections etc)</p>
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>Monitor and record patient’s condition and document provided care services</p>
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>Treat medical emergencies</p>
							</div>
							<hr>
							<h4 class="fs-20 font-w600">Experience</h4>
							<div class="staff-info">
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industrypsychological suppor.</p>
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>Nurture a compassionate environment by providing psychological support</p>
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry psychological suppor.</p>
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>PLorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								<p><i class="fas fa-dot-circle me-2 text-primary"></i>Monitor and record patient’s condition and document provided care services</p>
							</div>
							<hr>
							<div class="col-lg-12">
								<h4 class="fs-20 font-w600">Education</h4>
								<div class="staff-info">
									<p><i class="fas fa-dot-circle me-2 text-primary"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industrypsychological suppor.</p>
									<p><i class="fas fa-dot-circle me-2 text-primary"></i>Nurture a compassionate environment by providing psychological support</p>
									<p><i class="fas fa-dot-circle me-2 text-primary"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry psychological suppor.</p>
								</div>
								<hr>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Book Appointment</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					<div class="row">
						<div class="col-xl-12">
							<div class="form-group">
								<label  class="col-form-label">Title:</label>
								<select class="form-control">
									<option>Miss</option>
									<option>Mr.</option>
									<option>Mrs.</option>
								</select>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<label class="col-form-label">Name:</label>
								<input type="text" class="form-control" id="name1" placeholder="Name">
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<label class="col-form-label">Last Name:</label>
								<input type="text" class="form-control" id="name2" placeholder="Last Name">
							</div>
						</div>
						<div class="col-xl-12">
							<div class="form-group">
								<label class="col-form-label">Date Of Appointment:</label>
								<input size="16" type="date"  class="form-control">
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<label class="col-form-label">From:</label>
								<input size="16" value="12:00" class="form-control datetimepicker2">
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<label class="col-form-label">To:</label>
								<input size="16" type="time" value="12:00" class="form-control">
							</div>
						</div>
						<div class="col-xl-12">
							<div class="form-group">
								<label  class="col-form-label">Address :</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<label  class="col-form-label">Mobile No:</label>
								<input type="text" class="form-control" id="moblie1" placeholder="Mobile">
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<label class="col-form-label">Email Id:</label>
								<input type="email" class="form-control" id="email1" placeholder="Email">
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<label class="col-form-label">Consulting Doctor:</label>
								<select class="form-control">
									<option>Dr.HANI B BARADI</option>
									<option>Dr.NAJJIA N MAHMOUD</option>
									<option>Dr. SANKAR NAIDU ADUSUMILLI</option>
								</select>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<label  class="col-form-label">Injury/Condition:</label>
								<input type="text" class="form-control" id="fever" placeholder="fever">
							</div>
						</div>
						<div class="col-xl-12">
							<div class="form-group">
								<label  class="col-form-label">Note:</label>
								<textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Send message</button>
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

<!--**********************************
    Footer end
***********************************-->        
		
	</div>
    <script> var base_url = 'https://eres.dexignzone.com/codeigniter/demo/';</script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script>
		<script>
	// script.js
	$(document).ready(function() {
		// Initially, the user is not following
		let isFollowing = false;

		// Function to toggle the button text and class
		function toggleFollowButton() {
			if (isFollowing) {
				$("#follow-button").removeClass("following") .css({'background-color':'#36c95f', 'border-color': '#36c95f'}).text("Follow");
			} else {
				$("#follow-button").addClass("following").css({'background-color':'#369dc9', 'border-color': '#369dc9'}).text("Following");
			}
			isFollowing = !isFollowing;
		}

		// Handle button click event
		$("#follow-button").on("click", function() {
			toggleFollowButton();
		});
	});
</script>


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>