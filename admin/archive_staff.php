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
    <meta name="robots" content="">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="public/assets/images/favicon.png">

    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
    <link class="main-css" href="https://eres.dexignzone.com/codeigniter/demo/public/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>

    <style>
        .dropdown-menu {
            position: absolute; /* Ensure the dropdown is positioned correctly */
            z-index: 1050; /* Ensure the dropdown menu appears above other elements */
        }
        .table {
            margin-bottom: 0; /* Ensure the table fits within the container */
        }
        .table td, .table th {
            vertical-align: middle;
            padding: 0.75rem;
        }
        .table thead th {
            text-align: center;
        }
        .table tbody td {
            text-align: center;
        }
        .table th, .table td {
            border-top: 1px solid #dee2e6;
        }
        .table-responsive {
            overflow-x: auto; /* Add horizontal scroll for responsive design */
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
        <?php include './template/header.php'; ?>
        <!--**********************************
            Nav-Bar End
        ***********************************-->        

        <!--**********************************
            ChatBot Start
        ***********************************-->    
        <?php include './template/chatbot.php'; ?>
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
                            <div class="dashboard_bar">Archived Midwife & Staff</div>
                        </div>
                        <?php include './template/header2.php'; ?>
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
        <?php include './template/sidebar.php'; ?>
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Archived Midwife & Staff</a></li>
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

                <?php
                // Update to fetch data from archive_staff
                $query = "SELECT * FROM archive_staff";
                $result = mysqli_query($conn, $query);
                ?>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="example5" class="table table-striped mb-4 dataTablesCard fs-14">
                                        <thead>
                                            <tr>
                                                <th>Staff ID</th>
                                                <th>Join Date</th>
                                                <th>Staff Name</th>
                                                <th>Educational Attainment</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // Check if there are any archived staff
                                        if (mysqli_num_rows($result) > 0) {
                                            // Loop through each row of data
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo '<td>' . $row['staff_id'] . '</td>';
                                                echo '<td>' . date('d/m/Y', strtotime($row['joinDate'])) . '</td>';
                                                echo '<td>' . $row['firstName'] . ' ' . $row['lastName'] . '</td>';
                                                echo '<td>' . $row['educ_attainment'] . '</td>';
                                                echo '<td>' . $row['mobile'] . '</td>';
                                                echo '<td>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton' . $row['staff_id'] . '" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-right" aria-labelledby="dropdownMenuButton' . $row['staff_id'] . '">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="restoreStaff(' . $row['staff_id'] . ')">Restore</a></li>
                                                                    <li><a class="dropdown-item text-danger" href="javascript:void(0);" onclick="deleteStaff(' . $row['staff_id'] . ')">Delete Permanently</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>No archived staff found</td></tr>";
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
                $(document).ready(function() {
                    $('#example5').DataTable();
                });

                function restoreStaff(staff_id) {
                    if (confirm('Are you sure you want to restore this staff member?')) {
                        $.ajax({
                            url: 'restore_staff.php',
                            type: 'POST',
                            data: { staff_id: staff_id },
                            success: function(response) {
                                var result = JSON.parse(response);
                                alert(result.message);
                                if (result.status === 'success') {
                                    location.reload();  // Reload the page to reflect changes
                                }
                            },
                            error: function(xhr, status, error) {
                                alert('An error occurred while trying to restore the staff member.');
                            }
                        });
                    }
                }

                function deleteStaff(staff_id) {
                    if (confirm('Are you sure you want to delete this staff member permanently?')) {
                        $.ajax({
                            url: 'delete_permanently.php',
                            type: 'POST',
                            data: { staff_id: staff_id },
                            success: function(response) {
                                var result = JSON.parse(response);
                                alert(result.message);
                                if (result.status === 'success') {
                                    location.reload();  // Reload the page to reflect changes
                                }
                            },
                            error: function(xhr, status, error) {
                                alert('An error occurred while trying to delete the staff member.');
                            }
                        });
                    }
                }
            </script>
        </div>
        <!--**********************************
            Main wrapper end
        ***********************************-->
    </body>
</html>
