<?php
include_once 'controllers/IkasleaController.php';
include_once 'controllers/IrakasgaiaController.php';

$ikasleaController = new IkasleaController();
$irakasgaiaController = new IrakasgaiaController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    // Rutas de Ikasleak
    case 'index':
        $ikasleaController->index();
        break;
    case 'sortu_ikaslea':
        $ikasleaController->sortu();
        break;
    case 'aldatu_ikaslea':
        $ikasleaController->aldatu();
        break;
    case 'ezabatu_ikaslea':
        $ikasleaController->ezabatu();
        break;

    // Rutas de Irakasgaiak
    case 'irakasgaiak':
        $irakasgaiaController->index();
        break;
    case 'sortu_irakasgaia':
        $irakasgaiaController->sortu();
        break;
    case 'aldatu_irakasgaia':
        $irakasgaiaController->aldatu();
        break;
    case 'ezabatu_irakasgaia':
        $irakasgaiaController->ezabatu();
        break;

    default:
        $ikasleaController->index();
        break;
}
?>