<?php
require_once 'klaseak.php';

// 1. Klase bakoitzeko objektu bana sortu
$mario = new Mario("Mario", 100, 15, 10, "Sua bota");
$luigi = new Luigi("Luigi", 100, 12, 14, "Salto altua");
$goomba = new Goomba("Goomba", 50, 8, 5, 10, 6);
$koopaBerdea = new Koopa("Koopa Berdea", 70, 10, 8, 12, true, 9);

$pertsonaiak = [$mario, $luigi, $goomba, $koopaBerdea];

echo "<h2>1. Hasierako egoera eta mugimenduak</h2>";
foreach ($pertsonaiak as $p) {
    echo $p->egoeraErakutsi() . "<br>";
    echo "- Mugimendua: " . $p->mugitu() . "<br>";
    
    // Salto interfazea inplementatzen duten egiaztatu
    if ($p instanceof Salto) {
        echo "- Saltoaren balioa: " . $p->saltoEgin() . "<br>";
    } else {
        echo "- Pertsonai honek ezin du saltorik egin.<br>";
    }
    echo "<br>";
}

echo "<hr>";
echo "<h2>2. Borroka simulazioa (Erasoak eta Mina)</h2>";

// Mariok Goombari eraso egiten dio
$minaMario = $mario->erasoEgin();
echo "{$mario->getIzena()}-k eraso egin du eta {$minaMario} puntuko mina eragin du.<br>";
$goomba->minaJaso($minaMario);
echo "{$goomba->getIzena()}-ren bizi puntuak orain: {$goomba->getBiziPuntuak()}<br><br>";

// Goombak Mariori eraso egiten dio
$minaGoomba = $goomba->erasoEgin();
echo "{$goomba->getIzena()}-k eraso egin du eta {$minaGoomba} puntuko mina eragin du.<br>";
$mario->minaJaso($minaGoomba);
echo "{$mario->getIzena()}-ren bizi puntuak orain: {$mario->getBiziPuntuak()}<br><br>";

// Koopak Luigiri eraso egiten dio
$minaKoopa = $koopaBerdea->erasoEgin();
echo "{$koopaBerdea->getIzena()}-k eraso egin du eta {$minaKoopa} puntuko mina eragin du.<br>";
$luigi->minaJaso($minaKoopa);
echo "{$luigi->getIzena()}-ren bizi puntuak orain: {$luigi->getBiziPuntuak()}<br><br>";

// Luigik Koopari eraso egiten dio
$minaLuigi = $luigi->erasoEgin();
echo "{$luigi->getIzena()}-k eraso egin du eta {$minaLuigi} puntuko mina eragin du.<br>";
$koopaBerdea->minaJaso($minaLuigi);
echo "{$koopaBerdea->getIzena()}-ren bizi puntuak orain: {$koopaBerdea->getBiziPuntuak()}<br>";
?>