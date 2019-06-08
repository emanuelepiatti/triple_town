<?php
    require_once('pawn.php');
    session_start();
    $grid = unserialize($_SESSION['grid']);  
    $pawns_array = unserialize($_SESSION['pawns_array']);  
    $last_dropped_pawn = $_SESSION['last_dropped_pawn'];
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
                    $pawn_around_counter[$near_pawn_name]["level"] = $near_pawn_level;
                    $pawn_around_counter[$near_pawn_name]["quantity"] = $pawn_around_counter[$near_pawn_name]["quantity"] + 1;
                    $pawn_around_counter[$near_pawn_name]["coordinate"][] = $row."-".$column;
                    
                }
            }
        }     
    }

    foreach ($pawn_around_counter as $pawn) {
        if ( ($pawn["quantity"] >= 3) && ($pawn["level"] == $last_dropped_pawn) ) {
            foreach ($pawn["coordinate"] as $coordinata) {
                $exploded = explode("-", $coordinata);
                $pawn_x = $exploded[0];
                $pawn_y = $exploded[1];

                if ( ($pawn_x == $old_x) && ($pawn_y == $old_y) ){ 
                    $old_pawn_level = $grid[$pawn_x][$pawn_y]->get_level();
                    $new_pawn_to_insert = $pawns_array[$old_pawn_level + 1];
                    $grid[$pawn_x][$pawn_y] = $new_pawn_to_insert;
                }
                else {
                    $grid[$pawn_x][$pawn_y] = NULL;
                }
            }   
        }
    }
    $_SESSION['grid'] = serialize($grid);

?>