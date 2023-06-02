<?php


use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];
$errors=[];
$db = App::resolve(Database::class);

//Validate the user input (pass & email)
if (!Validator::email($email))
{
    $errors['email'] = 'Please enter a Valid email';
}
if (! Validator::string($password)) //
{
    $errors['password'] = 'Please enter a Valid password' ;
}

if (!empty($errors)) // if there is errors then view the registration form again
{
    require view("/sessions/create.view.php",[
        'errors'=>$errors,
    ]);
}


//Matching the user entered credentials to the ones already registered by the user in the DB

$user = $db->query('select * from users where email = ?',[$email])->find(); // fetches all the cell DATA in the DB
// that is related with the entered email

if($user) // Checking if the email exists
{
    // if we reached this point the email exists but we are not sure yet if the password entered
// matches the one stores with this email or not
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        // create a session & redirect to the homepage
        login([
            'email' => $email,
        ]);

        header('location: /');
        exit();

    } // if the password is incorrect

    require view("sessions/create.view.php", [
        'errors' => [
            'password' => 'No matching account found for that email address & password '
        ], // this refactor has a bit of security reasoning meaning the user won't be able to query
        // the DB for registered emails
    ]);

}


