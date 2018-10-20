<?php
$dsn='mysql:dbname=データベース名;host=localhost;charset=utf8';			/*<?php から ?>で挟まれるPHP領域に記載すること　3-2以降でも毎回接続は必要*/
$user='ユーザー名';								/*phpとMysqlの連携＋データベースへの接続＋データベース作成*/
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);

$sql='SELECT*FROM tbtest2';							/*入力したデータをselectによって表示*/
$results=$pdo->query($sql);							/*$rowの中身は3-2で中身に何を入力したかで変化する*/
foreach($results as $row){
	/*$rowの中にはテーブルのカラム名が入る*/
	echo $row['id'].',';
	echo $row['name'].',';
	echo $row['comment'].'<br>';
}
?>