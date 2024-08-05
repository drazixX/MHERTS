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
	Header Start
***********************************--> 
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
					Email Read				</div>
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Email</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Read</a></li>
            </ol>
        </div>
        <!-- row -->
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-xxl-4  email-left-body">
                                <div class="generic-width px-0 mb-5 mt-4 mt-sm-0">
                                    <div class="p-0">
                                        <a href="email_compose.php" class="btn btn-primary btn-block">Compose</a>
                                    </div>
                                    <div class="mail-list rounded mt-4">
                                        <a href="email_inbox.php" class="list-group-item active">
                                            <i class="fa fa-inbox font-18 align-middle me-2"></i> Inbox
                                            <span class="badge badge-light badge-sm float-end">198</span>
                                        </a>
                                        <a href="javascript:void()" class="list-group-item">
                                            <i class="fa fa-paper-plane font-18 align-middle me-2"></i>Sent
                                        </a>
                                        <a href="javascript:void()" class="list-group-item">
                                            <i class="fa fa-star font-18 align-middle me-2"></i>Important
                                            <span class="badge badge-danger badge-sm text-white float-end">47</span>
                                        </a>
                                        <a href="javascript:void()" class="list-group-item">
                                            <i class="mdi mdi-file-document-box font-18 align-middle me-2"></i>Draft
                                        </a>
                                        <a href="javascript:void()" class="list-group-item">
                                            <i class="fa fa-trash font-18 align-middle me-2"></i>Trash
                                        </a>
                                    </div>
                                    <div class="mail-list rounded overflow-hidden mt-4">
                                        <div class="intro-title d-flex my-0 justify-content-between">
                                            <h5>Categories</h5>
                                        </div>
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_inbox" class="list-group-item">
                                            <span class="icon-warning">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </span>
                                            Work
                                        </a>
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_inbox" class="list-group-item">
                                            <span class="icon-primary">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </span>
                                            Private
                                        </a>
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_inbox" class="list-group-item">
                                            <span class="icon-success">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </span>
                                            Support
                                        </a>
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_inbox" class="list-group-item">
                                            <span class="icon-dpink">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </span>
                                            Social
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-xxl-8">
                                <div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="right-box-padding">
                                                <div class="toolbar mb-4" role="toolbar">
                                                    <div class="btn-group mb-1">
                                                        <button type="button" class="btn btn-primary light px-3"><i class="fa fa-archive"></i></button>
                                                        <button type="button" class="btn btn-primary light px-3"><i class="fa fa-exclamation-circle"></i></button>
                                                        <button type="button" class="btn btn-primary light px-3"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <div class="btn-group mb-1">
                                                        <button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown">
                                                            <i class="fa fa-folder"></i> <b class="caret m-l-5"></b>
                                                        </button>
                                                        <div class="dropdown-menu"> 
                                                            <a class="dropdown-item" href="javascript:void(0);">Social</a> 
                                                            <a class="dropdown-item" href="javascript:void(0);">Promotions</a> 
                                                            <a class="dropdown-item" href="javascript:void(0);">Updates</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Forums</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group mb-1">
                                                        <button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown">
                                                            <i class="fa fa-tag"></i> <b class="caret m-l-5"></b>
                                                        </button>
                                                        <div class="dropdown-menu"> 
                                                            <a class="dropdown-item" href="javascript:void(0);">Updates</a> 
                                                            <a class="dropdown-item" href="javascript:void(0);">Social</a> 
                                                            <a class="dropdown-item" href="javascript:void(0);">Promotions</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Forums</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group mb-1">
                                                        <button type="button" class="btn btn-primary light dropdown-toggle v" data-bs-toggle="dropdown">
                                                            More <span class="caret m-l-5"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);">Mark as Unread</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Add to Tasks</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Add Star</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Mute</a>
                                                        </div>
                                                    </div>
                                                    <div class="email-tools-box float-end">
                                                        <i class="fa-solid fa-list-ul"></i>
                                                    </div>
                                                </div>
                                                <div class="read-content">
                                                    <div class="media pt-3 d-sm-flex d-block justify-content-between">
                                                        <div class="clearfix mb-3 d-flex">
                                                            <img class="me-3 rounded" width="70" height="70" alt="image" src="https://eres.dexignzone.com/codeigniter/demo/public/assets/images/avatar/1.jpg">
                                                            <div class="media-body me-2">
                                                                <h5 class="text-primary mb-0 mt-1">Ingredia Nutrisha</h5>
                                                                <p class="mb-0">20 May 2020</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix mb-3">
                                                            <a href="javascript:void()" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-reply"></i> </a>
                                                            <a href="javascript:void()" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-arrow-right"></i> </a>
                                                            <a href="javascript:void()" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="media mb-2 mt-3">
                                                        <div class="media-body"><span class="float-end">07:23 AM</span>
                                                            <h5 class="my-1 text-primary">A collection of textile samples lay spread</h5>
                                                            <p class="read-content-email">To: Me, info@example.com</p>
                                                        </div>
                                                    </div>
                                                    <div class="read-content-body">
                                                        <h5 class="mb-4">Hi,Ingredia,</h5>
                                                        <p class="mb-2"><strong>Ingredia Nutrisha,</strong> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</p>
                                                        <p class="mb-2">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for
                                                            the far World of Grammar. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                                                        </p>
                                                        <p class="mb-2">Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut
                                                            metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                                                            rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                                        <h5 class="pt-3">Kind Regards</h5>
                                                        <p>Mr Smith</p>
                                                        <hr>
                                                    </div>
                                                    <div class="read-content-attachment">
                                                        <button class="btn btn-secondary btn-sm"><i class="fa-solid fa-reply me-1"></i>Reply</button>
                                                        <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-forward me-1"></i>Forward</button>
                                                    </div>
                                                    <hr>
                                                    <div class="mb-3 pt-3">
                                                        <textarea name="write-email" id="write-email" cols="30" rows="5" class="form-control" placeholder="It's really an amazing.I want to know more about it..!"></textarea>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-primary " type="button">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
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
    <script> var base_url = 'https://eres.dexignzone.com/codeigniter/demo/';</script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/global/global.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		

		
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/custom.min.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/deznav-init.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/demo.js"></script>
			<script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/js/styleSwitcher.js"></script>
		<script>
    $(".email-tools-box").on('click', function(){
    $(' .email-left-body ,.email-tools-box').toggleClass("active");
    });    
</script>


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>
</html>