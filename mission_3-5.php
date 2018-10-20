<?php
$dsn='mysql:dbname=データベース名;host=localhost;charset=utf8';			/*<?php から ?>で挟まれるPHP領域に記載すること　3-2以降でも毎回接続は必要*/
$user='ユーザー名';								/*phpとMysqlの連携＋データベースへの接続＋データベース作成*/
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);

$sql=$pdo->prepare("INSERT INTO tbtest2(id,name,comment)VALUES('4',:name,:comment)");
$sql->bindParam(':name',$name,PDO::PARAM_STR);
$sql->bindParam(':comment',$comment,PDO::PARAM_STR);
$name='卍解';
$comment='バーゲンセール';							/*好きな名前、好きなコメントは自分で決める*/
$sql->execute();
?>