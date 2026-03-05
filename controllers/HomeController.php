<?php

require 'model/Note.php';

class HomeController
{
    public function index() {       
        $notes = Note::getAllUserNotes(1);

        require 'views/home.php';
    }
}