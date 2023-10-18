CREATE DATABASE IF NOT EXISTS competicion;

USE competicion;

CREATE TABLE IF NOT EXISTS Equipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    estadio VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Partidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipo1_id INT,
    equipo2_id INT,
    resultado ENUM('1', 'x', '2'),
    FOREIGN KEY (equipo1_id) REFERENCES Equipos(id),
    FOREIGN KEY (equipo2_id) REFERENCES Equipos(id)
);


INSERT INTO Equipos (nombre, estadio) VALUES ('Equipo A', 'Estadio A');
INSERT INTO Equipos (nombre, estadio) VALUES ('Equipo B', 'Estadio B');
INSERT INTO Equipos (nombre, estadio) VALUES ('Equipo C', 'Estadio C');

INSERT INTO Partidos (equipo1_id, equipo2_id, resultado) VALUES (1, 2, '1');
INSERT INTO Partidos (equipo1_id, equipo2_id, resultado) VALUES (2, 3, 'x');
INSERT INTO Partidos (equipo1_id, equipo2_id, resultado) VALUES (3, 1, '2');
