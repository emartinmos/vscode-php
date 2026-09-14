<?php
$minutuak = 10;
$prezioa = 0;
if($minutuak<3){
    $prezioa = 0.1;
    echo "Hau da deiaren prezioa: " . $prezioa . "€";
}elseif($minutuak>=3){
    $prezioa = 0.1 + ($minutuak - 3) * 0.05;
    echo "Hau da deiaren prezioa: " . $prezioa . "€";
}else{
    echo "Sartutako minutu kopuruak arasoa eman dute.";
}
?>
