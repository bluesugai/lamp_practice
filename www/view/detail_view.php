<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'detail.css'); ?>">
</head>
<body>
<?php include VIEW_PATH . 'templates/header_logined.php'; ?>
<h1>購入明細</h1>

<div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(!empty($histories)){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
          <th>注文番号</th>
          <th>購入日時</th>
          <th>合計金額</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php print($history_id); ?></td>
          <td><?php print($purchaseHistories[$history_id][0]['created']); ?></td>
          <td><?php print($purchaseHistories[$history_id]['total']); ?>円</td>
        </tr>
      </tbody>
    </table>
    <?php }else{ ?>
    <p>購入履歴がありません。</p>
    <?php } ?>
    <!-- 購入明細 -->
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
          <th>商品名</th>
          <th>価格</th>
          <th>購入数</th>
          <th>小計</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($details as $detail){ ?>
        <tr>
          <td><?php print($detail['name']); ?></td>
          <td><?php print($detail['price']); ?>円</td>
          <td><?php print($detail['amount']); ?></td>
          <td><?php print($detail['price'] * $detail['amount']); ?>円</td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </body>
</html>
