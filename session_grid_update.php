<?php
    require_once('pawn.php');
    session_start();
    $grid = unserialize($_SESSION['grid']);
    echo("<pre>");
    print_r($grid);
    $last_dropped_pawn = $_SESSION['last_dropped_pawn'];
    $pawns_array = unserialize($_SESSION['pawns_array']);
    $coordinate = $_POST['coordinate'];

    $exploded = explode("-", $coordinate);
    $row = $exploded[0];
    $column = $exploded[1];

    $grid[$row][$column] = $pawns_array[$last_dropped_pawn];

    $_SESSION['grid'] = serialize($grid);
?>