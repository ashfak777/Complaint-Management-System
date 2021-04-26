<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
require_once './Server.php';
$uid = filter_input(INPUT_GET, 'id');
$username = filter_input(INPUT_GET, 'username');
$fname = filter_input(INPUT_GET, 'fname');
$lname = filter_input(INPUT_GET, 'lname');
$gen = filter_input(INPUT_GET, 'gender');
$mobile = filter_input(INPUT_GET, 'mobile');
$email = filter_input(INPUT_GET, 'email');

$query = " select * from user_registration where id='" . $uid . "'";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $uid = $row['id'];
    $username = $row['username'];
    $fname = $row['fname'];
    $lname= $row['lname'];
    $gen = $row['gender'];
    $mobile = $row['mobile'];
    $email = $row['email'];
}
?>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="" rel="icon">
        <title>Epolice System</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/ruang-admin.min.css" rel="stylesheet">
    </head>

    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
                        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon">
                        <img src="">
                    </div>
                    <div class="sidebar-brand-text mx-3">Epolice System</div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item active">
                    <a class="nav-link" href="Super_admincomplaints.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Features
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
                       aria-controls="collapseTable">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Complaints</span>
                    </a>
                    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Complaints</h6>
                            <a class="collapse-item" href="Super_admincomplaints.php">Inprocess Complaints</a>
                            <a class="collapse-item" href="Super_admincomplainsclose.php">Closed Complaints</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
                       aria-controls="collapseForm">
                        <i class="fab fa-fw fa-wpforms"></i>
                        <span>Manage Users</span>
                    </a>
                    <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Manage Users</h6>
                            <a class="collapse-item" href="Super_adminadduser.php">Add Users</a>
                            <a class="collapse-item" href="Super_adminblockuser.php">Block Users</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="Super_adminfir.php">
                        <i class="fas fa-fw fa-palette"></i>
                        <span>Fir Documents</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="Admin_profiletable.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="Super_adminlogin.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- TopBar -->
                    <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                     aria-labelledby="searchDropdown">
                                    <form class="navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                                                   aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <span class="badge badge-warning badge-counter">2</span>
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                                                having.</div>
                                            <div class="small text-gray-500">Udin Cilok · 58m</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/girl.png" style="max-width: 60px" alt="">
                                            <div class="status-indicator bg-default"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
                                                say this to all dogs, even if they aren't good...</div>
                                            <div class="small text-gray-500">Jaenab · 2w</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                </div>
                            </li>
                            
                            
                            
                        </ul>
                    </nav>
                    <!-- Topbar -->


                    <!-- Container Fluid-->
                    <div class="container-fluid" id="container-wrapper">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Admin Profile</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                            </ol>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Form Basic -->
                                <div class="card mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">User Id</label>
                                                <input type="text" class="form-control" name="id" value="<?php echo $uid ?>" aria-describedby="emailHelp"
                                                       >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Username</label>
                                                <input type="text" class="form-control" name="uname" value="<?php echo $username ?>" aria-describedby="emailHelp"
                                                       >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">First Name</label>
                                                <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>" aria-describedby="emailHelp"
                                                       >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Last Name</label>
                                                <input type="text" class="form-control" name="lname" value="<?php echo $lname ?>" aria-describedby="emailHelp"
                                                       >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">gender</label>
                                                <input type="text" class="form-control" name="gender" value="<?php echo $gen ?>" aria-describedby="emailHelp"
                                                       >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">mobile</label>
                                                <input type="text" class="form-control" name="mobile" value="<?php echo $mobile ?>" aria-describedby="emailHelp"
                                                       >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">email</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $email ?>" aria-describedby="emailHelp"
                                                       >
                                            </div>


                                            <button type="submit" name="btn" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--Row-->

                        <!-- Modal Logout -->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to logout?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                        <a href="login.html" class="btn btn-primary">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!---Container Fluid-->
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>copyright &copy; <script> document.write(new Date().getFullYear());</script> - developed by
                                <b><a href="" target="_blank">ashfak</a></b>
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>

    </body>

</html>

<?php
// php code to Update data from mysql database Table

if (!empty(filter_input(INPUT_POST, 'btn') == 0)) {

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "policedb";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    // get values form input text and number

    $id = filter_input(INPUT_POST, 'id');
    $uname = filter_input(INPUT_POST, 'uname');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $gen = filter_input(INPUT_POST, 'gender');
    $mobile = filter_input(INPUT_POST, 'mobile');
    $email = filter_input(INPUT_POST, 'email');

    $sql = mysqli_query($connect, "update user_registration set username='$uname',fname='$fname',lname='$lname',gender='$gen',mobile='$mobile',email='$email' where idcomplain='$id'");

    // mysql query to Update data 
    echo "<script type='text/javascript'>alert('New record created successfully !')</script>";

    mysqli_close($connect);
}
?>
