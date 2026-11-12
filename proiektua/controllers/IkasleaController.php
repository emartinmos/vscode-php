<?php
include_once 'config/database.php';
include_once 'models/Ikaslea.php';

class IkasleaController {
    private $db;
    private $ikaslea;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->ikaslea = new Ikaslea($this->db);
    }

    public function index() {
        $ikasleak = $this->ikaslea->irakurriDena();
        include 'views/ikasleak/index.php';
    }

    public function sortu() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $izena = trim($_POST['izena']);
            $email = trim($_POST['email']);
            if (!empty($izena) && !empty($email)) {
                $this->ikaslea->sortu($izena, $email);
            }
            header("Location: index.php");
            exit;
        } else {
            $ikaslea = null;
            include 'views/ikasleak/form.php';
        }
    }

    public function aldatu() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $izena = trim($_POST['izena']);
            $email = trim($_POST['email']);
            if (!empty($izena) && !empty($email)) {
                $this->ikaslea->aldatu($id, $izena, $email);
            }
            header("Location: index.php");
            exit;
        } else {
            $ikaslea = $this->ikaslea->irakurriBat($id);
            include 'views/ikasleak/form.php';
        }
    }

    public function ezabatu() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->ikaslea->ezabatu($id);
        }
        header("Location: index.php");
        exit;
    }
}
?>