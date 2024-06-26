<?php
require 'config/Database.php';
require 'controllers/ContactController.php';

$controller = new ContactController();

if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
    $action = $_GET['action'];
    $controller->$action();
} else {
    $controller->index();
}
?>
