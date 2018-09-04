<?php
//制御変数
$control = 0;

//
$command = "";

switch ($control) {
  //イントロ
  case '0':
    $text = " Hello!!!";
    $payload = array("text" => $text);
    echo json_encode($payload);  //json_encodeすることでslackが受け取れるように変換
    $control++;

    break;

  //コマンド受付
  case '1':


    //
    break;


  default:
    //
    break;
}

// 受信文字列取得
// if($_POST["user_name"] != "slackbot"){
//   $text = "@".$_POST["user_name"]." Hello!!!";
//   $payload = array("text" => $text);
//
//   echo json_encode($payload);
// }

//【参考】https://qiita.com/chike0905/items/58222a99be460f325ab8
