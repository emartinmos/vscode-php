<?php
declare(strict_types=1);

// Interfazea: Salto
interface Salto {
    public function saltoEgin(): int;
}

// Klase Abstraktua: Pertsonaia
abstract class Pertsonaia {
    protected string $izena;
    protected int $biziPuntuak;
    protected int $indarra;
    protected int $arintasuna;

    public function __construct(string $izena, int $biziPuntuak, int $indarra, int $arintasuna) {
        $this->izena = $izena;
        $this->biziPuntuak = $biziPuntuak;
        $this->indarra = $indarra;
        $this->arintasuna = $arintasuna;
    }

    // Metodo abstraktuak
    abstract public function mugitu(): string;
    abstract public function erasoEgin(): int;

    // Metodo konkretua: jasotako minaren arabera biziPuntuak jaisten ditu
    public function minaJaso(int $mina): void {
        $this->biziPuntuak -= $mina;
        if ($this->biziPuntuak < 0) {
            $this->biziPuntuak = 0;
        }
    }

    // Metodo gehigarriak (Getters eta egoera erakusteko metodoa)
    public function getIzena(): string {
        return $this->izena;
    }

    public function getBiziPuntuak(): int {
        return $this->biziPuntuak;
    }

    public function egoeraErakutsi(): string {
        return "[{$this->izena}] Bizi puntuak: {$this->biziPuntuak} | Indarra: {$this->indarra} | Arintasuna: {$this->arintasuna}";
    }
}

// Klase Konkretua: Mario
class Mario extends Pertsonaia implements Salto {
    private string $gaitasunBerezia;

    public function __construct(string $izena, int $biziPuntuak, int $indarra, int $arintasuna, string $gaitasunBerezia) {
        parent::__construct($izena, $biziPuntuak, $indarra, $arintasuna);
        $this->gaitasunBerezia = $gaitasunBerezia;
    }

    public function mugitu(): string {
        return "Mario mugitu da";
    }

    public function erasoEgin(): int {
        return $this->indarra;
    }

    public function saltoEgin(): int {
        return $this->indarra * $this->arintasuna;
    }

    public function getGaitasunBerezia(): string {
        return $this->gaitasunBerezia;
    }
}

// Klase Konkretua: Luigi
class Luigi extends Pertsonaia implements Salto {
    private string $gaitasunBerezia;

    public function __construct(string $izena, int $biziPuntuak, int $indarra, int $arintasuna, string $gaitasunBerezia) {
        parent::__construct($izena, $biziPuntuak, $indarra, $arintasuna);
        $this->gaitasunBerezia = $gaitasunBerezia;
    }

    public function mugitu(): string {
        return "Luigi mugitu da";
    }

    public function erasoEgin(): int {
        return $this->indarra + $this->arintasuna;
    }

    public function saltoEgin(): int {
        return $this->indarra * $this->arintasuna;
    }

    public function getGaitasunBerezia(): string {
        return $this->gaitasunBerezia;
    }
}

// Klase Abstraktua: Etsaia
abstract class Etsaia extends Pertsonaia {
    protected int $boterea;

    public function __construct(string $izena, int $biziPuntuak, int $indarra, int $arintasuna, int $boterea) {
        parent::__construct($izena, $biziPuntuak, $indarra, $arintasuna);
        $this->boterea = $boterea;
    }

    // Pertsonaia klasetik heredatutako metodo abstraktuak
    abstract public function mugitu(): string;
    abstract public function erasoEgin(): int;
}

// Klase Konkretua: Goomba
class Goomba extends Etsaia {
    private int $azkartasuna;

    public function __construct(string $izena, int $biziPuntuak, int $indarra, int $arintasuna, int $boterea, int $azkartasuna) {
        parent::__construct($izena, $biziPuntuak, $indarra, $arintasuna, $boterea);
        $this->azkartasuna = $azkartasuna;
    }

    public function mugitu(): string {
        return "Goomba mugitu da";
    }

    public function erasoEgin(): int {
        return $this->azkartasuna + $this->boterea;
    }
}

// Klase Konkretua: Koopa
class Koopa extends Etsaia {
    private bool $oskolBerdeaDa;
    private int $azkartasuna;

    public function __construct(string $izena, int $biziPuntuak, int $indarra, int $arintasuna, int $boterea, bool $oskolBerdeaDa, int $azkartasuna = 10) {
        parent::__construct($izena, $biziPuntuak, $indarra, $arintasuna, $boterea);
        $this->oskolBerdeaDa = $oskolBerdeaDa;
        $this->azkartasuna = $azkartasuna;
    }

    public function mugitu(): string {
        return "Koopa mugitu da";
    }

    public function erasoEgin(): int {
        if ($this->oskolBerdeaDa) {
            return $this->azkartasuna * 2;
        }
        return $this->azkartasuna;
    }
}
?>