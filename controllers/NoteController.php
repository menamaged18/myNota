<?php

require 'model/NoteDetails.php';

class NoteController
{
    public function index($id)
    {
        $details = NoteDetails::getNoteDetailsById($id);
        // echo "Note ID is: " . $id;
        require 'views/note.php';
    }
}