<?php

require_once './connect.php';

$response = array();

if (!empty(filter_input(INPUT_GET, 'apicall') == 0)) {

    switch (filter_input(INPUT_GET, 'apicall')) {

        case 'signup':
            if (isTheseParametersAvailable(array('username', 'email', 'password', 'gender'))) {

                $username = filter_input(INPUT_POST, 'username');
                $email = filter_input(INPUT_POST, 'email');
                $password = md5(filter_input(INPUT_POST, 'password'));
                $gender = filter_input(INPUT_POST, 'gender');

                $stmt = $conn->prepare("SELECT id FROM user_registration WHERE username = ? OR email = ?");
                $stmt->bind_param("ss", $username, $email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $response['error'] = true;
                    $response['message'] = 'User already registered';
                    $stmt->close();
                } else {

                    $stmt = $conn->prepare("INSERT INTO user_registration (username, email, password, gender, user_type,status) VALUES (?, ?, ?, ?, 'citienz','active')");
                    $stmt->bind_param("ssss", $username, $email, $password, $gender);

                    if ($stmt->execute()) {

                        $stmt = $conn->prepare("SELECT id, id, username, email, gender FROM user_registration WHERE username = ?");
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $stmt->bind_result($userid, $id, $username, $email, $gender);
                        $stmt->fetch();

                        $user = array(
                            'id' => $id,
                            'username' => $username,
                            'email' => $email,
                            'gender' => $gender
                        );

                        $stmt->close();

                        $response['error'] = false;
                        $response['message'] = 'User registered successfully';
                        $response['user'] = $user;
                    }
                }
            } else {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';
            }

            break;


        case 'login':
            if (isTheseParametersAvailable(array('username', 'password'))) {

                $username = filter_input(INPUT_POST, 'username');
                $password = md5(filter_input(INPUT_POST, 'password'));


                $stmt = $conn->prepare("SELECT id, username, email, gender FROM user_registration WHERE username = ? AND password = ? AND user_type='citienz' AND status ='active'");
                $stmt->bind_param("ss", $username, $password);

                $stmt->execute();

                $stmt->store_result();


                if ($stmt->num_rows > 0) {

                    $stmt->bind_result($id, $username, $email, $gender);
                    $stmt->fetch();

                    $user = array(
                        'id' => $id,
                        'username' => $username,
                        'email' => $email,
                        'gender' => $gender
                    );

                    $response['error'] = false;
                    $response['message'] = 'Login successfull';
                    $response['user'] = $user;
                } else {

                    $response['error'] = false;
                    $response['message'] = 'Invalid username or password';
                }
            }
            break;


        case 'register':

            if (isTheseParametersAvailable(array('caregory', 'district', 'description', 'state', 'home_address', 'complain_type', 'user_registration_id'))) {


                $category = filter_input(INPUT_POST, 'caregory');
                $district = filter_input(INPUT_POST, 'district');
                $description = filter_input(INPUT_POST, 'description');
                $state = filter_input(INPUT_POST, 'state');
                $home_address = filter_input(INPUT_POST, 'home_address');
                $complain_type = filter_input(INPUT_POST, 'complain_type');
                $uregistration_id = filter_input(INPUT_POST, 'user_registration_id');


                $stmt = $conn->prepare("INSERT INTO complain_details (caregory, district, description,state,home_address,complain_type,status,date,user_registration_id) VALUES (?, ?, ?,?, ?, ?, 'inprocess', CURRENT_TIMESTAMP(), ?)");
                $stmt->bind_param("sssssss", $category, $district, $description, $state, $home_address, $complain_type, $uregistration_id);

                if ($stmt->execute()) {

                    $response['error'] = false;
                    $response['message'] = 'Complain registered successfully';
                }
            } else {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';
            }
    }
} else {

    $response['error'] = true;
    $response['message'] = 'Invalid API Call';
}

function isTheseParametersAvailable($params) {


    foreach ($params as $param) {

        if (!empty(filter_input(INPUT_POST, $param)) == 0) {

            return false;
        }
    }

    return true;
}

echo json_encode($response);
