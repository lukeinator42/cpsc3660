<?php

require_once './connect.php';

$create_query = "CREATE TABLE IF NOT EXISTS PRODUCT
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

mysql_query($create_query)
or die(mysql_error());
?>

