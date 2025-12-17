<?php
session_start();

require_once __DIR__ . '/core/Database.php';

// models
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/models/Todo.php';

// controllers
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/TodoController.php';

$page = $_GET['page'] ?? 'login';

// BUAT CONTROLLER SEKALI SAJA
$authController = new AuthController();
$todoController = new TodoController();

switch ($page) {

    case 'login':
        $authController->login();
        break;

    case 'login_store':
        $authController->authenticate($_POST);
        break;

    case 'register':
        $authController->register();
        break;

    case 'register_store':
        $authController->store($_POST);
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'dashboard':
        $todoController->index();
        break;

    case 'todo-add':
        $todoController->create();
        break;

    case 'todo-store':
        $todoController->store();
        break;

    case 'todo-edit':
        $todoController->edit($_GET['id']);
        break;

    case 'todo-update':
        $todoController->update();
        break;

    case 'todo-delete':
        $todoController->delete($_GET['id']);
        break;

    default:
        echo "Halaman tidak ditemukan";
}
