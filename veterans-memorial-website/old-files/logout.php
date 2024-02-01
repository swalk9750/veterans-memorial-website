<?php
session_start();
require_once("./login/vendor/autoload.php");

$client = new Google_Client();
$client->setAuthConfig('client_secret_947954735630-diqmo09500v9a9kksqih3sj1e8ogf4uk.apps.googleusercontent.com.json');

unset($_SESSION['upload_token']);
$client->revokeToken();
session_destroy();

header("Location:index.php");
?>