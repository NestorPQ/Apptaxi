USE taxi;


INSERT INTO marcas (marca) 
	VALUES 
		('Toyota'), 
        ('Hyundai'), 
        ('Kia'), 
        ('Chevrolet'), 
        ('Nissan'),
        ('Suzuki'),
        ('Volkswagen');

SELECT * FROM marcas;


INSERT INTO vehiculos (idmarca, tipo, placa, color, costo_alquiler, tipocombustible, año, fotografia)
	VALUES
		(1, 'Minivan Toyota Avanza', 'ABCD-123', 'Rojo', 150, 'Gasolina', '2023-11-12', NULL),
        (2, 'Hatchback', '1582-9Y', 'Negro', 50, 'Gas', '2021-05-20', 'ad.jpg'),
        (3, 'Picanto', '1532-ABC', 'Plomo', 250, 'Gasolina', '2023-12-15', 'abc.jpg');
        
SELECT * FROM vehiculos;

UPDATE usuarios
	SET claveacceso = '$2y$10$VTyMzUz8X3FOPkvR0/1rge8fDJe2TnBMcNRA/XWe7b2A9bTjITIdC' WHERE idusuario = 1;

INSERT INTO usuarios(avatar, apellidos, nombres, email, telefono, claveacceso, clavegenerada, nivelacceso)
	VALUES('', 'Hernandez', 'Yorghet', 'yorghetyauri123@gmail.com', 946989937, '123456', '213457', 'ADMI');

    
SELECT * FROM usuarios;

INSERT INTO formapagos (formapago)
	VALUES 
		('Yape'),
        ('Plin'),
        ('Transferencia'),
        ('Efectivo');

INSERT INTO alquileres (idformapago, idvehiculo, idusuario, idcliente, descripcion, fechainicio, fechafin, precioalquiler, kilometrajeini, kilometrajefin)
	VALUEs(3, 2, 1, 1, 'Carro en mala condición', '2023-11-09', '2023-11-16', 50, '100', '250');

SELECT * FROM usuarios;
SELECT * FROM marcas;
SELECT * FROM vehiculos;
SELECT * FROM formapagos;
SELECT * FROM alquileres;