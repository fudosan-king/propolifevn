<?php

    $Page_id = get_the_ID();

    switch ($Page_id) {
        case '13':
            include('content-web.php');
            break;

        case '370':
            include('content-web-step.php');
            break;

        case '454':
            include('content-development.php');
            break;
    }
?>
