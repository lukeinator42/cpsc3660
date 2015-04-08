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
	number int AUTO_INCREMENT,
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
mysql_query($create_People);
//or die(mysql_error());

$create_Customer =
"CREATE TABLE IF NOT EXISTS CUSTOMER
(
	number int AUTO_INCREMENT,
Cname varchar(40) NOT NULL,
creditLimit int NOT NULL,
foreign key(Cname) references PEOPLE(Pname)
);
";
mysql_query($create_Customer);
//or die(mysql_error());




$create_Employee =
"CREATE TABLE IF NOT EXISTS EMPLOYEE
(
	number int AUTO_INCREMENT,
	Ename varchar(40) NOT NULL,
	authority int NOT NULL,
	sales int NOT NULL,
	foreign key (Ename) references PEOPLE(Pname)
);
";
mysql_query($create_Employee);
//or die(mysql_error());

?>


