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
}