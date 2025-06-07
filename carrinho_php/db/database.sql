DROP DATABASE IF EXISTS carrinho_php;

CREATE DATABASE IF NOT EXISTS carrinho_php;

USE carrinho_php;

CREATE TABLE produtos_carrinho (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(255),
    preco_produto DECIMAL(10, 2)
);