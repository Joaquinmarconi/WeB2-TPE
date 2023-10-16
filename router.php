<?php
require_once './app/controllers/album.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'listar'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->         AlbumController->showAlbums();
// agregar   ->         AlbumController->addAlbum();
// eliminar/:ID  ->     AlbumController->removeAlbum($id); 
// finalizar/:ID  ->    AlbumController->finishAlbum($id);
// about ->             aboutController->showAbout();
// login ->             authContoller->showLogin();
// logout ->            authContoller->logout();
// auth                 authContoller->auth(); // toma los datos del post y autentica al usuario

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new AlbumController();
        $controller->showAlbums();
        break;

    case 'detalle':
        $controller = new AlbumController();
        $controller->showAlbumDetail($params[1]); // $params[1] debería ser el ID del álbum
        break;
    case 'agregar':
        $controller = new AlbumController();
        $controller->addAlbum();
        break;
    case 'eliminar':
        $controller = new AlbumController();
        $controller->removeAlbum($params[1]);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        echo "404 Page Not Found";
        break;
}