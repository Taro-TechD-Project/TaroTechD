<!DOCTYPE html>
<html lang="ja">
<html>
<head>
<meta charset="utf-8">
<title>フォームからデータを受け取る</title>
</head>
<body>
<form method="post"action="mission_2-1.php">

<!--名前欄-->
<p>名前：
<input type="text"name="name"></p>

<!--コメント欄-->
<p>コメント：
<input type="text"name="comment"></p>

<!--送信ボタン-->
<p><input type="submit"value="送信"></p>

</form>
</body>
</html>

<?php
$lines=file("mission_2-1_Iwata.txt");
$cnt=count($lines);
$cnt++;

if(!empty($_POST["name"])&&!empty($_POST["comment"])){
if(file_exists("mission_2-1_Iwata.txt")){
	"カウントして$cntに入れ、++する";
}else{
	$cnt = 1;
}

$filename="mission_2-1_Iwata.txt";
$fp=fopen($filename,"a");
fwrite($fp,$cnt."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y年m月d日 H:i:s")."\n");
fclose($fp);
}
?>