<?php

use Core\App;

$db = App::resolve('Core\Database'); // or we can add the argument (Database :: class) & the path
// will be auto found but we will need to import the Database Class by use Core/Database

$currentUserID = $_SESSION['user_id'];
$notes = $db->query("SELECT * from notes where user_id = $currentUserID")->get();


view('notes/index.view.php',[
    // Add what's gonna be required by the view referenced
    'heading'=>'My Notes',
    'notes'=>$notes
]);