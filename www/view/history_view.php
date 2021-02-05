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
    <table>
      <thead>
        <tr>
          <th>注文番号</th>
          <th>購入日時</th>
          <th>合計金額</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($histories as $history){ ?>
        <tr>
          <?php var_dump($history);?>
          <td><?php print($history['history_id']); ?></td>
          <td><?php print($history['created']); ?></td>
          <td><?php print($total); ?></td>
          <td>
            <form method="post" action="detail.php">
              <input type="submit" value="購入明細表示">
              <input type="hidden" name="history_id" value="<?php print($history['history_id']); ?>">
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
