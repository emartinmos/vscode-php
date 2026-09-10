<?php
$zenbaki1 = 6;
$zenbaki2 = 2;
if($zenbaki1 + $zenbaki2 > $zenbaki1 * $zenbaki2){
    echo "Zenbakien batura zenbakien bideketa baino handiagoa.";
}elseif($zenbaki1 + $zenbaki2 == $zenbaki1 * $zenbaki2) {
    echo "Zenbakien batura eta bideketaren emaitza berdina da.";
}else {
    echo "Zenbakien bideketa zenbakien batura baino handiagoa.";
}
?>