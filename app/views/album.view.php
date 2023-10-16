<?php

class AlbumView
{
    public function showAlbums($albums)
    {


        // Obtén las bandas

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require 'templates/albumList.phtml';
    }

    public function showAlbumDetails($album, $banda)
    {
       
        var_dump($album);
        var_dump($banda);
          require 'templates/album_detail.phtml';
           
    }
     

    public function showError($error)
    {
        require 'templates/error.phtml';
    }

    public function showAdd ($error = null){

        require 'templates/form_album.phtml';
    }
}