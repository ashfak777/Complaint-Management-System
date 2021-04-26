<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="" rel="icon">
        <title>Epolice system - Login</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/ruang-admin.min.css" rel="stylesheet">

    </head>

    <body class="bg-gradient-login">
        <!-- Login Content -->
        <div class="container-login">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card shadow-sm my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                                        </div>
                                        <form method="post" action="./admin_logincheck.php">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="user_id" id="user_id"
                                                       placeholder="Enter Id">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block" name="submit">Login</button>
                                            </div>
                                            <hr>
                                        </form>
                                        <hr>
                                        <select id="foo" class="form-control mb-3">
                                            <option value="">user type</option>
                                            <option value="Super_adminlogin.php">Super Admin</option>
                                            <option value="User_login.php">User</option>
                                        </select>

                                        <script>
                                            document.getElementById("foo").onchange = function () {
                                                if (this.selectedIndex !== 0) {
                                                    window.location.href = this.value;
                                                }
                                            };
                                        </script>




                                        <div class="text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Content -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
    </body>

</html>
