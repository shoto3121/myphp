<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP基礎</title>
</head>
<body>

<?php
$dsn = "mysql:dbname=phpkiso;host=localhost";
$user = "root";
$password = "";
$dbh = new PDO($dsn,$user,$password);
$dbh->query("SET NAMES utf8");

$sql = "select * from anketo where 1";
$stmt = $dbh->prepare($sql);
$stmt->execute();

while (1){
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec==false){
    break;
  }
  echo$rec["code"];
  echo$rec["nickname"];
  echo$rec["email"];
  echo$rec["goiken"];
  echo"<br>";
}

$dbh = null;
 ?>
 <a href = "menu.html">メニューに戻る</a>
</body>
</html>
