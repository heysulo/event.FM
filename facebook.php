<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("path.php");
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => '244288862680383',
    'app_secret' => '4226c7bcbbbb6d68902196183096e6aa',
    'default_graph_version' => 'v2.5',
]);

if (isset($_SESSION['facebook_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    try {
        $response = $fb->get('/me?fields=email,id,cover,name,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified');
        $userNode = $response->getGraphUser();
    }catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        header('Location: '.$host."index.php");
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        header('Location: '.$host."index.php");
    }
}else{
    header('Location:./index.php');
}