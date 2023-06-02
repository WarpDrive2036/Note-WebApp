<?php

use Core\Database; // Path to the Packaged/name-spaced Database Class
use Core\App;
use Core\Validator;

$db = App::resolve('Core\Database'); // or we can add the argument (Database :: class) & the path
// will be auto found but we will need to import the Database Class by use Core/Database
$currentUserId = $_SESSION['user_id'];



//$notes = $db->query('SELECT * from notes where id = :id',['id'=>$_GET['id']])->fetchAll();  //OR

//I prefer this way below NOTE *** (onlt Works for fetching but not updating)
$note = $db->query('SELECT * from notes where id = ?',[$_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

// Validate the entry
// if the _POST['body'] array is empty/or has more than 1,000 chrs then add an element to the errors array
if(!Validator::string($_POST['body'],1,1000)){
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

// if there is Validation errors (errors array not empty) we reload the view

if (!empty($errors)) {
    return view('notes/edit.view.php', [
        // Add what's gonna be required by the view referenced
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}
//if the errors array is empty then we are good to go & we can proceed to "UPDATE" the user entered query to the DB
$db->query('update notes set body = :body where id = :id',[
    'id'=>$_POST['id'],
    'body'=>$_POST['body']
]);

header('location: /notes'); //re-directs the user to the main notes page
die();

