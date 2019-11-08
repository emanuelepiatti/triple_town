<?php
    require_once('pawn.php');
    session_start();
    $grid = unserialize($_SESSION['grid']);
    $flag = TRUE;

    for ($x=0; $x < 5; $x++) {
        for ($y=0; $y < 5; $y++) {
            $object = $grid[$x][$y];
            if(empty($object)){
                $flag = FALSE;
                break;
            }
        }
    }
    print($flag);
?>