<?php

require('./Server.php');

if (!empty(filter_input(INPUT_POST, 'user_id') == 0) and ! empty(filter_input(INPUT_POST, 'user_id') == 0)) {

// Assigning POST values to variables.
    $username = filter_input(INPUT_POST, 'user_id');
    $password = filter_input(INPUT_POST, 'user_pass');

// CHECK FOR THE REaCORD FROM TABLE
    $query = "SELECT * FROM user_registration WHERE username='$username' and password='$password' and status='active' and user_type='admin'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1) {

//echo "Login Credentials verified";

        require('./Super_admincomplaints.php');
        
    } else {
        echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
    }
}


