<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続するための関数：db_conn()
function db_conn(){
    try {
        //localhostの場合
        $db_name = "gs_bm";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "";          //パスワード：MAMPの場合 root に修正
        $db_host = "localhost"; //DBホスト

        //localhost以外＊＊自分で書き直してください！！＊＊
        if($_SERVER["HTTP_HOST"] != 'localhost'){
            $db_name = "aya-17-ms_gs_bm";  //データベース名
            $db_id   = "aya-17-ms";  //アカウント名（さくらコントロールパネルに表示されています）
            $db_pw   = "1287Tmam";  //パスワード(さくらサーバー最初にDB作成する際に設定したパスワード)
            $db_host = "mysql57.aya-17-ms.sakura.ne.jp"; //例）mysql**db.ne.jp...
        }
        //今からここに接続するよ↓　できたpdoを返しますよ
        //return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
        return new PDO('mysql:host=mysql57.aya-17-ms.sakura.ne.jp;dbname=aya-17-ms_gs_bm;charset=utf8', 'aya-17-ms', '1287Tmam');
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
} 


//リダイレクト関数: redirect($file_name)
  //ここで関数を作って、これをinsert.phpに読み込む
function redirect($file_name){
    //header("Location: index.php"); 元々買いてあったコード
    header("Location: " .$file_name);
     exit();
}
//SessionCheck(スケルトン)
function sschk(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
      exit("Login Error");
   }else{
      session_regenerate_id(true); //同じidを使い続けるのはセキュリティ的に危険。だからregenerateする
      $_SESSION["chk_ssid"] = session_id();
   }
}
?>