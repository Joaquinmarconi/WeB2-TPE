<?php
require_once './app/models/album.model.php';
require_once './app/views/album.view.php';
require_once './app/helpers/auth.helper.php';

class AlbumController
{
    private $model;
    private $view;

    public function __construct()
    {
        // verifico logueado
        AuthHelper::verify();

        $this->model = new AlbumModel();
        $this->view = new AlbumView();
    }

    public function showAlbums()
    {
        // obtengo tareas del controlador
        $Albums = $this->model->getAlbums();

        // muestro las tareas desde la vista
        $this->view->showAlbums($Albums);
    }

    public function showAlbumDetail($id)
{
    // Obtén los datos del álbum
    $album = $this->model->getAlbumById($id);

    // Obtén los datos de la banda
    $banda = $this->model->getBandaById($album->banda_id);

    // Muestra el detalle del álbum desde la vista
    $this->view->showAlbumDetails($album, $banda);
}

    public function addAlbum()
    {

        // obtengo los datos del álbum
        $nombre_album = $_POST['nombre_album'];
        $año = $_POST['año'];
        $banda_id = $_POST['banda_id'];

        // validaciones
        if (empty($nombre_album) || empty($año) || empty($banda_id)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertAlbum($nombre_album, $año, $banda_id);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar el álbum");
        }
    }


    function removeAlbum($id)
    {
        $this->model->deleteAlbum($id);
        header('Location: ' . BASE_URL);
    }

}
