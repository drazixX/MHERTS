<!--**********************************
    Sidebar start
***********************************-->

<head>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <!-- <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="patient_list.php">Patient</a></li>
                    <li><a href="patient_details.php">Patient Details</a></li>
                    <li><a href="doctor_list.php">Doctor</a></li>
                    <li><a href="doctor_details.php">Doctor Detail</a></li>
                </ul>
            </li> -->
            <li><a href="index.php" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="appointment.php" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-calendar-check"></i>
                    <span class="nav-text">Appointment</span>
                </a>
            </li>
            <li><a  class="has-arrow" href="javascript:void(0);" class="ai-icon has-arrow" aria-expanded="false">
                    <i class="fas fa-hospital-user"></i>
                    <span class="nav-text">Patients Records</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="patient_list.php">Patients</a></li>
                    <li><a href="prenatal.php">Prenatal Records</a></li>
                </ul>
            </li>
            <li><a href="doctor_list.php" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-user-doctor"></i>
                    <span class="nav-text">Midwives</span>
                </a>
            </li>
            <?php if ($_SESSION['user_type'] == 'Administrator') { ?>
            <li>
            <a href="staff.php" class="ai-icon" aria-expanded="false">
            <i class="fas fa-user"></i>
            <span class="nav-text">Staff</span>
            </a>
            </li>
            <?php } ?>
            <!-- <li><a href="app_calendar.php" class="ai-icon" aria-expanded="false">
                    <i class="fas fa-calendar-days"></i>
                    <span class="nav-text">Events</span>
                </a>
            </li> -->
            <?php if ($_SESSION['user_type'] == 'Administrator') {?>
            <li><a  class="has-arrow" href="javascript:void(0);" class="ai-icon has-arrow" aria-expanded="false">
                    <i class="fas fa-archive"></i>
                    <span class="nav-text">Archive</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="archive_app.php">Appointment</a></li>
                    <li><a href="archive_patient.php">Patient</a></li>
                    <li><a href="archive_doc.php">Midwife</a></li>
                    <li><a href="archive_staff.php">Staff</a></li>
                    <li><a href="archive_file.php">Patient Files</a></li>

                    
                </ul>
            </li>
            <?php }?>
            
            <li><a  class="has-arrow" href="javascript:void(0);" class="ai-icon has-arrow" aria-expanded="false">
                    <i class="fas fa-gears"></i>
                    <span class="nav-text">Maintenance</span>
                </a>
                <ul aria-expanded="false">
                <?php if ($_SESSION['user_type'] == 'Administrator') {?>
                    <li><a href="user.php">User</a></li> 
                    <?php }?>
                    <li><a href="./backup/backup.php">Backup</a></li>
                    <li><a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#restore">Restore</a></li>
                </ul>
            </li>

            
            
    
        <!-- <div class="plus-box">
            <p class="fs-16 font-w500 mb-1">Check your job schedule</p>
            <a class="text-white fs-26" href="javascript:;"><i class="las la-long-arrow-alt-right"></i></a>
        </div>
        <div class="copyright">
            <p class="fs-14 font-w200"><strong class="font-w400">Eres Hospital Admin Dashboard</strong> © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignZone</p>
        </div> -->
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************--> 

<div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restore Database</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./functions/restore.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                    <div class="form-group form-floating-label">
                        <label>Upload Sql file</label>
                        <input type="file" class="form-control" accept=".sql" name="backup_file" required="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Restore</button>
            </div>
            </form>
            
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger light" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
