<?php

require('./Server.php');

if (!empty(filter_input(INPUT_POST, 'user_id') == 0) and ! empty(filter_input(INPUT_POST, 'user_id') == 0)) {


    $username = filter_input(INPUT_POST, 'user_id');
    $password = filter_input(INPUT_POST, 'user_pass');


    $query = "SELECT id,fname,lname FROM user_registration WHERE username='$username' and Password='$password' and status='active' and user_type='officer'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1) {


        
        require('./User_home.php');
    } else {
        echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";

    }
}
