<?php

require('./Server.php');

if (!empty(filter_input(INPUT_POST, 'btn') == 0)) {

    $user_name = filter_input(INPUT_POST, 'uname');
    $fisrt_name = filter_input(INPUT_POST, 'fname');
    $last_name = filter_input(INPUT_POST, 'lname');
    $gender = filter_input(INPUT_POST, 'gen');
    $email_add = filter_input(INPUT_POST, 'emm');
    $password = filter_input(INPUT_POST, 'pass');
    $branch = filter_input(INPUT_POST, 'brann');
    $status = filter_input(INPUT_POST, 'stu');
    $user_type = filter_input(INPUT_POST, 'typ');


    $sql= "insert into user_registration(username,fname,lname,gender,email,password,branch,status,user_type) values "
            . "('$user_name','$fisrt_name', '$last_name', '$gender','$email_add','$password','$branch','$status','$user_type')";

    if (mysqli_query($connection, $sql)) {
        echo "<script type='text/javascript'>alert('New record created successfully !')</script>";
        require('./Super_adminadduser.php');
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($connection);
    }
    mysqli_close($connection);
}

