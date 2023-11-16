USE taxi;

-- -------------------------------- 				PROCEDIMIENTOS 				--------------------------------------------------------------

-- **********************************************************************
-- * 							PROCEDIMIENTO PARA USUARIOS				*
-- **********************************************************************
DELIMITER $$
CREATE PROCEDURE spu_usuarios_login(IN _email VARCHAR(50))
BEGIN
	SELECT
		idusuario,
        USU.apellidos,
        USU.nombres,
        USU.email,
        USU.claveacceso
        FROM usuarios USU
        WHERE 	email = _email AND
		inactive_at IS NULL;
END $$

DELIMITER $$
CREATE PROCEDURE spu_usuarios_clavegenerada_registrar(
	IN _idusuario				INT,
    IN _email					VARCHAR(50),
    IN _clavegenerada			CHAR(6)
)
BEGIN
	UPDATE usuarios
    SET 
		clavegenerada =  _clavegenerada,
        estado = '0'
    WHERE idusuario = _idusuario;
END $$

DELIMITER $$
CREATE PROCEDURE spu_buscar_email(IN _email VARCHAR(50))
BEGIN
    SELECT 
    idusuario,
    apellidos, 
    nombres,
    email,
    telefono,
    clavegenerada
    FROM usuarios
    WHERE email = _email OR telefono = _email;
END $$

DELIMITER $$
CREATE PROCEDURE spu_usuarios_clavegenerada_validar(
	IN _idusuario INT, 
    IN _clavegenerada CHAR(6)
)
BEGIN
    -- Verificar si el estado es '0' y si la clave generada coincide
    IF EXISTS (
		SELECT 1 FROM usuarios 
        WHERE idusuario = _idusuario 
        AND estado = '0' 
        AND clavegenerada = _clavegenerada
        ) 
        THEN
        -- Actualizar el estado a '1' sin cambiar la clavegenerada
        UPDATE usuarios
			SET estado = '1'
        WHERE idusuario = _idusuario;
			SELECT 'PERMITIDO' AS 'status';
    ELSE
        SELECT 'DENEGADO' AS 'status';
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE spu_usuarios_actualizar(
	IN _idusuario			INT,
    IN _claveacceso			VARCHAR(100)
)
BEGIN
	UPDATE usuarios SET 
		claveacceso = _claveacceso,
        update_at = NOW()
    WHERE idusuario = _idusuario;
END $$

-- **********************************************************************
-- * 							PROCEDIMIENTO PARA MARCAS				*
-- **********************************************************************
DELIMITER $$
CREATE PROCEDURE spu_marcas_listar()
BEGIN
	SELECT idmarca, marca FROM marcas
	WHERE inactive_at IS NULL;
END $$

DELIMITER $$
CREATE PROCEDURE spu_marcas_registrar(
	IN _marca 	VARCHAR(50)
)
BEGIN
	INSERT INTO marcas (marca) VALUES (_marca);
END $$

-- **********************************************************************
-- * 				PROCEDIMIENTO PARA FORMA PAGOS 						*
-- **********************************************************************
DELIMITER $$
CREATE PROCEDURE spu_formapagos_listar()
BEGIN
	SELECT idformapago, formapago FROM formapagos
	WHERE inactive_at IS NULL;
END $$


DELIMITER $$
CREATE PROCEDURE spu_formapagos_registrar(
	IN _formapago 	VARCHAR(30)
)
BEGIN
	INSERT INTO marcas (marca) VALUES (_marca);
END $$

-- **********************************************************************
-- * 				PROCEDIMIENTO PARA VEHICULOS 						*
-- **********************************************************************
DELIMITER $$
CREATE PROCEDURE spu_vehiculos_listar()
BEGIN
	SELECT
		VEH.idvehiculo,
        MAR.marca,
        VEH.tipo,
        VEH.placa,
        VEH.color,
        VEH.costo_alquiler,
        VEH.tipocombustible,
        VEH.año,
        VEH.fotografia
        FROM vehiculos VEH
        INNER JOIN marcas MAR ON MAR.idmarca = VEH.idmarca
        WHERE VEH.inactive_at IS NULL;
END $$


DELIMITER $$
CREATE PROCEDURE spu_vehiculos_registrar(
	IN 	_idmarca			INT,
    IN 	_tipo				VARCHAR(40),
    IN 	_placa				VARCHAR(7),
    IN 	_color				VARCHAR(30),
    IN _costo_alquiler		DECIMAL(5,2),
    IN _tipocombustible		CHAR(9),
    IN _año					DATE,
    IN _fotografia			VARCHAR(100)
)
BEGIN
	INSERT INTO vehiculos
		(idmarca, tipo, placa, color, costo_alquiler, tipocombustible, año, fotografia)
        VALUES
        (_idmarca, _tipo, _placa, _color, _costo_alquiler, _tipocombustible, _año, NULLIF(_fotografia, ''));
        
        SELECT @@last_insert_id 'idvehiculo';
END $$

DELIMITER $$
CREATE PROCEDURE spu_vehiculos_buscar(IN _idvehiculo INT)
BEGIN
	SELECT
		VEH.idvehiculo,
        MAR.marca,
        VEH.tipo,
        VEH.placa,
        VEH.color,
        VEH.costo_alquiler,
        VEH.tipocombustible,
        VEH.año,
        VEH.fotografia
        FROM vehiculos VEH
        INNER JOIN marcas MAR ON MAR.idmarca = VEH.idmarca
        WHERE VEH.idvehiculo = _idvehiculo;
END $$

CREATE VIEW vs_vehiculos_marcas
AS
	SELECT
		VEH.idvehiculo,
        VEH.idmarca,
        MAR.marca,
        VEH.tipo,
        VEH.placa,
        VEH.color,
        VEH.costo_alquiler,
        VEH.tipocombustible,
        VEH.año,
        VEH.fotografia,
        VEH.create_at
        FROM vehiculos VEH
        INNER JOIN marcas MAR ON MAR.idmarca = VEH.idmarca
        WHERE VEH.inactive_at IS NULL;
        
DELIMITER $$
CREATE PROCEDURE spu_vehiculos_filtrar_marcas(IN _idmarca INT)
BEGIN
	IF _idmarca = -1 THEN
		SELECT * FROM vs_vehiculos_marcas ORDER BY create_at;
	ELSE
		SELECT * FROM vs_vehiculos_marcas WHERE idmarca = _idmarca ORDER BY create_at;
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE spu_filtrar_vehiculos(IN _idvehiculo INT)
BEGIN
	SELECT 
		VEH.idvehiculo,
        MAR.idmarca,
        MAR.marca,
        VEH.tipo,
        VEH.placa,
        VEH.color,
        VEH.costo_alquiler,
        VEH.tipocombustible,
        VEH.año,
        VEH.fotografia
        FROM vehiculos VEH
        INNER JOIN marcas MAR ON MAR.idmarca = VEH.idvehiculo
        WHERE idvehiculo = _idvehiculo;
END $$


-- **********************************************************************
-- * 				PROCEDIMIENTO PARA ALQUILERES 						*
-- **********************************************************************

-----  EN DUDA CON ESTE PROCEDIMIENTO
DELIMITER $$
CREATE PROCEDURE spu_alquileres_listar()
BEGIN
	SELECT 
    ALQ.idalquiler,
    VEH.tipo,
	PAG.formapago,
    VEH.placa,
    USU.apellidos,
    USU.nombres,
    USU.email,
    ALQ.descripcion,
    ALQ.fechainicio,
    ALQ.fechafin,
    ALQ.precioalquiler
    FROM alquileres ALQ
    INNER JOIN formapagos PAG ON PAG.idformapago = ALQ.idformapago
    INNER JOIN vehiculos VEH ON VEH.idvehiculo = ALQ.idvehiculo
    INNER JOIN usuarios USU ON USU.idusuario = ALQ.idcliente
    WHERE ALQ.inactive_at IS NULL;
END $$
CALL spu_alquileres_listar();
---------------------🚨🚨🚨🚨🚨🚨🚨🚨🚨🚨

DELIMITER $$
CREATE PROCEDURE spu_alquileres_registrar(
	IN _idformapago 		INT,
    IN _idvehiculo			INT,
    IN _idusuario			INT,
    IN _idcliente			INT,    
    IN _descripcion			TEXT,
    IN _fechainicio			DATE,
    IN _fechafin 			DATE,
    IN _precio_alquiler		DECIMAL(5,2),
    IN _kilometrajeini		INT,
    IN _kilometrajefin		INT
)
BEGIN
	INSERT INTO alquileres 
		(idformapago, idvehiculo, idusuario, idcliente, descripcion, fechainicio, fechafin, precioalquiler, kilometrajeini, kilometrajefin)
	VALUES
		(_idformapago, _idvehiculo, _idusuario, _idcliente, _descripcion, _fechainicio, _fechafin, _precioalquiler, _kilometrajeini, _kilometrajefin);
	
    SELECT @@last_insert_id 'idalquiler';
END $$

-- Como calcular


DELIMITER $$
CREATE PROCEDURE CambiarClaveAcceso(IN correoUsuario VARCHAR(255), IN nuevaClave VARCHAR(255))
BEGIN
    UPDATE usuarios
    SET claveacceso = nuevaClave
    WHERE email = correoUsuario;
END $$
CALL CambiarClaveAcceso('juan.perez@example.com', 'clave');

DELIMITER $$
CREATE PROCEDURE ResetearClaveGenerada(IN correoUsuario VARCHAR(255))
BEGIN
    UPDATE usuarios
    SET clavegenerada = NULL
    WHERE email = correoUsuario;
END $$
CALL ResetearClaveGenerada('yorghetyauri123@gmail.com');

DELIMITER $$
CREATE PROCEDURE generarClave(IN correoUsuario VARCHAR(255), IN _clavegenerada VARCHAR(6))
BEGIN
    UPDATE usuarios
    SET clavegenerada = _clavegenerada
    WHERE email = correoUsuario;
END $$

CALL spu_usuarios_login("1208003@senati.pe");
CALL spu_buscar_email("1208003@senati.pe");


DELIMITER $$
CREATE PROCEDURE sp_registrar_usuario(
    IN pApellidos VARCHAR(50),
    IN pNombres VARCHAR(50),
    IN pEmail VARCHAR(50),
    IN pTelefono CHAR(9),
    IN pClaveAcceso VARCHAR(100)
)
BEGIN
    INSERT INTO usuarios (
        apellidos,
        nombres,
        email,
        telefono,
        claveacceso
    )
    VALUES (
		pApellidos,
        pNombres,
        pEmail,
        pTelefono,
        pClaveAcceso
    );
    SELECT 'true' AS resultado;
END $$



--  123456
UPDATE usuarios
    SET claveacceso = "$2y$10$VuJusmMELIlf92ZaYRvpnut6bTft7PioE1mQWzdUEsXQ89xwrEQgC"
    WHERE idusuario = 5;

select * from usuarios;

use taxi;

INSERT INTO usuarios (avatar, apellidos, nombres, email, telefono, claveacceso, clavegenerada, nivelacceso)
VALUES ('', 'Pomachahua', 'Néstor', '1208003@senati.pe', '123456789', '$2y$10$b05zu8q0AM8YtxYGWuFVBe6BfjHBgRfqWuPgoJEIUedlNBSJALAeivehiculosusuarios', '123456', 'ADMI');






SELECT * FROM alquileres;
SELECT * FROM marcas;
SELECT * FROM vehiculos;
CALL spu_marcas_listar();
CALL spu_formapagos_listar();
CALL spu_vehiculos_listar();
CALL spu_vehiculos_registrar(4, 'Joy Black', '1234-AC', 'Plomo', 80, 'Gas', '2020-05-12', 'dph.jpg');
CALL spu_vehiculos_buscar(4);
CALL spu_vehiculos_filtrar_marcas(4);
CALL spu_filtrar_vehiculos(2);
SELECt * FROM vehiculos;