<?php
require_once './app/models/Banda.model.php';
require_once './app/models/album.model.php';
require_once './app/views/Banda.view.php';
require_once './app/helpers/auth.helper.php';

class BandaController {
    private $model;
    private $categoryModel;
    private $view;

    public function __construct() {
        // verifico logueado
        AuthHelper::verify();

        $this->model = new BandaModel();
        $this->view = new BandaView();
        $this->categoryModel = new AlbumModel;
    }

    public function showBandas() {
        // obtengo tareas del controlador
        $Bandas = $this->model->getBandas();
        
        // muestro las tareas desde la vista
        $this->view->showBandas($Bandas);
    }

    public function showBandaDetail($id)
    {
       
        $album = $this->categoryModel->getAlbumsByBandaId($id);
    
        $this->view->showBandaDetails($album);
    }
    

    public function addBanda() {

        AuthHelper::verify();
        // obtengo los datos del usuario
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];

        // validaciones
        if (empty($title) || empty($priority)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertBanda($title, $description, $priority);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }

    function removeBanda($id) {
        AuthHelper::verify();
        $this->model->deleteBanda($id);
        header('Location: ' . BASE_URL);
    }
    
    public function updateBanda()
    {
        AuthHelper::verify();
        // Obtén los valores del formulario
        $bandaId = $_POST['bandaId'];
        $campo = $_POST['campo'];
        $nuevoValor = $_POST['nuevoValor'];

        // Actualiza el álbum en la base de datos
        $this->model->updateBanda($bandaId, $campo, $nuevoValor);

        // Redirige al usuario a la página de administración
        header('Location: ' . BASE_URL . 'administracion_banda');
    }

}