<?php
$a = 5;
$b = 2;
$c = 9;

//Txikienetik handienera
if ($a <= $b && $a <= $c) {
    if ($b <= $c) {
        echo "Txikienetik handienera: $a, $b, $c";
    } else {
        echo "Txikienetik handienera: $a, $c, $b";
    }
} elseif ($b <= $a && $b <= $c) {
    if ($a <= $c) {
        echo "Txikienetik handienera: $b, $a, $c";
    } else {
        echo "Txikienetik handienera: $b, $c, $a";
    }
} else {
    if ($a <= $b) {
        echo "Txikienetik handienera: $c, $a, $b";
    } else {
        echo "Txikienetik handienera: $c, $b, $a";
    }
}

//Handienetik txikienera
if ($a >= $b && $a >= $c) {
    if ($b >= $c) {
        echo "<br>Handienetik txikienera: $a, $b, $c";
    } else {
        echo "<br>Handienetik txikienera: $a, $c, $b";
    }
} elseif ($b >= $a && $b >= $c) {
    if ($a >= $c) {
        echo "<br>Handienetik txikienera: $b, $a, $c";
    } else {
        echo "<br>Handienetik txikienera: $b, $c, $a";
    }
} else {
    if ($a >= $b) {
        echo "<br>Handienetik txikienera: $c, $a, $b";
    } else {
        echo "<br>Handienetik txikienera: $c, $b, $a";
    }
}
?>