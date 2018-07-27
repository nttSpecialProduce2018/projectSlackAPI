<?php
$num = $_POST["numnum"];

$webhook_url = 'https://hooks.slack.com/services/XXXXXXXXXX';

$msg = array(
    'username' => 'phpPost',
    'text' => $num
);
$msg = json_encode($msg);
$msg = 'payload=' . urlencode($msg);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $webhook_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
curl_exec($ch);
curl_close($ch);

echo ('送信したで');


//【参考】http://docs.hatenablog.jp/entry/slack-Incoming-webhooks
