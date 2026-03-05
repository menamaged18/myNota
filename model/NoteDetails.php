<?php

class NoteDetails {
    private static $notesDetails = [
        [
            'id' => 1, 
            'details' => [
                ['id' => 1, 'content' => "finish note details model"],
                ['id' => 2, 'content' => "make style for note details model"],
                ['id' => 3, 'content' => "replace models with sql models"],
            ]
        ],
        [
            'id' => 2,
            'details' => [
                ['id' => 1, 'content' => "call my brother to leave the car for tomorrow"],
                ['id' => 2, 'content' => "wake up at most 8"],
                ['id' => 3, 'content' => "make and eat breakfast"],
                ['id' => 4, 'content' => "take my car to the hospital"],
            ]
        ],
        [
            'id' => 3,
            'details' => [
                ['id' => 1, 'content' => "install project dependencies and setup"],
                ['id' => 2, 'content' => "start implementing"],
                ['id' => 3, 'content' => "solve errors"],
            ]
        ],        
    ];

    public static function getNoteDetailsById($id) {
        foreach (self::$notesDetails as $note) {
            if ($note['id'] == $id) {
                return $note['details'];
            }
        }
        return null; // not found
    }

    // connecting to db

    // get note details 
    public static function getNoteDetails($id){
        global $db;
        try {
            $results = $db->query("SELECT * FROM note_details WHERE note_id = :id", [
                'id' => $id
            ])->fetchAll();
            return $results;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    
    // Add a new detail/task to a note
    public static function create($noteId, $content) {
        global $db;
        return $db->query("INSERT INTO note_details (note_id, content) VALUES (:note_id, :content)", [
            'note_id' => $noteId,
            'content' => $content
        ]);
    }

    // Edit the text content of a detail
    public static function update($detailId, $content) {
        global $db;
        return $db->query("UPDATE note_details SET content = :content WHERE id = :id", [
            'id'      => $detailId,
            'content' => $content
        ]);
    }

    // Toggle the 'checked' status (Boolean)
    public static function toggleCheck($detailId, $status) {
        global $db;
        return $db->query("UPDATE note_details SET checked = :status WHERE id = :id", [
            'id'     => $detailId,
            'status' => $status ? 1 : 0
        ]);
    }

    // Remove a specific detail item
    public static function delete($detailId) {
        global $db;
        return $db->query("DELETE FROM note_details WHERE id = :id", [
            'id' => $detailId
        ]);
    }

    // Fetch a single detail row
    public static function find($detailId) {
        global $db;
        return $db->query("SELECT * FROM note_details WHERE id = :id", [
            'id' => $detailId
        ])->fetch();
    }
}