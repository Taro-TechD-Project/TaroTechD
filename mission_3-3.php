﻿<?php
$dsn='mysql:dbname=データベース名;host=localhost;charset=utf8';			/*<?php から ?>で挟まれるPHP領域に記載すること　3-2以降でも毎回接続は必要*/
$user='ユーザー名';								/*phpとMysqlの連携＋データベースへの接続＋データベース作成*/
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);

$sql='SHOW TABLES';								/*<?php から ?>で挟まれるPHP領域に記載すること　3-1接続の下に記載*/
$result=$pdo->query($sql);							/*テーブル一覧を表示するコマンドを使って作成が出来たか確認*/
foreach($result as $row){
echo $row[0];
echo '<br>';
}
echo "<hr>";
?>