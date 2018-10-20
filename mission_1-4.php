<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UFT-8">
<title>フォームからデータを受け取る</title>
</head>
<body>
<form method="post"action="mission_1-4.php">
<p><input type="text"value="コメント"name="comment">
<input type="submit"value="送信"></p>
</form>
</body>
<?php
$comment=$_POST['comment'];
$date=date("Y年m月d日 H時i分s秒");
echo"ご入力ありがとうございます。<br>".$date."に".$comment."を受け付けました</html>";
?>