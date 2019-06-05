<?php
    require_once('pawn.php');
    session_start();
    $grid = unserialize($_SESSION['grid']);

    $coordinate = $_POST['coordinate'];
    $exploded = explode("-", $coordinate);
    $row = $exploded[0];
    $column = $exploded[1];
?>