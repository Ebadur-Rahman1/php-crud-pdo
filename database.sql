create database php_crud_pdo;

create table users (
    id int auto_increment PRIMARY KEY,
    name varchar(100),
    email varchar(100),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP
);