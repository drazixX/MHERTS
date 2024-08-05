<?php include './connection/conn.php';?>
<?php
session_start();
	$user = $_SESSION['username'];
	$query = "SELECT * FROM tbl_users WHERE NOT username='$user' ORDER BY `created_at` DESC";
    $result = $conn->query($query);

    $users = array();
	while($row = $result->fetch_assoc()){
		$users[] = $row; 
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
					System User					</div>
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
				<li class="breadcrumb-item active"><a href="javascript:void(0)">System User</a></li>
			</ol>
		</div>

        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                <?php echo $_SESSION['message']; ?>
            </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif ?>

		<!-- Alert Container -->
		<div id="alertContainer" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11"></div>
		
		<div class="form-head d-flex mb-3 mb-md-4 align-items-start">
			<div class="me-auto d-none d-lg-block">
				<a href="javascript:void(0);" class="btn btn-primary btn-rounded add-patient" data-bs-toggle="modal" data-bs-target="#userModal">+ Add New User</a>
				<!-- <a href="https://eres.dexignzone.com/codeigniter/demo/patient_details" class="btn btn-primary btn-rounded">+ Add New</a> -->
			</div>
			
			<!-- <div class="input-group search-area ms-auto d-inline-flex me-3">
				<input type="text" class="form-control" id="searchInput" placeholder="Search here">
				<div class="input-group-append">
					<button type="button" class="input-group-text" onclick="searchTable()"><i class="fas fa-search"></i></button>
				</div>
			</div> -->

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
                                            <input type="checkbox" class="form-check-input" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </div>
                                </th>
                                <th scope="col">No.</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Username</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($users)): ?>
                                <?php $no=1; foreach($users as $row): ?>
                                <tr>
                                    <td>
                                        <div class="checkbox text-end align-self-center">
                                            <div class="form-check custom-checkbox">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox1" required>
                                                <label class="form-check-label" for="customCheckBox1"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $no ?></td>
                                    <td>
                                        <div class="avatar avatar-xs">
                                            <?php
                                            // Check if 'avatar' field contains base64 data or file path
                                            $avatarSrc = preg_match('/data:image/i', $row['avatar'])
                                                ? $row['avatar']
                                                : (file_exists('public/assets/images/uploads/'.$row['avatar'])
                                                    ? 'public/assets/images/uploads/'.$row['avatar']
                                                    : '/admin/public/assets/images/uploads/scv20220407_175858.png'); // Default image if file not found
                                            ?>
                                            <img src="<?= $avatarSrc ?>" height="50px" width="50px" alt="User Profile" class="avatar-img rounded-circle">
                                        </div>
                                    </td>
                                    <td><?= ucwords($row['username']) ?></td>
                                    <td><?= $row['user_type'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href='#' data-bs-toggle="modal" data-bs-target="#userModal" class='me-3'>
                                                <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                    <path d='M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z' stroke='#3E4954' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                                                </svg>
                                            </a>
                                            <a type="button" data-toggle="tooltip" href="functions/remove_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?');" data-original-title="Remove">
                                                <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                    <path d='M3 6H5H21' stroke='#F46B68' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                                                    <path d='M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z' stroke='#F46B68' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++; endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No Available Data</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add New User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/save_user.php" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="row">
                        <div class="text-center">
                            <div id="my_camera" style="height: 250px; border-radius: 50%; overflow: hidden;" class="text-center">
                                <img src="./public/assets/images/uploads/person.png" alt="..." class="img-profile rounded-circle" width="250">
                                <br>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="button" class="btn btn-danger btn-sm mr-2" id="open_cam">Open Camera</button>
                                <button type="button" class="btn btn-secondary btn-sm ml-2" id="capture_photo">Capture</button>   
                            </div>
                            <div id="profileImage">
                                <input type="hidden" name="profileimg" id="profileimg">
                                <canvas id="canvas" style="display: none;"></canvas>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="img" accept="image/*">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="username" class="col-form-label">Username:</label>
                                <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Email:</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="pass" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="col-form-label">User Type:</label>
                                <select class="form-control" id="pillSelect" required name="user_type">
                                    <option disabled selected>Select User Type</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Administrator">Administrator</option>
                                </select>
                            </div>
                        </div>                
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save New User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include JavaScript for camera functionality -->
<script>
    document.getElementById('open_cam').addEventListener('click', function() {
        const video = document.createElement('video');
        video.style.width = '250px';
        video.style.height = '250px';
        video.style.borderRadius = '50%';
        video.autoplay = true;

        const cameraDiv = document.getElementById('my_camera');
        cameraDiv.innerHTML = ''; // Clear previous content
        cameraDiv.appendChild(video);

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
                window.localStream = stream; // Save the stream to stop it later
            })
            .catch(err => console.error('Error accessing the camera: ', err));
    });

    document.getElementById('capture_photo').addEventListener('click', function() {
        const video = document.querySelector('#my_camera video');
        if (!video) {
            alert('Please open the camera first.');
            return;
        }

        const canvas = document.getElementById('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Stop the camera stream
        const stream = window.localStream;
        if (stream) {
            const tracks = stream.getTracks();
            tracks.forEach(track => track.stop());
        }

        // Show the captured image
        const image = canvas.toDataURL('image/png');
        const cameraDiv = document.getElementById('my_camera');
        cameraDiv.innerHTML = `<img src="${image}" alt="Captured Image" class="img-profile rounded-circle" width="250">`;

        // Save the image data to a hidden input field
        document.getElementById('profileimg').value = image;

        // Convert the base64 data to a Blob and prepare it for upload
        const blob = dataURLToBlob(image);
        const file = new File([blob], "profile_image.png", { type: 'image/png' });

        // Create FormData to send the image
        const formData = new FormData();
        formData.append('img', file);

        // Send image data to the server
        fetch('functions/upload_image.php', {
            method: 'POST',
            body: formData
        }).then(response => response.text())
          .then(result => console.log('Image upload result:', result))
          .catch(error => console.error('Error uploading image:', error));
    });

    // Helper function to convert base64 data to a Blob
    function dataURLToBlob(dataURL) {
        const byteString = atob(dataURL.split(',')[1]);
        const mimeString = dataURL.split(',')[0].split(':')[1].split(';')[0];
        const ab = new ArrayBuffer(byteString.length);
        const ia = new Uint8Array(ab);
        for (let i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }
        return new Blob([ab], { type: mimeString });
    }
</script>





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
            <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    	
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script>
		<script>
	(function($){
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

	
</script>
<script src="../public/assets/js/script.js"></script>


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>