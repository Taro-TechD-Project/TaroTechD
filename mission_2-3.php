<DOCTYPE="html">
<html lnag="ja">
<html>
<head>
<meta charset="utf-8">
<title>ファイルからデータを受け取る</title>
</head>
<body>
<form method="post"action="mission_2-3.php">

<!--名前欄-->
<input type="text"name="name"placeholder="名前"><br>

<!--コメント欄-->
<input type="text"name="comment"placeholder="コメント">

<!--送信ボタン-->
<input type="submit"value="送信"><br><br>

<!--削除対象番号-->
<input type="text"name="delete"placeholder="削除対象番号">
<input type="submit"value="削除">

</form>
</html>


<?php
$name=$_POST["name"];
$comment=$_POST["comment"];
$delete=$_POST["delete"];

//empty関数による空白判定
if(!empty($_POST["name"])&&!empty($_POST["comment"])){
$filename="mission_2-1_Iwata.txt";
$fp=fopen($filename,"a");
$lines=file("mission_2-1_Iwata.txt");
$cnt=count($lines);
$cnt++;
fwrite($fp,$cnt."<>".$POST_["name"]."<>".$_POST["comment"]."<>".date("Y年m月d日 H:i:s")."\n");
fclose($fp);
}

//削除指定番号の処理
if(!empty($_POST["delete"])){
$filename="mission_2-1_Iwata.txt";
$lines=file("mission_2-1_Iwata.txt");
$fp=fopen($filename,"w");

//削除番号の比較
foreach($lines as $files){
$line=explode("<>",$files);
if ($line[0] != $delete){
fwrite($fp,$files);
}
}
}

//ループ処理 文字列の分割 取り出し
$lines=file("mission_2-1_Iwata.txt");
foreach($lines as $files){
$line=explode("<>",$files);
 	echo $line[0];
	echo $line[1];
	echo $line[2];
	echo $line[3]."<br>";
}
?>
