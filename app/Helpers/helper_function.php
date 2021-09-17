<?php

function sendSms($mobile, $message){
    $username="vaibhav";
    $api_password="68237u49lwveehwew";
    $sender="TSOUTH";
    $domain="bulk.mobiglitz.com";
    $priority="11";// 11-Enterprise, 12- Scrub
    $username=urlencode($username);
	$api_password=urlencode($api_password);
	$sender=urlencode($sender);
    $message=urlencode($message);
    $parameters="username=$username&api_password=$api_password&sender=$sender&to=$mobile&message=$message&priority=$priority";
    $fp = fopen("http://$domain/pushsms.php?$parameters", "r");
    $response = stream_get_contents($fp);
    fpassthru($fp);
    fclose($fp);
}