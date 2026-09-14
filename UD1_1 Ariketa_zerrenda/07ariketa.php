<?php
$nota = 1;
if($nota>=1 && $nota<=4.9){
    echo "Ez gainditua.";
}elseif($nota>=5 && $nota<=5.9){
    echo "Nahiko.";
}elseif($nota>=6 && $nota<=6.9){
    echo "Ondo.";
}elseif($nota>=7 && $nota<=8.9){
    echo "Oso ondo.";
}elseif($nota>=9 && $nota<=10){
    echo "Bikain.";
}else{
    echo "AKATSA.";
}
?>