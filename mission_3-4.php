<?php
$dsn='mysql:dbname=データベース名;host=localhost;charset=utf8';			/*<?php から ?>で挟まれるPHP領域に記載すること　3-2以降でも毎回接続は必要*/
$user='ユーザー名';								/*phpとMysqlの連携＋データベースへの接続＋データベース作成*/
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);

$sql='SHOW CREATE TABLE tbtest2';						/*<?php から ?>で挟まれるPHP領域に記載すること　3-1接続の下に記載*/
$result=$pdo->query($sql);							/*テーブルの中身を確認するコマンドを使用し、意図した内容のテーブルが作成されているかの確認*/
foreach($result as $row){
print_r($row);
}
echo "<hr>";
?>