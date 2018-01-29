use z1821331;

drop table if exists cart;
drop table if exists order_items;
drop table if exists orders;
drop table if exists items;
drop table if exists customers;
drop table if exists banner;

CREATE TABLE items (
        item_id int NOT NULL AUTO_INCREMENT,
        item_name VARCHAR(225) NOT NULL,
	item_desc VARCHAR(225) NOT NULL,
	item_calories int(100) NOT NULL,
        item_price decimal(6,2) NOT NULL,
        item_image BLOB,
        item_keywords text NOT NULL,
        PRIMARY KEY (item_id));
 

INSERT INTO items (item_name,item_desc,item_calories,item_price,item_image,item_keywords) 
 VALUES ('Waffle Fries ','CHICK-FIL-A','400','2.11','Pictures/1.jpg','Waffle,Fries,snacks'),
        ('Double-Double','IN-N-OUT','670','4.04','Pictures/2.jpg','DOUBLE-DOUBLE,Chicken,Sandwich'),
 	('Fries','MCDONALD''S','340','2.29','Pictures/3.jpg','Fries, mcdonald,snacks'),
        ('Chicken','POPEYES','440','6.77','Pictures/4.jpg','Chicken,Nuggets'),
	('Chicken Sandwich','CHICK-FIL-A','440','3.90','Pictures/5.jpg','Chicken,Sandwich'),
	('Curly Fries','ARBY''S','400','2.55','Pictures/6.jpg','Curly,Fries,snacks'),
	('Blizzard','DAIRY QUEEN','620','5.24','Pictures/7.jpg','Blizzard,Ice cream,desserts'),
	('Frosty','WENDY''S','393','2.55','Pictures/8.jpg','Frosty'),
	('Mcflurry','MCDONALD''S','520','2.11','Pictures/9.jpg','Ice cream,Mcflurry'),
	('Bacon Cheeseburger','FIVE GUYS','920','11.12','Pictures/10.jpg','Bacon,Cheese,Burger');

CREATE TABLE customers (
        cust_id int NOT NULL AUTO_INCREMENT,
        cust_ip varchar(225) NOT NULL,
	cust_fname text NOT NULL,
	cust_lname text NOT NULL,
	cust_dname text NOT NULL,
	cust_email varchar(225) NOT NULL,
        cust_pass varchar(225) NOT NULL,        
        PRIMARY KEY (cust_id));


CREATE TABLE cart (
	cust_id int NOT NULL,
	i_id int NOT NULL,
	ip_add varchar(225) NOT NULL,
	qty int(10) NOT NULL,
	foreign key(i_id) references items(item_id) ON DELETE CASCADE);

CREATE TABLE order_items (
	cust_id int NOT NULL,
	cust_email varchar(225) NOT NULL,
	i_id int NOT NULL,
	ip_add varchar(225) NOT NULL,
	qty int(10) NOT NULL,
	foreign key(i_id) references items(item_id) ON DELETE CASCADE);

CREATE TABLE banner (
  banner_id int(11) NOT NULL,
  banner_title varchar(200) NOT NULL,
  banner_image blob,
  PRIMARY KEY(banner_id));

INSERT INTO banner (banner_id,banner_title,banner_image) VALUES
(1, 'Banner 1', 'Banner/food1.jpg'),
(2, 'Banner 2', 'Banner/food2.jpg'),
(3, 'Banner 3', 'Banner/food3.jpg'),
(4, 'Banner 4', 'Banner/food4.jpg');

CREATE TABLE orders (
        order_id int NOT NULL AUTO_INCREMENT,
	order_amount decimal(6,2) NOT NULL,
	cust_ip varchar(225) NOT NULL,
       	fname text NOT NULL,
	lname text NOT NULL,
	email varchar(225) NOT NULL,
        street varchar(225) NOT NULL,
	state varchar(225) NOT NULL,        
	country varchar(225) NOT NULL,
	phone bigint(20),
	zip int(11),
	delivery_type text NOT NULL,
	payment text NOT NULL,
	status text NOT NULL,        
	PRIMARY KEY (order_id)
	#foreign key(cust_id) references customers(cust_id) ON DELETE CASCADE,
	#foreign key(i_id) references items(item_id) ON DELETE CASCADE
);

