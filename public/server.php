<?php
require 'vendor/autoload.php';
// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];
$app = new \Slim\App($config);

// Define app routes

// $newResponse = withJson($data);

$app->get('/json', function ($request, $response, $args) {
  // $response2 = $response->withHeader('Content-type', 'application/json');
  // $data = array('name' => 'Bob', 'age' => 40);

  $data = array('name' => 'Bob', 'age' => 10);
  $response->withHeader('Content-Type', 'application/json');
  $response->write(json_encode($data));
  return $response;
});


$app->get('/time', function ($request, $response, $args) {

  $data = array('name' => 'Bob', 'time' => date("H:i:s"));
  $response->withHeader('Content-Type', 'application/json');
  $response->write(json_encode($data));
  return $response;
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello " . $args['name']);
});

// Run app
$app->run();
