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

    // get user notes
    public static function getAllUserNotes($id){
        global $db;
        try {
            $results = $db->query("SELECT * FROM notes WHERE user_id = :id", [
                'id' => $id
            ])->fetchAll();
            return $results;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    
    // Add a new note
    public static function create($userId, $title) {
        global $db;
        return $db->query("INSERT INTO notes (user_id, title) VALUES (:user_id, :title)", [
            'user_id' => $userId,
            'title'   => $title
        ]);
    }

    // Change the title of an existing noteId
    public static function update($noteId, $title) {
        global $db;
        return $db->query("UPDATE notes SET title = :title WHERE id = :id", [
            'id'    => $noteId,
            'title' => $title
        ]);
    }

    // Remove a note by its ID
    public static function delete($id) {
        global $db;
        return $db->query("DELETE FROM notes WHERE id = :id", [
            'id' => $id
        ]);
    }
    
    // Fetch a single note 
    public static function find($id) {
        global $db;
        return $db->query("SELECT * FROM notes WHERE id = :id", [
            'id' => $id
        ])->fetch();
    }
}