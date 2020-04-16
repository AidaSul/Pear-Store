CREATE TABLE my_products(
  product_id int(11) NOT NULL AUTO_INCREMENT,
  product_category_code varchar(7) NOT NULL,
  product_name tinytext NOT NULL,
  product_price double NOT NULL,
  product_inventory int(11) DEFAULT NULL,
  product_color varchar(10) NOT NULL,
  product_size varchar(10) NOT NULL,
  product_description text NOT NULL,
  product_image_url tinytext NOT NULL,
  other_product_details tinytext,
  PRIMARY KEY (product_id),
  KEY (product_category_code)
);

CREATE TABLE my_product_categories(
  product_category_code varchar(7) NOT NULL,
  product_category_description tinytext NOT NULL,
  department_name tinytext NOT NULL,
  PRIMARY KEY (product_category_code)
); 