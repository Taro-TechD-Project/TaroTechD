<?php

//編集選択機能 編集番号 file関数 配列化 読み込み
if (!empty($_POST["edit2"])){
	$lines = file("mission_2-1_Iwata.txt");


//各投稿番号とPOSTで送信された編集番号の比較 一致した場合に取得
foreach($lines as $files){
	$line = explode("<>",$files);
		if ($line[0] == $_POST["edit2"]){
		$EDIT2 =  $line[0];
		$NAME =  $line[1];
		$COMMENT =  $line[2];
		}
	}
}

?>

<!DOCTYPE html>
<html lang="ja">
<html>

<head>
<meta http equiv="content-type" content="text/html;charset=utf-8">
<title>編集指定用フォーム</title>
</head>

<body>
<form method="post"action="mission_2-4.php">							<!--mission_2-4.phpに名前、コメントを送信-->


<!--名前欄-->
<input type="text"name="name"placeholder="名前"value="<?php echo $NAME;?>"><br>			<!--$NAMEを上のphpの変数として使用-->


<!--コメント欄-->
<input type="text"name="comment"placeholder="コメント"value="<?php echo $COMMENT;?>">		<!--$COMMENTを上のphpの変数として使用-->


<!--編集ボタン-->
<input type="hidden"name="edit1"placeholder="編集ボタン"value="<?php echo $EDIT2;?>">
<input type="submit"value="送信"><br><br>


<!--削除対象番号-->
<input type="text"name="delete"placeholder="削除対象番号">
<input type="submit"value="削除"><br><br>


<!--編集モード-->
<input type="text"name="edit2"placeholder="編集対象番号">
<input type="submit"value="編集">

</form>
</body>
</html>


<?php

$name=$_POST["name"];

$comment=$_POST["comment"];

$delete=$_POST["delete"];

$edit=$_POST["edit"];

$time=date("Y年m月d日 H:i:s");

$lines=file("mission_2-1_Iwata.txt");
$cnt=count($lines);


//empty関数による空白判定
if (!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["edit1"])){
	$filename = "mission_2-1_Iwata.txt";
	$fp = fopen($filename,"a");
	$lines = file("mission_2-1_Iwata.txt");
	fclose($fp);
}

//削除指定番号の処理
if (!empty($_POST["delete"])){
	$filename = "mission_2-1_Iwata.txt";
	$lines = file("mission_2-1_Iwata.txt");
	$fp = fopen($filename,"w");

//削除番号の比較
		foreach($lines as $files){
		$line = explode("<>",$files);
		if ($line[0] != $delete){
		fclose($fp);
		}
	}
}

//編集実行機能
if (!empty($_POST["edit1"])){					//空でないかの確認
$filename = "mission_2-1_Iwata.txt";
$lines = file("mission_2-1_Iwata.txt");
$cnt = count($lines);
$cnt++;
$fp=fopen($filename,"w");

	foreach($lines as $files){
	$edit1=$_POST["edit1"];
	$line = explode("<>",$files);
	
		if($line[0] == $edit1){				//投稿番号の比較 一致した時に書き込み
		fwrite($fp,$edit1."<>".$name."<>".$comment."<>".$time."\n");

		}else{						//一致しない時は元のフォームを書き込む
		fwrite($fp,$files);
		}
	}
fclose($fp);
}

			if (!empty($_POST["name"]) && !empty($_POST["comment"]) && empty($_POST["edit1"])){		//空の場合　新規投稿
			$filename = "mission_2-1_Iwata.txt";
			$fp = fopen($filename,"a");
			$lines = file("mission_2-1_Iwata.txt");
			$cnt = count($lines);
			$cnt++;
			fwrite($fp,$cnt."<>".$name."<>".$comment."<>".$time."\n");
			fclose($fp);
}

//ループ処理 文字列の分割 取り出し
$lines = file("mission_2-1_Iwata.txt");
	foreach($lines as $files){
	$line = explode("<>",$files);
 		echo $line[0];
		echo $line[1];
		echo $line[2];
		echo $line[3]."<br>";
}
?>