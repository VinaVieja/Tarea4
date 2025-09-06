Sistema de Gestión de Recursos Educativos

Este proyecto es un sistema web para gestionar recursos educativos, como libros, artículos o cualquier otro material de aprendizaje. Permite a los usuarios registrar nuevos recursos, visualizarlos, y editar los existentes. El sistema está construido con CodeIgniter 4 y usa MySQL para la base de datos.

Características

Gestión de recursos educativos: Permite registrar, listar, editar y buscar recursos educativos.

Base de datos estructurada: Usa una base de datos relacional con tablas para categorías, subcategorías, editoriales y recursos.

Búsqueda eficiente: Los usuarios pueden buscar recursos por título, editorial, subcategoría o estado.

Formulario interactivo: Ofrece un formulario de registro y edición fácil de usar con validaciones.

Tecnologías Usadas

Backend: PHP con CodeIgniter 4.

Base de datos: MySQL.

Frontend: HTML, CSS (con Bootstrap para el diseño responsivo).

Servidor web: Apache (usando Laragon o cualquier servidor compatible).

Configuración de mi Base de Datos

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

Uso del Proyecto
1. Registrar Recursos

Formulario de Registro: Ve a http://localhost:8080/recursos/create para registrar un nuevo recurso educativo, seleccionando su subcategoría, editorial, tipo y estado.

2. Ver Recursos Registrados

Lista de Recursos: Ve a http://localhost:8080/recursos para ver todos los recursos registrados. Desde aquí también puedes editar un recurso, accediendo al botón de "Editar" al lado de cada recurso.

3. Buscar Recursos

En la página de lista de recursos, puedes usar el formulario de búsqueda para buscar recursos por título, editorial, subcategoría o estado.

Estructura de la Base de Datos

La base de datos cursos_db contiene las siguientes tablas:

categorias: Guarda las categorías principales de los recursos (Matemáticas, Comunicación, Computación).

subcategorias: Contiene las subcategorías relacionadas con las categorías (por ejemplo, Trigonometría, Álgebra, etc.).

editoriales: Almacena las editoriales y sus respectivas nacionalidades.

recursos: La tabla principal que guarda los recursos (libros, artículos, etc.), con información como el título, tipo, subcategoría, editorial, estado y más.

Contribuciones

Si quieres contribuir al proyecto, ¡serás bienvenido! Si encuentras algún error o tienes una idea para mejorar el proyecto, puedes seguir estos pasos:

Haz un fork del repositorio.

Crea una nueva rama para tu función o corrección de error.

Realiza tus cambios y haz un commit con un mensaje claro.

Push y abre un pull request con una descripción detallada de los cambios.