-- Create the database
CREATE DATABASE IF NOT EXISTS your_database_name;
USE your_database_name;

-- Create the user table
CREATE TABLE IF NOT EXISTS user (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL
);

-- Create the category table
CREATE TABLE IF NOT EXISTS category (
    id_category INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    imgCategory VARCHAR(255)
);

-- Create the flavor table
CREATE TABLE IF NOT EXISTS flavor (
    id_flavor INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    flavorDescription TEXT
);

-- Create the product table
CREATE TABLE IF NOT EXISTS product (
    id_product INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    stock INT NOT NULL,
    volume VARCHAR(50),
    benefits TEXT,
    imgProduct VARCHAR(255),
    nutritionalProperties TEXT,
    id_category INT,
    FOREIGN KEY (id_category) REFERENCES category(id_category)
);

-- Create the ingredient table
CREATE TABLE IF NOT EXISTS ingredient (
    id_ingredient INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    id_product INT,
    imgIngredient VARCHAR(255),
    allergens TEXT,
    FOREIGN KEY (id_product) REFERENCES product(id_product)
);

-- Create the order table
CREATE TABLE IF NOT EXISTS order_table (
    id_order INT PRIMARY KEY AUTO_INCREMENT,
    status VARCHAR(50) NOT NULL,
    orderDate DATE,
    orderNumber VARCHAR(20) NOT NULL,
    address TEXT,
    id_user INT,
    id_product INT,
    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_product) REFERENCES product(id_product)
);
