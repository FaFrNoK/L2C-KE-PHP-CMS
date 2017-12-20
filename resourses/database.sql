-- vytvorenie tabulky users

create table users (
id int NOT NULL AUTO_INCREMENT, 
email varchar(256) NOT NULL,
password varchar(64) NOT NULL, 
nickname varchar(128), 
PRIMARY KEY (id)
);


-- vytvorenie tabulky pages

create table pages (
id int NOT NULL AUTO_INCREMENT, 
title varchar(128),
content text, 
user_id int NOT NULL, 
menu_label varchar(128), 
menu_order int, 
PRIMARY KEY (id) , 
FOREIGN KEY (user_id) REFERENCES users(id)
);

-- vlozenie pouzivatela admin

insert into users (email, password, nickname) values ('admin@php.sk', 12345, 'Admin');

-- vlozenie pouzivatela admin

insert into pages (title,content, menu_label, menu_order,user_id) values ('1. page', 'Welcome', '1. page', 1,1); 



