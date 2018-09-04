<?php

$filepath = 'test.csv';

//オブジェクトの生成
$file = new SplFileObject($filepath);

//CSVファイルの読み込み
$file->setFlags(SplFileObject::READ_CSV);

$row = 0;

//1行ずつ値を取得する
foreach ($file as $line) {
  //1行の要素数を調べる
  $cnt = count($line);



  for($i = 0; $i < $cnt; $i++){
    //if($i  == 1) {
      echo $line[$i].'<br>';
    //}
  }
}

?>
