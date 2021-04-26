<!DOCTYPE html>

<?php
require_once './Server.php';
$uid = filter_input(INPUT_GET, 'id');
$query = " select * from complain_details where idcomplain='" . $uid . "'";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $uid = $row['idcomplain'];
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

                            
                        </ul>
                    </nav>
                    <!-- Topbar -->


                    <!-- Container Fluid-->
                    <div class="container-fluid" id="container-wrapper">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Update Complaints</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Complaints</li>
                            </ol>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Form Basic -->
                                <div class="card mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Update Complaints</h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Complaints Id</label>
                                                <input type="text" class="form-control" name="id" value="<?php echo $uid ?>" aria-describedby="emailHelp"
                                                       >

                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Complaints Remark</label>
                                                <textarea class="form-control" name="remark" rows="3"></textarea>
                                            </div>

                                            <p>Status</p>
                                            <select class="form-control mb-3" name="stu">
                                                <option>inprocess</option>
                                                <option>close</option>
                                            </select>

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
    $mark = filter_input(INPUT_POST, 'remark');
    $lname = filter_input(INPUT_POST, 'stu');


    $query = mysqli_query($connect, "insert into complain_remark(remark,remark_date,status,complain_details_idcomplain) values('$mark',CURRENT_TIMESTAMP(),'$lname','$id')");
    $sql = mysqli_query($connect, "update complain_details set status='$lname' where idcomplain='$id'");

    // mysql query to Update data 
    echo "<script type='text/javascript'>alert('New record created successfully !')</script>";

    mysqli_close($connect);
}
?>