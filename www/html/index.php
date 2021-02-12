<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$sort = '';
if (isset($_GET['sorting'])) {
    $sort = $_GET['sorting'];
}

// 新着順
$items = [];
if ($sort === 'maxprice' || $sort === 'minprice') {
    // 価格が高い順 or 安い順で items を取得する
    $items = get_items_by_price_order($db, $sort);// 価格が高い順 or 安い順で取得する関数
} else {
    // 新着順で items を取得する
    $items = get_latest_time($db);// 新着順で取得する関数
}

include_once VIEW_PATH . 'index_view.php';
