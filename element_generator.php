<?php
    $pawns_array = unserialize($_SESSION['pawns_array']);
    $random = mt_rand(0, 2);
    $name = $pawns_array[$random]->get_level();
    $_SESSION['last_dropped_pawn'] = $name;
    echo("<img class='icon' id=$name src='icons/$name.png'>");

?>