CREATE DATABASE serenatto;

USE serenatto;

CREATE TABLE cardapio_cafe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cafe VARCHAR(256),
    descricao VARCHAR(256),
    preco DECIMAL(10, 2),
    imagem VARCHAR(256)
);

CREATE TABLE cardapio_almoco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prato VARCHAR(256),
    descricao VARCHAR(256),
    preco DECIMAL(10, 2),
    imagem VARCHAR(256)
);