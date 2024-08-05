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
					Email Inbox			</div>
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
	<div class="container-fluid">
		<div class="page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Email</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Inbox</a></li>
			</ol>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-xl-3 col-xxl-4 email-left-body">
								<div class="mb-3 mt-4 mt-sm-0">
									<div class="p-0">
										<a href="email_compose.php" class="btn btn-primary btn-block">Compose</a>
									</div>
									<div class="mail-list rounded mt-4">
										<a href="email_inbox.php" class="list-group-item active"><i
												class="fa fa-inbox font-18 align-middle me-2"></i> Inbox <span
												class="badge badge-light badge-sm float-end">198</span> </a>
										<a href="javascript:void()" class="list-group-item"><i
												class="fa fa-paper-plane font-18 align-middle me-2"></i>Sent</a> <a href="javascript:void(0);" class="list-group-item"><i
												class="fa fa-star font-18 align-middle me-2"></i>Important <span
												class="badge badge-danger text-white badge-sm float-end">47</span>
										</a>
										<a href="javascript:void()" class="list-group-item"><i
												class="mdi mdi-file-document-box font-18 align-middle me-2"></i>Draft</a><a href="javascript:void(0);" class="list-group-item"><i
												class="fa fa-trash font-18 align-middle me-2"></i>Trash</a>
									</div>
									<div class="mail-list rounded overflow-hidden mt-4">
										<div class="intro-title d-flex justify-content-between my-0">
											<h5>Categories</h5>
										</div>
										<a href="email_inbox.php" class="list-group-item"><span class="icon-warning"><i
													class="fa fa-circle" aria-hidden="true"></i></span>
											Work </a>
										<a href="email_inbox.php" class="list-group-item"><span class="icon-primary"><i
													class="fa fa-circle" aria-hidden="true"></i></span>
											Private </a>
										<a href="email_inbox.php" class="list-group-item"><span class="icon-success"><i
													class="fa fa-circle" aria-hidden="true"></i></span>
											Support </a>
										<a href="email_inbox.php" class="list-group-item"><span class="icon-dpink"><i
													class="fa fa-circle" aria-hidden="true"></i></span>
											Social </a>
									</div>
								</div>
							</div>
							<div class="col-xl-9 col-xxl-8">
								<div>
									<div role="toolbar" class="toolbar ms-1 ms-sm-0 ms-xl-1 d-flex align-items-center">
										<div class="btn-group mb-1">
											<div class="form-check custom-checkbox">
												<input type="checkbox" class="form-check-input" id="checkAll">
												<label class="form-check-label" for="checkAll"></label>
											</div>
										</div>
										<div class="btn-group mb-1">
											<button class="btn btn-primary light px-3" type="button"><i class="fas fa-rotate-right"></i>
											</button>
										</div>
										<div class="btn-group mb-1">
											<button aria-expanded="false" data-bs-toggle="dropdown" class="btn btn-primary px-3 light dropdown-toggle mx-2" type="button">More <span
													class="caret"></span>
											</button>
											<div class="dropdown-menu"> <a href="javascript: void(0);" class="dropdown-item">Mark as Unread</a> <a href="javascript: void(0);" class="dropdown-item">Add to Tasks</a>
												<a href="javascript: void(0);" class="dropdown-item">Add Star</a> <a href="javascript: void(0);" class="dropdown-item">Mute</a>
											</div>
										</div>
										<div class="email-tools-box">
											<i class="fa-solid fa-list-ul"></i>
										</div>
										<form class=" d-none d-sm-block ms-auto">
											<div class="input-group  ms-auto w-100 d-sm-inline-flex d-none">
												<input type="text" class="form-control" placeholder="Search here">
												<span class="input-group-text"><button class="bg-transparent border-0"><i class="fas fa-search"></i></button></span>
											</div>
										</form>
									</div>
									<div class="email-list mt-3">
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox2">
															<label class="form-check-label" for="checkbox2"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox3">
															<label class="form-check-label" for="checkbox3"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox4">
															<label class="form-check-label" for="checkbox4"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox5">
															<label class="form-check-label" for="checkbox5"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox6">
															<label class="form-check-label" for="checkbox6"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox7">
															<label class="form-check-label" for="checkbox7"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox8">
															<label class="form-check-label" for="checkbox8"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message unread">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox9">
															<label class="form-check-label" for="checkbox9"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message unread">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox10">
															<label class="form-check-label" for="checkbox10"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox11">
															<label class="form-check-label" for="checkbox11"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox12">
															<label class="form-check-label" for="checkbox12"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox13">
															<label class="form-check-label" for="checkbox13"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox14">
															<label class="form-check-label" for="checkbox14"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message unread">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox15">
															<label class="form-check-label" for="checkbox15"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox16">
															<label class="form-check-label" for="checkbox16"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox17">
															<label class="form-check-label" for="checkbox17"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox18">
															<label class="form-check-label" for="checkbox18"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox19">
															<label class="form-check-label" for="checkbox19"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message unread">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox20">
															<label class="form-check-label" for="checkbox20"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox21">
															<label class="form-check-label" for="checkbox21"></label>
														</div>
													</div>
													<div class="ms-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="email_read.php" class="col-mail col-mail-2">
													<div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
													<div class="date">11:49 am</div>
												</a>
											</div>
										</div>
									</div>
									<!-- panel -->
									<div class="row mt-4">
										<div class="col-12 ps-3">
											<nav>
												<ul class="pagination pagination-gutter pagination-primary pagination-sm no-bg justify-content-center justify-content-xl-start ">
													<li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="fas fa-angle-left"></i></a></li>
													<li class="page-item "><a class="page-link" href="javascript:void()">1</a></li>
													<li class="page-item active"><a class="page-link" href="javascript:void()">2</a></li>
													<li class="page-item"><a class="page-link" href="javascript:void()">3</a></li>
													<li class="page-item"><a class="page-link" href="javascript:void()">4</a></li>
													<li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="fas fa-angle-right"></i></a></li>
												</ul>
											</nav>
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
		<script>	
	$(".fa.fa-star").click(function () {
		$(this).toggleClass("yellow");
	});
	
	$(".email-tools-box").on('click', function(){
	$(' .email-left-body ,.email-tools-box').toggleClass("active");
	});
</script>


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>