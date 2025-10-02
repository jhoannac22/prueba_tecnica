CREATE DATABASE bd_servicios_tecnicos;

use bd_servicios_tecnicos;

-- Eliminación de tablas en orden (hijas primero)
DROP TABLE IF EXISTS servicio_estado_historial;
DROP TABLE IF EXISTS servicio;
DROP TABLE IF EXISTS equipo;
DROP TABLE IF EXISTS estado_servicio;
DROP TABLE IF EXISTS tecnico;
DROP TABLE IF EXISTS cliente;
DROP TABLE IF EXISTS tipo_equipo;
DROP TABLE IF EXISTS marca_equipo;

-- Catálogos y entidades base
CREATE TABLE tecnico (
	id_tecnico INT PRIMARY KEY AUTO_INCREMENT,
    primer_nombre VARCHAR(30) NOT NULL,
    segundo_nombre VARCHAR(30) NULL,
    primer_apellido VARCHAR(30) NOT NULL,
    segundo_apellido VARCHAR(30) NULL,
    especialidad VARCHAR(100),
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(80) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB;
CREATE UNIQUE INDEX idx_tecnico ON tecnico (id_tecnico);
CREATE UNIQUE INDEX uq_tecnico_email ON tecnico (email);
CREATE INDEX idx_tecnico_telefono ON tecnico (telefono);

CREATE TABLE cliente (
	id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    primer_nombre VARCHAR(30) NOT NULL,
    segundo_nombre VARCHAR(30) NULL,
    primer_apellido VARCHAR(30) NOT NULL,
    segundo_apellido VARCHAR(30) NULL,
    direccion TEXT NOT NULL,
	telefono VARCHAR(20) NOT NULL,
    email VARCHAR(80) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB;
CREATE UNIQUE INDEX idx_cliente ON cliente (id_cliente);
CREATE UNIQUE INDEX uq_cliente_email ON cliente (email);
CREATE INDEX idx_cliente_telefono ON cliente (telefono);

CREATE TABLE tipo_equipo (
	id_tipo_equipo INT PRIMARY KEY AUTO_INCREMENT,
    tipo_equipo VARCHAR(100) NOT NULL
)ENGINE=InnoDB;
CREATE UNIQUE INDEX idx_tipo_equipo ON tipo_equipo (id_tipo_equipo);
CREATE UNIQUE INDEX uq_tipo_equipo_nombre ON tipo_equipo (tipo_equipo);

CREATE TABLE marca_equipo (
	id_marca INT PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR(50) NOT NULL
)ENGINE=InnoDB;
CREATE UNIQUE INDEX idx_marca_equipo ON marca_equipo (id_marca);
CREATE UNIQUE INDEX uq_marca_nombre ON marca_equipo (marca);

CREATE TABLE equipo (
	id_equipo INT PRIMARY KEY AUTO_INCREMENT,
    id_tipo_equipo INT NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    id_marca INT NOT NULL,
    numero_serie VARCHAR(100) NOT NULL,
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_tipo_equipo) REFERENCES tipo_equipo(id_tipo_equipo) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (id_marca) REFERENCES marca_equipo(id_marca) ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=InnoDB;
CREATE UNIQUE INDEX idx_equipo ON equipo (id_equipo);
CREATE UNIQUE INDEX uq_equipo_numero_serie ON equipo (numero_serie);
CREATE INDEX idx_equipo_tipo ON equipo (id_tipo_equipo);
CREATE INDEX idx_equipo_marca ON equipo (id_marca);

CREATE TABLE estado_servicio (
	id_estado_servicio INT PRIMARY KEY AUTO_INCREMENT,
    estado VARCHAR(50) NOT NULL
)ENGINE=InnoDB;
CREATE UNIQUE INDEX idx_estado_servicio ON estado_servicio (id_estado_servicio);

CREATE TABLE servicio (
	id_servicio INT PRIMARY KEY AUTO_INCREMENT,
    fecha_recepcion DATETIME NOT NULL,
    descripcion_problema TEXT NOT NULL,
    id_estado_servicio INT NOT NULL,
    diagnostico_servicio TEXT NULL,
    solucion_servicio TEXT NULL,
    id_tecnico INT NOT NULL,
    id_equipo INT NOT NULL,
    id_cliente INT NOT NULL,
    fecha_entrega DATETIME NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_estado_servicio) REFERENCES estado_servicio(id_estado_servicio) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (id_tecnico) REFERENCES tecnico(id_tecnico) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (id_equipo) REFERENCES equipo(id_equipo) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente) ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=InnoDB;
CREATE UNIQUE INDEX idx_servicios ON servicio (id_servicio);
CREATE INDEX idx_servicio_equipo ON servicio (id_equipo);
CREATE INDEX idx_servicio_tecnico ON servicio (id_tecnico);