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
        <!-- <div class="sk-three-bounce"> -->
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
								</div>
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Staff</a></li>
            </ol>
        </div>
        <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
            <div class="me-auto d-none d-lg-block">
                <a href="javascript:void();" class="btn btn-primary btn-rounded add-staff" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add Staff</a>
            </div>
            <div class="input-group search-area ms-auto d-inline-flex me-3">
                <input type="text" class="form-control" id="searchInput" placeholder="Search here">
                <div class="input-group-append">
                    <button type="button" class="input-group-text" id="searchButton"><i class="fas fa-search"></i></button>
                </div>
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
                                        <th>Staff ID</th> <!-- Moved to the first column -->
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Joining Date</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="staffTableBody">
                                    <?php
                                    // Assuming you have established a database connection
                                    include 'connection/conn.php';

                                    // Fetch staff information from the database
                                    $sql = "SELECT staff_id, firstName, middleName, lastName, email, address, joinDate, image
                                            FROM clinic_staff";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // Output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['staff_id'] . "</td>"; 
                                            echo "<td class='patient-info ps-0'>
                                                    <span>
                                                        <img src='" . $row['image'] . "' alt='Profile Image'>
                                                    </span>
                                                    <span class='text-nowrap ms-2'>" . $row['firstName'] . " " . $row['lastName'] . "</span>
                                                  </td>";
                                            echo "<td class='text-primary'>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "<td>" . date('d M Y', strtotime($row['joinDate'])) . "</td>";
                                            echo "<td class='text-end'>
                                                    <div class='dropdown'>
                                                        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton" . $row['staff_id'] . "' data-bs-toggle='dropdown' aria-expanded='false'>
                                                            Actions
                                                        </button>
                                                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton" . $row['staff_id'] . "'>
                                                            <li><a class='dropdown-item' href='javascript:void(0);' onclick='deleteStaff(" . $row['staff_id'] . ")'>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No staff found</td></tr>"; 
                                    }

                                    // Close database connection
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="submit_staff.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="col-form-label">Title:</label>
                                <select class="form-control" name="title" required>
                                    <option value="" disabled selected>Select Title</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                </select>
                                <div class="invalid-feedback">Please select a title.</div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">First Name:</label>
                                <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required>
                                <div class="invalid-feedback">First name is required.</div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Middle Name:</label>
                                <input type="text" class="form-control" name="middleName" placeholder="Enter Middle Name">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Last Name:</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required>
                                <div class="invalid-feedback">Last name is required.</div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="col-form-label">Date Of Birth:</label>
                                <input type="date" class="form-control" name="birthDate" required>
                                <div class="invalid-feedback">Please select a date of birth.</div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="col-form-label">Joining Date:</label>
                                <input type="date" class="form-control" name="joinDate" required>
                                <div class="invalid-feedback">Please select a joining date.</div>
                            </div>
                        </div>
                        <div class="col-xl-12">
													<div class="form-group">
															<label class="col-form-label">Address:</label>
															<textarea class="form-control" name="address" rows="3" placeholder="Enter Address" required></textarea>
															<div class="invalid-feedback">Address is required.</div>
													</div>
													<div class="form-group">
															<label class="col-form-label">Email:</label>
															<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
															<div class="invalid-feedback" id="email-feedback">Please enter a valid email address ending with @gmail.com.</div>
													</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group">
														<label class="col-form-label">Mobile No:</label>
														<input type="tel" class="form-control" name="mobile" placeholder="Enter Mobile No (e.g., 09123456789)" pattern="09[0-9]{9}" required>
														<div class="invalid-feedback">Enter a valid 11-digit mobile number starting with 09.</div>
												</div>
										</div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Gender:</label>
                                <select class="form-control" name="gender" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="invalid-feedback">Please select a gender.</div>
                            </div>
                        </div>
												<div class="col-xl-6">
													<div class="form-group">
															<label class="col-form-label">Educational Attainment:</label>
															<input type="text" class="form-control" name="educ_attainment" placeholder="Enter Educational Attainment" required>
															<div class="invalid-feedback">Please enter your educational attainment.</div>
													</div>
											</div>

											<div class="col-xl-6">
													<div class="form-group">
															<label class="col-form-label">Upload Image:</label>
															<input type="file" class="form-control" name="image" accept="image/*" required>
															<div class="invalid-feedback">Please upload an image.</div>
													</div>
											</div>

                        <div class="col-xl-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
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
		 
<!-- Add jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/chart.js/chart.bundle.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/owl-carousel/owl.carousel.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/plugins-init/clock-picker-init.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script>

			<script>
document.getElementById('searchButton').addEventListener('click', function() {
    const query = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#staffTableBody tr');

    rows.forEach(row => {
        const staffId = row.querySelector('td:nth-child(1)').textContent.toLowerCase(); // Updated index for Staff ID
        const name = row.querySelector('td.patient-info span').textContent.toLowerCase();
        const email = row.querySelector('td.text-primary').textContent.toLowerCase();
        const address = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

        if (staffId.includes(query) || name.includes(query) || email.includes(query) || address.includes(query)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>




			<script>
function deleteStaff(staff_id) {
    if (confirm('Are you sure you want to delete this staff member?')) {
        console.log('Confirmed deletion for staff ID:', staff_id); // Debug log

        $.ajax({
            url: 'delete_staff.php',
            type: 'POST',
            data: { staff_id: staff_id },
            success: function(response) {
                console.log('Response from server:', response); // Debug log
                var result = JSON.parse(response);
                alert(result.message);
                if (result.status === 'success') {
                    location.reload();  // Reload the page to reflect changes
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', error); // Debug log
                alert('An error occurred while trying to delete the staff member.');
            }
        });
    }
}

</script>


<script>
$(document).ready(function() {
    $('form').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: 'submit_staff.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response);
                if (result.status === 'success') {
                    $('#exampleModal').find('.modal-body').text(result.message);
                } else {
                    $('#exampleModal').find('.modal-body').text(result.message);
                }
                $('#exampleModal').modal('show');
            },
            error: function() {
                $('#exampleModal').find('.modal-body').text('An unexpected error occurred.');
                $('#exampleModal').modal('show');
            }
        });
    });
});
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


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>