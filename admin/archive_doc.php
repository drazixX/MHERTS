<?php include './connection/conn.php'; ?>
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
                include('./connection/conn.php');
                // Perform query to fetch archived doctors data
                $query = "SELECT * FROM archive_doctor";
                $result = mysqli_query($conn, $query);
                ?>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="example5" class="table table-striped patient-list mb-4 dataTablesCard fs-14">
                                        <thead>
                                            <tr>
                                                <th>Doctors ID</th>
                                                <th>Date Join</th>
                                                <th>Doctor Name</th>
                                                <th>Specialist</th>
                                                <th>Contact</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // Check if there are any archived doctors
                                        if (mysqli_num_rows($result) > 0) {
                                            // Loop through each row of data
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo '<td>' . $row['DoctorID'] . '</td>';
                                                echo '<td>' . date('d/m/Y', strtotime($row['JoinDate'])) . '</td>';
                                                echo '<td>' . $row['Title'] . ' ' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
                                                echo '<td>' . $row['Specialization'] . '</td>';
                                                echo '<td>' . $row['Mobile'] . '</td>';
                                                echo '<td>' . getStatusBadge($row['Status']) . '</td>';
                                                echo '<td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="dropdown ms-auto c-pointer text-end">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    </svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="restoreDoctor(' . $row['DoctorID'] . ')">Restore</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="deleteDoctor(' . $row['DoctorID'] . ')">Delete Permanently</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>No archived doctors found</td></tr>";
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

                <script>
                    $(document).ready(function() {
                        $('#example5').DataTable();
                    });

                    function restoreDoctor(doctorId) {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "restore_doctor.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    alert("Doctor restored successfully.");
                                    location.reload();
                                } else {
                                    alert("Failed to restore doctor: " + response.message);
                                }
                            }
                        };

                        xhr.send("doctorId=" + doctorId);
                    }

                    function deleteDoctor(doctorId) {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "delete_doctor.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    alert("Doctor deleted permanently.");
                                    location.reload();
                                } else {
                                    alert("Failed to delete doctor: " + response.message);
                                }
                            }
                        };

                        xhr.send("doctorId=" + doctorId);
                    }
                </script>

                <?php
                function getStatusBadge($status) {
                    if ($status == 'Unavailable') {
                        return "<span class='text-danger font-w600'>Unavailable</span>";
                    } elseif ($status == 'Available') {
                        return "<span class='text-success font-w600'>Available</span>";
                    } elseif ($status == 'Resigned') {
                        return "<span class='text-warning font-w600'>Resigned</span>";
                    } else {
                        return "<span class='font-w600'>" . $status . "</span>";
                    }
                }
                ?>
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
        </div>
        <!--**********************************
            Main wrapper end
        ***********************************-->
    </body>
</html>
