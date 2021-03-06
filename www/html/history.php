<?php
//modelの情報
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'histories.php';

session_start();

//ログイン処理
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
//データベース接続
$db = get_db_connect();
$user = get_login_user($db);
//view画面のforeach文に入れるmodel/historiesのselect
if (is_admin($user)){
  $histories = get_all_history($db);
} else {
  $histories = get_history($db, $user['user_id']);
}
//postでhistory_idを受け取る
$history_id = get_post('history_id');
$purchaseHistories = together_history($histories);
//viewにつなげる
include_once '../view/history_view.php';
