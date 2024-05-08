create database project1;
use project1;
create table admins(
id int primary key auto_increment,
name varchar(30) not null,
email varchar(255) not null unique,
password varchar(50) not null
);
create table customers(
id int primary key auto_increment,
name varchar(30) not null,
email varchar(255) not null unique,
password varchar(50) not null,
phone varchar(10) ,
address varchar(200)
);
create table products (
id int primary key auto_increment, 
product_code varchar(20),
name varchar(100), 
price int,
themes varchar(50),
description varchar(500),
image varchar(1000)
);
-- 0: chua duyet, 1: da duyet, -1: da huy, 2: thanh cong 
create table orders (
id int primary key auto_increment,
customer_id int,
admin_id int,
total_price int,
order_date date,
status tinyint,
foreign key (customer_id) references customers(id), 
foreign key (admin_id) references admins(id)
);
create table order_details(
id int primary key auto_increment, 
order_id int, 
product_id int,
 price int,
quantity int,
foreign key (order_id) references orders (id),
 foreign key (product_id) references products(id)
);
select * from products where themes='dreamzzz';
SELECT COUNT(*) AS total_count
FROM products
WHERE themes = 'ninjago';
