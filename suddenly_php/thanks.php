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
try{
$dsn ="mysql:dbname=phpkiso;host=localhost";
$user ="root";
$password ="";
$dbh = new PDO($dsn,$user,$password);
$dbh->query("SET NAMES utf8");

$nickname=$_POST['nickname'];
$email=$_POST['email'];
$goiken=$_POST['goiken'];

$nickname= htmlspecialchars($nickname);
$email= htmlspecialchars($email);
$goiken= htmlspecialchars($goiken);

echo $nickname;
echo "様<br>";
echo "ご意見ありがとうございました。<br>";
echo "いただいたご意見「";
echo "$goiken";
echo "」<br>";
echo$email;
echo "にメールを送りしましたのでご確認してください。";

$mail_sub='アンケートを受け取りました。';
$mail_body= $nickname."様へ¥nアンケートご協力ありがとうございました。";
$mail_body=html_entity_decode($mail_body,ENT_QUOTES,"UTF-8");
$mail_head="From: jcbxmst1785cigar@gmail.com";
mb_language("Japanese");
mb_internal_encoding("UTF-8");
mb_send_mail($email,$mail_sub,$mail_body,$mail_head);

$sql ='insert into anketo(nickname,email,goiken)values("'.$nickname.'","'.$email.'","'.$goiken.'")';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;
}
catch(Exception $e){
    echo "ただいま障害により大変ご迷惑をおかけしております。";
}
 ?>
</body>
</html>
