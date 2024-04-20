<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()
function db_conn()
{
    try {
        $db_name =  'info-deploy_test-database';            //データベース名
        $db_host =  'mysql57.info-deploy.sakura.ne.jp';  //DBホスト
        $db_id =    'info-deploy';                //アカウント名(登録しているドメイン)
        $db_pw =    'InMiKoOt0718';           //さくらサーバのパスワード
        return new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        //$db_name = "gs_db3";    //データベース名
        //$db_id   = "root";      //アカウント名
        //$db_pw   = "rootpassword";          //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
        //$db_host = "db"; //DBホスト

        //return new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}




//SQLエラー関数：sql_error($stmt)

function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
}


//リダイレクト関数: redirect($file_name)
function redirect($file_name)
{
    header("Location: " . $file_name);
    exit();
}
