<?php

require('./Server.php');

if (!empty(filter_input(INPUT_POST, 'btn_one') == 0)) {


    $points = filter_input(INPUT_POST, 'pgen');
    $c_position = filter_input(INPUT_POST, 'cgen');
    $p_type = filter_input(INPUT_POST, 'tgen');
    $c_work = filter_input(INPUT_POST, 'cwork');
    $pid = filter_input(INPUT_POST, 'gen');

    $sql = "insert into officer_promotion(points,current_position,promotion_type,complete_work,date,user_registration_id) values "
            . "('$points','$c_position', '$p_type', '$c_work',CURRENT_TIMESTAMP(),'$pid')";

    if (mysqli_query($connection, $sql)) {
        echo "<script type='text/javascript'>alert('New record created successfully !')</script>";
        require('./Super_adminPromotion.php');
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($connection);
    }
    mysqli_close($connection);
}