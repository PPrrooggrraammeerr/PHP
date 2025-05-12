DROP DATABASE IF EXISTS serenatto;

CREATE DATABASE serenatto;

USE serenatto;

CREATE TABLE cardapio_cafe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cafe VARCHAR (256),
    tipo VARCHAR (256) NOT NULL DEFAULT 'Café',
    descricao VARCHAR (256),
    preco DECIMAL (10, 2),
    imagem VARCHAR (256)
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

INSERT INTO usuarios_serenatto (email, senha)
VALUES ('user1@serenatto.com.br', '24c9e15e52afc47c225b757e7bee1f9d'),
       ('user2@serenatto.com.br', '7e58d63b60197ceb55a1c487989a3720'),
       ('user3@serenatto.com.br', '92877af70a45fd6a2ed7fe81e1236b78'),
       ('user4@serenatto.com.br', '3f02ebe3d7929b091e3d8ccfde2f3bc6'),
       ('user5@serenatto.com.br', '0a791842f52a0acfbb3a783378c066b8');

CREATE TABLE administrador_serenatto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR (256),
    senha VARCHAR (32)
);

INSERT INTO administrador_serenatto (email, senha) VALUES ('administrator@serenatto.com.br', 'ea267b81229372584257254827a7de5b');

CREATE TABLE pedidos_cafe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_pedido_cafe INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios_serenatto (id),
    FOREIGN KEY (id_pedido_cafe) REFERENCES cardapio_cafe (id)
);

CREATE TABLE pedidos_almoco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_pedido_almoco INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios_serenatto (id),
    FOREIGN KEY (id_pedido_almoco) REFERENCES cardapio_almoco (id)
);

CREATE TABLE pedidos_serenatto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_pedido_cafe INT,
    id_pedido_almoco INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios_serenatto (id),
    FOREIGN KEY (id_pedido_cafe) REFERENCES cardapio_cafe (id),
    FOREIGN KEY (id_pedido_almoco) REFERENCES cardapio_almoco (id)
);