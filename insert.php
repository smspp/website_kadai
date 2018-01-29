<?php
//----------------------------------------------------
//１．入力チェック(受信確認処理追加)
//----------------------------------------------------
//名前　受信チェック:name
if(!isset($_POST["name"]) || $_POST["name"]==""){
  exit("ParameError!name!");
}

//メールアドレス 受信チェック:email
if(!isset($_POST["email"]) || $_POST["email"]==""){
  exit("ParameError!Email!");
}

//男性人数 受信チェック:men
if(!isset($_POST["men"]) ){
  exit("ParameError!Men!");
}

//女性人数 受信チェック:women
if(!isset($_POST["women"]) ){
  exit("ParameError!Women!");
}

//----------------------------------------------------
//２. POSTデータ取得
//----------------------------------------------------
$name  = $_POST["name"];   //名前
$email  = $_POST["email"];   //メールアドレス
$men = $_POST["men"];   //男性人数
$women  = $_POST["women"];   //女性人数

//----------------------------------------------------
//３. DB接続します(エラー処理追加)
// 本番では：データベース名、レンタルサーバーアドレス、レンタルサーバーからもらうid、passを記入
//----------------------------------------------------
try {
  $pdo = new PDO('mysql:dbname=kadai_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//----------------------------------------------------
//４．データ登録SQL作成
//----------------------------------------------------
// prepareの中に実際のsql文を書く
$stmt = $pdo->prepare("INSERT INTO kadai_table3(id, name, email, men, women)
VALUES(NULL, :name, :email, :men, :women)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR); //数値は_INT
$stmt->bindValue(':men', $men, PDO::PARAM_INT);
$stmt->bindValue(':women', $women, PDO::PARAM_INT);
$status = $stmt->execute();

//----------------------------------------------------
//５．データ登録処理後
//----------------------------------------------------
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;
}
?>
