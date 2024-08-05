<?php
session_start(); // Start the session

// Check if user is already logged in
if (isset($_SESSION['username'])) {
    header('Location: page_login.php'); // Redirect to logged-in page
    exit;
}

// Function to get the current page name
function PageName() {
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

$current_page = PageName();
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>Login - Web-Based Maternal Health Record Tracking System</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="public/assets/images/favicon.png">

    <!-- CSS -->
    <link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css">

    <style>
        footer {
            padding: 30px;
            text-align: center;
        }

        img {
            margin-left: -34px;
        }
    </style>
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form shadow-lg border-0 rounded-lg">
                                    <div class="text-center mb-2">
                                        <img src="public/assets/images/logo.png" alt="logo" style="width: 313px;">
                                    </div>

                                    <!-- Display session message if set -->
                                    <?php if (isset($_SESSION['message'])): ?>
                                        <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= ($_SESSION['success'] == 'danger') ? 'bg-danger text-light' : ''; ?>" role="alert">
                                            <?php echo $_SESSION['message']; ?>
                                        </div>
                                        <?php unset($_SESSION['message']); ?>
                                    <?php endif; ?>

                                    <form action="login_process.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" type="text" placeholder="Username" autocomplete="username" required value="<?php if (isset($_POST['username'])) { echo htmlspecialchars($_POST['username']); } ?>">
                                            <label for="username" class="form-label">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="dz-password" name="password" type="password" placeholder="Password" autocomplete="current-password" required>
                                            <label for="password" class="form-label">Password</label>
                                            <span class="show-pass eye">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        </div>
                                    </form>

                                    <!-- Display login error message if set -->
                                    <?php if (isset($_SESSION["login_error"])): ?>
                                        <div class="alert alert-danger mt-3"><?php echo $_SESSION["login_error"]; ?></div>
                                        <?php unset($_SESSION["login_error"]); ?>
                                    <?php endif; ?>

                                    <footer>&copy; 2024 Maternal Health Record Tracking System.</footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="public/assets/vendor/global/global.min.js"></script>
    <script src="public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="public/assets/js/custom.min.js"></script>
    <script src="public/assets/js/deznav-init.js"></script>
    <script src="public/assets/js/demo.js"></script>
    <script src="public/assets/js/styleSwitcher.js"></script>
</body>

</html>
