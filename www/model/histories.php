<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

//DBから購入履歴を取ってくる処理
function get_history($db, $user_id){
  $sql = "
    SELECT
      histories.history_id,
      histories.created,
      items.price,
      details.amount
    FROM
      histories
    JOIN
      details
    ON
      histories.history_id = details.history_id
    JOIN
      items
    ON
      details.item_id = items.item_id
    WHERE
      histories.user_id = {$user_id}
    ORDER BY
      created desc
  ";
  return fetch_all_query($db, $sql);
}

function get_all_history($db){
  $sql = "
    SELECT
      histories.history_id,
      histories.created,
      items.price,
      details.amount
    FROM
      histories
    JOIN
      details
    ON
      histories.history_id = details.history_id
    JOIN
      items
    ON
      details.item_id = items.item_id
    ORDER BY
      created desc
  ";
  return fetch_all_query($db, $sql);
}

function sum_history($histories){
  $total = 0;
  foreach($histories as $history){
    $total += $history['price'] * $history['amount'];
  }
    return $total;
}

function together_history($histories){
  $purchaseHistories = [];  // まとめるための空の配列を用意

  foreach($histories as $history) {
    // $history['id'] ごとに連想配列にまとめる
    $purchaseHistories[$history['history_id']][] = $history;
  }
  foreach ($purchaseHistories as $key => $histories) {
    $purchaseHistories[$key]['total'] = sum_history($histories); 
  }
  return $purchaseHistories;
  }
  