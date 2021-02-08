<?php
//modelの情報
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'histories.php';
require_once MODEL_PATH . 'details.php';
session_start();

//ログイン処理
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
//データベース接続
$db = get_db_connect();
$user = get_login_user($db);
//view画面のforeach文に入れるmodel/historiesのselect文
//postでhistory_idを受け取る
$history_id = get_post('history_id');
//view画面のforeach文に入れるmodel/detailsのselect文

//viewにつなげる
if (is_admin($user)){
  $histories = get_all_history($db);
  $details = get_detail_by_admin($db,$history_id);
} else {
  $histories = get_history($db, $user['user_id']);
  $details = get_detail($db,$user['user_id'],$history_id);
}
$purchaseHistories = together_history($histories);

include_once '../view/detail_view.php';
