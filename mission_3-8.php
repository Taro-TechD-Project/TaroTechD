﻿<?php
$dsn='mysql:dbname=データベース名;host=localhost;charset=utf8';			/*<?php から ?>で挟まれるPHP領域に記載すること　3-2以降でも毎回接続は必要*/
$user='ユーザー名';								/*phpとMysqlの連携＋データベースへの接続＋データベース作成*/
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);

$id=4;										/*入力したデータをdeleteによって削除する*/
$sql="delete from tbtest2 where id=$id";					/*2-11をidの数字を変えて2回以上は実行しておくこと。*/
$result=$pdo->query($sql);
?>