<?php
session_start();
date_default_timezone_set('Asia/Tokyo');

require_once 'php-graph-sdk-master/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => 'アプリID',
    'app_secret' => 'App Secret',
    'default_graph_version' => 'v2.7',
]);

$helper = $fb->getRedirectLoginHelper();

try {
    $access_token = $helper->getAccessToken();
    $res = $fb->get( '/me', $access_token);

} catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo $e->getMessage();
    exit();

} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo $e->getMessage();
    exit();
}

var_dump($res->getDecodedBody());
