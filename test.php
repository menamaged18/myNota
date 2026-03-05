<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'database.php';
require 'model/Note.php';

echo "Files loaded successfully.<br>";

$notes = Note::getAllUserNotes(1);
var_dump($notes);