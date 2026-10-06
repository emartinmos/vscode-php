<?php
interface Ordaingarria {
    public function ordaindu(float $zenbatekoa): bool;
}

class Txartela implements Ordaingarria {
    public function ordaindu(float $zenbatekoa): bool {
        echo "$zenbatekoa € txartelarekin";
        return true;
    }
}

function eginOrdainketa(Ordaingarria $ordainketaModua, float $zenbatekoa): void {
$ordainketaModua->ordaindu($zenbatekoa);
}
$txartela = new Txartela();
eginOrdainketa($txartela, 25.50);
?>