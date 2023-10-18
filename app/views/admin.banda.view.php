<?php

// AdminView.php
class AdminBandView
{

    private $itemModel;
    private $categoryModel;

    public function __construct()
    {
        $this->itemModel = new AlbumModel;
        $this->categoryModel = new BandaModel;
    }
    function showBandAdministrator()
    {

        $bandas = $this->categoryModel->getBandas();

        require 'templates/añadirBanda.phtml';
        require 'templates/borrarBanda.phtml';
        require 'templates/modificarBanda.phtml';
    }


}
?>