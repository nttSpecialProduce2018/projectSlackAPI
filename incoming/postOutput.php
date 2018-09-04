<?php
$num = $_POST["numnum"];

function send_to_slack($message) {
  $webhook_url = 'https://hooks.slack.com/services/XXXXXXXXXXXXXXXXXXXXX';
  $options = array(
    'http' => array(
      'method' => 'POST',
      'header' => 'Content-Type: application/json',
      'content' => json_encode($message),
    )
  );
  $response = file_get_contents($webhook_url, false, stream_context_create($options));
  return $response === 'ok';
}

$message = array(
  'username' => 'bot',
  'text' => $num,
);

send_to_slack($message);

echo ('送信したで');

//【参考】https://qiita.com/hoto17296/items/621a6e16f23785a543f3
