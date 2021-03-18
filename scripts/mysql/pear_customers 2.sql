create table my_customers(
  customer_id int(11) NOT NULL AUTO_INCREMENT,
  salutation VARCHAR(10) DEFAULT NULL,
  firstname VARCHAR(255) NOT NULL,
  middle_initial VARCHAR(255) DEFAULT NULL,
  lastname VARCHAR(255) NOT NULL,
  gender VARCHAR(10) NOT NULL,
  email_address VARCHAR(255) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  address text NOT NULL,
  town VARCHAR(255) NOT NULL,
  region VARCHAR(255) NOT NULL,
  postal_code VARCHAR(40) NOT NULL,
  login_name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
);