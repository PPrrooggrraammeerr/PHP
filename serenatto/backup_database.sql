CREATE DATABASE serenatto;

USE serenatto;

CREATE TABLE cardapio_cafe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cafe VARCHAR(256),
    descricao VARCHAR(256),
    preco DECIMAL(10, 2),
    imagem VARCHAR(256)
);

INSERT INTO cardapio_cafe (cafe, descricao, preco, imagem)
VALUES ('Café Cremoso', 'Café cremoso irresistivelmente suave e que envolve seu paladar', '5.00', 'images/cafe-cremoso.jpg');
INSERT INTO cardapio_cafe (cafe, descricao, preco, imagem) 
VALUES ('Café com Leite', 'A harmonia perfeita do café e do leite, uma experiência reconfortante', '2.00', 'images/cafe-com-leite.jpg');

INSERT INTO cardapio_cafe (cafe, descricao, preco, imagem) 
VALUES ('Cappuccino', 'Café suave, leite cremoso e uma pitada de sabor adocicado', '7.00', 'images/cappuccino.jpg');

INSERT INTO cardapio_cafe (cafe, descricao, preco, imagem) 
VALUES ('Café Gelado', 'Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo', '3.00', 'images/cafe-gelado.jpg');

CREATE TABLE cardapio_almoco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prato VARCHAR(256),
    descricao VARCHAR(256),
    preco DECIMAL(10, 2),
    imagem VARCHAR(256)
);

INSERT INTO cardapio_almoco (prato, descricao, preco, imagem) 
VALUES ('Bife', 'Bife, arroz com feijão e uma deliciosa batata frita', '27.90', 'images/bife.jpg');

INSERT INTO cardapio_almoco (prato, descricao, preco, imagem) 
VALUES ('Filé de peixe', 'Filé de peixe salmão assado, arroz, feijão verde e tomate.', '24.99', 'images/prato-peixe.jpg');

INSERT INTO cardapio_almoco (prato, descricao, preco, imagem) 
VALUES ('Frango', 'Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante', '23.00', 'images/prato-frango.jpg');

INSERT INTO cardapio_almoco (prato, descricao, preco, imagem) 
VALUES ('Fettuccine', 'Prato italiano autêntico da massa do fettuccine com peito de frango grelhado', '22.50', 'images/fettuccine.jpg');