<?php
require_once '../controller/HomeController.php';
require_once '../controller/ClientController.php';

$action = $_GET['action'] ?? 'dashboard';

if ($action == 'client') {
    $id = intval($_GET['id']);
    (new ClientController())->showClientView($id);
    exit;
} else {
    (new HomeController())->showHome();
    exit;
}
?>
