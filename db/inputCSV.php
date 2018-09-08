<table border="1">
<tr>
<td>ID</td>
<td>名前</td>
<td>価格</td>
</tr>

<?php

$filepath = 'test.csv';

//オブジェクトの生成
$file = new SplFileObject($filepath);

//CSVファイルの読み込み
$file->setFlags(SplFileObject::READ_CSV);

//1行ずつ値を取得する
foreach ($file as $line) {
  //1行の要素数を調べる
  $cnt = count($line);

  echo '<tr>';
  for($i = 0; $i < $cnt; $i++){
      echo '<td>'.$line[$i].'</td>';
  }
  echo '</tr>';

}

?>

</table>
