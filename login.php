<?php
define("event.fm_optimus", true);
session_start();
include_once("path.php");
include_once("database/database.php");
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => '244288862680383',
    'app_secret' => '4226c7bcbbbb6d68902196183096e6aa',
    'default_graph_version' => 'v2.5',
]);
$redirect = $host.'login.php';
$helper = $fb->getRedirectLoginHelper();
try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (isset($accessToken)) {
    //$_SESSION['facebook_access_token'] = $accessToken;
    $fb->setDefaultAccessToken($accessToken);
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
    $member_id= $userNode->getId();
    $first_name = $userNode->getFirstName();
    $middle_name = $userNode->getMiddleName();
    $last_name = $userNode->getLastName();
    $name = $userNode->getName();
    $gender= $userNode->getGender();
    $email= $userNode->getEmail();
    $query = "call reguser($member_id,\"$first_name\",\"$middle_name\",\"$last_name\",\"$name\",\"$gender\",\"$email\");";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['facebook_access_token'] = (string) $accessToken;
    if (isset($_SESSION['rdr'])){
        header('Location: '.$_SESSION['rdr']);
        die();
    }else{
        header('Location: '.$host.'home.php');
        die();
    }

}else{
    $permissions  = ['email,public_profile'];
    $loginUrl = $helper->getLoginUrl($redirect,$permissions);
    header('Location: '.$loginUrl);
}

