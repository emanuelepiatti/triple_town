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

                    if ( !($old_x == $row) || !($old_y == $column) ){ 
                        $pawn_around_counter[$near_pawn_name]["level"] = $near_pawn_level;
                        $pawn_around_counter[$near_pawn_name]["quantity"] = $pawn_around_counter[$near_pawn_name]["quantity"] + 1;
                        $pawn_around_counter[$near_pawn_name]["coordinate"][] = $row."-".$column;
                    }
                }
            }
        }     
    }

    foreach ($pawn_around_counter as $pawn) {
        if ( ($pawn["quantity"] >= 2) && ($pawn["level"] == $last_dropped_pawn) ) {
            foreach ($pawn["coordinate"] as $coordinata) {
                print($coordinata);
            }
        }
    }
    
?>