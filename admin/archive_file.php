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
					Archived Doctor & Staff		</div>
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
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Archived Doctor & Staff</a></li>
			</ol>
		</div>
        
        <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
			<div class="input-group search-area ms-auto d-inline-flex me-3">
				<input type="text" class="form-control" id="searchInput" placeholder="Search here">
				<div class="input-group-append">
					<button type="button" class="input-group-text" onclick="searchTable()"><i class="fas fa-search"></i></button>
				</div>
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
												<div class="form-check custom-checkbox ">
													<input type="checkbox" class="form-check-input" id="checkAll" required="">
													<label class="form-check-label" for="checkAll"></label>
												</div>
											</div>
										</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Date Modified</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Action</th>
									</tr>
								</thead>
                                <tbody>
                                    <?php
                                    include ('./connection/conn.php');

                                    // Perform query to fetch appointments data
                                    $query = "SELECT * FROM archive_pfiles";
                                    $result = mysqli_query($conn, $query);

                                    // Check if there are any files in the archive
                                    if (mysqli_num_rows($result) > 0) {
                                        // Loop through each row of data
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Output HTML for each file row
                                            echo "<tr>";
                                            echo "<td>";
                                            echo '<div class="checkbox text-end align-self-center">';
                                            echo '<div class="form-check custom-checkbox">';
                                            echo '<input type="checkbox" class="form-check-input" id="customCheckBox1" required>';
                                            echo '<label class="form-check-label" for="customCheckBox1"></label>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</td>';
                                            echo '<td class="file-name">' . pathinfo($row['file_name'], PATHINFO_FILENAME) . '</td>'; // Corrected syntax for file_name
                                            echo '<td class="text-primary">' . $row['file_type'] . '</td>';
                                            echo '<td>' . $row['file_size'] . '</td>';
                                            echo '<td>' . $row['date_of_insertion'] . '</td>';
                                            echo '<td>' . $row['save_path'] . '</td>';
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
                                                            <a class='dropdown-item' onclick='showRestoreConfirmation(" . $row['file_id'] . ")'>Restore</a>
															<a class='dropdown-item' onclick='showDeleteConfirmation(" . $row['file_id'] . ")'>Pernamently Delete</a>
                                                        </div>
                                                    </div>
                                                </td>";
                                                echo '</tr>';

                                                // JavaScript function to show modal with confirmation message
                                                echo "<script>
                                                function showDeleteConfirmation(file_id) {
                                                    document.getElementById('arch_idInput').value = file_id;
                                                    $('#basicModal').modal('show');
                                                }

                                                function showRestoreConfirmation(file_id) {
                                                    document.getElementById('restore_idInput').value = file_id;
                                                    $('#restoreModal').modal('show');
                                                }
                                                
                                            </script>";	
										
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No files found in archive</td></tr>";
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

<!-- Delete Modal -->
<div class='modal fade' id='basicModal'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
				<div class='modal-header'>
					<h5 class='modal-title'>Confirm Deletion</h5>
					<button type='button' class='btn-close' data-bs-dismiss='modal'></button>
				</div>
				<div class='modal-body'>
					Are you sure you want to permanently delete this file?
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-danger light' data-bs-dismiss='modal'>Close</button>
					<form action='functions/permanent_del.php' method='GET'>
						<input type='hidden' name='arc_id' id='arch_idInput'>
						<button type='submit' class='btn btn-primary'>Delete</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Restore Modal -->
	<div class='modal fade' id='restoreModal'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>Confirm Restoration</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class='modal-body'>
                Are you sure you want to restore this file?
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-danger light' data-bs-dismiss='modal'>Close</button>
                <form action='functions/restore_file.php' method='POST'>
                    <input type='hidden' name='restore_id' id='restore_idInput'>
                    <button type='submit' class='btn btn-primary'>Restore</button>
                </form>
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
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script>
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

    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>