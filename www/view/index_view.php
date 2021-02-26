<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  

  <div class="container">
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <div class="text-right">
    <form method="get">
      <select name="sorting">
      <option value="">新着順</option>
      <option value="maxprice"<?php if($sort === 'maxprice') { print 'selected';}?>>価格が高い順</option>
      <option value="minprice"<?php if($sort === 'minprice') { print 'selected';}?>>価格が安い順</option>
      </select>
      <input type="submit" value="並び替え"> 
      <input type="hidden" name="page" value="<?php print $page;?>">
    </form>

    </div>
    <div class="card-deck">
      <div class="row">
      <?php foreach($items as $item){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php print($item['name']); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php print(IMAGE_PATH . $item['image']); ?>">
              <figcaption>
                <?php print(number_format($item['price'])); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php print($item['item_id']); ?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="col py-3 px-md-5 ">
      <?php print $items_count['cnt']. '件中' . $page_bgn . "〜" . $page_fin . "件目の商品";
      
      if($page >1){
        print '<a href="./index.php?page=' . ($page - 1) . '&sorting='.$sort.'" style="padding: 5px;">前へ</a>';
            } else {
        print '前へ'. '　';
      }
       for ( $i = 1; $i <= $total_page; $i ++){
        if ( $i == $page ){
            print $page;
        }else{
            print '<a href="./index.php?page='.$i. '&sorting='.$sort.'" style="padding: 5px;">'.$i.'</a>';
        }
       }
      if($page < $total_page){

        print '<a href="./index.php?page=' . ($page + 1) . '&sorting='.$sort.'" style="padding: 5px;">次へ</a>';
      } else {
        print '次へ'. '　';
      }
     ?>
    <h2 class ="text-center">人気ランキング</h2>
    <div class="table-responsive-md">
    <table class="table">
     <div class="card-deck">
      <div class="row">
        <?php foreach($rankings as $key => $ranking){ ?>
            <div class="col-6 item">
            <div class="card h-100 text-center">
            <?php print $key + 1; ?>位
                <div class="card-header">
                  <?php print($ranking['name']); ?>
                </div>
                  <img class="card-img" src="<?php print(IMAGE_PATH . $ranking['image']); ?>">
                    <?php print(number_format($ranking['price'])); ?>円              
              </div>
            </div>
          <?php } ?>
      </table>
    </div>
      </div>
        </div>
    </div>
  </div>
</body>
</html>

