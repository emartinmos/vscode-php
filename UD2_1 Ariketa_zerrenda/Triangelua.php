<?php
require_once 'IrudiGeometrikoa.php';

class Triangelua extends IrudiGeometrikoa {
    private $oinarria;
    private $altuera;

    // Atributu gabeko eraikitzailea (aitarena deitu dezakegu)
    public function __construct() {
        parent::__construct();
    }

    // GET eta SET metodoak
    public function getOinarria() {
        return $this->oinarria;
    }

    public function setOinarria($oinarria) {
        $this->oinarria = $oinarria;
    }

    public function getAltuera() {
        return $this->altuera;
    }

    public function setAltuera($altuera) {
        $this->altuera = $altuera;
    }

    // Aitaren idatzi metodoa gainidazten dugu datu gehiago erakusteko
    public function idatzi() {
        echo "Izena: " . $this->izena . "<br>";
        echo "Kolorea: " . $this->kolorea . "<br>";
        echo "Altuera: " . $this->altuera . "<br>";
        echo "Oinarria: " . $this->oinarria . "<br>";
    }

    // Arearen kalkulua
    public function areaKalkulatu() {
        $area = ($this->oinarria * $this->altuera) / 2;
        echo "Triangeluaren area: " . $area . "<br>";
    }
}
?>