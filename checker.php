<?php
    require_once('pawn.php');
    session_start();
    $grid = unserialize($_SESSION['grid']);

    $coordinate = $_POST['coordinate'];
    $exploded = explode("-", $coordinate);

    $x = $exploded[0];
    $y = $exploded[1];


    for ($row = $x-1; $row <= $x+1 ; $row++) { 
        for ($column = $y-1; $column <= $y+1 ; $column++) { 
            if ( ($row >= 0) && ($column >= 0) && ($row < 5) && ($column < 5)  ) {
                print($row."-".$column);
                print("<br>");
            }
            
            
            /*
            $near_pawn = $grid[$row][$column];
            if (!empty($near_pawn)) {
                $near_pawn_level = $near_pawn->get_level();
                print($near_pawn_level);
            }
            */

        }     
    }
?>