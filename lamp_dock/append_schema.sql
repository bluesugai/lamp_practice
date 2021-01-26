--
--購入履歴を表示するテーブルの作成
--

CREATE TABLE `histories` (
--
--購入履歴のAUTOINCREMENT
--
`histry_id` int(11) NOT NULL primary key(history_id)
    AUTO_INCREMENT,
--   
--user_idで購入人物確認
--
`user_id` int(11) NOT NULL,
--
--購入した時間帯の確認
--
`create_datetime` datetime NOT NULL DEFAULT 
    CURRENT_TIMESTAMP) 
    ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- 購入明細を表示するテーブルの作成
--
CREATE TABLE `details` (
--
--購入した人のhistory_id表示
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
`create_datetime` datetime NOT NULL DEFAULT 
    CURRENT_TIMESTAMP) 
    ENGINE=InnoDB DEFAULT CHARSET=utf8;

