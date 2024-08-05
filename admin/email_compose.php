
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
	
		
		 <link href="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>	
			
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
					Compose Email			</div>
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Compose</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-xxl-4  email-left-body">
                                <div class="mb-3 mt-4 mt-sm-0">
                                    <div class="p-0">
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_compose" class="btn btn-primary btn-block">Compose</a>
                                    </div>
                                    <div class="mail-list rounded mt-4">
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_inbox" class="list-group-item active"><i
                                                class="fa fa-inbox font-18 align-middle me-2"></i> Inbox <span
                                                class="badge badge-light badge-sm float-end">198</span> </a>
                                        <a href="javascript:void()" class="list-group-item"><i
                                                class="fa fa-paper-plane font-18 align-middle me-2"></i>Sent</a> <a href="javascript:void()" class="list-group-item"><i
                                                class="fas fa-star font-18 align-middle me-2"></i>Important <span
                                                class="badge badge-danger text-white badge-sm float-end">47</span>
                                        </a>
                                        <a href="javascript:void()" class="list-group-item"><i
                                                class="mdi mdi-file-document-box font-18 align-middle me-2"></i>Draft</a><a href="javascript:void()" class="list-group-item"><i
                                                class="fa fa-trash font-18 align-middle me-2"></i>Trash</a>
                                    </div>
                                    <div class="mail-list rounded overflow-hidden mt-4">
                                        <div class="intro-title d-flex justify-content-between my-0">
                                            <h5>Categories</h5>
                                        </div>
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_inbox" class="list-group-item"><span class="icon-warning"><i
                                                    class="fa fa-circle"></i></span>
                                            Work </a>
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_inbox" class="list-group-item"><span class="icon-primary"><i
                                                    class="fa fa-circle"></i></span>
                                            Private </a>
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_inbox" class="list-group-item"><span class="icon-success"><i
                                                    class="fa fa-circle"></i></span>
                                            Support </a>
                                        <a href="https://eres.dexignzone.com/codeigniter/demo/email_inbox" class="list-group-item"><span class="icon-dpink"><i
                                                    class="fa fa-circle"></i></span>
                                            Social </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-xxl-8">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title d-sm-none d-block">Email</h4>
                                        <div class="email-tools-box float-end mb-2">	
                                            <i class="fa-solid fa-list-ul"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="compose-content">
                                        <form action="#">
                                            <div class="mb-3">
                                                <input type="text" class="form-control bg-transparent" placeholder=" To:">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control bg-transparent" placeholder=" Subject:">
                                            </div>
                                            <div class="mb-3">
                                                <textarea id="email-compose-editor" class="textarea_editor form-control bg-transparent" rows="8" placeholder="Enter text ..."></textarea>
                                            </div>
                                        </form>
                                        <h5 class="mb-4"><i class="fa fa-paperclip"></i> Attatchment</h5>
                                        <form action="#" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-danger light btn-sl-sm  me-2" type="button"><span class="me-2"><i class="fa fa-times"></i></span>Discard</button>
                                        <button class="btn btn-primary btn-sl-sm" type="button"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Send</button>
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
		

	        <script src="https://eres.dexignzone.com/codeigniter/demo/public/assets/vendor/dropzone/dist/dropzone.js"></script>
    	
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