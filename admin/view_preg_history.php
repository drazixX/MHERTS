<?php include './connection/conn.php' ?>
<?php
session_start();
	$user = $_SESSION['username'];
	$query = "SELECT * FROM tbl_users WHERE NOT username='$user' ORDER BY `created_at` DESC";
    $result = $conn->query($query);

if(isset($_GET['FamilyRec_Id']) && isset($_GET['history_id']) && isset($_GET['folder_name'])) {
    $FamilyRec_id = $_GET['FamilyRec_Id'];
    $history_id = $_GET['history_id'];
    $folderName = $_GET['folder_name'];

    // Prepare SQL query to fetch files based on FamilyRec_id and history_id
    $query = "SELECT * FROM preg_files WHERE FamilyRec_Id = ? AND history_id = ? ORDER BY date_of_insertion DESC";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind the parameters
    $stmt->bind_param("ii", $FamilyRec_id, $history_id);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if query was successful
    if ($result) {
        $files = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        // Query failed, handle error
        echo "Error: " . $conn->error;
        // Initialize $files as empty array
        $files = array();
    }
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
	
	<link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="public/assets/images/favicon.png">	
	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>	
			
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>		
	
    <link class="main-css" href="public/assets/css/style.css" rel="stylesheet" type="text/css"/>	
    <!-- <link class="main-css" href="public/assets/css/styles.css" rel="stylesheet" type="text/css"/>	 -->


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link href="public/assets/vendor/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>	
    <link href="public/assets/vendor/dropzone/dist/modal.css" rel="stylesheet" type="text/css"/>

    <!-- Include jQuery and jQuery UI libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	



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
					Pregnancy History					</div>
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
				<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="patient_list.php">Patient Detailes</a></li>
				<li class="breadcrumb-item"><a href="patient_details.php?FamilyRec_Id=<?php echo isset($_GET['FamilyRec_Id']) ? htmlspecialchars($_GET['FamilyRec_Id']) : ''; ?>">Pregnancy History</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)"  id="folderName1"></a></li>
			</ol>
		</div>

		<!-- Alert Container -->
		<div id="alertContainer" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11"></div>

		<div class="form-head d-flex mb-3 mb-md-4 align-items-center">
			<div class="ms-auto">
				<!-- <a href="javascript:void(0);" class="btn btn-primary btn-rounded add-patient" data-bs-toggle="modal" data-bs-target="#patientModal">+ Add New Patients</a> -->
				<a href="javascript:void(0);" class="btn btn-primary btn-rounded add-patient"  data-bs-toggle="modal" data-bs-target="#addDocuModal">+ Add Documents</a>
			</div>
		</div>

        <div class="row">
            <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 id = "folderName2" class="card-title"></h4>
                                <div class="btn-group mb-3" role="group" aria-label="Display Mode">
                                    <button type="button" class="btn  grid-btn" data-layout="grid active" title="Grid View">
                                        <i class="fas fa-th-large"></i>
                                    </button>
                                    <button type="button" class="btn  table-btn" data-layout="table" title="List View">
                                        <i class="fas fa-list"></i>
                                    </button>
                                </div>
                            </div>
                        <div class="card-body">
                        <?php
                            if(isset($_GET['upload_status'])) {
                                $uploadStatus = json_decode(urldecode($_GET['upload_status']), true);
                                if(is_array($uploadStatus) && !empty($uploadStatus)) {
                                    foreach ($uploadStatus as $index => $status) {
                                        // Generate unique ID for each alert
                                        $alertId = 'alert_' . $index;
                            ?>
                            <div class="alert alert-<?php echo strpos($status, 'uploaded successfully') !== false ? 'success' : 'danger'; ?>" role="alert" id="<?php echo $alertId; ?>">
                                <?php echo $status; ?>
                            </div>
                            <script>
                                // Automatically hide the alert after 3 seconds
                                setTimeout(function() {
                                    var alertElement = document.getElementById('<?php echo $alertId; ?>');
                                    alertElement.classList.add('hidden');
                                    setTimeout(function() {
                                        alertElement.remove();
                                    }, 3000); // Wait for the transition to complete before removing the element
                                }, 5000); // Adjust timeout as needed
                            </script>
                            <?php
                                    }
                                }
                            }
                            ?>
                            <div id="table-display" class="table-responsive">
                                <table id="example2" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Date Modified</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($files)) : ?>
                                            <?php $no = 1; foreach ($files as $row) : ?>

                                        <tr>
                                            <td><?= $no ?></td>
                                            <td class="file-name"><?= pathinfo($row['file_name'], PATHINFO_FILENAME) ?></td>
                                            <td><?= $row['file_type'] ?></td>
                                            <td><?= $row['file_size'] ?></td>
                                            <td><?= $row['date_of_insertion'] ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= $row['save_path'] ?>" target="_blank">
                                                        <i class="fas fa-eye" style="width: 24px; height: 24px;"></i>
                                                    </a>


                                                        
                                                    <a href='javascript:void(0);' type='button' onclick='showArchiveConfirmation(<?= $row['file_id'] ?>)'>
                                                        <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                            <path d='M3 6H5H21' stroke='#F46B68' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                                                            <path d='M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z' stroke='#F46B68' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                                                        </svg>
                                                    </a>
                                                    

                                                </div>
                                            </td>
                                        </tr>
                                        <?php $no++;
                                            endforeach ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8" class="text-center">No available files.</td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Date Modified</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>

                                <!-- Delete Modal -->
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
                                                 <!-- Alert container -->
                                                <div id="alertContainer" class="mt-3"></div>
                                                <form id="deleteForm1" action="functions/remove_file.php" method="GET">
                                                    <input type="hidden" id="FamilyRec_Id1" name="FamilyRec_Id" value="">
                                                    <input type="hidden" id="history_id1" name="history_id" value="">
                                                    <input type="hidden" id="folder_name1" name="folder_name" value="">
                                                    <input type="hidden" name="file_id" id="file_id1" value="">
                                                </form>
                                                <button type='button' class='btn btn-danger light' data-bs-dismiss='modal'>Cancel</button>
                                                <button type='button' class='btn btn-primary' id='confirmDelete1'>Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal End -->

                            </div>

                            <!-- For Grid View Display -->
                        <style>
                            .file-name {
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                max-width: 200px;
                            }
                            /* Grid item */
                            .grid-item {
                                background-color: #f0f4f9; /* Background color */
                                border-radius: 20px; /* Border radius */
                                transition: background-color 0.3s ease; /* Smooth transition */
                            }
                            /* Top section */
                            .top-section {
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                padding: 10px;
                                /* border-bottom: 1px solid #ccc; */
                            }
                        </style>
                        <div id="grid-display" class="grid-container">
                            <?php foreach ($files as $row) : ?>
                                <div class="grid-item">
                                    <!-- Top section: file type icon and file name -->
                                    <div class="top-section">
                                        <div class="file-icon">
                                            <?php if ($row['file_type'] === 'pdf') : ?>
                                                <i class="fas fa-file-pdf"></i>
                                            <?php elseif ($row['file_type'] === 'image') : ?>
                                                <i class="fas fa-image"></i>
                                            <?php else : ?>
                                                <i class="fas fa-file"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div class="file-name"><?= pathinfo($row['file_name'], PATHINFO_FILENAME) ?></div>
                                        
                                        <div class="dropdown ms-auto c-pointer text-end aa">
                                            <div class="btn-link" data-bs-toggle="dropdown">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item delete-file-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-history-id="<?php echo htmlspecialchars($row['history_id']); ?>" data-family-rec-id="<?php echo htmlspecialchars($FamilyRec_id); ?>" data-folder-name="<?php echo htmlspecialchars($folderName); ?>" data-file-id="<?php echo $row ['file_id']; ?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Middle section: file preview -->
                                    <div class="middle-section">
                                        <!-- File preview image -->
                                        <a href="<?= $row['save_path']?>" target="_blank">
                                            <img src="./public/assets/documents/img1.png" alt="File Preview" class="img-btn" style="border-radius: 20px;">
                                        </a>
                                        <!-- <img src="data:image/jpeg;base64,<?php echo $previewBase64; ?>" alt="Preview"> -->
                                    </div>
                                    <!-- Bottom section: uploader's image and upload date -->
                                    <div class="bottom-section">
                                        <!-- Uploader's image -->
                                        <!-- <div class="uploader-image">
                                            <img src="<?= $row['uploader_image_url'] ?>" alt="Uploader's Image">
                                        </div> -->
                                        <!-- Upload date -->
                                        <div class="upload-date">You uploaded: <?= $row['date_of_insertion'] ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                         <!-- Delete Modal -->
                        <div class='modal fade' id='deleteModal'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Confirm Deletion</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                    </div>
                                    <div class='modal-body'>
                                        Are you sure you want to archive this file?
                                    </div>
                                    <div class='modal-footer'>
                                        <form id="deleteForm" action="functions/archive_file.php" method="GET">
                                            <input type="hidden" id="FamilyRec_Id" name="FamilyRec_Id" value="">
                                            <input type="hidden" id="history_id" name="history_id" value="">
                                            <input type="hidden" id="folder_name" name="folder_name" value="">
                                            <input type="hidden" name="file_id" id="file_id" value="">
                                        </form>
                                        <button type='button' class='btn btn-danger light' data-bs-dismiss='modal'>Cancel</button>
                                        <button type='button' class='btn btn-primary' id='confirmDelete'>Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal End -->


                        </div>
                    </div>
                </div>
            </div>


    

   <!-- Add Pregnancy Info Modal -->
    <div class="modal fade" id="addDocuModal" tabindex="-1" aria-labelledby="addDocuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocuModalLabel">Upload Files</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-4"><i class="fa fa-paperclip"></i> Attachment</h5>

                     <!-- Alert area inside the modal body -->
                    <div id="alertContainer"></div>

                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="familyrec_id" name="familyrec_id" value="<?php echo isset($_GET['FamilyRec_Id']) ? htmlspecialchars($_GET['FamilyRec_Id']) : ''; ?>">
                        <input type="hidden" id="history_id" name="history_id" value="<?php echo htmlspecialchars($_GET['history_id']); ?>">
                        <input type="hidden" id="folder_name" name="folder_name" value="<?php echo isset($_GET['folder_name']) ? htmlspecialchars($_GET['folder_name']) : ''; ?>">
                        
                        <div id="fileInputsContainer">
                            <div class="col-xl-12 file-input-wrapper">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Choose file</label>
                                    <input class="form-control form-control-sm" type="file" id="formFile" name="FormFile[]">
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" id="addFileInput" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i> Add Another File</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->




    <!-- Modal or overlay element to display the PDF content -->
    <div id="pdfModal" class="modal">
        <div class="modal-content">
            <div class='modal-header'>
                <h5 class='modal-title'><?= $file_name ?></h5>
                <!-- <button type='button' class='btn-close close' data-bs-dismiss='modal'></button> -->
                <span class="close">&times;</span>
            </div>
            <!-- <span class="close">&times;</span> -->
            <iframe id="pdfViewer" type="application/pdf" width="100%" height="100%"></iframe>
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
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/chart.js/chart.bundle.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/owl-carousel/owl.carousel.js"></script>
            <!-- <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script> -->
    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<!-- <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script> -->

            
	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/js/dataTables.responsive.min.js"></script>
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/plugins-init/datatables.init.js"></script>

	        <script src="public/assets/vendor/dropzone/dist/dropzone.js"></script>

		<script>
	(function($){
		var table = $('#example5').DataTable({
			searching: true,
			paging:false,
			select: false,
			lengthChange:false
		});
		$('#example tbody').on('click', 'tr', function () {
			var data = table.row( this ).data();
		});
	})(jQuery);

    // Retrieve the folder_name value from the URL query parameters
    var urlParams = new URLSearchParams(window.location.search);
    var folderName = urlParams.get('folder_name');

    // Concatenate " Files" to the folder name
    var folderNameWithFiles = folderName + " Files";

    // Set the folderNameWithFiles as the text content of the h4 tag
    document.getElementById('folderName1').textContent = folderNameWithFiles;
    document.getElementById('folderName2').textContent = folderNameWithFiles;


    // Manuever if Grid or Table Display
    $(document).ready(function() {
    $('#table-display').hide();

        // Switch to grid view
        $('.grid-btn').click(function() {
            $(this).addClass('active');
            $('.table-btn').removeClass('active');
            $('#grid-display').show();
            $('#table-display').hide();
        });

        // Switch to table view
        $('.table-btn').click(function() {
            $(this).addClass('active');
            $('.grid-btn').removeClass('active');
            $('#table-display').show();
            $('#grid-display').hide();
        });
    });

    // For Image Preview Sana huhu

    document.addEventListener("DOMContentLoaded", function() {
        var fileId = <?= $row['file_id'] ?>; 

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/fetch_preview_image?file_id=" + fileId, true); 
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    var previewImageUrl = response.previewImageUrl;
                    updatePreviewImage(previewImageUrl);
                } else {
                    console.error("Failed to fetch preview image.");
                }
            }
        };
        xhr.send();
    });

    // Function to update the preview image
    function updatePreviewImage(previewImageUrl) {
        var filePreviewImg = document.getElementById("filePreview");
        filePreviewImg.src = previewImageUrl;
    }

    // Delete in Grid View Display

    $(document).ready(function() {
        $('.delete-file-button').click(function() {
            var file_id = $(this).data('file-id');
            var history_id = $(this).data('history-id');
            var FamilyRec_Id = $(this).data('family-rec-id');
            var folder_name = $(this).data('folder-name');

            $('#file_id').val(file_id);
            $('#history_id').val(history_id);
            $('#FamilyRec_Id').val(FamilyRec_Id);
            $('#folder_name').val(folder_name);
        });

        $('#confirmDelete').click(function() {
            $('#deleteForm').submit();
        });
    });

    $(document).ready(function() {
        // Event binding for delete button click
        $('#confirmDelete').click(function() {
            $('#deleteForm').submit();
        });
    });

    // Delete in Table Display

    function showArchiveConfirmation(fileId) {
        // Extracting parameters from URL
        const urlParams = new URLSearchParams(window.location.search);
        const historyId = urlParams.get('history_id');
        const familyRecId = urlParams.get('FamilyRec_Id');
        const folderName = urlParams.get('folder_name');

        // Populate form fields
        $('#file_id1').val(fileId);
        $('#history_id1').val(historyId);
        $('#FamilyRec_Id1').val(familyRecId);
        $('#folder_name1').val(folderName);

        // Show modal
        $('#basicModal').modal('show');

        $('#confirmDelete1').click(function() {
            $('#deleteForm1').submit();

            //  // Show success message in alert container
            // $('#alertContainer').html('<div class="alert alert-success" role="alert">File successfully deleted.</div>');
            
            // // Hide the success message after 3 seconds
            // setTimeout(function() {
            //     $('#alertContainer').empty();
            // }, 3000);
        });
    }

    // Adding Another Input Feilds
    document.getElementById("addFileInput").addEventListener("click", function() {
        var container = document.getElementById("fileInputsContainer");
        var fileInputWrappers = container.getElementsByClassName("file-input-wrapper");

        // Check if the number of input fields is less than 5
        if (fileInputWrappers.length < 5) {
            var newInputWrapper = document.createElement("div");
            newInputWrapper.classList.add("col-xl-12", "file-input-wrapper");
            newInputWrapper.innerHTML = `
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose file</label>
                    <input class="form-control form-control-sm" type="file" id="formFile" name="FormFile[]">
                </div>
            `;
            container.appendChild(newInputWrapper);
        } else {
            var alertContainer = document.getElementById("alertContainer");
            alertContainer.innerHTML = '<div class="alert alert-danger" role="alert">You can only add up to 5 files.</div>';
        }
    });




</script>


<script src="public/assets/js/script.js"></script>
<script src="public/assets/js/view.js"></script>


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>