--
--購入履歴を表示するテーブルの作成
--

CREATE TABLE `history` (
--
--購入履歴のAUTOINCREMENT
--
    `histry_id` int(11) NOT NULL,
--
--user_idで購入人物確認
--
    `user_id` int(11) NOT NULL,
--
--購入した時間帯の確認
--
    `create_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);
--
-- 購入明細を表示するテーブルの作成
--
CREATE TABLE `details` (
--
--購入した人のid表示
--
    `history_id` int(11) NOT NULL,
--
--購入したitem_id表示
--
    `item_id` int(11) NOT NULL,
--
--購入した個数の表示
--
    `amount` int(11) NOT NULL,
--
--購入された時間帯の表示
--
    `create_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `details`
  ADD KEY `item_id` (`item_id`);