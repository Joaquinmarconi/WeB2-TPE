<?php

class AuthView {
    public function showLogin($error = null) {
        require './templates/login.phtml';
        require './templates/logout.phtml';
    }
}