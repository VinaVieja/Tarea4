CREATE DATABASE IF NOT EXISTS cursos_db;
USE cursos_db;

CREATE TABLE categorias (
    idcategoria INT AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(255) NOT NULL
);

INSERT INTO categorias (categoria) VALUES 
('Matemáticas'), 
('Comunicación'), 
('Computación');

CREATE TABLE subcategorias (
    idsubcategoria INT AUTO_INCREMENT PRIMARY KEY,
    subcategoria VARCHAR(255) NOT NULL,
    idcategoria INT,
    FOREIGN KEY (idcategoria) REFERENCES categorias(idcategoria)
);

INSERT INTO subcategorias (subcategoria, idcategoria) VALUES
('Razonamiento Lógico Matemático', 1),
('Álgebra', 1),
('Trigonometría', 1),
('Razonamiento verbal', 2),
('Composición', 2),
('Redacción', 2),
('Base de datos', 3),
('Sistemas operativos', 3),
('Lenguajes de programación', 3);

CREATE TABLE editoriales (
    ideditorial INT AUTO_INCREMENT PRIMARY KEY,
    editorial VARCHAR(255) NOT NULL,
    nacionalidad VARCHAR(255) NOT NULL
);

INSERT INTO editoriales (editorial, nacionalidad) VALUES
('Editorial XYZ', 'México'),
('Editorial ABC', 'España'),
('Editorial 123', 'Estados Unidos');

CREATE TABLE recursos (
    idrecurso INT AUTO_INCREMENT PRIMARY KEY,
    idsubcategoria INT,
    ideditorial INT,
    tipo VARCHAR(50),
    titulo VARCHAR(255),
    apublicacion INT,
    isbn VARCHAR(50),
    numpaginas INT,
    rutaportada VARCHAR(255),
    rutarecurso VARCHAR(255),
    estado VARCHAR(50),
    creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modificado TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (idsubcategoria) REFERENCES subcategorias(idsubcategoria),
    FOREIGN KEY (ideditorial) REFERENCES editoriales(ideditorial)
);

SELECT * FROM subcategorias;
SELECT * FROM editoriales;

