CREATE DATABASE insercoes;

USE insercoes;

CREATE TABLE feedbacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    email VARCHAR(256),
    comentario TEXT
);