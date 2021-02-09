<?
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

// ユーザーの購入明細
function get_detail($db, $user_id,$history_id){
    $sql = "
      SELECT
        details.history_id,
        details.amount,
        details.created,
        items.price,
        items.name
      FROM
        details
      JOIN
        histories
      ON
        histories.history_id = details.history_id
      JOIN
        items
      ON
        details.item_id = items.item_id
      WHERE
        histories.user_id = {$user_id}
      AND 
        details.history_id = {$history_id}
      ";
    return fetch_all_query($db, $sql);
}

function get_detail_by_admin($db,$history_id){
  $sql = "
    SELECT
      details.history_id,
      details.amount,
      details.created,
      items.price,
      items.name
    FROM
      details
    JOIN
      histories
    ON
      histories.history_id = details.history_id
    JOIN
      items
    ON
      details.item_id = items.item_id
    WHERE 
      details.history_id = {$history_id}
    ";
  return fetch_all_query($db, $sql);
}
