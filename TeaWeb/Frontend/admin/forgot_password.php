<!doctype html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="assets/headLogos/h1.png">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">CEYMOS LANKA (PVL) LTD<br></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-4 p-md-5">
                        <h3 class="mb-4 text-center">Forgot Password</h3>

                        <form action="reset_password.php" method="POST" class="signin-form">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                            </div>

                            <div class="form-group">
                                <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" required>
                            </div>

                            <div class="form-group">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Reset Password</button>
                            </div>

                            <div class="form-group d-md-flex">
                                <div class="w-100 text-md-right">
                                    <a href="admin_login.php" style="color: #fff;">Back to Login</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
