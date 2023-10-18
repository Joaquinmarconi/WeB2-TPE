<?php
require_once 'app/controllers/Banda.controller.php';
require_once 'app/controllers/album.controller.php';
require_once 'app/views/admin.album.view.php';
require_once 'app/views/admin.banda.view.php';


class AdminController {

    private $admin_band_view;
    private $admin_album_view;

    public function __construct() {

        AuthHelper::verify();
        
          $this->admin_band_view = new AdminBandView();
          $this->admin_album_view = new AdminAlbumView();
    }


    public function showAlbumAdministrator(){

        $this->admin_album_view->showAlbumAdministrator();
        
    }

    public function showBandAdministrator(){

        $this->admin_band_view->showBandAdministrator();
        
    }

}
