CREATE DATABASE serenatto;

USE serenatto;

CREATE TABLE cardapio_cafe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cafe VARCHAR(256),
    tipo VARCHAR(256) NOT NULL DEFAULT 'Café',
    descricao VARCHAR(256),
    preco DECIMAL(10, 2),
    imagem VARCHAR(256)
);

INSERT INTO cardapio_cafe (cafe, tipo, descricao, preco, imagem)
VALUES ('Café Cremoso', 'Café', 'Café cremoso irresistivelmente suave e que envolve seu paladar', '5.00', 'images/cafe-cremoso.jpg');
INSERT INTO cardapio_cafe (cafe, tipo, descricao, preco, imagem) 
VALUES ('Café com Leite', 'Café', 'A harmonia perfeita do café e do leite, uma experiência reconfortante', '2.00', 'images/cafe-com-leite.jpg');

INSERT INTO cardapio_cafe (cafe, tipo, descricao, preco, imagem) 
VALUES ('Cappuccino', 'Café', 'Café suave, leite cremoso e uma pitada de sabor adocicado', '7.00', 'images/cappuccino.jpg');

INSERT INTO cardapio_cafe (cafe, tipo, descricao, preco, imagem) 
VALUES ('Café Gelado', 'Café', 'Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo', '3.00', 'images/cafe-gelado.jpg');

CREATE TABLE cardapio_almoco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prato VARCHAR(256),
    tipo VARCHAR(256) NOT NULL DEFAULT 'Almoço',
    descricao VARCHAR(256),
    preco DECIMAL(10, 2),
    imagem VARCHAR(256)
);

INSERT INTO cardapio_almoco (prato, tipo, descricao, preco, imagem) 
VALUES ('Bife', 'Almoço', 'Bife, arroz com feijão e uma deliciosa batata frita', '27.90', 'images/bife.jpg');

INSERT INTO cardapio_almoco (prato, tipo, descricao, preco, imagem) 
VALUES ('Filé de peixe', 'Almoço', 'Filé de peixe salmão assado, arroz, feijão verde e tomate', '24.99', 'images/prato-peixe.jpg');

INSERT INTO cardapio_almoco (prato, tipo, descricao, preco, imagem) 
VALUES ('Frango', 'Almoço', 'Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante', '23.00', 'images/prato-frango.jpg');

INSERT INTO cardapio_almoco (prato, tipo, descricao, preco, imagem) 
VALUES ('Fettuccine', 'Almoço', 'Prato italiano autêntico da massa do fettuccine com peito de frango grelhado', '22.50', 'images/fettuccine.jpg');

CREATE TABLE usuarios_serenatto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR (256),
    senha VARCHAR (32)
);

CREATE TABLE administrador_serenatto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR (256),
    senha VARCHAR (32)
);

INSERT INTO administrador_serenatto (email, senha) VALUES ('administrador@serenatto.com.br', 'ea267b81229372584257254827a7de5b');