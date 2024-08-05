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
	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>	
			
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
					Dashboard				</div>
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
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Reviews</a></li>
			</ol>
		</div>
		<div class="form-head d-flex mb-3 mb-md-4 align-items-start">
			<div class="me-auto d-none d-lg-block">
				<a href="javascript:void(0);" class="btn btn-primary btn-rounded me-2">Publish</a>
				<a href="javascript:void(0);" class="btn btn-danger btn-rounded">Delete</a>
			</div>
			
			<div class="input-group search-area ms-auto d-inline-flex">
				<input type="text" class="form-control" placeholder="Search here">
				<div class="input-group-append">
					<button type="button" class="input-group-text"><i class="fas fa-search"></i></button>
				</div>
			</div>
			<select class="default-select ms-2 style-3">
				<option>Newest</option>
				<option>Old</option>
			</select>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<ul class="nav nav-pills review-tab">
					<li class="nav-item">
						<a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">All Review</a>
					</li>
					<li class="nav-item">
						<a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Published</a>
					</li>
					<li class="nav-item">
						<a href="#navpills-3" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Deleted</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="navpills-1" class="tab-pane active">
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 me-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox1" required="">
										<label class="form-check-label" for="customCheckBox1"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/6.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Glee Smiley</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Diabetes</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										When I came with my mother, I was very nervous. But after entering here I felt warmed with smiling
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 me-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox2" required="">
										<label class="form-check-label" for="customCheckBox2"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/17.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Alexia Kev</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Allergies & Atshma</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										Thanks for all the services, no doubt it is the best hospital. My kidney, BP, diabetes problem
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 me-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox3" required="">
										<label class="form-check-label" for="customCheckBox3"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/18.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Brian Lucky</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Dental Care</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										Hospital & staff were extremely warm & quick in getting me start with the procedures
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 me-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox4" required="">
										<label class="form-check-label" for="customCheckBox4"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/19.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Don Jhon</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Physical Therapy</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										I am very much glad to note my feedback and grateful. Thanks to Dr. Chibber and assistants. I got very good guidelines for my patient.
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 me-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox5" required="">
										<label class="form-check-label" for="customCheckBox5"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/20.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Olivia Smuth</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Allergies & Atshma</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										It was never a feeling as if I was in a hospital. I got the best care. The response of each staff, right from security (screening), housekeeping, admission staff, nurses, trainee doctor, Doctor was excellent. 
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="navpills-2" class="tab-pane">
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 ms-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox6" required="">
										<label class="form-check-label" for="customCheckBox6"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/18.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Glee Smiley</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Diabetes</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										When I came with my mother, I was very nervous. But after entering here I felt warmed with smiling
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 ms-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox7" required="">
										<label class="form-check-label" for="customCheckBox7"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/17.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Alexia Kev</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Allergies & Atshma</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										Thanks for all the services, no doubt it is the best hospital. My kidney, BP, diabetes problem
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 me-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox8" required="">
										<label class="form-check-label" for="customCheckBox8"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/18.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Brian Lucky</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Dental Care</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										Hospital & staff were extremely warm & quick in getting me start with the procedures
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="navpills-3" class="tab-pane">
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 me-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox9" required="">
										<label class="form-check-label" for="customCheckBox9"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/18.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Brian Lucky</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Dental Care</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										Hospital & staff were extremely warm & quick in getting me start with the procedures
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card review-table">
							<div class="media align-items-center">
								<div class="checkbox me-lg-4 me-0 align-self-center">
									<div class="form-check custom-checkbox checkbox-primary">
										<input type="checkbox" class="form-check-input" checked="" id="customCheckBox10" required="">
										<label class="form-check-label" for="customCheckBox10"></label>
									</div>
								</div>
								<img class="me-3 img-fluid rounded" width="90" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/doctors/7.jpg" alt="DexignZone">
								<div class="media-body d-lg-flex d-block row align-items-center">
									<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
										<h3 class="fs-20 font-w600 mb-1"><a class="text-black" href="javascript:void(0);">Brian Lucky</a></h3>
										<span class="fs-15 d-block">Sunday, 24 July 2020   04:55 PM</span>
										<span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 me-2"></i>Dental Care</span>
									</div>
									<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-lg-0 mb-2">
										Hospital & staff were extremely warm & quick in getting me start with the procedures
									</div>
								</div>
								<div class="media-footer d-xl-flex d-block align-items-center">
									<div class="disease me-5">
										<span class="star-review ms-lg-3 mb-sm-0 mb-2 ms-0 d-inline-block">
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-orange"></i>
											<i class="fa fa-star text-gray"></i>
										</span>
									</div>
									<div class="edit ms-auto">
										<a href="javascript:void(0);" class="text-primary font-w600 me-4">PUBLISH</a>
										<a href="javascript:void(0);" class="text-danger font-w600">DELETE</a>
									</div>
								</div>
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

<!--**********************************
    Footer end
***********************************-->        
		
	</div>
    <script> var base_url = 'https://eres.dexignzone.com/codeigniter/demo/';</script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		

		
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script>
		

    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>