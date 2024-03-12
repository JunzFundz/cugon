<?php

require_once('vendor/autoload.php');
require_once('../database/Connection.php');

$clientId = "254351900547-6cpo3epqmleqihdm11kd5gggagu4pj2r.apps.googleusercontent.com";
$clientKey = "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";
$url = "http://localhost/cugon/User/home.php";

$gclient = new Google_Client();
$gclient->setClientId($clientId);
$gclient->setClientSecret($clientKey);

$gclient->addScope('email');
$gclient->addScope('profile');

$gclient->setRedirectUri($url);

