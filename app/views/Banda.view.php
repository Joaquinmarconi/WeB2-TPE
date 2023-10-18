<?php

class BandaView {
    public function showBandas($Bandas) {
       
     // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require 'templates/BandaList.phtml';
        require 'templates/album_detail.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}