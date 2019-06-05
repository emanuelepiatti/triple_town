<?php
    require_once('pawn.php');
    session_start();
    $grid = unserialize($_SESSION['grid']);
    print("<pre>");
    print_r($grid);
    print("</pre>");
    $coordinate = $_POST['coordinate'];
    $exploded = explode("-", $coordinate);

    $x = $exploded[0];
    $y = $exploded[1];


    for ($row = $x-1; $row <= $x+1 ; $row++) { 
        for ($column = $y-1; $column <= $y+1 ; $column++) { 
            
            if ( ($row >= 0) && ($column >= 0) && ($row < 5) && ($column < 5)  ) {
                $near_pawn = $grid[$row][$column];

                if (!empty($near_pawn)) {
                    //$near_pawn_level = $near_pawn->get_level();
                    $near_pawn_level = $near_pawn->get_name();
                    print("IF".$row."-".$column."->".$near_pawn_level);
                    print("<br>");
                }
            }
        }     
    }
?>