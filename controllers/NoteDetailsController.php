<?php

require 'model/NoteDetails.php';

class NoteDetailsController
{
    public function index($id)
    {
        $details = NoteDetails::getNoteDetailsById($id);
        // echo "Note ID is: " . $id;
        require 'views/note.php';
    }
}