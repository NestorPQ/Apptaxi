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
		(1, 'Minivan Toyota Avanza', 'ABD-123', 'Rojo', 150, 'Gasolina', '2023-11-12', NULL),
        (2, 'Hatchback', '158-9YA', 'Negro', 50, 'Gas', '2021-05-20', 'ad.jpg'),
        (3, 'Picanto', '153-ABC', 'Plomo', 250, 'Gasolina', '2023-12-15', 'abc.jpg');
        
SELECT * FROM vehiculos;
delete vehiculos 

UPDATE usuarios
	SET claveacceso = '$2y$10$VTyMzUz8X3FOPkvR0/1rge8fDJe2TnBMcNRA/XWe7b2A9bTjITIdC' WHERE idusuario = 1;

    
SELECT * FROM usuarios;

INSERT INTO formapagos (formapago)
	VALUES 
		('Yape'),
        ('Plin'),
        ('Transferencia'),
        ('Efectivo');

INSERT INTO alquileres (idformapago, idvehiculo, idusuario, descripcion, fechainicio, fechafin, precioalquiler, kilometrajeini, kilometrajefin)
	VALUEs(3, 2, 1, 'Carro en mala condición', '2023-11-09', '2023-11-16', 50, '100', '250');

INSERT INTO estadisticas_totales (total_usuarios, total_vehiculos, total_formas_pago, total_marcas, total_alquileres)
VALUES (0, 0, 0, 0, 0);


SELECT * FROM usuarios;
SELECT * FROM marcas;
SELECT * FROM vehiculos;
SELECT * FROM formapagos;
SELECT * FROM alquileres;