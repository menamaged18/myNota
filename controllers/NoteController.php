<?php

require 'model/Note.php';

class NoteController
{
    // user notes
    public function index() {       
        $notes = Note::getAllUserNotes(1);

        require 'views/home.php';
    }

    // Show the form to create a new note
    public function create()
    {
        require 'views/note-create.php';
    }

    // Handle the POST from the create form
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /');
            exit;
        }

        $userId = 1; // Hard‑coded for now; you should use the logged‑in user’s ID
        $title = trim($_POST['title'] ?? '');

        if (!empty($title)) {
            Note::create($userId, $title);
        }

        header('Location: /');
        exit;
    }

    // Show the form to edit an existing note
    public function edit($id)
    {
        $note = Note::find($id);
        if (!$note) {
            header('Location: /');
            exit;
        }
        require 'views/note-edit.php';
    }

    // Handle the POST from the edit form
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /');
            exit;
        }

        $title = trim($_POST['title'] ?? '');
        if (!empty($title)) {
            Note::update($id, $title);
        }

        header('Location: /');
        exit;
    }

    // Handle the POST from the delete form
    public function destroy($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /');
            exit;
        }

        Note::delete($id);
        header('Location: /');
        exit;
    }
}