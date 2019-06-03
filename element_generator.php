<?php
    session_start();
    $pawns_array = unserialize($_SESSION['pawns_array']);
    $random = mt_rand(0, 2);
    print_r($_SESSION['pawns_array']);
    var_dump($_SESSION['pawns_array']);
    $level = $pawns_array[$random]->get_level();
    $_SESSION['last_dropped_pawn'] = $level;
    echo("<img class='icon' id=$level src='icons/$level.png'>");

?>