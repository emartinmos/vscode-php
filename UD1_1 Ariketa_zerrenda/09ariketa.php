<?php
$nota1 = 2;
$nota2 = 6;
$notaBB = ($nota1 + $nota2) / 2;
if($notaBB>=0 && $notaBB<5){
    echo "Zure bataz bestekoa " . $notaBB . " da beraz ez duzu gainditu.";
}elseif($notaBB>=5 && $notaBB<=10){
    echo "Zure bataz bestekoa " . $notaBB . " da beraz gainditu egin duzu.";
}else{
    echo "Zure bataz besteko nota ez du balio";
}
?>