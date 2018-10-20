<!DOCTYPE html>
<html lang="ja">
<html>
<head>
<meta charset="utf-8">
<title>フォームからデータを受け取る</title>
</head>
<body>
<form method="post"action="mission_1-5.php">
<p><input type="text"value="コメント"name="comment">
<input type="submit"value="送信"></p>
</form>
</body>
</html>
<?php
$comment=$_POST['comment'];
$date=date("Y年m月d日 H時i分s秒");
if($comment=="完成！"){
echo "おめでとう!";
}elseif(!empty($_POST["comment"])){
echo"ご入力ありがとうございます。<br>".$date."に".$comment."を受け付けました</html>";
}
$filename="mission_1-5_Iwata.txt";
$fp=fopen($filename,"w");
fwrite($fp,$comment);
fclose($fp);
?>
</html>