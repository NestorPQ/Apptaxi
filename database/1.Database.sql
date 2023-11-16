CREATE DATABASE taxi;

USE taxi;

-- CREACIÓN DE LAS TABLAS
CREATE TABLE usuarios(
	idusuario 		INT 				AUTO_INCREMENT 	PRIMARY KEY,
    avatar			VARCHAR(100) 		NULL,
    apellidos		VARCHAR(50)			NOT NULL,
    nombres 		VARCHAR(50)			NOT NULL,
    email			VARCHAR(50)			NOT NULL, -- UNIQUE
    telefono		CHAR(9)				NULL,
    claveacceso		VARCHAR(100)		NOT NULL,
    clavegenerada	CHAR(6)				NULL,
    nivelacceso		CHAR(4)				NOT NULL DEFAULT 'USER', -- ADMI | USER
    estado			CHAR(1)				NOT NULL DEFAULT '1',
    create_at		DATETIME			NOT NULL DEFAULT NOW(),
    update_at		DATETIME			NULL,
    inactive_at		DATETIME 			NULL,
    CONSTRAINT uk_email_user			UNIQUE(email)
)ENGINE = INNODB;


CREATE TABLE marcas(
	idmarca 		INT 				AUTO_INCREMENT PRIMARY KEY,
    marca			VARCHAR(50)			NOT NULL,
    create_at		DATETIME			NOT NULL DEFAULT NOW(),
    update_at		DATETIME			NULL,
    inactive_at		DATETIME 			NULL
)ENGINE = INNODB;

CREATE TABLE vehiculos(
	idvehiculo			INT					AUTO_INCREMENT PRIMARY KEY,
    idmarca				INT 				NOT NULL, -- FK
    tipo				VARCHAR(40)			NOT NULL,
    placa				VARCHAR(7)			NOT NULL, -- UK
    color				VARCHAR(30)			NOT NULL,
    costo_alquiler		DECIMAL(5,2)		NOT NULL,
    tipocombustible		CHAR(9)				NOT NULL,
    año					CHAR(4)				NOT NULL,
    fotografia			VARCHAR(100)		NULL,
    create_at			DATETIME			NOT NULL DEFAULT NOW(),
    update_at			DATETIME			NULL,
    inactive_at			DATETIME 			NULL,
    CONSTRAINT fk_idmarca_veh				FOREIGN KEY(idmarca) REFERENCES marcas (idmarca),
    CONSTRAINT uk_placa_veh					UNIQUE(placa)
)ENGINE = INNODB;


CREATE TABLE formapagos(
	idformapago			INT 				AUTO_INCREMENT PRIMARY KEY,
    formapago			VARCHAR(30)			NOT NULL,
	create_at			DATETIME			NOT NULL DEFAULT NOW(),
    update_at			DATETIME			NULL,
    inactive_at			DATETIME 			NULL
)ENGINE = INNODB;
SELECT * FROM formapagos;

CREATE TABLE alquileres(
    idalquiler      INT             AUTO_INCREMENT PRIMARY KEY,
    idformapago    INT             NOT NULL,
    idvehiculo      INT             NOT NULL,
    idusuario       INT             NOT NULL,
    -- idcliente       INT             NOT NULL,
    descripcion     TEXT            NOT NULL,
    fechainicio     DATE            NOT NULL,
    fechafin        DATE            NOT NULL,
    precioalquiler  DECIMAL(5,2)    NULL,
    kilometrajeini  INT             NOT NULL,
    kilometrajefin  INT             NOT NULL,
    create_at       DATETIME        NOT NULL DEFAULT NOW(),
    update_at       DATETIME        NULL,
    inactive_at     DATETIME        NULL,
    CONSTRAINT fk_idformapago_al   FOREIGN KEY(idformapago) REFERENCES formapagos(idformapago),
    CONSTRAINT fk_idvehiculo_al    FOREIGN KEY(idvehiculo) REFERENCES vehiculos(idvehiculo),
    CONSTRAINT fk_idusuario_al     FOREIGN KEY(idusuario) REFERENCES usuarios(idusuario),
    -- CONSTRAINT fk_idcliente_al     FOREIGN KEY(idcliente) REFERENCES usuarios(idusuario),
    CONSTRAINT chk_fechafin_al     CHECK(fechafin >= fechainicio),
    CONSTRAINT chk_kilometrajefin  CHECK(kilometrajefin > kilometrajeini)
) ENGINE=INNODB;