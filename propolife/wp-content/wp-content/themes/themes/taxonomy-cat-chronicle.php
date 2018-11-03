<?php

$term_id = get_queried_object()->term_id;

switch ($term_id) {
    case 1: //reform-home
        include('content-home.php');
        break;
    case 2: //reform-office
        include('content-office.php');
        break;
    case 6: //reform-interior
        include('content-interior.php');
        break;
    case 13: //perth-design
        include('content-perth.php');
        break;
}

// if($term=='reform-home'){include('content-home.php');}
// elseif($term=='reform-office'){include('content-office.php');}
// elseif($term=='reform-interior'){include('content-interior.php');}
// elseif($term=='perth-design'){include('content-perth.php');}
?>
