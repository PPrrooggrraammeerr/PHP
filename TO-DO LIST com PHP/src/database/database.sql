CREATE DATABASE to_do_list;

USE to_do_list;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255),
    completed BOOLEAN DEFAULT FALSE
);
