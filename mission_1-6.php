<DOCTYPE html>
<html>
<head>
<meta=charset="utf-8">
</head>
<body>
<form method="post" action="mission_1-6.php">
<input type="text"value="コメント"name="comment">
<input type="submit"value="送信">
</form>
</body>
</html>
<?php
$comment=$_POST['comment'];
if(!empty($_POST["comment"])){
$filename="mission_1-6_Iwata.txt";
$fp=fopen($filename,"a");
fwrite($fp,$comment."\n");
fclose($fp);
}
?>