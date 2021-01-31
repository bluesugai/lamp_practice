<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

//DBから購入履歴を取ってくる処理
function get_history($db, $user_id){
  $sql = "
    SELECT
      histories.hisrory_id,
      histories.user_id,
      histories.created,
      details.item_id,
      details.amount
    FROM
      histories
    JOIN
      details
    ON
      histories.history_id = details.history_id
    WHERE
      histories.user_id = {$user_id}
  ";
  return fetch_query($db, $sql);
}
