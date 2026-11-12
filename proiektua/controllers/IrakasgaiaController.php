<?php
include_once 'config/database.php';
include_once 'models/Irakasgaia.php';
include_once 'models/Ikaslea.php';

class IrakasgaiaController {
    private $db;
    private $irakasgaia;
    private $ikaslea;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->irakasgaia = new Irakasgaia($this->db);
        $this->ikaslea = new Ikaslea($this->db);
    }

    public function index() {
        $ikasle_id = $_GET['ikasle_id'] ?? null;
        if (!$ikasle_id) {
            header("Location: index.php");
            exit;
        }

        $ikaslea = $this->ikaslea->irakurriBat($ikasle_id);
        $irakasgaiak = $this->irakasgaia->irakurriIkaslearenak($ikasle_id);
        include 'views/irakasgaiak/index.php';
    }

    public function sortu() {
        $ikasle_id = $_GET['ikasle_id'] ?? null;
        if (!$ikasle_id) {
            header("Location: index.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombreIrakasgaia = trim($_POST['irakasgaia']);
            if (!empty($nombreIrakasgaia)) {
                $this->irakasgaia->sortu($ikasle_id, $nombreIrakasgaia);
            }
            header("Location: index.php?action=irakasgaiak&ikasle_id=" . $ikasle_id);
            exit;
        } else {
            $ikaslea = $this->ikaslea->irakurriBat($ikasle_id);
            $irakasgaia = null;
            include 'views/irakasgaiak/form.php';
        }
    }

    public function aldatu() {
        $id = $_GET['id'] ?? null;
        $ikasle_id = $_GET['ikasle_id'] ?? null;

        if (!$id || !$ikasle_id) {
            header("Location: index.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombreIrakasgaia = trim($_POST['irakasgaia']);
            if (!empty($nombreIrakasgaia)) {
                $this->irakasgaia->aldatu($id, $nombreIrakasgaia);
            }
            header("Location: index.php?action=irakasgaiak&ikasle_id=" . $ikasle_id);
            exit;
        } else {
            $ikaslea = $this->ikaslea->irakurriBat($ikasle_id);
            $irakasgaia = $this->irakasgaia->irakurriBat($id);
            include 'views/irakasgaiak/form.php';
        }
    }

    public function ezabatu() {
        $id = $_GET['id'] ?? null;
        $ikasle_id = $_GET['ikasle_id'] ?? null;

        if ($id && $ikasle_id) {
            $this->irakasgaia->ezabatu($id);
            header("Location: index.php?action=irakasgaiak&ikasle_id=" . $ikasle_id);
        } else {
            header("Location: index.php");
        }
        exit;
    }
}
?>