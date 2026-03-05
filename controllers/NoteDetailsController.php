<?php

require_once 'model/NoteDetails.php';
require_once 'model/Note.php';

class NoteDetailsController
{
    public function index($id)
    {
        $details = NoteDetails::getNoteDetails($id);
        $note = Note::find($id);

        if (!$note) {
            header("Location: /");
            exit();
        }

        $note_title = $note['title'];
        $note_id = $id; // this needed to the view for the "Add" form
        require 'views/noteDetails.php';
    }

    public function store()
    {
        $note_id = $_POST['note_id'];
        $content = $_POST['content'];

        if (!empty($content)) {
            NoteDetails::create($note_id, $content);
        }

        header("Location: /note/" . $note_id);
        exit();
    }

    public function destroy($id)
    {
        // We need the note_id to redirect back to the correct page
        $detail = NoteDetails::find($id);
        if ($detail) {
            NoteDetails::delete($id);
            header("Location: /note/" . $detail['note_id']);
        } else {
            header("Location: /");
        }
        exit();
    }
    
    public function edit($id)
    {
        $item = NoteDetails::find($id);

        if (!$item) {
            header("Location: /");
            exit();
        }

        require 'views/noteDetailsEdit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $content = $_POST['content'];
        $note_id = $_POST['note_id'];

        if (!empty($content)) {
            NoteDetails::update($id, $content);
        }

        // Redirect back to the parent note's details page
        header("Location: /note/" . $note_id);
        exit();
    }
}