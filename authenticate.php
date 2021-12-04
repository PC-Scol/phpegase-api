<?php
require_once(__DIR__.'/conf.php');


$username = ($username) ?: getenv('PEGASE_USERNAME');
$password= ($password) ?: getenv('PEGASE_PASSWORD');


function getToken() {
    global $env;
    global $username;
    global $password;
    $http_client = new GuzzleHttp\Client();
    $res = $http_client->request(
        "POST",
        "https://authn-app.$env.pc-scol.fr/cas/v1/tickets", [
            'form_params' => [
                'username' => $username,
                'password'=> $password,
                'token'=> true
            ]
        ]
    );
    $token = $res->getBody();
    return $token;
}


?>
