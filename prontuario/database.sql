DROP DATABASE IF EXISTS prontuario_vet;

CREATE DATABASE prontuario_vet;

USE prontuario_vet;

CREATE TABLE especie (
    cd_especie INT,
    nm_especie VARCHAR(50),
    CONSTRAINT pk_especie PRIMARY KEY(cd_especie)
);

CREATE TABLE animal (
    cd_animal INT,
    nm_animal VARCHAR(100),
    cd_especie INT,
    CONSTRAINT pk_animal PRIMARY KEY(cd_animal),
    CONSTRAINT fk_animal_especie FOREIGN KEY(cd_especie) REFERENCES especie(cd_especie)
);

CREATE TABLE tratamento (
    cd_tratamento INT,
    nm_tratamento VARCHAR(100),
    ds_tratamento TEXT,
    CONSTRAINT pk_tratamento PRIMARY KEY(cd_tratamento)
);

CREATE TABLE prontuario (
    cd_animal INT,
    cd_tratamento INT,
    ds_tratamento DATETIME,
    ds_observacao TEXT,
    CONSTRAINT pk_prontuario PRIMARY KEY(cd_animal, cd_tratamento, ds_tratamento),
    CONSTRAINT fk_prontuario_animal FOREIGN KEY(cd_animal) REFERENCES animal(cd_animal),
    CONSTRAINT fk_prontuario_tratamento FOREIGN KEY(cd_tratamento) REFERENCES tratamento(cd_tratamento)
);

INSERT INTO especie VALUES (1, 'Buldog');
INSERT INTO especie VALUES (2, 'Dálmata');
INSERT INTO especie VALUES (3, 'Tabby Listrado');
INSERT INTO especie VALUES (4, 'Beagle');
INSERT INTO especie VALUES (5, 'Californiano');
INSERT INTO especie VALUES (6, 'Fox Paulistinha');

INSERT INTO animal VALUES (1, 'Brutus', 1);
INSERT INTO animal VALUES (2, 'Flocos', 2);
INSERT INTO animal VALUES (3, 'Luna', 3);
INSERT INTO animal VALUES (4, 'Meg', 4);
INSERT INTO animal VALUES (5, 'Rico', 5);
INSERT INTO animal VALUES (6, 'Tico', 6);

INSERT INTO tratamento VALUES (101, 'Vacina Antirrábica', 'Proteção contra raiva');
INSERT INTO tratamento VALUES (102, 'Vermifugação', 'Controle de vermes intestinais');
INSERT INTO tratamento VALUES (103, 'Castração', 'Esterilização');

INSERT INTO prontuario VALUES (1, 101, '2024-08-30 11:30:00', 'Renovar em 1 ano');
INSERT INTO prontuario VALUES (1, 102, '2024-08-30 11:35:00', 'Houve reação alérgica e foi administrad Apoquel 6g');
INSERT INTO prontuario VALUES (2, 101, '2024-09-02 16:30:00', NULL);
INSERT INTO prontuario VALUES (2, 103, '2024-02-10', 'Demorou para voltar da anerstesia, mas nada preocupante.');
INSERT INTO prontuario VALUES (3, 102, '2024-03-01', NULL);