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

$page = '';
if (isset($_GET['page'])) {
	$page = (int)$_GET['page'];
} else {
	$page = 1;
}
if ($page > 1) {
	// 例：２ページ目の場合は、『(2 × 8) - 8 = 8』
	$start = ($page * 8) - 8;
} else {
	$start = 0;
}
 
// 新着順
$items = [];
if ($sort === 'maxprice' || $sort === 'minprice') {
    // 価格が高い順 or 安い順で items を取得する
    $items = get_items_by_price_order($db, $sort,$start);// 価格が高い順 or 安い順で取得する関数
} else {
    // 新着順で items を取得する
    $items = get_latest_time($db,$start);// 新着順で取得する関数
}
//itemsから件数を取ってくる
$items_count = get_items_count($db);
//件数を表示する数で割る
$total_page = ceil($items_count['cnt'] / 8);
//ページの件数を出す処理
$page_number = ($page - 1) * 8;
//最小値
$page_bgn = ($page_number + 1);
//最大値または件数の最後の数字を出す
if(count($items) === 8) {
  $page_fin = ($page_number + 8);
} else {
  $page_fin = $items_count['cnt'];
}
//viewにつなげる
include_once VIEW_PATH . 'index_view.php';
