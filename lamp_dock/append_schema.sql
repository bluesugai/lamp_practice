CREATE TABLE `histories` (
    `history_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `create_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    primary key(history_id)
);


CREATE TABLE `details` (
    `history_id` int(11) NOT NULL,
    `item_id` int(11) NOT NULL,
    `amount` int(11) NOT NULL,
    `create_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
); 
