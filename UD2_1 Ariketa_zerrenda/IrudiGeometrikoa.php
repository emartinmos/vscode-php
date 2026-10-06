<?php
class IrudiGeometrikoa {
    protected $izena;
    protected $kolorea;

    // Atributu gabeko eraikitzailea
    public function __construct() {
    }

    // GET eta SET metodoak
    public function getIzena() {
        return $this->izena;
    }

    public function setIzena($izena) {
        $this->izena = $izena;
    }

    public function getKolorea() {
        return $this->kolorea;
    }

    public function setKolorea($kolorea) {
        $this->kolorea = $kolorea;
    }

    // Datuak nabigatzailean idazteko metodoa
    public function idatzi() {
        echo "Izena: " . $this->izena . "<br>";
        echo "Kolorea: " . $this->kolorea . "<br>";
    }
}
?>