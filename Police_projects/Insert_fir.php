<?php

require('./Server.php');

if (!empty(filter_input(INPUT_POST, 'btn_one') == 0)) {


    $points = filter_input(INPUT_POST, 'cdetails');
    $c_position = filter_input(INPUT_POST, 'cplace');
    $p_type = filter_input(INPUT_POST, 'cstatus');
    $c_work = filter_input(INPUT_POST, 'cctiezen');
    $pid = filter_input(INPUT_POST, 'ccomplain');

    $sql = "insert into fir_details(details,date,place,status,user_registration_id,complain_details_idcomplain) values "
            . "('$points',CURRENT_TIMESTAMP(),'$c_position', '$p_type', '$c_work','$pid')";

    if (mysqli_query($connection, $sql)) {
        echo "<script type='text/javascript'>alert('New record created successfully !')</script>";
        require('./Super_adminfir.php');
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($connection);
    }
    mysqli_close($connection);
}