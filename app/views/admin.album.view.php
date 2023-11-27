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

        $albums = $this->itemModel->getAlbums();
        $bandas = $this->categoryModel->getBandas();

        require 'templates/añadirAlbum.phtml';
        require 'templates/borrarAlbum.phtml';
        require 'templates/modificarAlbum.phtml';
    }
}