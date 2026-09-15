<?php
$alderdiBikoitiak = true; 

$ausazkoMuga = rand(1, 98);

echo "Muga-zenbakia (ausazkoa): " . $ausazkoMuga . "\n";

if ($alderdiBikoitiak) {
    echo "Zenbaki bikoitiak:\n";
    for ($i = 1; $i <= $ausazkoMuga; $i++) {
        if ($i % 2 == 0) {
            echo $i . " ";
        }
    }
} else {
    echo "Zenbaki bakoitiak:\n";
    for ($i = 1; $i <= $ausazkoMuga; $i++) {
        if ($i % 2 != 0) {
            echo $i . " ";
        }
    }
}
echo "\n";
?>
