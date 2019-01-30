<?php

    $con = mysqli_connect('localhost', 'root', '', 'farel_plastic');

    if( $con == false ){
        echo 'Error';
        echo mysqli_connect_error();
        exit();
    }

    $con->set_charset('utf-8');

?>