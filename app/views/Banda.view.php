<?php

class BandaView {
    public function showBandas($bandas) {
       
        require 'templates/bandaList.phtml';
    }

    public function showBandaDetails($album)
    {
       
          require 'templates/banda_detail.phtml';
           
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}