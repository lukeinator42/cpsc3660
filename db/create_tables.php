<?php
$create_product =
"CREATE TABLE IF NOT EXISTS PRODUCT
(
number int AUTO_INCREMENT,
name varchar(40) NOT NULL,
UPC varchar(25),
stock int NOT NULL,
measurement varchar(5) NOT NULL,
price int NOT NULL,
description varchar(255),
category varchar(40),
primary key(number)
);
";
mysql_query($create_product)
or die(mysql_error());





$create_People =
"CREATE TABLE IF NOT EXISTS PEOPLE
(
Pname varchar(40) NOT NULL,
StreetAddress varchar(50),
billingAddress varchar(50),
DOB char(8),
phone int(11),
email varchar(50),
password varchar(20),
primary key(Pname)
);
";
mysql_query($create_People)
or die(mysql_error());

$create_Customer =
"CREATE TABLE IF NOT EXISTS CUSTOMER
(
Cname varchar(40) NOT NULL,
creditLimit int NOT NULL,
primary key(Cname),
foreign key(Cname) references PEOPLE(Pname)
);
";
mysql_query($create_Customer)
or die(mysql_error());




$create_Employee =
"CREATE TABLE IF NOT EXISTS EMPLOYEE
(
	Ename varchar(40) NOT NULL,
	authority int NOT NULL,
	sales int NOT NULL,
	primary key(Ename),
	foreign key (Ename) references PEOPLE(Pname)
);
";
mysql_query($create_Employee)
or die(mysql_error());

$create_Purchase_Orders =
"CREATE TABLE IF NOT EXISTS PURCHASE_ORDERS
(
	orderNum int AUTO_INCREMENT,
	EID varchar(40) NOT NULL,
	orderNumb int NOT NULL,
	numPurchased int NOT NULL,
	pricePurchasedAt int NOT NULL,
	datePurchased varchar(10) NOT NULL,
	paymentDate varchar(10) NOT NULL,
	primary key(orderNum),
	foreign key (EID) references EMPLOYEE(Ename),
	foreign key (orderNumb) references INVOICE(ordernum)
);
";
mysql_query($create_Purchase_Orders)
or die(mysql_error());


$create_invoice = 
"CREATE TABLE IF NOT EXISTS INVOICE
(
ordernum int AUTO_INCREMENT,
customerID varchar(40) NOT NULL,
tax_amount int NOT NULL,
date varchar(10) NOT NULL,
primary key(ordernum),
foreign key(customerID) references CUSTOMER(Cname)
);";

$create_invoice_products = 
"CREATE TABLE IF NOT EXISTS INVOICE_PRODUCTS
(
ordernum int,
productnum int,
price_sold_at int,
quantity_sold int,
primary key(ordernum, productnum),
foreign key(ordernum) references INVOICE(ordernum),
foreign key(productnum) references PRODUCT(number)
)
";

mysql_query($create_invoice)
or die(mysql_error());


mysql_query($create_invoice_products)
or die(mysql_error());


?>


