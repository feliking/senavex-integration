--*******************************************
--ADICIONANDO UNA COLUMNA A LA TABLA AUTORIZACION PREVIA
ALTER TABLE autorizacion_previa ADD COLUMN nro_serie integer;


INSERT INTO comite_api(id_estado_comite, fecha_inicio, fecha_fin, id_usuario_registro, fecha_creacion_registro) VALUES (2, '2019-08-26', '2019-09-11', 3222, '2019-10-25');
INSERT INTO comite_api(id_estado_comite, fecha_inicio, fecha_fin, id_usuario_registro, fecha_creacion_registro) VALUES (1, '2019-09-12', '2019-10-14', 3222, '2019-10-25');
INSERT INTO comite_api(id_estado_comite, fecha_inicio, fecha_fin, id_usuario_registro, fecha_creacion_registro) VALUES (0, '2019-10-15', '2019-11-01', 3222, '2019-10-25');

--adicionar Q en la BD para el rol 22
ALTER TABLE comite_api ADD COLUMN nro_comite integer;
ALTER TABLE comite_api ADD COLUMN fecha_emision date;
ALTER TABLE autorizacion_previa ADD COLUMN id_comite_api integer;


