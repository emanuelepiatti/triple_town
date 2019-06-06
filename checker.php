<?php
    require_once('pawn.php');
    session_start();
    $grid = unserialize($_SESSION['grid']);  
    $pawns_array = unserialize($_SESSION['pawns_array']);  
    $coordinate = $_POST['coordinate'];
    $exploded = explode("-", $coordinate);

    $x = $exploded[0];
    $y = $exploded[1];

    $old_x = $x;
    $old_y = $y;

    $pawn_around_counter = array();

    
        

    for ($row = $x-1; $row <= $x+1 ; $row++) { 
        for ($column = $y-1; $column <= $y+1 ; $column++) { 
            
            if ( ($row >= 0) && ($column >= 0) && ($row < 5) && ($column < 5)  ) {
                $near_pawn = $grid[$row][$column];
                if (!empty($near_pawn)) {
                    $near_pawn_level = $near_pawn->get_level();
                    $near_pawn_name = $near_pawn->get_name();
                    print($old_x."-".$old_y." diverso da ".$row."-".$column."? ");

                    if ( !($old_x == $row) || !($old_y == $column) ){ 
                        $pawn_around_counter[$near_pawn_name]["level"] = $near_pawn_level;
                        $pawn_around_counter[$near_pawn_name]["quantity"] = $pawn_around_counter[$near_pawn_name]["quantity"] + 1;
                    }
                }
            }
        }     
    }
    print("<pre>");
    print_r($pawn_around_counter);
    print("</pre>");
?>