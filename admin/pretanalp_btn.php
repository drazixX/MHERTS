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
	
	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">

	<!-- Other Stylesheets -->
	<link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>	
	<link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>	
	<link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>	
	<link class="main-css" href="public/assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="public/assets/images/favicon.png">


</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
          
        </div>
    </div>
    
    <div id="main-wrapper">



<?php
include './template/header.php';
?>


<?php
include './template/chatbot.php';
?>

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


<?php
include './template/sidebar.php';
?>

        <!-- Content body -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Select Patient</a></li>
                    </ol>
                </div>
                <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
                    <div class="me-auto d-none d-lg-block">
                        <a href="javascript:void();" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add Patient</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="patientForm" action="process_form.php" method="POST">
                                    <div class="form-group">
                                        <label for="patientSelect">Select a Patient:</label>
                                        <select id="patientSelect" name="FamilyRec_Id" class="form-control">
                                            <option value="">Select Patient</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="declineReason">Reason for Decline:</label>
                                        <textarea id="declineReason" name="declineReason" class="form-control" rows="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for adding patient -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <!-- Add your form fields here -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
    <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'fetch_patients.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(patient) {
                        $('#patientSelect').append($('<option>', {
                            value: patient.FamilyRec_Id,
                            text: patient.PatientName + ' (' + patient.Observations + ')'
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching patients:', error);
                    alert('Error fetching patients. Please try again later.');
                }
            });
        });
    </script>
</body>
</html>
