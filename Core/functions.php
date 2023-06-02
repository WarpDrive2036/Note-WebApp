<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}


function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();

}

//Default Status will be 403 (Forbidden)
function authorize($condition, $status = Response::FORBIDDEN){

    if (!$condition){
        abort($status); //Created a custom Response class to eliminate a "Magic number" or
        // the need to search for the meaning behind status code number
    }
}

//lets create a function that creates a session each time a user is logged in
function login($user)
{
    $_SESSION['user']= [
        'email'=>$user['email'] //storing the user's email in the session
    ];
    session_regenerate_id(true); //for security reasons
}

function logout()
{
    $_SESSION = []; //Empty the Session Super Global

    session_destroy();// destroy the session file saved in the TMPR DIR folder in the server

    $params= session_get_cookie_params();
//finally delete the cookies
    setcookie('PHPSESSID','',time() - 3600,$params['path'],$params['domain'],$params['secure'],$params['httponly']);

}





// Saves time so we wont need to always explicitly add the BASE_PATH const
function base_path($path){

    return BASE_PATH . $path;
}

// API DEV Friendly function to include/require views
function view($path,$attributes=[]){

    extract($attributes);// basically converts an associative array's key name into a variable &
    // its value into the value of the newly converted variable

    return require base_path('views/'.$path);
}