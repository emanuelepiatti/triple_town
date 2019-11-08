<?php
    require_once('pawn.php');
    session_start();
    $pawns_array = unserialize($_SESSION['pawns_array']);  
    $array_for_session = array();

    for ($x=0; $x < 5; $x++) {
        for ($y=0; $y < 5; $y++) {
            $array_for_session[$x][$y] = NULL;
        }
    }

    for ($i=0; $i < 5; $i++) {
        do {
            $random_x = rand(0, 4);
            $random_y = rand(0, 4); 

        } while (!is_null($array_for_session[$random_x][$random_y]));

        $random_element = rand(1, 2);
        $array_for_session[$random_x][$random_y] = $pawns_array[$random_element];
    }

    $_SESSION['grid'] = serialize($array_for_session);   
?>  