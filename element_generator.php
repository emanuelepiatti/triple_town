<?php
    require_once('index.php');
    #session_start();
    $pawns_array = unserialize($_SESSION['pawns_array']);
    $random = mt_rand(0, 2);
    $level = $pawns_array[$random]->get_level();
    $url = $pawns_array[$random]->get_image_url();
    $_SESSION['last_dropped_pawn'] = $level;
    echo("<img class='icon' id=$level src='icons/$url'>");
    print($url);

?>