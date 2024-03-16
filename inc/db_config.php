<?php
    session_start();

    $con = mysqli_connect($db_server_name, $db_username, $db_password, $db_name);

    if(!$con) {
        die("Cannot connect to Database".mysqli_connect_error());
    };


    // Sanitize inputs to prevent Web attacks
    function filteration($data) {
        foreach($data as $key => $value) {
            $data[$key] = trim($value);
            $data[$key] = stripcslashes($value);
            $data[$key] = htmlspecialchars($value);
            $data[$key] = strip_tags($value);
        }
        return $data;
    }

    function select($sql, $values, $datatypes) {
        $con = $GLOBALS['con'];
        if( $stmt = mysqli_prepare($con, $sql)) {
            mysqli_stat_bind_params($stmt, $datatypes, ...$values);
        } else {
            die('Query cannot be executed - Select');
        }
    }
?>