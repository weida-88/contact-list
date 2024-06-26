<?php
require '../config/Database.php';
require '../models/Contact.php';

$method = $_SERVER['REQUEST_METHOD'];
$controller = new ContactController();

switch($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $controller->getContactById($_GET['id']);
        } else {
            $controller->getAllContacts();
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $controller->createContact($data);
        break;
    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents('php://input'), true);
            $controller->updateContact($_GET['id'], $data);
        }
        break;
    case 'DELETE':
        if (isset($_GET['id'])) {
            $controller->deleteContact($_GET['id']);
        }
        break;
    default:
        header('HTTP/1.0 405 Method Not Allowed');
        break;
}

class ContactController {
    private $model;

    public function __construct() {
        $this->model = new Contact();
    }

    public function getAllContacts() {
        $contacts = $this->model->getAllContacts();
        echo json_encode($contacts);
    }

    public function getContactById($id) {
        $contact = $this->model->getContactById($id);
        if ($contact) {
            echo json_encode($contact);
        } else {
            header('HTTP/1.0 404 Not Found');
            echo json_encode(['message' => 'Contact not found']);
        }
    }

    public function createContact($data) {
        if (isset($data['name'], $data['phone'], $data['address'])) {
            $this->model->createContact($data['name'], $data['phone'], $data['address']);
            header('HTTP/1.0 201 Created');
            echo json_encode(['message' => 'Contact created']);
        } else {
            header('HTTP/1.0 400 Bad Request');
            echo json_encode(['message' => 'Invalid input']);
        }
    }

    public function updateContact($id, $data) {
        if (isset($data['name'], $data['phone'], $data['address'])) {
            $this->model->updateContact($id, $data['name'], $data['phone'], $data['address']);
            echo json_encode(['message' => 'Contact updated']);
        } else {
            header('HTTP/1.0 400 Bad Request');
            echo json_encode(['message' => 'Invalid input']);
        }
    }

    public function deleteContact($id) {
        $this->model->deleteContact($id);
        echo json_encode(['message' => 'Contact deleted']);
    }
}
?>
