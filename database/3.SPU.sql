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
    INNER JOIN usuarios USU ON USU.idusuario = ALQ.idusuario
    WHERE ALQ.inactive_at IS NULL;
END $$
CALL spu_alquileres_listar();
---------------------🚨🚨🚨🚨🚨🚨🚨🚨🚨🚨

DELIMITER $$
CREATE PROCEDURE spu_alquileres_registrar(
	IN _idformapago 		INT,
    IN _idvehiculo			INT,
    IN _idusuario			INT,
    IN _fechainicio			DATE,
    IN _fechafin 			DATE,
    IN _precio_alquiler		DECIMAL(5,2),
    IN _kilometrajeini		INT
)
BEGIN
	INSERT INTO alquileres 
		(idformapago, idvehiculo, idusuario, fechainicio, fechafin, precioalquiler, kilometrajeini)
	VALUES
		(_idformapago, _idvehiculo, _idusuario, _fechainicio, _fechafin, _precioalquiler, _kilometrajeini);
	
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

DELIMITER $$
CREATE PROCEDURE sp_marcas_eliminar(
	in marca_id INT
)
BEGIN 
	UPDATE marcas
		SET inactive_at = NOW()
        WHERE idmarca = marca_id;
END $$

SELECT * FROM marcas;


DELIMITER $$
CREATE PROCEDURE sp_formapagos_eliminar(IN id_forma_pago INT)
BEGIN
    UPDATE formapagos
    SET inactive_at = NOW()
    WHERE idformapago = id_forma_pago;
END $$


DELIMITER $$
CREATE PROCEDURE spu_vehiculos_eliminar_logico(
    IN _idvehiculo INT
)
BEGIN
	UPDATE vehiculos SET inactive_at = NOW() WHERE idvehiculo = _idvehiculo;
	SELECT 'registro del vehiculo eliminado' AS mensaje;
END;

DELIMITER $$
CREATE PROCEDURE spu_total_información()
BEGIN
	declare total_usuarios int;
    declare total_vehiculos int;
    declare total_formas_pago int;
    declare total_marcas int;
    declare total_alquileres int;

	select count(*) into total_usuarios from usuarios where inactive_at is null;
    select count(*) into total_vehiculos from vehiculos where inactive_at is null;
    select count(*) into total_marcas from marcas where inactive_at is null;
    select count(*) into total_formas_pago from formapagos where inactive_at is null;
    select count(*) into total_alquileres from alquileres where inactive_at is null;
    
    select total_usuarios, total_vehiculos, total_formas_pago, total_marcas, total_alquileres;
END $$

CALL spu_total_información();


DELIMITER $$
CREATE PROCEDURE spu_usuarios_listar()
BEGIN 
	select 
	idusuario,
    avatar,
    apellidos,
    nombres,
    email,
    telefono,
    nivelacceso
 from usuarios
 where inactive_at is null;
 END $$
 
 CALL spu_usuarios_listar();
 
 DELIMITER $$
 CREATE PROCEDURE spu_alquiler_devolucion(
	IN p_idalquiler INT,
    IN p_descripcion VARCHAR(255),
    IN p_kilometrajefin INT
 )
 BEGIN 
	UPDATE alquileres
    SET 
		inactive_at = NOW(),
		descripcion = p_descripcion,
        kilometrajefin = p_kilometrajefin
    WHERE idalquiler = p_idalquiler;
    select "vehiculo devuelto correctamente" as mensaje;
 END $$
 
 DELIMITER $$
CREATE PROCEDURE ObtenerCantidadVehiculosPorMarca()
BEGIN
    SELECT m.marca, COUNT(v.idvehiculo) AS cantidad_vehiculos
    FROM marcas m
    LEFT JOIN vehiculos v ON m.idmarca = v.idmarca
    WHERE v.inactive_at IS NULL
    GROUP BY m.marca;
END $$

CALL ObtenerCantidadVehiculosPorMarca();


DELIMITER $$
CREATE PROCEDURE ObtenerCantidadAlquileresPorMes()
BEGIN
    SELECT MONTH(fechainicio) AS mes, COUNT(*) AS cantidad_alquileres
    FROM alquileres
    GROUP BY MONTH(fechainicio)
    LIMIT 6
    ;
END $$

DELIMITER $$
CREATE PROCEDURE ObtenerCantidadAlquileresPorMes()
BEGIN
    SELECT 
        CASE 
            WHEN MONTH(fechainicio) = 1 THEN 'Enero'
            WHEN MONTH(fechainicio) = 2 THEN 'Febrero'
            WHEN MONTH(fechainicio) = 3 THEN 'Marzo'
            WHEN MONTH(fechainicio) = 4 THEN 'Abril'
            WHEN MONTH(fechainicio) = 5 THEN 'Mayo'
            WHEN MONTH(fechainicio) = 6 THEN 'Junio'
            WHEN MONTH(fechainicio) = 7 THEN 'Julio'
            WHEN MONTH(fechainicio) = 8 THEN 'Agosto'
            WHEN MONTH(fechainicio) = 9 THEN 'Septiembre'
            WHEN MONTH(fechainicio) = 10 THEN 'Octubre'
            WHEN MONTH(fechainicio) = 11 THEN 'Noviembre'
            WHEN MONTH(fechainicio) = 12 THEN 'Diciembre'
        END AS nombre_mes,
        COUNT(*) AS cantidad_alquileres
    FROM alquileres
    GROUP BY MONTH(fechainicio)
    LIMIT 6;
END $$

DELIMITER $$
CREATE PROCEDURE ObtenerCantidadAlquileresPorMes()
BEGIN
    SELECT MONTHNAME(fechainicio) AS nombre_mes, COUNT(*) AS cantidad_alquileres
    FROM alquileres
    GROUP BY MONTHNAME(fechainicio);
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