<?php
// AdminView.php


class AdminAlbumView
{

    private $itemModel;
    private $categoryModel;

    public function __construct()
    {
        $this->itemModel = new AlbumModel;
        $this->categoryModel = new BandaModel;
    }

    function showAlbumAdministrator()
    {
        // Obtén los álbumes desde el modelo
        $albums = $this->itemModel->getAlbums();

        // Pasa los álbumes a la vista
        require 'templates/añadirAlbum.phtml';
        require 'templates/borrarAlbum.phtml';
        require 'templates/modificarAlbum.phtml';
    }
}