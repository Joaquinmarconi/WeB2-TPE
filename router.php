<?php
require_once './app/controllers/album.controller.php';
require_once './app/controllers/banda.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/admin.controller.php';
require_once './app/controllers/user.controller.php';

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
    case 'AlbumLista':
        $controller = new AlbumController();
        $controller->showAlbums();
        break;
    case 'BandaLista':
        $controller = new BandaController();
        $controller->showBandas();
        break;
    case 'detalle':
        $controller = new AlbumController();
        $controller->showAlbumDetail($params[1]); // $params[1] debería ser el ID del álbum
        break;
    case 'filtro':
        $controller = new BandaController();
        $controller->showBandaDetail($params[1]); // $params[1] debería ser el ID del álbum
        break;
    case 'administracion_album':
        $controller = new AdminController();
        $controller->showAlbumAdministrator();
        break;
    case 'administracion_banda':
        $controller = new AdminController();
        $controller->showBandAdministrator();
        break;
    case 'agregar_album':
        $controller = new AlbumController();
        $controller->addAlbum();
        break;
    case 'eliminar_album':
        $controller = new AlbumController();
        $controller->removeAlbum($_POST['Album_ID']);
        break;
    case 'modificar_album':
        $controller = new AlbumController();
        $controller->updateAlbum();
        break;

    case 'modificar_banda':
        $controller = new BandaController();
        $controller->updateBanda();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'create_user':
        $controller = new UserController();
        $controller->showCreateUser();
        break;
    case 'create_user_action':
        $controller = new UserController();
        $controller->createUser();
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