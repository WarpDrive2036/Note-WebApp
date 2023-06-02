<?php

use Core\Database; // Path to the Packaged/name-spaced Database Class
use Core\App;

$db = App::resolve('Core\Database'); // or we can add the argument (Database :: class) & the path
// will be auto found but we will need to import the Database Class by use Core/Database
$currentUserId = $_SESSION['user_id'];

//$notes = $db->query('SELECT * from notes where id = :id',['id'=>$_GET['id']])->fetchAll();  //OR

//I prefer this way below
$note = $db->query('SELECT * from notes where id = ?',[$_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php',[
    // Add what's gonna be required by the view referenced
    'heading'=>'Edit Note',
    'errors'=> [],
    'note'=>$note

]);






