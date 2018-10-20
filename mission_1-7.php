<DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form method="post"action="mission_1-7.php">
<input type="text"name="comment"value="コメント">
<input type="submit"value="送信">
</form>
</body>
</html>
<?php
$comment=$_POST["comment"];
if(!empty($_POST["comment"])){

$lines=file("mission_1-6_Iwata.txt");
foreach($lines as $files){
echo "$files<br/>";
}

$filename="mission_1-6_Iwata.txt";
$fp=fopen($filename,"a");
fwrite($fp,$comment."\n");
fclose($fp);
}
?>