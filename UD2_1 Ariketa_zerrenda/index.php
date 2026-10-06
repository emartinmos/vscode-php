<?php
require_once 'IrudiGeometrikoa.php';
require_once 'Triangelua.php';

echo "<h2>1. Irudi Geometrikoa</h2>";

// A izena eta kolore urdina duen irudiGeometriko bat sortu
$irudia = new IrudiGeometrikoa();
$irudia->setIzena("A");
$irudia->setKolorea("urdina");

// Bere datuak nabigatzailean idatzi
$irudia->idatzi();


echo "<h2>2. Triangelua</h2>";

// B izena, kolore berdea, altuera 5 eta oinarria 3 datuak dituen triangelua sortu
$triangelua = new Triangelua();
$triangelua->setIzena("B");
$triangelua->setKolorea("berdea");
$triangelua->setAltuera(5);
$triangelua->setOinarria(3);

// Bere datuak eta area nabigatzailetik atera
$triangelua->idatzi();
$triangelua->areaKalkulatu();
?>