<?php

//return [
//    '/' => 'controllers/index.php',
//    '/about' => 'controllers/about.php',
//    '/contact' => 'controllers/contact.php',
//    '/note' => 'controllers/notes/show.php',
//    '/notes/create'=> `'controllers/notes/create.php',
//    '/notes' => 'controllers/notes/index.php'
//];

// This Refactor/Update to our Router made it possible to accept diverse custom requests from both users/page

$router->get('/','controllers/index.php');
$router->get('/about','controllers/about.php');
$router->get('/contact','controllers/contact.php');

//registration routes
$router->get('/register','controllers/registration/create.php')->only('guest'); // only unregistered users
$router->post('/register','controllers/registration/store.php')->only('guest');


$router->get('/note','controllers/notes/show.php');
$router->patch('/note','controllers/notes/update.php'); // when a patch request is listened direct me
// to the update.php file to continue with the procedure
$router->delete('/note','controllers/notes/destroy.php');// That was the reason we did all
// this Router refactoring so we accept different request methods that aren't yet built-in
$router->get('/notes/create','controllers/notes/create.php');
$router->post('/notes','controllers/notes/store.php');
$router->get('/note/edit','controllers/notes/edit.php');
$router->get('/notes','controllers/notes/index.php')->only('auth');// only auth users can access

//log in Sessions
$router->get('/login','controllers/sessions/create.php')->only('guest');
$router->post('/sessions','controllers/sessions/store.php')->only('guest');
$router->delete('/sessions','controllers/sessions/destroy.php')->only('auth');






