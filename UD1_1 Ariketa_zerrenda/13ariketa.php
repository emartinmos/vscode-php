<?php
function palindromoaEgiaztatu($hitz) {
    $hitz_garbia = strtolower(trim($hitz));
    
    $alderantzizkoa = strrev($hitz_garbia);
    
    if ($hitz_garbia === $alderantzizkoa) {
        return "Palindromoa da";
    } else {
        return "Ez da palindromoa";
    }
}

$sarrera = "aitorrotia";
echo "Sarrera: " . $sarrera . "<br>";
echo "Irteera: " . palindromoaEgiaztatu($sarrera);
?>