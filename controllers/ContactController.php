<?php
require 'models/Contact.php';

class ContactController {
    private $model;

    public function __construct() {
        $this->model = new Contact();
    }

    public function index() {
        $contacts = $this->model->getAllContacts();
        include 'views/contacts/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' || (isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['address']))) {
            $name = $_POST['name'] ?? $_GET['name'];
            $phone = $_POST['phone'] ?? $_GET['phone'];
            $address = $_POST['address'] ?? $_GET['address'];
            $this->model->createContact($name, $phone, $address);
            header('Location: index.php');
        } else {
            include 'views/contacts/create.php';
        }
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id && ($_SERVER['REQUEST_METHOD'] === 'POST' || (isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['address'])))) {
            $name = $_POST['name'] ?? $_GET['name'];
            $phone = $_POST['phone'] ?? $_GET['phone'];
            $address = $_POST['address'] ?? $_GET['address'];
            $this->model->updateContact($id, $name, $phone, $address);
            header('Location: index.php');
        } else {
            $contact = $this->model->getContactById($id);
            include 'views/contacts/edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->deleteContact($id);
            header('Location: index.php');
        } else {
            echo "ID is required to delete a contact.";
        }
    }

    public function readAll() {
        $contacts = $this->model->getAllContacts();
        header('Content-Type: application/json');
        echo json_encode($contacts);
    }

    public function readById() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $contact = $this->model->getContactById($id);
            header('Content-Type: application/json');
            echo json_encode($contact);
        } else {
            echo "ID is required to read a contact.";
        }
    }
}
?>
