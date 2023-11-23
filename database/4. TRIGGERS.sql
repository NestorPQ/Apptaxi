
-- PRIMERA FORMA
DELIMITER $$
CREATE TRIGGER trigger_contar_actualizacion
AFTER UPDATE ON usuarios
FOR EACH ROW
BEGIN
	UPDATE estadisticas_totales SET total_usuarios = total_usuarios + 1;
END $$


-- SEGUNDA FORMA
DELIMITER $$
CREATE TRIGGER trigger_actualizar_total_usuarios
AFTER UPDATE ON usuarios
FOR EACH ROW
BEGIN
	UPDATE estadisticas_totales SET total_usuarios = (SELECT COUNT(*) FROM usuarios WHERE inactive_at IS NULL);
END $$


SELECT * FROM estadisticas_totales;
SELECT * FROM usuarios;

show tables;

show procedure status;