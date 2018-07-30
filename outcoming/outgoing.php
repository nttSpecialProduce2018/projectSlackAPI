<?php
// 受信文字列取得
if($_POST["user_name"] != "slackbot"){
  $text = "@".$_POST["user_name"]." Hello!!!";
  $payload = array("text" => $text);

  echo json_encode($payload);
}

//【参考】https://qiita.com/chike0905/items/58222a99be460f325ab8
