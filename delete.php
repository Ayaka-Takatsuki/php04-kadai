<?php

//0. 必ずsession_startは最初に記述
session_start();

//1. POSTデータ取得
$id = $_GET["id"];

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
sschk();　//作ったloginチェックのための関数を追加
$pdo = db_conn();      //DB接続関数

//３．データ登録(削除)SQL作成
$sql = "DELETE FROM gs_bm_table WHERE id =:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
//param int...数値で受け取ってもらう、param str...文字列で受け取ってもらう
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}

?>
