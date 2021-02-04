<?
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

// ユーザーの購入明細
function get_detail($db, $history_id){
    $sql = "
      SELECT
        details.amount,
        details.created,
        items.price
        SUM(items.price * details.amount) AS subtotal,
        items.name
      FROM
        details
      JOIN
        items
      ON
        details.item_id = items.item_id
      WHERE
        details.history_id = {$history_id}
      ";
    return fetch_query($db, $sql,$history_id);
}
