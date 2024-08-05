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
	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/fullcalendar/css/main.min.css" rel="stylesheet" type="text/css"/>	
			
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>		
	
    <link class="main-css" href="https://eres.dexignzone.com/codeigniter/demo/public/assets/css/style.css" rel="stylesheet" type="text/css"/>	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
</head>
<body>


	
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
					Calendar				</div>
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Calendar</a></li>
        </ol>
        </div>
        <!-- row -->
        <div class="row">
    <div class="col-xl-3 col-xxl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-intro-title">Appointments List</h4>

                <div class="">
                    <!-- List of appointments -->
                    <div id="appointments-list" class="my-3">
                        <p>Upcoming Appointments:</p>
                        <?php
                        // Include your database connection file
                        include_once './connection/conn.php';

                        // Retrieve appointments from the database
                        $sql = "SELECT A_Id, Title, CONCAT(FirstName, ' ', LastName) AS name, DateOfAppointment FROM appointments ORDER BY DateOfAppointment";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output each appointment as a list item
                            echo '<ul class="list-group">';
                            while ($row = $result->fetch_assoc()) {
                                $date = new DateTime($row['DateOfAppointment']);
                                echo '<li class="list-group-item">';
                                echo '<strong>' . htmlspecialchars($row['Title']) . '</strong>: ' . htmlspecialchars($row['name']) . ' on ' . $date->format('F j, Y');
                                echo '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<p>No appointments found.</p>';
                        }

                        // Close the database connection
                        $conn->close();
                        ?>
                    </div>
                    
                    <!-- checkbox -->
                    <!-- <div class="checkbox form-check checkbox-event custom-checkbox pt-3 pb-5">
                        <input type="checkbox" class="form-check-input" id="drop-remove">
                        <label class="form-check-label" for="drop-remove">Remove After Drop</label>
                    </div> -->
                    <!-- <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="exampleModal" class="btn btn-primary btn-event w-100">
                        <span class="align-middle"><i class="fas fa-plus me-2"></i></span> Create New
                    </a> -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-9 col-xxl-8">
        <div class="card">
            <div class="card-body">
                <div id="calendar" class="app-fullcalendar"></div>
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
    <!-- <script> var base_url = 'https://eres.dexignzone.com/codeigniter/demo/';</script> -->
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/jqueryui/js/jquery-ui.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/moment/moment.min.js"></script>
            <script src="public/assets/vendor/fullcalendar/js/main.min.js"></script>
            <script src="public/assets/js/plugins-init/fullcalendar-init.js"></script>
            <!-- <script src="public/assets/js/plugins-init/calendar.js"></script> -->

    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script>

            <script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialView: 'dayGridMonth',
        events: 'fetch_appointments.php', // URL to fetch the appointments
        editable: true, // Enable drag-and-drop
        selectable: true // Enable event selection
    });

    // Render the calendar
    calendar.render();
});
</script>
		

    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>

