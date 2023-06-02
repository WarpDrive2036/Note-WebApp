<?php

use Core\App;// Path to the Packaged/name-spaced App Class

//$config = require base_path('config.php');
//$db = new Database($config['database']);

$db = App::resolve('Core\Database'); // or we can add the argument (Database :: class) & the path
// will be auto found but we will need to import the Database Class by use Core/Database

$currentUserId = $_SESSION['user_id'];

//$notes = $db->query('SELECT * from notes where id = :id',['id'=>$_GET['id']])->fetchAll();  //OR

//I prefer this way below
    $note = $db->query('SELECT * from notes where id = ?',[$_POST['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id =?',[$_POST['id']]);

    //re-directs the user to the main notes page
    header('location: /notes');
    exit();






