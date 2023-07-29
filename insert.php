<?php
//1. POSTデータ取得
$bookname = $_POST["bookname"];
$url = $_POST["url"];
$comment = $_POST["comment"];
//↑前回授業の復習


//2. DB接続します
//外部ファイル　funcs.phpにDB接続処理を関数化し、書き出す
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(bookname,url,comment,indate)VALUES(:bookname, :url, :comment, sysdate())");
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
  // $error = $stmt->errorInfo();
  // exit("***********:".$error[2]);
}else{
  //５．index.phpへリダイレクト。header関数を使う
  //header("Location: index.php");
  redirect("index.php");
  exit();
}
?>
