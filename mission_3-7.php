<?php
$dsn='mysql:dbname=データベース名;host=localhost;charset=utf8';			/*<?php から ?>で挟まれるPHP領域に記載すること　3-2以降でも毎回接続は必要*/
$user='ユーザー名';								/*phpとMysqlの連携＋データベースへの接続＋データベース作成*/
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);

$id=1;										/*入力したデータをupdateによって表示*/
$nm="通りすがりの名無し2";							/*$rowの中身は3-2で中身に何を入力したかで変化する*/
$kome="TECHBASE2";								/*好きな名前、コメントは自分で決める*/
$sql="update tbtest2 set name='$nm',comment='$kome'where id=$id";
$result=$pdo->query($sql);
?>