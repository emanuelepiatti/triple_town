<?php
    require_once('pawn.php');
    session_start();
    $random = mt_rand(1, 8);
    $pawns_array = unserialize($_SESSION['pawns_array']);
    $level = $pawns_array[$random]->get_level();
    $url = $pawns_array[$random]->get_image_url();
    $_SESSION['last_dropped_pawn'] = $level;
    echo("<img class='icon' id=$level src='icons/$url'>");
?>   
