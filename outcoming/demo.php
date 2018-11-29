<?php
//入力された文字取得
//TODO HOOKSの文字の連携
//TODO 一番最初のアクション
//TODO 各メニューから戻った時のファイル初期化
$text = "";  //最終的に送るメッセージ
$command = $_POST["text"];  //Slackから書き込んだ内容

//fileの読み込み
$filename = 'counter.dat';  //仮のカウンタ、のちのちファイルは利用しない
$fp = fopen($filename, "r+");
$count = fgets($fp,32);
fseek($fp, 0);
fputs($fp, $count);
    
    if (substr($command, 3) == "bye") {
        $text = "byebye";
        $payload = array("text" => $text);
        echo json_encode($payload);  //json_encodeすることでslackが受け取れるように変換
        
        $count = 0;
        fseek($fp, 0);
        fputs($fp, $count);
        fclose($fp);
    }
//TODO ここでもしもmodeがaddだったらcount0?
    else if (substr($command, 3) == "シフト登録") {
        $text = "「◯◯月,」と入力した後、出勤可能な日付をカンマ区切りで入力し、最後に名前を入力してください".PHP_EOL."Ex.USA01月,1,2,3,4,5,こんどう";
        $payload = array("text" => $text);
        echo json_encode($payload);  //json_encodeすることでslackが受け取れるように変換
        $count = 1;
        fseek($fp, 0);
        fputs($fp, $count);
        fclose($fp);
    }
    
    else if (substr($command, 3) == "シフト確認") {
        $text = "「◯◯月,」と入力した後、確認したい人の名前を入力してください".PHP_EOL."Ex.USA01月,こんどう";
        $payload = array("text" => $text);
        echo json_encode($payload);  //json_encodeすることでslackが受け取れるように変換
        $count = 2;
        fseek($fp, 0);
        fputs($fp, $count);
        fclose($fp);
    }
    
    else {
        switch ($count) {
            case 1:
                $text = "登録完了！";
                $payload = array("text" => $text);
                echo json_encode($payload);
                $count++;
                fseek($fp, 0);
                fputs($fp, $count);
                fclose($fp);
                
                //ファイルへの書き込み処理
                $month = substr($command, 3,5);  // 月取得
                $array = array(substr($command, 9));
                $file = fopen($month.".csv", a);
                if( $file ){
                    var_dump( fputcsv($file, $array) );
                }
                break;
            
            $str = "";
            case 2:
                $name = substr($command, 8);  //入力した値から名前のみを抽出したい
                $month = substr($command, 3,5);  // 月取得
                $file = new SplFileObject($month.".csv");
                $file->setFlags(SplFileObject::READ_CSV);
                $i = 0;  //擬似ループ用
                foreach($file as $f){
                    $fields[] = $f;
                    $str = $fields[$i][0];  //データ挿入
                    
                    if(strpos($str, $name)) {  //linesの中に入力した名前があったら
                        $text = $fields[$i][0];
                        $payload = array("text" => $text);
                        echo json_encode($payload);
                    }
                    
//                    else {
//                        $text = "見つかりません";
//                        $payload = array("text" => $text);
//                        echo json_encode($payload);
//                    }
                    $i++;
                }

                //連続検索できるようこれはないほうがいい
//                $count++;
//                fseek($fp, 0);
//                fputs($fp, $count);
//                fclose($fp);
                break;
                
            default:
                $text = "無効なコマンドです、最初からやりなおしてください";
                $count = 0;
                fseek($fp, 0);
                fputs($fp, $count);
                fclose($fp);
                break;
        }
    }
?>

<!-- 【参考】https://qiita.com/chike0905/items/58222a99be460f325ab8 -->
