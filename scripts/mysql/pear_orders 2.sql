create table my_order_itms(
  order_item_id INT(11) NOT NULL AUTO_INCREMENT,
  order_item_status_code VARCHAR(2) NOT NULL,
  order_id INT(11) NOT NULL,
  product_id INT(11) NOT NULL,
  order_item_quantity INT(11) NOT NULL,
  order_item_price double NOT NULL,
  other_order_item_details INT(11) DEFAULT NULL,
  PRIMARY KEY (order_item_id),
  KEY (order_id),
  KEY (product_id),
  KEY (order_item_status_code)
);

create table my_order(
  order_id INT(11) NOT NULL AUTO_INCREMENT,
  customer_id INT(11) NOT NULL,
  order_status_code VARCHAR(2) NOT NULL,
  date_order_placed date NOT NULL,
  order_details text,
  PRIMARY KEY (order_id),
  KEY (customer_id)
);