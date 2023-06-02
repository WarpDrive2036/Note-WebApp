<?php

use Core\Validator;
use Core\App;


$db = App::resolve('Core\Database'); // or we can add the argument (Database :: class) & the path
// will be auto found but we will need to import the Database Class by use Core/Database
$errors= [];

// So When/if a form is submitted the ("Request Method" Associate Key in _SERVER Global variable) changes to POST &
// using that we will be able to fetch or extract the state of submission & its value using ("_POST") Glo Variable

    // inserts any error

// if the _POST['body'] array is empty/or has more than 1,000 chrs then add an element to the errors array
    if(!Validator::string($_POST['body'],1,1000)){
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    }

    if (!empty($errors)){
        return view('notes/create.view.php',[
            // Add what's gonna be required by the view referenced
            'heading'=>'Create a Note',
            'errors'=>$errors
        ]);

    //if the errors array is empty then we are good to go & add the user entered query to the DB
    }
        $user_ID=$_SESSION['user_id'];
        $db->query('INSERT INTO notes (body,user_id) VALUES (?,?)',[$_POST['body'],$user_ID]);

    header('location: /notes'); //re-directs the user to the main notes page
    die();

