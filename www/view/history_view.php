<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'history.css'); ?>">
</head>
<body>
<?php include VIEW_PATH . 'templates/header_logined.php'; ?>
<h1>購入履歴</h1>

<div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(!empty($histories)){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
          <th>注文番号</th>
          <th>購入日時</th>
          <th>合計金額</th>
          <th>購入明細表示</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($purchaseHistories as $key =>  $history){ ?>
        <tr>
          <td><?php print($key); ?></td>
          <td><?php print($history[0]['created']); ?></td>
          <td><?php print($history['total']); ?>円</td>
          <td>
            <form method="post" action="detail.php">
              <input type="submit" value="購入明細へ">
              <input type="hidden" name="history_id" value="<?php print($history[0]['history_id']); ?>">
            </form>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <?php }else{ ?>
    <p>購入履歴がありません。</p>
    <?php } ?>
  </body>
</html>
