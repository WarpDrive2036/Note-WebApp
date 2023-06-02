<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$errors=[];

//Validate the user input (pass & email)
if (!Validator::email($email))
{
    $errors['email'] = 'Please enter a Valid email';
}
if (! Validator::string($password,7,255)) //
{
    $errors['password'] = 'Please enter a password of length of at-least 7 characters';
}

if (!empty($errors)) // if there is errors then view the registration form again
{
    require view("/registration/create.view.php",[
        'errors'=>$errors,
    ]);
}

//Check if the email is already found in the DB
// if yes then let the user either know or redirect them to the register form
// if no then just proceed with registering the user

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = ?',[$email])->find();

if($user)
{
    $errors['email'] = 'Email already exists';

}

if (!empty($errors)) // if there is errors then view the registration form again
{
    require view("/registration/create.view.php",[
        'errors'=>$errors,
    ]);
} else {

    //if the errors array is empty then we are good to go & add the user entered query to the DB
    $db->query('INSERT INTO users (email,password) VALUES (:email, :password)',[

            'email'=>$email,
            'password'=>password_hash($password,PASSWORD_BCRYPT) // We "MUST" hash the user
            // entered password for security reasons in case the DB gets breached
        ]
    );

    $user = $db->query('select * from users where email = ?',[$email])->find();
    //mark that the user has logged in by creating a session
    login($user);
    $_SESSION['user_id']=$user['id'];

//    $_SESSION['user']= [ //lets create a function that creates a session each time a user is logged in
//        'email'=>$email
//    ];

    header('location: /');
    exit();


}

