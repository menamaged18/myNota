<?php

class Note {
    public static $notes = [
        ['id' => 1, 'body' => "finish this project by today"],
        ['id' => 2, 'body' => "doctor meeting tomorrow"],
        ['id' => 3, 'body' => "create project"]
    ];

    public static function all() {
        return self::$notes;
    }

    public static function getNoteById($id) {
        foreach (self::$notes as $note) {
            if ($note['id'] == $id) {
                return $note['body'];
            }
        }
        return null; // Return null if not found
    }
}