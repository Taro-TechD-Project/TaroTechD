<DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form method="post"action="mission_2-2.php">

<!--名前欄-->
<input type="text"name="name"placeholder="名前"></br>

<!--コメント欄-->
<input type="text"name="comment"placeholder="コメント">

<!--送信欄-->
<input type="submit"value="送信">

</form>
</body>
</html>

<?php
if(!empty($_POST["name"])&&!empty($_POST["comment"])){
$filename="mission_2-1_Iwata.txt";
$fp=fopen($filename,"a");
$lines=file("mission_2-1_Iwata.txt");
$cnt=count($lines);
$cnt++;
fwrite($fp,$cnt."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y年m月d日 H:i:s")."\n");
fclose($fp);
}

//ループ処理 区切り文字 分割
$lines=file("mission_2-1_Iwata.txt");
foreach($lines as $files){
$line=explode("<>",$files);
	echo $line[0];
	echo $line[1];
	echo $line[2];
	echo $line[3]."<br>";
}
?>