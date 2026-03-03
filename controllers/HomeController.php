<?php

require_once 'model/Note.php';

class HomeController
{
    public function index() {
        $notes = Note::all();
        require 'views/home.php';
    }
}