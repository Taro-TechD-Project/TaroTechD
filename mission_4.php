<?php
$dsn='mysql:dbname=データベース名;host=localhost;charset=utf8';			/*<?php から ?>で挟まれるPHP領域に記載すること 毎回接続は必要*/
$user='ユーザー名';								/*phpとMysqlの連携＋データベースへの接続＋データベース作成*/
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);

$name=$_POST["name"];								/*変数定義*/
$comment=$_POST["comment"];
$edit1=$_POST["edit1"];
$pas=$_POST["password"];

$delete=$_POST["delete"];
$pas2=$_POST["password2"];

$edit2=$_POST["edit2"];
$pas3=$_POST["password3"];

$time = date("Y-m-d H:i:s");


//データ入力(Mission3-5)
if(!empty($_POST["name"]) && !empty($_POST["comment"]) && empty($_POST["edit1"]) && !empty($_POST["password"])){
	$sql=$pdo->prepare("INSERT INTO tbtest4(name,comment,date,password)VALUES(:name,:comment,:date,:password)");
	$sql->bindParam(':name',$name,PDO::PARAM_STR);
	$sql->bindParam(':comment',$comment,PDO::PARAM_STR);
	$sql->bindParam(':date',$time,PDO::PARAM_STR);
	$sql->bindParam(':password',$pas,PDO::PARAM_STR);
	$sql->execute();
}

//入力したデータの削除(Mission3-8)
if(!empty($_POST["delete"]) && !empty($_POST["password2"])){
	$id=$_POST["delete"];
	$stmt=$pdo->query("select password from tbtest4 where id=$id");
	$result=$stmt->fetch();							/*fetchでパスワードを取得→判定*/

	if($result["password"]==$pas2){
		$sql="delete from tbtest4 where id=$id";
		$result1=$pdo->query($sql);

	}else{
		echo "パスワードが違います。";
	}
}


//入力したデータの編集(Mission3-7)
if(!empty($_POST["edit2"]) && !empty($_POST["password3"])){
	$id=$_POST["edit2"];
	$stmt=$pdo->query("select password from tbtest4 where id=$id");
	$result2=$stmt->fetch();						/*fetchでパスワードを取得→判定*/

	if($result2["password"]==$pas3){
			//echo "check_if1|".$result2["password"]."|".$pas3."|<hr>";

		$stmt=$pdo->query("select name from tbtest4 where id=$id");
		$result3=$stmt->fetch();
		$mysql1=$result3["name"];

		$stmt=$pdo->query("select comment from tbtest4 where id=$id");
		$result4=$stmt->fetch();
		$mysql2=$result4["comment"];

		$stmt=$pdo->query("select password from tbtest4 where id=$id");
		$result5=$stmt->fetch();

		$mysql3=$result5["password"];
			//echo "check_if2|".$mysql3."|".$result5["password"]."|<hr>";
	}
	if($result2["password"]!=$pas3){
		echo"パスワードが違います。";
			//echo "check_if3|".$result2["password"]."|".$pas3."|<hr>";
	}
}

//入力したデータの編集2
if (!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["edit1"]) && !empty($_POST["password"])){
	$id=$_POST["edit1"];
	$nm=$_POST["name"];
	$kome=$_POST["comment"];
	$pass=$_POST["password"];
	$sql="update tbtest4 set name='$nm',comment='$kome',date=now(),password='$pass' where id=$id && password='$pass'";
	$result=$pdo->query($sql);
}
?>


<!DOCTYPE html>
<html lang="ja">
<html>

<head>
<meta charset="utf-8">
</head>

<body>
<form method="post"action="mission_4.php">

<!--名前欄-->
<input type="text"name="name"placeholder="名前"value="<?php echo $mysql1;?>"><br>		<!--$NAMEを上のphpの変数として使用-->


<!--コメント欄-->
<input type="text"name="comment"placeholder="コメント"value="<?php echo $mysql2;?>">		<!--$COMMENTを上のphpの変数として使用-->


<!--編集ボタン-->
<input type="hidden"name="edit1"placeholder="編集ボタン"value="<?php echo $edit2;?>"><br>

<!--パスワードボタン1-->
<input type="text"name="password"placeholder="パスワード">
<input type="submit"value="送信"><br><br>


<!--削除対象番号-->
<input type="text"name="delete"placeholder="削除対象番号"><br>

<!--パスワードボタン2-->
<input type="text"name="password2"placeholder="パスワード">
<input type="submit"value="削除"><br><br>


<!--編集モード-->
<input type="text"name="edit2"placeholder="編集対象番号"><br>

<!--パスワードボタン3-->
<input type="text"name="password3"placeholder="パスワード">
<input type="submit"value="編集">

</form>
</body>
</html>


<?php
$dsn='mysql:dbname=データベース名;host=localhost;charset=utf8';			/*<?php から ?>で挟まれるPHP領域に記載すること 毎回接続は必要*/
$user='ユーザー名';								/*phpとMysqlの連携＋データベースへの接続＋データベース作成*/
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);

$sql='SELECT*FROM tbtest4 order by id';						/*テーブルの内容を取得して、表示する(2-2と3-6）*/
$stmt=$pdo->query($sql);							/*入力したデータをselectによって表示*/
$results=$stmt->fetchAll();							/*$fetchAllで取得して判定*/
foreach($results as $row){
	echo $row['id'].' ';							/*$rowの中にはテーブルのカラム名が入る*/
	echo $row['name'].' ';
	echo $row['comment'].' ';
	echo $row['date'].'<br>';
}
?>
