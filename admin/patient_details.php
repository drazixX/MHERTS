<?php include './connection/conn.php' ?>
<?php
session_start();
	$user = $_SESSION['username'];
	$query = "SELECT * FROM tbl_users WHERE NOT username='$user' ORDER BY `created_at` DESC";
    $result = $conn->query($query);

$FamilyRec_Id = $_GET['FamilyRec_Id'] ?? null; 

if ($FamilyRec_Id !== null) {
    $sql_patient_status = "SELECT status FROM patient_status WHERE FamilyRec_Id = ?";
    $stmt_patient_status = $conn->prepare($sql_patient_status);

    if (!$stmt_patient_status) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt_patient_status->bind_param("i", $FamilyRec_Id);

    if (!$stmt_patient_status->execute()) {
        die("Error executing statement: " . $stmt_patient_status->error);
    }

    $stmt_patient_status->store_result();
    $stmt_patient_status->bind_result($status);
    $status_options = array();

    while ($stmt_patient_status->fetch()) {
        $status_options[] = $status;
    }

    $stmt_patient_status->close();

    $sql_colabel_status = "SELECT lab_status FROM colabel_status";
    $result_colabel_status = $conn->query($sql_colabel_status);

    if (!$result_colabel_status) {
        die("Error executing statement: " . $conn->error);
    }

    $colabel_status_options = array();

    while ($row = $result_colabel_status->fetch_assoc()) {
        $colabel_status_options[] = $row['lab_status'];
    }

    $result_colabel_status->close();
	
} else {
    echo "FamilyRec_Id parameter is missing.";
}
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
	<link href="public/assets/vendor/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>	


	<!-- Add the Leaflet CSS file -->
	<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/> -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
	<style>
    .primary-icon {
		margin-top: 6px;
		margin-left: 6px;
}

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
					Patient Details				</div>
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
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Patient Details</a></li>
			</ol>
		</div>
		<div class="d-md-flex d-block mb-3 align-items-center">
			<div class="widget-timeline-icon py-3 py-md-2 px-1 overflow-auto">
				<ul class="timeline">
					<li>
						<div class="icon bg-warning"></div>
						<a class="timeline-panel text-muted" href="javascript:void(0);">
							<h4 class="mb-2 mt-0 text-warning fs-16 font-w600">Pending</h4>
							<p class="fs-14 mb-0 ">21/08/2020, 12:45 AM</p>
						</a>
					</li>
					<li class="border-info">
						<div class="icon bg-info"></div>
						<a class="timeline-panel text-muted" href="javascript:void(0);">
							<h4 class="mb-2 mt-0 text-info fs-16 font-w600">On Recovery</h4>
							<p class="fs-14 mb-0 ">22/09/2020, 12:45 PM</p>
						</a>
					</li>
					<li>
						<div class="icon bg-primary"></div>
						<a class="timeline-panel text-muted" href="javascript:void(0);">
							<h4 class="mb-2 text-primary mt-0 fs-16 font-w600">Recovered</h4>
							<p class="fs-14 mb-0 ">25/09/2020, 10:45 AM</p>
						</a>
					</li>
				</ul>	
			</div>
			<form id="statusForm">
				<!-- No need for a button inside the form -->
				<select class="default-select ms-auto me-1 image-select style-2" name="status" id="statusSelect">
					<!-- Display patient_status options -->
					<?php foreach ($status_options as $option) : ?>
						<option value="<?php echo $option; ?>"><?php echo $option; ?></option>
					<?php endforeach; ?>
					<!-- Display colabel_status options when dropdown clicked -->
					<optgroup label="Additional Statuses" id="additionalStatuses" style="display: none;">
						<?php foreach ($colabel_status_options as $option) : ?>
							<option value="<?php echo $option; ?>"><?php echo $option; ?></option>
						<?php endforeach; ?>
					</optgroup>
				</select>
			</form>

			<!-- <a href="javascript:void(0);" class="btn btn-primary btn-rounded wspace-no ms-2"><i class="fas fa-pencil"></i> Edit</a> -->
			<a href="javascript:void(0);" class="btn btn-primary btn-rounded wspace-no ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-pencil"></i>&nbsp; Edit</a>
			
			
		</div>

		<!-- Content Start -->
		<div class="row">

			<!-- Column 1 Start -->
			<?php

                include './connection/conn.php';

                // Retrieve the PatientID from the query parameters
                $FamilyRec_Id = $_GET['FamilyRec_Id']; // Assuming FamilyRec_Id is passed through the URL

				// Query to fetch patient details based on the FamilyRec_Id
				$sql_patient = "SELECT * FROM patients_mother WHERE FamilyRec_Id = $FamilyRec_Id";
				$result_patient = $conn->query($sql_patient);

				if ($result_patient->num_rows > 0) {
					$row_patient = $result_patient->fetch_assoc();

					// Query to fetch doctor details from pdrel table based on FamilyRec_Id
					$sql_pdrel = "SELECT doctors.* FROM doctors INNER JOIN pdrels ON doctors.DoctorID = pdrels.DoctorID WHERE pdrels.FamilyRec_Id = $FamilyRec_Id";
					$result_pdrel = $conn->query($sql_pdrel);

					if ($result_pdrel->num_rows > 0) {
						$row_doctor = $result_pdrel->fetch_assoc();
				?>

			<div class="col-xl-6 col-xxl-8">
				<div class="card">
					<div class="card-body">
						<div class="media d-sm-flex d-block text-center text-sm-start pb-4 mb-4 border-bottom">
							<img alt="image" class="rounded me-sm-4 me-0" width="130" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/avatar/1.jpg">
							<div class="media-body align-items-center">
								<div class="d-sm-flex d-block justify-content-between my-3 my-sm-0">
									<div>
										<h3 class="fs-22 text-black font-w600 mb-0"><?php echo $row_patient['First_Name'] . ' ' . $row_patient['Last_Name']; ?></h3>
										<p class="mb-2 mb-sm-2">Check In date <?php echo $row_patient['Date_CheckIn']; ?></p>
									</div>
									<span>#<?php echo $row_patient['FormattedFR_ID']; ?></span>
								</div>
								<a href="javascript:void(0);" class="btn btn-primary light btn-rounded mb-2 me-2">
									<?php echo ($row_patient['Gender'] == 'Male') ? '<i class="fas fa-mars"></i>' : '<i class="fas fa-venus"></i>'; ?>
									<?php echo $row_patient['Gender']; ?>
								</a>
								<a href="javascript:void(0);" class="btn btn-primary light btn-rounded mb-2">
									<?php echo ($row_patient['Age'] == 'Diabetes') ? '<i class="fas fa-heartbeat"></i>' : ''; ?>
									<?php echo $row_patient['Age']; ?><span> years old</span>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 mb-3">
								<div class="media align-items-start">
									<span class="p-3 border border-primary-light rounded-circle me-3">
										<svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0)">
											<path d="M27.5716 13.4285C27.5716 22.4285 16.0001 30.1428 16.0001 30.1428C16.0001 30.1428 4.42871 22.4285 4.42871 13.4285C4.42871 10.3596 5.64784 7.41637 7.8179 5.24631C9.98797 3.07625 12.9312 1.85712 16.0001 1.85712C19.0691 1.85712 22.0123 3.07625 24.1824 5.24631C26.3524 7.41637 27.5716 10.3596 27.5716 13.4285Z" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M16.0002 17.2857C18.1305 17.2857 19.8574 15.5588 19.8574 13.4286C19.8574 11.2983 18.1305 9.57141 16.0002 9.57141C13.87 9.57141 12.1431 11.2983 12.1431 13.4286C12.1431 15.5588 13.87 17.2857 16.0002 17.2857Z" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
											</g>
											<defs>
											<clipPath id="clip0">
											<rect width="30.8571" height="30.8571" fill="white" transform="translate(0.571533 0.571411)"></rect>
											</clipPath>
											</defs>
										</svg>
									</span>
									<div class="media-body">
										<span class="d-block text-black font-w600 mb-1">Address</span>
										<p><?php echo $row_patient['Address']; ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div id="map" class="map-bx mb-3" style="height: 140px;" >
									<a href="javascript:void(0);" id="fullscreen-button" class="map-button">
										<i class="fas fa-expand"></i>View Fullscreen
									</a>
								</div>
							</div>


							
							<div class="col-lg-6 mb-md-0 mb-3">
								<div class="media">
									<span class="p-3 border border-primary-light rounded-circle me-3">
										<svg width="22" height="22" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M28.2884 21.7563V25.6138C28.2898 25.9719 28.2165 26.3264 28.073 26.6545C27.9296 26.9826 27.7191 27.2771 27.4553 27.5192C27.1914 27.7613 26.8798 27.9456 26.5406 28.0604C26.2014 28.1751 25.8419 28.2177 25.4853 28.1855C21.5285 27.7555 17.7278 26.4035 14.3885 24.238C11.2817 22.2638 8.64771 19.6297 6.67352 16.523C4.50043 13.1685 3.14808 9.34928 2.72601 5.37477C2.69388 5.0192 2.73614 4.66083 2.8501 4.32248C2.96405 3.98413 3.14721 3.67322 3.38792 3.40953C3.62862 3.14585 3.92159 2.93517 4.24817 2.79092C4.57475 2.64667 4.9278 2.57199 5.28482 2.57166H9.14232C9.76634 2.56552 10.3713 2.78649 10.8445 3.1934C11.3176 3.60031 11.6267 4.16538 11.714 4.78329C11.8768 6.01778 12.1788 7.22988 12.6141 8.39648C12.7871 8.85671 12.8245 9.35689 12.722 9.83775C12.6194 10.3186 12.3812 10.76 12.0354 11.1096L10.4024 12.7426C12.2329 15.9617 14.8983 18.6271 18.1174 20.4576L19.7504 18.8246C20.1001 18.4789 20.5414 18.2406 21.0223 18.1381C21.5031 18.0355 22.0033 18.073 22.4636 18.246C23.6302 18.6813 24.8423 18.9832 26.0767 19.1461C26.7014 19.2342 27.2718 19.5488 27.6796 20.0301C28.0874 20.5113 28.304 21.1257 28.2884 21.7563Z" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</span>
									<div class="media-body">
										<span class="d-block text-dark font-w600 mb-1">Phone</span>
										<p class="mb-0 font-w600"><?php echo $row_patient['Phone']; ?></p>
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-6">
								<div class="media">
								<span class="p-3 border border-primary-light rounded-circle me-3">
											<svg width="22" height="22" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5.14344 5.14331H25.7168C27.1312 5.14331 28.2884 6.30056 28.2884 7.71498V23.145C28.2884 24.5594 27.1312 25.7166 25.7168 25.7166H5.14344C3.72903 25.7166 2.57178 24.5594 2.57178 23.145V7.71498C2.57178 6.30056 3.72903 5.14331 5.14344 5.14331Z" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M28.2884 7.71503L15.4301 16.7159L2.57178 7.71503" stroke="#2BC155" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</span>
									<div class="media-body">
										<span class="d-block text-black font-w600 mb-1">Email</span>
										<p class="mb-0 font-w600"><?php echo $row_patient['Email']; ?></p>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
			


			<!-- Column 1 End -->

			<style>
				.widget-timeline-icon2 li {
					/* margin-top: 100px; */
					padding-left: 45px;
					position: relative;
					margin-left: 28px;
					border-left: 4px solid var(--primary);
					min-height: 100px;
					padding-top: 1px; }
					.widget-timeline-icon2 li:last-child {
						min-height: 60px; }
					.widget-timeline-icon2 li .icon {
						position: absolute;
						width: 54px;
						height: 54px;
						font-size: 38px;
						color: #fff;
						text-align: center;
						line-height: 45px;
						border-radius: 56px;
						left: -30px;
						top: 0; }
					.widget-timeline-icon2 li:last-child {
						border-left: 4px solid transparent; }
					svg{
						margin-top: -10px;
					}
					.aa{
						margin-top: -40px;
					}
			</style>
			<!-- Column 2 Start -->
			<?php
			include './connection/conn.php';

			$sql_pregnancy_history = "SELECT * FROM preg_history WHERE FamilyRec_Id = $FamilyRec_Id";
			$result_pregnancy_history = $conn->query($sql_pregnancy_history);
			?>

			<div class="col-xl-3 col-xxl-4 col-md-6">
				<div class="card">
					<div class="card-header border-0 pb-0">
						<h4 class="fs-20 font-w600">Pregnancy History</h4>
						<!-- <a  class="btn btn-primary btn-rounded wspace-no ms-2" title="Add Folder">&nbsp;+</a> -->
						<a href="javascript:void(0);" class="btn btn-primary btn-rounded wspace-no ms-2 btn-sm" data-bs-toggle="modal" data-bs-target="#addFolderModal" title="Add Folder">&nbsp;+</a>
					</div>
					<div class="card-body" style="max-height: 350px; overflow-y: auto;">
						<!-- <div class="widget-timeline-icon2"> -->
						<div class="widget-timeline-icon2">
							<?php if ($result_pregnancy_history->num_rows > 0) { ?>
								<ul class="timeline">
									<?php while ($row = $result_pregnancy_history->fetch_assoc()) { ?>
										<li>
											<div class="icon">
												<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
													width="64" height="64" viewBox="0 0 48 48">
													<linearGradient id="WQEfvoQAcpQgQgyjQQ4Hqa_dINnkNb1FBl4_gr1"
														x1="24" x2="24" y1="6.708" y2="14.977"
														gradientUnits="userSpaceOnUse">
														<stop offset="0" stop-color="#eba600"></stop>
														<stop offset="1" stop-color="#c28200"></stop>
													</linearGradient>
													<path fill="url(#WQEfvoQAcpQgQgyjQQ4Hqa_dINnkNb1FBl4_gr1)"
														d="M24.414,10.414l-2.536-2.536C21.316,7.316,20.553,7,19.757,7L5,7C3.895,7,3,7.895,3,9l0,30	c0,1.105,0.895,2,2,2l38,0c1.105,0,2-0.895,2-2V13c0-1.105-0.895-2-2-2l-17.172,0C25.298,11,24.789,10.789,24.414,10.414z">
													</path>
													<linearGradient id="WQEfvoQAcpQgQgyjQQ4Hqb_dINnkNb1FBl4_gr2"
														x1="24" x2="24" y1="10.854" y2="40.983"
														gradientUnits="userSpaceOnUse">
														<stop offset="0" stop-color="#ffd869"></stop>
														<stop offset="1" stop-color="#fec52b"></stop>
													</linearGradient>
													<path fill="url(#WQEfvoQAcpQgQgyjQQ4Hqb_dINnkNb1FBl4_gr2)"
														d="M21.586,14.414l3.268-3.268C24.947,11.053,25.074,11,25.207,11H43c1.105,0,2,0.895,2,2v26	c0,1.105-0.895,2-2,2H5c-1.105,0-2-0.895-2-2V15.5C3,15.224,3.224,15,3.5,15h16.672C20.702,15,21.211,14.789,21.586,14.414z">
													</path>
												</svg>
											</div>
											<!-- Add data attributes to store folder information -->
												<a class="timeline-panel text-muted folder-item" href="view_preg_history.php?FamilyRec_Id=<?php echo $FamilyRec_Id; ?>&history_id=<?php echo urlencode($row['history_id']); ?>&folder_name=<?php echo urlencode($row['folder_name']); ?>" 
												data-folder-name="<?php echo $row['folder_name']; ?>"
												data-created-date="<?php echo $row['created_date']; ?>">
												<h4 class="mb-2 mt-1"><?php echo $row['folder_name']; ?></h4>
												<p class="fs-15 mb-0"><?php echo $row['created_date']; ?></p>
											</a>
												<div class="dropdown ms-auto c-pointer text-end aa">
													<div class="btn-link" data-bs-toggle="dropdown">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</div>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item rename-folder-button" data-bs-toggle="modal" data-bs-target="#renameFolderModal">Rename</a>
														<a class="dropdown-item delete-folder-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-history-id="<?php echo htmlspecialchars($row['history_id']); ?>" data-family-rec-id="<?php echo htmlspecialchars($FamilyRec_Id); ?>">Delete</a>
													</div>
												</div>
											</li>

											

										<?php } ?>
								</ul>  
											<!-- Delete Modal -->
											<div class='modal fade' id='deleteModal'>
												<div class='modal-dialog' role='document'>
													<div class='modal-content'>
														<div class='modal-header'>
															<h5 class='modal-title'>Confirm Deletion</h5>
															<button type='button' class='btn-close' data-bs-dismiss='modal'></button>
														</div>
														<div class='modal-body'>
															Are you sure you want to delete this file and its associated data?

														</div>
														<div class='modal-footer'>
														<form id="deleteForm" action="functions/remove_folder.php" method="GET">
															<input type="hidden" id="FamilyRec_Id" name="FamilyRec_Id" value="<?php echo isset($_GET['FamilyRec_Id']) ? htmlspecialchars($_GET['FamilyRec_Id']) : ''; ?>">
															<input type="hidden" id="history_id" name="history_id" value="<?php echo isset($_GET['history_id']) ? htmlspecialchars($_GET['history_id']) : ''; ?>">
															<!-- <input type="hidden" name="file_id" id="file_idInput"> -->
														</form>
															<button type='button' class='btn btn-danger light' data-bs-dismiss='modal'>Cancel</button>
															<button type='button' class='btn btn-primary' id='confirmDelete'>Delete</button>
														</div>
													</div>
												</div>
											</div>
											<!-- Modal End -->
							<?php } else { ?>
								<p>No pregnancy history to show</p>
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>

			<!-- Modal for Adding Folders -->
			<div class="modal fade" id="addFolderModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addFolderModalLabel">Add Folder</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form id="addFolderForm">
								<input type="hidden" id="familyrec_id" name="familyrec_id" value="<?php echo isset($FamilyRec_Id) ? $FamilyRec_Id : ''; ?>">
								<div class="form-group">
									<label for="folderName">Folder Name</label>
									<input type="text" class="form-control" id="folderName" name="folderName" placeholder="Enter folder name">
								</div>
								<button type="submit" class="btn btn-primary">Create Folder</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal for Renaming Folders -->
			<div class="modal fade" id="renameFolderModal" tabindex="-1" role="dialog" aria-labelledby="renameFolderModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="renameFolderModalLabel">Rename Folder</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form id="renameFolderForm">
								<input type="hidden" id="familyrec_id_rename" name="familyrec_id_rename" value="<?php echo isset($FamilyRec_Id) ? $FamilyRec_Id : ''; ?>">
								<!-- Include the history_id input field (hidden) -->
								<input type="text" id="renameModalHistoryId" name="history_id">
								<div class="form-group">
									<label for="refolderName">New Folder Name</label>
									<input type="text" class="form-control" id="refolderName" name="refolderName" placeholder="Enter new folder name">
								</div>
								<button type="submit" class="btn btn-primary">Rename Folder</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Delete Folder Modal -->
			<div class='modal fade' id='basicModal'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content'>
						<div class='modal-header'>
							<h5 class='modal-title'>Confirm Deletion</h5>
							<button type='button' class='btn-close' data-bs-dismiss='modal'></button>
						</div>
						<div class='modal-body'>
							Are you sure you want to delete this file?
						</div>
						<div class='modal-footer'>
							<button type='button' class='btn btn-danger light' data-bs-dismiss='modal'>Close</button>
							<form action='functions/remove_folder.php' method='GET'>
							<input type="hidden" id="familyrec_id" name="familyrec_id" value="<?php echo isset($_GET['FamilyRec_Id']) ? htmlspecialchars($_GET['FamilyRec_Id']) : ''; ?>">
							<input type="hidden" id="history_id" name="history_id" value="<?php echo htmlspecialchars($_GET['history_id']); ?>">
								<input type='hidden' name='file_id' id='file_idInput'>
								<button type='submit' class='btn btn-primary'>Delete</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal End -->



			<!--  -->
			<div class="col-xl-3 col-xxl-12 col-md-6">
				<div class="card">	
					<div class="card-header border-0 pb-0">
						<h4 class="fs-20 font-w600">Patient Statistic</h4>
					</div>
					<div class="card-body text-center">
						<span class="donut" data-peity='{ "fill": ["rgb(209, 209, 209)", "rgba(180, 92, 195, 1)","rgba(255, 214, 0, 1)"]}'>2,5,3</span>
						<div class="mt-4">
							<p class="mb-2 d-flex text-dark font-w500  fs-14">Immunities (60%)
								<span class="pull-right ms-auto">25</span>
							</p>
							<div class="progress mb-3" style="height:8px">
								<div class="progress-bar bg-secondary progress-animated" style="width:85%; height:8px;" role="progressbar">
									<span class="sr-only">60% Complete</span>
								</div>
							</div>
							<p class="mb-2 d-flex text-dark font-w500  fs-14">Heart Beat (30%)
								<span class="pull-right ms-auto">12</span>
							</p>
							<div class="progress mb-3" style="height:8px">
								<div class="progress-bar bg-warning progress-animated" style="width:90%; height:8px;" role="progressbar">
									<span class="sr-only">60% Complete</span>
								</div>
							</div>
							<p class="mb-2 d-flex  text-dark font-w500 fs-14">Weigth (10%)
								<span class="pull-right ms-auto">15</span>
							</p>
							<div class="progress" style="height:8px">
								<div class="progress-bar bg-light progress-animated" style="width:65%; height:8px;" role="progressbar">
									<span class="sr-only">60% Complete</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-xl-6 col-xxl-6">
				<!-- Assigned Doctor Card -->
				<div class="card">
					<div class="card-header border-0 pb-0">
						<h4 class="fs-20 font-w600">Assigned Doctor</h4>
					</div>
					<div class="card-body">
						<div class="media d-sm-flex text-sm-start d-block text-center">
							<img alt="image" class="rounded me-sm-4 me-0 mb-2 mb-sm-0" width="130" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/avatar/2.jpg">
							<div class="media-body">
								<h3 class="fs-22 text-black font-w600 mb-0"><?php echo $row_doctor['Title'] . ' ' . $row_doctor['FirstName'] . ' ' . $row_doctor['LastName']; ?></h3>
								<p class="text-primary"><?php echo $row_doctor['Specialization']; ?></p>
								<div class="social-media mb-sm-0 mb-3 justify-content-sm-start justify-content-center">
									<a href="<?php echo $row_doctor['facebook']; ?>"><i class="fa-brands fa-facebook-f"></i></a>
									<a href="<?php echo $row_doctor['instagram']; ?>"><i class="fa-brands fa-instagram"></i></a>
									<a href="<?php echo $row_doctor['twitter']; ?>"><i class="fa-brands fa-twitter"></i></a>
								</div>
							</div>
							<div class="text-center">
								<!-- <span class="num"><?php echo $row_doctor['rating']; ?></span>
								<div class="star-icons">
									<i class="fas fa-star"></i>
									
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
    } else {
        echo "Assigned doctor not found for this patient.";
    }
} else {
    echo "Patient not found.";
}
?>


			<?php
			include './connection/conn.php';

			// Assuming $FamilyRec_Id is defined somewhere in your code
			$FamilyRec_Id = 123; // Replace 123 with the actual FamilyRec_Id

			$sql_preg_notes = "SELECT * FROM pdrels WHERE FamilyRec_Id = $FamilyRec_Id";
			$result_preg_notes = $conn->query($sql_preg_notes);
			?>

			<div class="col-xl-6 col-xxl-6">
				<div class="card patient-detail">
					<div class="card-header border-0 pb-0">
						<h4 class="fs-20 font-w600 text-white">Note for Patient</h4>
						<a href="javascript:void(0);">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip1)">
									<path d="M22.4455 1.55474C20.3795 -0.516293 17.0199 -0.516293 14.9539 1.55474L1.21862 15.2849C1.11124 15.3923 1.04476 15.5304 1.0243 15.6787L0.00668299 23.2162C-0.023999 23.431 0.052706 23.6458 0.201002 23.7941C0.328844 23.9219 0.507822 23.9986 0.686801 23.9986C0.717483 23.9986 0.748165 23.9986 0.778847 23.9935L5.31978 23.3798C5.6982 23.3287 5.96411 22.981 5.91297 22.6026C5.86183 22.2242 5.5141 21.9583 5.13569 22.0094L1.49476 22.5003L2.20556 17.2435L7.73855 22.7764C7.86639 22.9043 8.04537 22.981 8.22435 22.981C8.40333 22.981 8.5823 22.9094 8.71015 22.7764L22.4455 9.04625C23.4477 8.04398 24 6.71442 24 5.29794C24 3.88146 23.4477 2.5519 22.4455 1.55474ZM15.2198 3.24225L17.5261 5.54851L4.99251 18.0821L2.68624 15.7758L15.2198 3.24225ZM8.22946 21.3139L5.97433 19.0588L18.5079 6.52522L20.7631 8.78034L8.22946 21.3139ZM21.7244 7.79341L16.2068 2.27577C16.9074 1.69792 17.7818 1.38088 18.7023 1.38088C19.7506 1.38088 20.7324 1.78997 21.4739 2.52634C22.2153 3.2627 22.6193 4.24964 22.6193 5.29794C22.6193 6.22351 22.3023 7.09284 21.7244 7.79341Z" fill="white"/>
								</g>
								<defs>
									<clipPath id="clip1">
										<rect width="24" height="24" fill="white"/>
									</clipPath>
								</defs>
							</svg>
						</a>
					</div>
					<?php if ($result_preg_notes->num_rows > 0) { ?>
						<?php while ($row = $result_preg_notes->fetch_assoc()) { ?>
							<div class="card-body fs-14 font-w300">
								<?php echo $row['note']; ?>
							</div>
						<?php } ?>
					<?php } else { ?>
						<div class="card-body fs-14 font-w300">
							<p>No pregnancy notes to show</p>
						</div>
					<?php } ?>
				</div>
			</div>

			<!--  -->
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
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/chart.js/chart.bundle.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/owl-carousel/owl.carousel.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/peity/jquery.peity.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/plugins-init/piety-init.js"></script>
    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<!-- <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script> -->
			<!-- <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script> -->
	        <script src="public/assets/vendor/dropzone/dist/dropzone.js"></script>


			<!-- Add the Leaflet JavaScript file -->
			<!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> -->
			<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
		<script>
	$("span.donut").peity("donut", {
		width: "180",
		height: "180"
	});

	$('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var historyId = button.data('history-id'); // Extract history_id from data attribute
        var familyRecId = button.data('family-rec-id'); // Extract FamilyRec_Id from data attribute
		var fileId = $(this).data('file-id');
        
        // Update the hidden input fields in the modal form
        $('#history_id').val(historyId);
        $('#FamilyRec_Id').val(familyRecId);
		$('#file_idInput').val(fileId);
    });

	// When the Confirm Delete button is clicked, submit the form
    $('#confirmDelete').on('click', function() {
        $('#deleteForm').submit();
    });



	// For Adding Folder
	$(document).ready(function() {
	$('#addFolderForm').submit(function(event) {
		event.preventDefault(); 
		var folderName = $('#folderName').val();
		var familyrec_id = $('#familyrec_id').val();

		if(folderName.trim() === '') {
		alert('Please enter a folder name.');
		return;
		}

		// Send an AJAX request to check if the folder name already exists
		$.ajax({
		type: 'POST',
		url: './functions/check_folder.php',
		data: { folderName: folderName, familyrec_id: familyrec_id },
		success: function(response) {
			if(response === 'exists') {
			alert('A folder with the same name already exists for this patient.');
			} else {
			
			createFolder(folderName, familyrec_id);
			renameFolder(refolderName, familyrec_id);
			}
		},
		error: function(xhr, status, error) {
			console.error(error);
		}
		});
	});

	// Function to create folder
	function createFolder(folderName, familyrec_id) {
		$.ajax({
		type: 'POST',
		url: './functions/add_folder.php',
		data: { folderName: folderName, familyrec_id: familyrec_id },
		success: function(response) {
			// Update the UI accordingly
			$('#folderList').append('<li>' + folderName + '</li>');
			$('#folderName').val(''); 
			$('#addFolderModal').modal('hide'); 
			alert('Folder added successfully.');
			refreshPage();
		},
		error: function(xhr, status, error) {
			console.error(error);
		}
		});
	}

	// Other JavaScript functions for managing files...
	});

	function refreshPage() {
        window.location.reload();
    }

	$(document).ready(function() {
    // Handle form submission to rename a folder
    $('#renameFolderForm').submit(function(event) {
        event.preventDefault(); 

        // Get the renamed folderName and familyrec_id from the form
        var refolderName = $('#refolderName').val();
        var familyrec_id = $('#familyrec_id_rename').val();
		var history_id = $('#history_id').val();

        // Check if refolderName is not empty
        if (refolderName.trim() === '') {
            alert('Please enter a new folder name.');
            return;
        }

        // Send an AJAX request to rename the folder
        $.ajax({
            type: 'POST',
            url: './functions/rename_folder.php',
            data: { refolderName: refolderName, familyrec_id: familyrec_id, history_id: history_id },
            success: function(response) {
                // Update the UI accordingly
                alert('Folder renamed successfully.');
                $('#renameFolderModal').modal('hide'); 
                refreshPage();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    // Other JavaScript functions for managing files...
});


	
	// For Uploading Files
	$(document).ready(function() {
		$('.folder-item').click(function() {
			var folderName = $(this).data('folder-name');
			var createdDate = $(this).data('created-date');

			$('#folderName').val(folderName);
			$('#createdDate').val(createdDate);
		});
	});



document.getElementById('statusSelect').addEventListener('change', function() {
    var selectedStatus = this.value;
    var FamilyRec_Id = <?php echo $FamilyRec_Id; ?>; 
    // AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'functions/update_status.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
			refreshPage();
        } else {
            console.error('Request failed. Status: ' + xhr.status);
        }
    };
    xhr.send('status=' + selectedStatus + '&FamilyRec_Id=' + FamilyRec_Id);
});

// Function to handle fetching history_id and updating the Rename Modal when the Rename button is clicked
$(document).ready(function() {
        $('.rename-folder-button').click(function() {
            var history_id = $('#history_id').val();

            $('#renameModalHistoryId').val(history_id);
        });
    });

</script>
<script src="./public/assets/js/map.js"></script>
<script src="./public/assets/js/folder.js"></script>
    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>