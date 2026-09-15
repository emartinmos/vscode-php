<?php
// GET bidez 'lerroKopurua' parametroa jaso eta zenbaki oso bihurtu. 
// Parametrorik ez badago, 5 lerro jarriko ditu lehenetsi gisa.
$lerroKopurua = isset($_GET['lerroKopurua']) ? (int)$_GET['lerroKopurua'] : 5;

// Ziurtatu lerro kopurua zero baino handiagoa dela akatsak ekiditeko
if ($lerroKopurua > 0) {
    echo "<pre>"; // Testuaren lerrokatzea zuzena izateko (HTML formatua mantentzeko)
    
    // Kanpoko itzulia: lerroz lerro joateko
    for ($i = 1; $i <= $lerroKopurua; $i++) {
        // Barneko itzulia: lerro bakoitzean behar den 'o' kopurua inprimatzeko
        for ($j = 1; $j <= $i; $j++) {
            echo "o";
        }
        echo "\n"; // Lerro aldaketa
    }
    
    echo "</pre>";
} else {
    echo "Mesedez, sartu 0 baino handiagoa den lerro kopuru bat.";
}
?>