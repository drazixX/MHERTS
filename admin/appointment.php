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
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css"/>	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>	
			
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>		
	
    <link class="main-css" href="https://eres.dexignzone.com/codeigniter/demo/public/assets/css/style.css" rel="stylesheet" type="text/css"/>	
		
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



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
					Appointment					</div>
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
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Appointment</a></li>
			</ol>
		</div>
		<div class="form-head d-flex mb-3 mb-md-4 align-items-center">
			<!-- <div class="input-group search-area d-inline-flex me-2">
				<input type="text" class="form-control" placeholder="Search here">
				<div class="input-group-append">
					<button type="button" class="input-group-text"><i class="fas fa-search"></i></button>
				</div>
			</div> -->
			<div class="ms-auto">
				<a href="javascript:void(0);" class="btn btn-primary btn-rounded add-appointment" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Set Schedule</a>
				<!-- <a href="doctor_list.php" class="btn btn-primary btn-rounded">Doctor Schedule</a> -->
			</div>
		</div>
		<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="example5" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
                        <thead>
                            <tr>
                                <th>
                                    <div class="checkbox text-end align-self-center">
                                        <div class="form-check custom-checkbox">
                                            <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Of Appointment</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Mobile</th>
                                <th>Consulting Doctor</th>
                                <th>Injury/Condition</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include('./connection/conn.php');

                            // Perform query to fetch appointments data
                            $query = "SELECT * FROM appointments WHERE Accepted = 2";
                            $result = mysqli_query($conn, $query);

                            if (!$result) {
                                echo "<tr><td colspan='10'>Error: " . mysqli_error($conn) . "</td></tr>";
                            } elseif (mysqli_num_rows($result) > 0) {
                                // Loop through each row of data
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $appointmentId = $row['A_Id'];
                                    $fullName = $row['FirstName'] . ' ' . $row['LastName'];
                                    $consultingDoctor = getDoctorName($row['Consult_Doc'], $conn); // Function to get doctor's name
                                    echo "<tr id='appointmentRow_$appointmentId'>";
                                    echo "<td>";
                                    echo '<div class="checkbox text-end align-self-center">';
                                    echo '<div class="form-check custom-checkbox">';
                                    echo '<input type="checkbox" class="form-check-input" id="customCheckBox_' . $appointmentId . '" required="">';
                                    echo '<label class="form-check-label" for="customCheckBox_' . $appointmentId . '"></label>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '<td class="patient-info ps-0"><span class="text-nowrap ms-1">' . htmlspecialchars($fullName) . '</span></td>';
                                    echo '<td class="text-primary">' . htmlspecialchars($row['Email']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['DateOfAppointment']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['StartTime']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['EndTime']) . '</td>';
                                    echo '<td class="text-primary">' . htmlspecialchars($row['Mobile']) . '</td>';
                                    echo '<td>' . htmlspecialchars($consultingDoctor) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['Conditions']) . '</td>';
                                    echo "<td>
                                        <div class='dropdown ms-auto c-pointer text-end'>
                                            <div class='btn-link' data-bs-toggle='dropdown'>
                                                <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                    <path d='M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z' stroke='#3E4954' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                                                    <path d='M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z' stroke='#3E4954' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                                                    <path d='M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z' stroke='#3E4954' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                                                </svg>
                                            </div>
                                            <div class='dropdown-menu dropdown-menu-right'>
                                                <a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#declineReasonModal_$appointmentId'>Delete</a>
                                            </div>
                                        </div>
                                    </td>";
                                    echo '</tr>';
                                    
                                    // Decline reason modal
                                    echo "<div class='modal fade' id='declineReasonModal_$appointmentId' aria-labelledby='declineReasonLabel_$appointmentId' aria-hidden='true'>
                                        <div class='modal-dialog modal-lg modal-dialog-centered' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='declineReasonLabel_$appointmentId'>Provide Decline Reason for Appointment $appointmentId</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    <form action='decline.php' method='post'>
                                                        <input type='hidden' name='A_Id' value='$appointmentId'>
                                                        <div class='form-group'>
                                                            <label for='declineReason'>Reason:</label>
                                                            <textarea class='form-control' id='declineReason' name='declineReason' required></textarea>
                                                        </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-danger light' data-bs-dismiss='modal'>Cancel</button>
                                                    <button type='submit' class='btn btn-primary'>Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>";
                                }
                            } else {
                                echo "<tr><td colspan='10'>No appointments found</td></tr>";
                            }

                            // Close database connection
                            mysqli_close($conn);

                            // Function to get doctor's name
                            function getDoctorName($doctorId, $conn) {
                                $query = "SELECT Title, FirstName, LastName FROM doctors WHERE DoctorID = ?";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param("i", $doctorId);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    $doctor = $result->fetch_assoc();
                                    return htmlspecialchars($doctor['Title'] . ' ' . $doctor['FirstName'] . ' ' . $doctor['LastName']);
                                } else {
                                    return 'Unknown Doctor';
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

<!-- Appointment Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="appointmentForm" action="add_appointment.php" method="post">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title:</label>
                                <select class="form-control" id="title" name="Title" required>
                                    <option value="" disabled selected>Select Title</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Mrs.">Mrs.</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">First Name:</label>
                                <input type="text" class="form-control" id="firstName" name="FirstName" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastName" name="LastName" placeholder="Last Name" required>
                            </div>
                        </div>
												<div class="col-xl-12">
    <div class="form-group">
        <label class="col-form-label">Date Of Appointment:</label>
        <input type="date" id="date" class="form-control" name="DateOfAppointment" required>
    </div>
</div>

                        <div class="col-xl-6">
                            <label class="form-label mt-3">From<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="startTime" name="StartTime" required>
                        </div>
                        <div class="col-xl-6">
                            <label class="form-label mt-3">To<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="endTime" name="EndTime" required>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="col-form-label">Address:</label>
                                <textarea class="form-control" id="address" name="Address" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Mobile No:</label>
                                <input type="text" class="form-control" id="mobile" name="Mobile" placeholder="Mobile" required>
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
                                <label class="col-form-label">Consulting Doctor:</label>
                                <select class="form-control" id="doctor" name="Consult_Doc" required>
                                    <option value="" disabled selected>Select Doctor</option>
                                    <?php
                                    // Include the database connection
                                    include "connection/conn.php";

                                    // Fetch doctors from the database
                                    $sql = "SELECT DoctorID, Title, FirstName, LastName FROM doctors WHERE Status = 'Available'";
                                    $result = $conn->query($sql);

                                    // Check if there are any doctors
                                    if ($result->num_rows > 0) {
                                        // Loop through each row and display doctor details as options in the dropdown
                                        while ($row = $result->fetch_assoc()) {
                                            // Concatenate doctor's title, first name, and last name
                                            $doctorFullName = $row['Title'] . " " . $row['FirstName'] . " " . $row['LastName'];
                                            // Output each option with DoctorID as the value
                                            echo "<option value='" . $row['DoctorID'] . "'>" . $doctorFullName . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No doctors available</option>";
                                    }

                                    // Close database connection
                                    $conn->close();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Condition:</label>
                                <input type="text" class="form-control" id="condition" name="Conditions" placeholder="Condition" required>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="col-form-label">Note:</label>
                                <textarea class="form-control" id="note" name="Note" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


	


	<!-- Decline Reasons Modal-->
	<!-- <div class="modal fade" id="declineReasonModal">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Are you sure you want to decline this appointment?</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal">
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="declineAppointmentId">
					<div class="col-xl-12">
						<div class="form-group">
							<label  class="col-form-label">Reason/s:</label>
							<textarea class="form-control" id="declineReason" rows="3"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary"  onclick="submitDeclineReason()" name="submit">Continue</button>
				</div>
			</div>
		</div>
	</div> -->

</div>
<!--**********************************
	Content body end
***********************************-->

		
	</div>
    <!-- <script> var base_url = 'https://eres.dexignzone.com/codeigniter/demo/';</script> -->
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/plugins-init/clock-picker-init.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js"></script>
    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<!-- <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script> -->
			<script>
function addAppointment() {
    var form = document.getElementById('appointmentForm');
    var formData = new FormData(form);

    // Use AJAX to submit the form
    fetch('add_appointment.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        console.log('Success:', result);
        // Optionally close the modal and refresh the appointment list or calendar here
        $('#exampleModal').modal('hide');
        // Optionally, you could reload the appointment list here
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>

		<script>
	(function($) {
		var table = $('#example5').DataTable({
			searching: false,
			paging:true,
			select: false,
			lengthChange:false
		});
		$('#example tbody').on('click', 'tr', function () {
			var data = table.row( this ).data();
		});
	})(jQuery);
		jQuery('#datetimepicker2').datetimepicker({
		datepicker:false,
		format:'H:i'
	});
</script>
<!-- <script src="public/assets/js/appointment.js"></script> -->
<script src="./public/assets/js/appointment.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Flatpickr for time input fields
        flatpickr("#startTime", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
        
        flatpickr("#endTime", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
    });
</script>





    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>