CREATE DATABASE IF NOT EXISTS inase_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE inase_db;

CREATE TABLE muestras (
  id INT NOT NULL AUTO_INCREMENT,
  numero_de_precinto VARCHAR(50) NOT NULL UNIQUE,
  empresa VARCHAR(255) NOT NULL,
  especie VARCHAR(255) NOT NULL,
  cantidad_semillas INT NOT NULL CHECK (cantidad_semillas > 0),
  PRIMARY KEY (id)
);

CREATE TABLE resultados (
  id INT NOT NULL AUTO_INCREMENT,
  muestra_id INT NOT NULL UNIQUE,
  poder_germinativo DECIMAL(5,2) NOT NULL,
  pureza DECIMAL(5,2) NOT NULL,
  materiales_inertes TEXT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (muestra_id) REFERENCES muestras(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


INSERT INTO muestras (numero_de_precinto, empresa, especie, cantidad_semillas)
VALUES
  ('PREC001', 'Adidas', 'Hortaliza', 1000),
  ('PREC002', 'FIUBA', 'Flor', 1500),
  ('PREC003', 'Google', 'Hortaliza', 1200);


INSERT INTO resultados (muestra_id, poder_germinativo, pureza, materiales_inertes)
VALUES
  (1, 90.45, 70.01, 'Polvo de Ladrillo, Césped Sintetico');