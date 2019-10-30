update perfil_opciones set habilitado = 1 where opcion = 'g';

CREATE TABLE tipo_acuerdo
(
  id_tipo_acuerdo serial NOT NULL,
  descripcion character varying,
  CONSTRAINT tipo_acuerdo_pkey PRIMARY KEY (id_tipo_acuerdo)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE tipo_acuerdo
  OWNER TO postgres;
ALTER TABLE tipo_acuerdo ALTER COLUMN descripcion SET STATISTICS 0;

INSERT INTO tipo_acuerdo (id_tipo_acuerdo, descripcion) VALUES (1, 'Acuerdo Comercial');
INSERT INTO tipo_acuerdo (id_tipo_acuerdo, descripcion) VALUES (2, 'Sistema Genralizado de Preferencias:');

CREATE TABLE arancel
(
  id_arancel serial NOT NULL,
  denominacion text,
  gestion_publicacion integer,
  activo boolean,
  vigente boolean DEFAULT false,
  cantidad_digitos integer DEFAULT 10,
  CONSTRAINT arancel_pkey1 PRIMARY KEY (id_arancel)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE arancel
  OWNER TO postgres;

INSERT INTO arancel (id_arancel, denominacion, gestion_publicacion, activo, vigente, cantidad_digitos) VALUES (0, '', 2017, false, false, 10);
INSERT INTO arancel (id_arancel, denominacion, gestion_publicacion, activo, vigente, cantidad_digitos) VALUES (2, 'NALADISA 93', 1993, true, false, 10);
INSERT INTO arancel (id_arancel, denominacion, gestion_publicacion, activo, vigente, cantidad_digitos) VALUES (1, 'ARANCEL 2019', 2019, true, true, 10);
INSERT INTO arancel (id_arancel, denominacion, gestion_publicacion, activo, vigente, cantidad_digitos) VALUES (3, ' NALADISA 96', 1996, true, false, 10);
INSERT INTO arancel (id_arancel, denominacion, gestion_publicacion, activo, vigente, cantidad_digitos) VALUES (4, ' NALADISA 2007 ', 2007, true, false, 10);

CREATE TABLE zonas_especiales
(
  id_zonas_especiales serial NOT NULL,
  denominacion character varying,
  criterio_valor numeric(12,2),
  CONSTRAINT zonas_especiales_pkey PRIMARY KEY (id_zonas_especiales)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE zonas_especiales
  OWNER TO postgres;
ALTER TABLE zonas_especiales ALTER COLUMN denominacion SET STATISTICS 0;
INSERT INTO zonas_especiales (id_zonas_especiales, denominacion, criterio_valor) VALUES (1, 'La mercancia SI es producida en ZONA FRANCA', 10.00);
INSERT INTO zonas_especiales (id_zonas_especiales, denominacion, criterio_valor) VALUES (2, 'La mercancia NO es producida en ZONA FRANCA', 10.00);


CREATE TABLE estado_acuerdo
(
  id_estado_acuerdo serial NOT NULL,
  descripcion character varying,
  CONSTRAINT estado_acuerdo_pkey PRIMARY KEY (id_estado_acuerdo)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE estado_acuerdo
  OWNER TO postgres;
ALTER TABLE estado_acuerdo ALTER COLUMN id_estado_acuerdo SET STATISTICS 0;
ALTER TABLE estado_acuerdo ALTER COLUMN descripcion SET STATISTICS 0;

ALTER TABLE public.estado_acuerdo_id_estado_acuerdo_seq OWNER TO postgres;
ALTER SEQUENCE estado_acuerdo_id_estado_acuerdo_seq OWNED BY estado_acuerdo.id_estado_acuerdo;


INSERT INTO estado_acuerdo (id_estado_acuerdo, descripcion) VALUES (1, 'Vigente');
INSERT INTO estado_acuerdo (id_estado_acuerdo, descripcion) VALUES (2, 'Baja');


CREATE SEQUENCE acuerdo_id_acuerdo_seq1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE TABLE acuerdo
(
  id_acuerdo integer NOT NULL DEFAULT nextval('acuerdo_id_acuerdo_seq1'::regclass),
  descripcion text,
  sigla text,
  estado boolean,
  vigencia_ddjj integer,
  id_tipo_valor_internacional integer,
  id_tipo_co integer,
  fecha_creacion date,
  fecha_baja date,
  id_tipo_acuerdo integer DEFAULT 1,
  id_estado_acuerdo integer DEFAULT 1,
  criterio_valor numeric(12,2),
  CONSTRAINT acuerdo_pkey1 PRIMARY KEY (id_acuerdo),
  CONSTRAINT acuerdo_fk FOREIGN KEY (id_tipo_co)
      REFERENCES tipo_co (id_tipo_co) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT acuerdo_id_tipo_co_fkey FOREIGN KEY (id_tipo_co)
      REFERENCES tipo_co (id_tipo_co) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT acuerdo_id_tipo_valor_internacional_fkey FOREIGN KEY (id_tipo_valor_internacional)
      REFERENCES tipo_valor_internacional (id_tipo_valor_internacional) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT estado_acuerdo_fk FOREIGN KEY (id_estado_acuerdo)
      REFERENCES estado_acuerdo (id_estado_acuerdo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT tipo_acuerdo_fk FOREIGN KEY (id_tipo_acuerdo)
      REFERENCES tipo_acuerdo (id_tipo_acuerdo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE acuerdo
  OWNER TO postgres;



INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (0, 'Ninguno', NULL, false, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (1, 'ACUERDO DE SEMILLAS AR PAR 4', 'AR PAR 4', true, 730, 1, 1, '2019-05-28', NULL, 1, 1, 10.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (2, 'ACUERDO DE SEMILLAS AAP.AG N°2', 'AAP.AG N°2', true, 730, 1, 1, '2019-05-28', NULL, 1, 1, 10.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (3, 'SGP SUIZA', 'SGP SUIZA', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (4, 'SGP CANADA', 'SGP CANADA', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (6, 'ACUERDO CON VENEZUELA', 'VENEZUELA', true, 730, 1, 4, '2019-05-28', NULL, 1, 1, 40.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (7, 'SGP NORUEGA', 'SGP NORUEGA', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (8, 'SGP JAPÓN', 'SGP JAPÓN', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (9, 'SGP NUEVA ZELANDA', 'SGP NUEVA ZELANDA', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (10, 'SGP BIELORRUSIA', 'SGP BIELORRUSIA', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (11, 'SGP TURQUÍA', 'SGP TURQUÍA', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (12, 'SGP AUSTRALIA', 'SGP AUSTRALIA', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (13, 'SGP UNIÓN EUROPEA', 'SGP UNIÓN EUROPEA', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (14, 'SGP ESTADOS UNIDOS', 'SGP ESTADOS UNIDOS', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (15, 'TERCEROS PAÍSES', 'TERCEROS PAÍSES', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 0.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (17, 'SGP FEDERACIÓN RUSA', 'SGP FEDERACIÓN RUSA', true, 730, 1, 3, '2019-05-28', NULL, 2, 1, 20.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (18, 'COMUNIDAD ANDINA DE NACIONES', 'CAN', true, 730, 1, 1, '2019-05-28', NULL, 1, 1, 10.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (5, 'MERCOSUR', 'ACE36', true, 180, 1, 2, '2019-05-28', NULL, 1, 1, 5.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (16, 'ACUERDO ARAM CON PANAMÁ', 'ACUERDO ARAM CON PANAMÁ', true, 730, 1, 1, '2019-05-28', NULL, 1, 1, 10.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (19, 'ACUERDO CON CHILE', 'ACE22 CHILE', true, 730, 1, 1, '2019-06-19', NULL, 1, 1, 5.00);
INSERT INTO acuerdo (id_acuerdo, descripcion, sigla, estado, vigencia_ddjj, id_tipo_valor_internacional, id_tipo_co, fecha_creacion, fecha_baja, id_tipo_acuerdo, id_estado_acuerdo, criterio_valor) VALUES (20, 'ACUERDO CON CUBA', 'ACE47 CUBA', true, 730, 1, 1, '2019-06-19', NULL, 1, 1, 25.00);




ALTER TABLE bloqueo_empresa ADD COLUMN id_acuerdo integer;
ALTER TABLE bloqueo_empresa ADD COLUMN tipo_bloqueo integer;
ALTER TABLE bloqueo_empresa
  ADD CONSTRAINT bloqueo_empresa_fk FOREIGN KEY (id_acuerdo)
      REFERENCES acuerdo (id_acuerdo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;

-- Table: acuerdo_arancel

-- DROP TABLE acuerdo_arancel;

CREATE TABLE acuerdo_arancel
(
  id_acuerdo_arancel serial NOT NULL,
  id_acuerdo integer NOT NULL,
  id_arancel integer NOT NULL,
  activo boolean,
  CONSTRAINT acuerdo_arancel_pkey PRIMARY KEY (id_acuerdo_arancel),
  CONSTRAINT acuerdo_arancel_fk FOREIGN KEY (id_acuerdo)
      REFERENCES acuerdo (id_acuerdo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT arancel_acuerdo_fk FOREIGN KEY (id_arancel)
      REFERENCES arancel (id_arancel) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE acuerdo_arancel
  OWNER TO postgres;

INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (0, 0, 0, NULL);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (1, 1, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (2, 2, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (3, 3, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (4, 4, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (6, 6, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (7, 7, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (8, 8, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (9, 9, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (10, 10, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (11, 11, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (12, 12, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (13, 13, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (14, 14, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (15, 15, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (17, 17, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (18, 18, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (20, 5, 2, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (23, 16, 1, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (24, 19, 3, true);
INSERT INTO acuerdo_arancel (id_acuerdo_arancel, id_acuerdo, id_arancel, activo) VALUES (25, 20, 4, true);


ALTER TABLE fabrica ADD COLUMN id_direccion integer;


CREATE TABLE partida
(
  id_partida serial NOT NULL,
  id_arancel integer,
  partida character varying,
  denominacion character varying,
  reo character varying,
  unidad_medida character varying,
  criterio_valor numeric(12,2),
  activo boolean,
  CONSTRAINT partida_pkey PRIMARY KEY (id_partida)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE partida
  OWNER TO postgres;



CREATE EXTENSION pg_trgm;

CREATE INDEX partida_idx ON partida USING GIN(partida gin_trgm_ops);



/* Adding option Acuerdos*/
INSERT INTO perfil_opciones (opcion,descripcion,activo,habilitado) VALUES ('A','Acuerdos',true,1);

/* Adding column to acuerdo table */

ALTER TABLE tipo_acuerdo
  ALTER COLUMN descripcion SET STATISTICS 0;
/* setting default tipo_acuerdo*/
ALTER TABLE acuerdo
  ALTER COLUMN id_tipo_acuerdo SET DEFAULT 1;

/* -----------------------------Adding estado_acuerdo table---------------------------------*/
ALTER TABLE estado_acuerdo
  ALTER COLUMN id_estado_acuerdo SET STATISTICS 0;
ALTER TABLE estado_acuerdo
  ALTER COLUMN descripcion SET STATISTICS 0;

/* setting default estado_acuerdo*/
ALTER TABLE acuerdo
  ALTER COLUMN id_estado_acuerdo SET DEFAULT 1;
/*----------------------------adding arancel changes--------------------------*/

ALTER TABLE public.acuerdo_arancel
  DROP COLUMN activo;

ALTER TABLE public.arancel
  ALTER COLUMN cantidad_digitos SET DEFAULT 10;

DROP TABLE elaboracion_incentivo;


 /*----------------------------------------Modifying estado_ddjj------------------------------*/
UPDATE estado_ddjj SET descripcion = 'En revisión' WHERE id_estado_ddjj = 0;
UPDATE estado_ddjj SET descripcion = 'Rechazado' WHERE id_estado_ddjj = 3;
UPDATE estado_ddjj SET descripcion = 'Para corregir' WHERE id_estado_ddjj = 4;
UPDATE estado_ddjj SET descripcion = 'Para facturar' WHERE id_estado_ddjj = 5;


/*--------------------Adding new sobrevalor field----------------------------*/

ALTER TABLE public.insumos_importados  DROP COLUMN cantidad;
ALTER TABLE public.insumos_nacionales  ADD COLUMN sobrevalor NUMERIC(12,2);
ALTER TABLE public.insumos_importados  ADD COLUMN sobrevalor NUMERIC(12,2);

/***------------------------forgein keys for ddjj------------------------------*/
ALTER TABLE public.comercializador
  ADD CONSTRAINT comercializador_fk FOREIGN KEY (id_ddjj)
    REFERENCES public.declaracion_jurada(id_ddjj)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
ALTER TABLE public.declaracion_jurada
  ADD CONSTRAINT declaracion_jurada_fk1 FOREIGN KEY (id_fabrica)
    REFERENCES public.fabrica(id_fabrica)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
ALTER TABLE public.declaracion_jurada
  ADD CONSTRAINT declaracion_jurada_fk2 FOREIGN KEY (id_unidad_medida)
    REFERENCES public.unidad_medida(id_unidad_medida)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
ALTER TABLE public.insumos_nacionales
  ADD CONSTRAINT insumos_nacionales_fk FOREIGN KEY (id_ddjj)
    REFERENCES public.declaracion_jurada(id_ddjj)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;


/********************************** Insert fabrica none in order to prevent string insertign by prado********/
  INSERT INTO fabrica (id_fabrica,id_empresa,ciudad) VALUES (0,0,'Ninguna');
/****************************criterio de origin*********************************************************/
CREATE TABLE criterio_origen (
    id_criterio_origen serial NOT NULL,
    id_acuerdo integer,
    descripcion text,
    literal character varying(10),
    parrafo character varying,
    orden integer,
    activo boolean,
    criterio_valor numeric(12,2)
);
ALTER TABLE ONLY criterio_origen
    ADD CONSTRAINT criterio_origen_pkey1 PRIMARY KEY (id_criterio_origen);


/********************************** Adding criterio de origien foregin key *******************************/
ALTER TABLE public.criterio_origen
  ADD CONSTRAINT criterio_origen_fk FOREIGN KEY (id_acuerdo)
    REFERENCES public.acuerdo(id_acuerdo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
/************************************Adding documents table **********************************************/

CREATE TABLE ddjj_documentos (
  id_ddjj_documentos SERIAL NOT NULL,
  id_ddjj INTEGER,
  nombre VARCHAR,
  formato VARCHAR,
  fecha_creacion TIMESTAMPTZ,
  PRIMARY KEY(id_ddjj_documentos)
) WITHOUT OIDS;

ALTER TABLE public.ddjj_documentos
  ADD COLUMN title VARCHAR;

ALTER TABLE public.ddjj_documentos
  ADD CONSTRAINT ddjj_documentos_fk FOREIGN KEY (id_ddjj)
    REFERENCES public.declaracion_jurada(id_ddjj)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;


ALTER TABLE public.ddjj_documentos
  ADD CONSTRAINT ddjj_documentos_fk1 FOREIGN KEY (id_ddjj)
    REFERENCES public.declaracion_jurada(id_ddjj)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;

/**************************************acuerdo criterio de origen*****************************************/
ALTER TABLE public.criterio_origen
  ADD CONSTRAINT criterio_origen_fk1 FOREIGN KEY (id_acuerdo)
    REFERENCES public.acuerdo(id_acuerdo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
/***************************************adding  Uco Perfil **********************************************/
INSERT INTO perfil (descripcion, tipo, opciones, habilitado)
    VALUES ('Administrador UCO', '1', 'bcotzABEFgGp', '1');
INSERT INTO perfil_opciones (opcion,descripcion,activo,habilitado)
	VALUES ('B','Aranceles',true,1);


/************************updating arancel to true***********************************/
update arancel set vigente=FALSE;



/********************************************* tipo de acuerdo **************/
UPDATE tipo_acuerdo SET descripcion ='Sistema Genralizado de Preferencias:'  where id_tipo_acuerdo=2;

/*************************************************serial for ddjj*****************************/
CREATE TABLE sgc_ddjj (
  id_sgc_ddjj SERIAL NOT NULL,
  fecha_inicio_revision TIMESTAMP,
  fecha_fin_revision TIMESTAMP,
  estado VARCHAR,
  observaciones VARCHAR,
  id_empresa INTEGER,
  id_ddjj INTEGER,
  id_certificador VARCHAR,
  id_regional VARCHAR,
  PRIMARY KEY(id_sgc_ddjj)
) WITHOUT OIDS;

ALTER TABLE sgc_ddjj
  ALTER COLUMN id_sgc_ddjj SET STATISTICS 0;

ALTER TABLE sgc_ddjj
  ALTER COLUMN fecha_inicio_revision SET STATISTICS 0;

ALTER TABLE sgc_ddjj
  ALTER COLUMN fecha_fin_revision SET STATISTICS 0;

ALTER TABLE sgc_ddjj
  ALTER COLUMN observaciones SET STATISTICS 0;

ALTER TABLE sgc_ddjj
  ALTER COLUMN id_empresa SET STATISTICS 0;

ALTER TABLE sgc_ddjj
  ALTER COLUMN id_ddjj SET STATISTICS 0;

ALTER TABLE sgc_ddjj
  ALTER COLUMN id_certificador SET STATISTICS 0;

ALTER TABLE sgc_ddjj
  ALTER COLUMN id_regional SET STATISTICS 0;

  /*************************insumos nacionales************************/
ALTER TABLE public.insumos_nacionales
  ADD COLUMN nombre_tecnico VARCHAR;
ALTER TABLE public.insumos_nacionales
  ADD COLUMN subpartida INTEGER;
ALTER TABLE public.insumos_nacionales
  ADD COLUMN ci VARCHAR;
ALTER TABLE public.insumos_nacionales
  ADD COLUMN unidad_medida INTEGER;
ALTER TABLE public.insumos_nacionales
  ADD COLUMN cantidad INTEGER;
/***************************insumos importados************************/
ALTER TABLE public.insumos_importados
  ADD COLUMN nombre_tecnico VARCHAR;
ALTER TABLE public.insumos_importados
  ADD COLUMN cantidad INTEGER;
/***************************adding pais desconocido************************/
INSERT INTO pais VALUES
    (0,'DESCONOCIDO', '-');

DELETE FROM estado_ddjj WHERE id_estado_ddjj =3;
  UPDATE estado_ddjj SET descripcion = 'Vencidas' WHERE id_estado_ddjj = 2;
   UPDATE estado_ddjj SET descripcion = 'Para cancelar' WHERE id_estado_ddjj = 5;


CREATE TABLE retraso_ddjj (
  id_retraso_ddjj SERIAL NOT NULL,
  id_asistente INTEGER,
  fecha_limite_revision DATE,
  fecha_registro DATE,
  fecha_retraso DATE,
  id_ddjj INTEGER,
  PRIMARY KEY(id_retraso_ddjj)
) WITHOUT OIDS;
ALTER TABLE retraso_ddjj
  ALTER COLUMN id_retraso_ddjj SET STATISTICS 0;



ALTER TABLE insumos_nacionales ALTER COLUMN subpartida TYPE varchar;


ALTER TABLE insumos_importados ALTER COLUMN id_detalle_arancel TYPE varchar;

/***************careful******************/

ALTER TABLE ddjj_acuerdo DROP CONSTRAINT ddjj_acuerdo_id_ddjj_fkey;
ALTER TABLE insumos_importados DROP CONSTRAINT insumos_importados_id_ddjj_fkey;
ALTER TABLE insumos_nacionales DROP CONSTRAINT insumos_nacionales_id_ddjj_fkey;
ALTER TABLE observaciones_ddjj DROP CONSTRAINT  observaciones_ddjj_id_ddjj_fkey;
ALTER TABLE comercializador  DROP CONSTRAINT comercializador_fk;
ALTER TABLE insumos_nacionales  DROP CONSTRAINT insumos_nacionales_fk;
ALTER TABLE ddjj_documentos  DROP CONSTRAINT ddjj_documentos_fk;
ALTER TABLE ddjj_documentos  DROP CONSTRAINT ddjj_documentos_fk1;

drop table declaracion_jurada;

CREATE TABLE declaracion_jurada
(
  id_ddjj serial NOT NULL,
  id_empresa integer,
  id_persona integer,
  id_estado_ddjj integer,
  id_servicio_exportador integer,
  denominacion_comercial text,
  caracteristicas text,
  id_unidad_medida character varying DEFAULT 0,
  proceso_productivo text,
  fecha_registro timestamp with time zone,
  comercializador boolean DEFAULT false,
  nombre_tecnico text,
  aplicacion text,
  produccion_mensual numeric DEFAULT 0,
  id_direccion integer DEFAULT 0,
  observacion_general text,
  revisado boolean DEFAULT false,
  id_observaciones_ddjj integer DEFAULT 0,
  valor_fob numeric,
  valor_mano_obra numeric,
  sobrevalor_mano_obra numeric(12,4),
  valor_total_insumosnacional numeric,
  sobrevalor_total_insumosnacional numeric,
  valor_total_insumosimportados numeric,
  sobrevalor_total_insumosimportados numeric,
  fecha_vencimiento date,
  vigencia integer,
  detalle_otros character varying,
  codigo character varying(20),
  fecha_revision date,
  id_acuerdo integer,
  fecha_vigencia date,
  cumple boolean,
  se_beneficia boolean,
  id_criterios character varying,
  correlativo_ddjj integer,
  id_arancel integer,
  id_partida integer,
  id_partidas_acuerdo character varying,
  reo character varying,
  observacion_ddjj character varying,
  muestra boolean,
  id_asistente integer,
  sobrevalor_fob numeric,
  valor_exw numeric,
  sobrevalor_exw numeric,
  sobrevalor_frontera numeric,
  valor_frontera numeric,
  fecha_limite_revision date,
  id_regional integer,
  complemento character varying,
  revisado_uco integer DEFAULT 0,
  aprobado_uco integer DEFAULT 0,
  CONSTRAINT declaracion_jurada_pkey PRIMARY KEY (id_ddjj),
  CONSTRAINT declaracion_jurada_fk FOREIGN KEY (id_acuerdo)
      REFERENCES acuerdo (id_acuerdo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT declaracion_jurada_fk1 FOREIGN KEY (id_regional)
      REFERENCES regional (id_regional) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT declaracion_jurada_fk3 FOREIGN KEY (id_partida)
      REFERENCES partida (id_partida) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT declaracion_jurada_fk4 FOREIGN KEY (id_arancel)
      REFERENCES arancel (id_arancel) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT declaracion_jurada_id_empresa_fkey FOREIGN KEY (id_empresa)
      REFERENCES empresa (id_empresa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT declaracion_jurada_id_estado_ddjj_fkey FOREIGN KEY (id_estado_ddjj)
      REFERENCES estado_ddjj (id_estado_ddjj) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT declaracion_jurada_id_persona_fkey FOREIGN KEY (id_persona)
      REFERENCES persona (id_persona) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE declaracion_jurada
  OWNER TO postgres;

  CREATE SEQUENCE declaracion_jurada_zonas_espe_id_declaracion_jurada_zonas_e_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE TABLE declaracion_jurada_zonas_especiales
(
  id_declaracion_jurada_zonas_especiales integer NOT NULL DEFAULT nextval('declaracion_jurada_zonas_espe_id_declaracion_jurada_zonas_e_seq'::regclass),
  id_ddjj integer,
  id_zonas_especiales character varying,
  CONSTRAINT declaracion_jurada_zonas_especiales_pkey PRIMARY KEY (id_declaracion_jurada_zonas_especiales),
  CONSTRAINT declaracion_jurada_zonas_especiales_fk FOREIGN KEY (id_ddjj)
      REFERENCES declaracion_jurada (id_ddjj) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE declaracion_jurada_zonas_especiales
  OWNER TO postgres;
ALTER TABLE declaracion_jurada_zonas_especiales ALTER COLUMN id_declaracion_jurada_zonas_especiales SET STATISTICS 0;
ALTER TABLE declaracion_jurada_zonas_especiales ALTER COLUMN id_ddjj SET STATISTICS 0;
ALTER TABLE declaracion_jurada_zonas_especiales ALTER COLUMN id_zonas_especiales SET STATISTICS 0;

drop table insumos_nacionales;


CREATE TABLE insumos_nacionales
(
  id_insumos_nacionales serial NOT NULL,
  id_ddjj integer,
  descripcion text,
  nombre_fabricante text,
  telefono_fabricante character varying DEFAULT 0,
  valor numeric(12,4) DEFAULT 0,
  sobrevalor numeric(12,4),
  nombre_tecnico character varying,
  subpartida character varying,
  ci character varying,
  unidad_medida integer,
  cantidad integer,
  CONSTRAINT insumos_nacionales_pkey PRIMARY KEY (id_insumos_nacionales),
  CONSTRAINT insumos_nacionales_fk FOREIGN KEY (id_ddjj)
      REFERENCES declaracion_jurada (id_ddjj) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT insumos_nacionales_id_ddjj_fkey FOREIGN KEY (id_ddjj)
      REFERENCES declaracion_jurada (id_ddjj) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE insumos_nacionales
  OWNER TO postgres;

ALTER TABLE public.ddjj_documentos
  ADD CONSTRAINT ddjj_documentos_fk1 FOREIGN KEY (id_ddjj)
    REFERENCES public.declaracion_jurada(id_ddjj)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
-- Foreign Key: observaciones_ddjj_fk

-- ALTER TABLE observaciones_ddjj DROP CONSTRAINT observaciones_ddjj_fk;

ALTER TABLE observaciones_ddjj
  ADD CONSTRAINT observaciones_ddjj_fk FOREIGN KEY (id_ddjj)
      REFERENCES declaracion_jurada (id_ddjj) MATCH FULL
      ON UPDATE NO ACTION ON DELETE NO ACTION;
-- Foreign Key: insumos_importados_id_ddjj_fkey

-- ALTER TABLE insumos_importados DROP CONSTRAINT insumos_importados_id_ddjj_fkey;

ALTER TABLE insumos_importados
  ADD CONSTRAINT insumos_importados_id_ddjj_fkey FOREIGN KEY (id_ddjj)
      REFERENCES declaracion_jurada (id_ddjj) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;

      -- Foreign Key: comercializador_fk

-- ALTER TABLE comercializador DROP CONSTRAINT comercializador_fk;

ALTER TABLE comercializador
  ADD CONSTRAINT comercializador_fk FOREIGN KEY (id_ddjj)
      REFERENCES declaracion_jurada (id_ddjj) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;


DROP TABLE comercializador;

CREATE TABLE comercializador
(
  id_comercializador serial NOT NULL,
  id_ddjj integer,
  razon_social text,
  ci_nit text,
  domicilio_legal text,
  representante_legal text,
  direccion_fabrica text,
  telefono character varying,
  precio_venta numeric(12,2),
  id_unidad_medida integer,
  produccion_mensual numeric(12,2),
  CONSTRAINT comercializador_pkey PRIMARY KEY (id_comercializador),
  CONSTRAINT comercializador_fk FOREIGN KEY (id_ddjj)
      REFERENCES declaracion_jurada (id_ddjj) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT comercializador_id_unidad_medida_fkey FOREIGN KEY (id_unidad_medida)
      REFERENCES unidad_medida (id_unidad_medida) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE comercializador
  OWNER TO postgres;


/* seems to work unitl here */

update perfil_opciones set activo = true where id_perfil_opciones = 11;
update perfil_opciones set habilitado = 1 where id_perfil_opciones = 11;
update perfil set opciones = opciones || 'k' where id_perfil = 19;


INSERT INTO perfil_opciones (opcion,descripcion,activo,habilitado) VALUES ('E','Análisis de Riesgo',true,1);
CREATE TABLE ver_formula (
  id_ver_formula SERIAL NOT NULL,
  formula VARCHAR,
  fecha_alta TIMESTAMP,
  id_persona_alta INTEGER,
  fecha_baja TIMESTAMP,
  id_persona_baja INTEGER,
  estado BOOLEAN,
  PRIMARY KEY(id_ver_formula)
) WITHOUT OIDS;

ALTER TABLE ver_formula
  ALTER COLUMN formula SET STATISTICS 0;

ALTER TABLE ver_formula
  ALTER COLUMN fecha_alta SET STATISTICS 0;

ALTER TABLE ver_formula
  ALTER COLUMN id_persona_alta SET STATISTICS 0;

ALTER TABLE ver_formula
  ALTER COLUMN fecha_baja SET STATISTICS 0;

ALTER TABLE ver_formula
  ALTER COLUMN id_persona_baja SET STATISTICS 0;

INSERT INTO ver_formula (formula,estado) VALUES ('(3^2+4^2+(78/-9))/34*342',TRUE);

UPDATE ver_formula SET estado = true;

CREATE TABLE ver_variable (
  id_ver_variable SERIAL NOT NULL,
  variable CHAR NOT NULL,
  descripcion VARCHAR,
  ayuda VARCHAR,
  id_ver_tipo_variable INTEGER,
  tabla_modelo VARCHAR,
  modulo_dep VARCHAR,
  estado BOOLEAN,
  PRIMARY KEY(id_ver_variable)
) WITHOUT OIDS;

ALTER TABLE ver_variable
  ALTER COLUMN variable SET STATISTICS 0;

ALTER TABLE ver_variable
  ALTER COLUMN descripcion SET STATISTICS 0;

ALTER TABLE ver_variable
  ALTER COLUMN ayuda SET STATISTICS 0;

ALTER TABLE ver_variable
  ALTER COLUMN tabla_modelo SET STATISTICS 0;

ALTER TABLE ver_variable
  ALTER COLUMN modulo_dep SET STATISTICS 0;


CREATE TABLE ver_tipo_variable (
id_ver_tipo_variable SERIAL NOT NULL,
descripcion VARCHAR,
PRIMARY KEY(id_ver_tipo_variable)
) WITHOUT OIDS;

ALTER TABLE ver_tipo_variable
  ALTER COLUMN descripcion SET STATISTICS 0;


INSERT INTO ver_tipo_variable (id_ver_tipo_variable,descripcion) VALUES (1,'booleano');
INSERT INTO ver_tipo_variable (id_ver_tipo_variable,descripcion) VALUES (2,'rango');
INSERT INTO ver_tipo_variable (id_ver_tipo_variable,descripcion) VALUES (3,'opciones');
INSERT INTO ver_tipo_variable (id_ver_tipo_variable,descripcion) VALUES (4,'aranceles');



INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('a','Sección subpartida Arancelaria','Se le asignara una ponderación,si es la partida pertenece a una subpartida especial, ojo la configuración de la ponderacion de esta variable se la realiza mediante el modulo de aranceles en la columna de ponderación de riesgo.'
,4,'Partida','ddjj',TRUE);


INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('b','Variable Fabrica, si el producto se lo realiza en una fabrica.','Se le asignara diferentes ponderaciones de acuerdo a si tiene o no fabrica '
,1,'Fabrica','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('c','Variable Comercializador, si esta comercializando el producto a exportar.','Se le asignara diferentes ponderaciones de acuerdo a si exporta o no el producto '
,1,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('d','Variable Ferias o Muestra, si el producto es para ferias o muestra.','Se le asignara diferentes ponderaciones de acuerdo a si el producto es para ferias o muestras. '
,1,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('e','Variable Acuerdos, de acuerdo a los acuerdos','Se le asignara diferentes ponderaciones de acuerdo al acuerdo que tenga la Declaración Jurada'
,3,'Acuerdo','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('f','Variable SGP o Acuerdo, referente al acuerdo','Se le asignara diferentes ponderaciones de acuerdo a si el acuerdo es SGP o Acuerdo.'
,1,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('g','Variable Insumos Nacionales.','Se le asignara diferentes ponderaciones si el acuerdo tiene o no insumos nacionales.'
,1,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('h','Variable Insumos Importados','Se le asignara diferentes ponderaciones si el acuerdo tiene o no insumos importados.'
,1,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('i','Variable Cantidad Insumos Nacionales','Se le asignara diferentes ponderaciones si la cantidad de los Insumos nacionales entra en algun rango predefinido por la variable.'
,2,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('j','Variable Cantidad Insumos Importados','Se le asignara diferentes ponderaciones si la cantidad de los Insumos importados entra en algun rango predefinido por la variable.'
,2,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('k','Variable Total Insumos Nacionales','Se le asignara diferentes ponderaciones si el valor total de los Insumos nacionales entra en algun rango predefinido por la variable.'
,2,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('l','Variable Total Insumos Importados','Se le asignara diferentes ponderaciones si el valor total de los Insumos importados entra en algun rango predefinido por la variable.'
,2,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('m','Variable Otros Costos','Se le asignara diferentes ponderaciones si el valor otros costos entra en algun rango predefinido por la variable.'
,2,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('n','Variable Total Valor Fabrica','Se le asignara diferentes ponderaciones si el costo de fabrica entra en algun rango predefinido por la variable.'
,2,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('o','Variable Costo Frontera','Se le asignara diferentes ponderaciones si el costo de la frontera entra en algun rango predefinido por la variable.'
,2,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('p','Variable FOB','Se le asignara diferentes ponderaciones si el valor total FOB entra en algun rango predefinido por la variable.'
,2,'','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('q','Variable Zonas Especiales','Se le asignara la sumatoria de las Zonas Especiales.'
,3,'ZonasEspeciales','ddjj',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('r','Variable Criterio de Origen','Se le asignara diferentes ponderaciones si el criterio de origen que se le asigne a la variable.'
,3,'CriterioOrigen','ddjj',TRUE);



/*----insertando variables ruex*****************/


INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('A','Variable Actividad Economica','Se le asignara un valor de acuerdo a la actividad economica.'
,3,'ActividadEconomica','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('B','Variable Tipo Empresa','Se le asignara un valor de acuerdo al tipo de empresa.'
,3,'TipoEmpresa','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('C','Variable Fundaempresa','Se le asignara un valor si tiene o no fundaempresa.'
,1,'','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('D','Variable Afiliaciones','Se le asignara un valor de acuerdo a las afiliaciones de la empresa.'
,3,'EmpresaAfiliaciones','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('E','Variable Nro Trabajadores','Se le asignara un valor de acuerdo al numero de trabajadores.'
,1,'','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('F','Variable Activos UFV','Se le asignara un valor de acuerdo a los activos UFV.'
,1,'','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('G','Variable Ventas UFV','Se le asignara un valor de acuerdo a las ventas UFV.'
,1,'','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('H','Variable Exportaciones UFV','Se le asignara un valor de acuerdo a las exportaciones UFV.'
,1,'','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('I','Variable Departamento','Se le asignara un valor de acuerdo al departamento.'
,3,'Departamento','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('J','Variable Municipio','Se le asignara un valor de acuerdo al municipio.'
,3,'Municipio','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('K','Variable Ciudad','Se le asignara un valor de acuerdo a la ciudad.'
,3,'Ciudad','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('L','Variable OEA','Se le asignara un valor si la empresa es OEA.'
,1,'','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('M','Variable Empresa Estatal','Se le asignara un valor si la empresa es estatal.'
,1,'','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('N','Variable Rubro','Se le asignara un valor de acuerdo al rubro de la empresa.'
,3,'RubroExportaciones','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('O','Variable Antiguedad','Se le asignara un valor de acuerdo a la antiguedad de la empresa.'
,2,'','ruex',TRUE);

INSERT INTO ver_variable (variable,descripcion,ayuda,id_ver_tipo_variable,tabla_modelo,modulo_dep,estado)
VALUES ('P','Variable Ultima verificación','Se le asignara un valor de acuerdo a la ultima verificación.'
,2,'','ruex',TRUE);


ALTER TABLE public.ver_formula
  ADD COLUMN justificativo VARCHAR;


/*********************************VALORES DE VARIABLES**************************/
CREATE TABLE ver_variable_valor (
  id_ver_variable_valor SERIAL NOT NULL,
  id_ver_variable INTEGER,
  valor NUMERIC(12,2),
  descripcion VARCHAR,
  flag INTEGER,
  PRIMARY KEY(id_ver_variable_valor)
) WITHOUT OIDS;

ALTER TABLE ver_variable_valor
  ALTER COLUMN id_ver_variable_valor SET STATISTICS 0;

ALTER TABLE ver_variable_valor
  ALTER COLUMN id_ver_variable SET STATISTICS 0;

ALTER TABLE ver_variable_valor
  ALTER COLUMN valor SET STATISTICS 0;

ALTER TABLE ver_variable_valor
  ALTER COLUMN descripcion SET STATISTICS 0;

ALTER TABLE ver_variable_valor
  ALTER COLUMN flag SET STATISTICS 0;

  ALTER TABLE public.ver_variable_valor
  ADD CONSTRAINT ver_variable_valor_fk FOREIGN KEY (id_ver_variable)
    REFERENCES public.ver_variable(id_ver_variable)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;


ALTER TABLE public.ver_variable_valor
  ALTER COLUMN valor TYPE NUMERIC(12,2);
/* delete from ver_variable_valor
   delete from ver_variable*/




CREATE TABLE ver_rango (
  id_ver_rango SERIAL NOT NULL,
  id_ver_variable INTEGER,
  max NUMERIC,
  min NUMERIC,
  valor NUMERIC,
  estado BOOLEAN,
  PRIMARY KEY(id_ver_rango)
) WITHOUT OIDS;

ALTER TABLE ver_rango
  ALTER COLUMN max SET STATISTICS 0;

ALTER TABLE ver_rango
  ALTER COLUMN id_ver_variable SET STATISTICS 0;

ALTER TABLE ver_rango
  ALTER COLUMN valor SET STATISTICS 0;

ALTER TABLE public.ver_rango
  ADD CONSTRAINT ver_rango_fk FOREIGN KEY (id_ver_variable)
    REFERENCES public.ver_variable(id_ver_variable)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;


/**********************valores DDJJ *********************/
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (2,10,'Tiene Fabrica',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (2,10,'No Tiene Fabrica',0);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (3,10,'Esta Comercializando',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (3,10,'No Esta Comercializando',0);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (4,10,'Es para feria o muestra',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (4,10,'No es para feria o muestra',0);


UPDATE public.acuerdo SET criterio_valor = 10;

INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (6,10,'El Acuerdo es SGP',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (6,10,'El Acuerdo es Comercial',0);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (7,10,'Cuenta con insumos Nacionales',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (7,10,'No cuenta con insumos Importados',0);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (8,10,'Cuenta con insumos Importados',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (8,10,'No Cuenta con insumos Importados',0);

INSERT INTO ver_rango (id_ver_variable,max,min,valor,estado)
VALUES (9,100,0,10,TRUE);
INSERT INTO ver_rango (id_ver_variable,max,min,valor,estado)
VALUES (9,200,100,10,TRUE);

UPDATE public.criterio_origen SET criterio_valor = 10;


ALTER TABLE public.actividad_economica
  ADD COLUMN criterio_valor NUMERIC(12,2);
UPDATE public.actividad_economica SET criterio_valor = 10;
ALTER TABLE public.tipo_empresa
  ADD COLUMN criterio_valor NUMERIC(12,2);
UPDATE public.tipo_empresa SET criterio_valor = 10;

INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (21,10,'Tiene FundaEmpresa',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (21,10,'No Tiene FundaEmpresa',0);

ALTER TABLE public.empresa_afiliacion
  ADD COLUMN criterio_valor NUMERIC(12,2);
UPDATE public.empresa_afiliacion SET criterio_valor = 10;


/*trabajadores*/
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (23,10,'1-9',0);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (23,10,'10-19',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (23,10,'20-49',2);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (23,10,'Mas de 49',3);

/*activos*/
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (24,10,'1-150.000',0);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (24,10,'150.001-1.500.000',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (24,10,'1.500.001-6.000.000',2);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (24,10,'Más de 6.000.000',3);

/*ventas*/
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (25,10,'Ninguno',0);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (25,10,'1-600.000',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (25,10,'600.001-3.000.00',2);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (25,10,'3.000.001-12.000.000',3);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (25,10,'Más de 12.000.000',4);

/*exportaciones*/
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (26,10,'Ninguno',0);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (26,10,'1-75.000',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (26,10,'75.001-750.000',2);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (26,10,'750.001-7.500.000',3);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (26,10,'Más de 7.500.000',4);


ALTER TABLE public.departamento
  ADD COLUMN criterio_valor NUMERIC(12,2);
UPDATE public.departamento SET criterio_valor = 10;

ALTER TABLE public.municipio
  ADD COLUMN criterio_valor NUMERIC(12,2);
UPDATE public.municipio SET criterio_valor = 10;

ALTER TABLE public.ciudad
  ADD COLUMN criterio_valor NUMERIC(12,2);
UPDATE public.ciudad SET criterio_valor = 10;

/*oea*/

INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (30,10,'Tiene OEA',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (30,10,'No Tiene OEA',0);

/*empresa Estatal*/
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (31,10,'Es empresa Estatal',1);
INSERT INTO ver_variable_valor (id_ver_variable,valor,descripcion,flag)
VALUES (31,10,'No es Empresa Estatal',0);

ALTER TABLE public.rubro_exportaciones
  ADD COLUMN criterio_valor NUMERIC(12,2);
UPDATE public.rubro_exportaciones SET criterio_valor = 10;


/*******************criterios de admision**********************/


CREATE TABLE ver_admision (
  id_ver_admision SERIAL NOT NULL,
  max NUMERIC,
  min NUMERIC,
  nivel VARCHAR,
  verificacion BOOLEAN,
  estado BOOLEAN,
  PRIMARY KEY(id_ver_admision)
) WITHOUT OIDS;


/*******************saving the variables array**************/
ALTER TABLE public.ver_formula
  ADD COLUMN variables VARCHAR;

ALTER TABLE public.empresa
  ADD COLUMN ultima_revision DATE;

ALTER TABLE ver_admision ADD COLUMN verificacion_estricta BOOLEAN

CREATE TABLE ver_verificacion (
  id_ver_verificacion SERIAL NOT NULL,
  id_ddjj INTEGER,
  id_regional INTEGER,
  id_formula INTEGER,
  id_admision INTEGER,
  fecha_creacion DATE,
  id_persona_creacion INTEGER,
  nivel VARCHAR,
  resultado VARCHAR,
  verificacion_estricta BOOLEAN,
  verificacion_personal BOOLEAN,
  justificacion_personal VARCHAR,
  PRIMARY KEY(id_ver_verificacion)
) WITHOUT OIDS;


/****************creando tabla regional************************/
CREATE TABLE ver_verificacion (
  id_ver_verificacion SERIAL NOT NULL,
  id_ddjj INTEGER,
  id_regional INTEGER,
  id_formula INTEGER,
  id_admision INTEGER,
  fecha_creacion DATE,
  id_persona_creacion INTEGER,
  nivel VARCHAR,
  resultado VARCHAR,
  verificacion_estricta BOOLEAN,
  verificacion_personal BOOLEAN,
  justificacion_personal VARCHAR,
  PRIMARY KEY(id_ver_verificacion)
) WITHOUT OIDS;

ALTER TABLE ver_verificacion
  ALTER COLUMN id_ddjj SET STATISTICS 0;

ALTER TABLE ver_verificacion ADD COLUMN id_ver_estado_verificacion INTEGER

INSERT INTO perfil_opciones (opcion,descripcion,activo,habilitado) VALUES ('F','Verificaciones',true,1);

UPDATE perfil SET opciones = opciones || 'F' WHERE id_perfil = 25;
UPDATE perfil SET opciones = opciones || 'F' WHERE id_perfil =7;

/*******************anadiendo estados de verificacion****************/
CREATE TABLE ver_estado_verificacion (
  id_ver_estado_verificacion SERIAL NOT NULL,
  denominacion VARCHAR,
  PRIMARY KEY(id_ver_estado_verificacion)
) WITHOUT OIDS;

ALTER TABLE ver_estado_verificacion
  ALTER COLUMN denominacion SET STATISTICS 0;

INSERT INTO ver_estado_verificacion (id_ver_estado_verificacion,denominacion)
VALUES (0,'Para Asignar');
INSERT INTO ver_estado_verificacion (id_ver_estado_verificacion,denominacion)
VALUES (1,'Asignado');
INSERT INTO ver_estado_verificacion (id_ver_estado_verificacion,denominacion)
VALUES (2,'Aprobado');
INSERT INTO ver_estado_verificacion (id_ver_estado_verificacion,denominacion)
VALUES (3,'Rechazado');
INSERT INTO ver_estado_verificacion (id_ver_estado_verificacion,denominacion)
VALUES (4,'Eliminado');


/*******************anadiendo realcion con verificacion****************/
ALTER TABLE public.ver_verificacion
  ADD CONSTRAINT ver_verificacion_fk FOREIGN KEY (id_ver_estado_verificacion)
    REFERENCES public.ver_estado_verificacion(id_ver_estado_verificacion)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;

ALTER TABLE public.ver_verificacion
  ADD CONSTRAINT ver_verificacion_fk1 FOREIGN KEY (id_ddjj)
    REFERENCES public.declaracion_jurada(id_ddjj)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;
ALTER TABLE public.ver_verificacion
  ADD CONSTRAINT ver_verificacion_fk2 FOREIGN KEY (id_regional)
    REFERENCES public.regional(id_regional)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;



/***************anadiendo columnas a la verificacion********************/

ALTER TABLE public.ver_verificacion
  ADD COLUMN id_persona_verificacion INTEGER;

ALTER TABLE public.ver_verificacion
  ADD COLUMN fecha_asignacion_verificacion DATE;

ALTER TABLE public.ver_verificacion
  ADD COLUMN fecha_verificacion DATE;

ALTER TABLE public.ver_verificacion
  ADD COLUMN id_empresa INTEGER;

  ALTER TABLE public.ver_verificacion
  ADD CONSTRAINT ver_verificacion_fk3 FOREIGN KEY (id_empresa)
    REFERENCES public.empresa(id_empresa)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE;


ALTER TABLE public.ver_verificacion
  ADD COLUMN informe VARCHAR;
ALTER TABLE public.ver_verificacion
  ADD COLUMN id_persona_elimino INTEGER;
ALTER TABLE public.ver_verificacion
  ADD COLUMN fecha_eliminacion INTEGER;

ALTER TABLE public.ver_verificacion
  DROP COLUMN fecha_eliminacion;

ALTER TABLE public.ver_verificacion
  ADD COLUMN fecha_eliminacion  DATE;


/*********** anandiendo columna de justificaciones de verificaciones**********/
ALTER TABLE public.ver_verificacion
  DROP COLUMN justificacion_personal;


CREATE TABLE ver_justificacion (
  id_ver_justificacion SERIAL NOT NULL,
  justificacion VARCHAR,
  id_ver_verificacion INTEGER,
  id_ddjj INTEGER,
  fecha_justificacion DATE,
  PRIMARY KEY(id_ver_justificacion)
) WITHOUT OIDS;

ALTER TABLE ver_justificacion
  ALTER COLUMN id_ver_justificacion SET STATISTICS 0;

ALTER TABLE ver_justificacion
  ALTER COLUMN justificacion SET STATISTICS 0;

ALTER TABLE ver_justificacion
  ALTER COLUMN id_ver_verificacion SET STATISTICS 0;

ALTER TABLE ver_justificacion
  ALTER COLUMN fecha_justificacion SET STATISTICS 0;

ALTER TABLE public.ver_justificacion
  ADD COLUMN id_persona INTEGER;


  /******************* anadiendo estado de verificacion a ddjj ***************/
INSERT INTO estado_ddjj (id_estado_ddjj,descripcion)
VALUES (8,'Visita de Verificación');
INSERT INTO estado_ddjj (id_estado_ddjj,descripcion)
VALUES (9,'Eliminada');

ALTER TABLE ver_verificacion
  ADD COLUMN resumen VARCHAR;
ALTER TABLE ver_verificacion
  ADD COLUMN conclusion_ddjj VARCHAR;


CREATE TABLE ddjj_eliminacion (
  id_ddjj_eliminacion SERIAL NOT NULL,
  id_ddjj INTEGER,
  id_persona INTEGER,
  fecha_eliminacion DATE,
  PRIMARY KEY(id_ddjj_eliminacion)
) WITHOUT OIDS;

ALTER TABLE ddjj_eliminacion
  ALTER COLUMN id_ddjj_eliminacion SET STATISTICS 0;

ALTER TABLE ddjj_eliminacion
  ALTER COLUMN id_ddjj SET STATISTICS 0;



/*********************anadiendo justificacion a eliminacion ddjj ****************/
ALTER TABLE public.ddjj_eliminacion
  ADD COLUMN justificacion VARCHAR;


  INSERT INTO tipo_correo (id_tipo_correo,asunto)
VALUES (50,'Rechazo de Declaración Jurada');

ALTER TABLE public.ver_verificacion
  ADD COLUMN justificacion VARCHAR;


CREATE TABLE ver_correo (
  id_ver_correo SERIAL NOT NULL,
  correo VARCHAR,
  PRIMARY KEY(id_ver_correo)
) WITHOUT OIDS;

ALTER TABLE ver_correo
  ALTER COLUMN id_ver_correo SET STATISTICS 0;

ALTER TABLE ver_correo
  ALTER COLUMN correo SET STATISTICS 0;

INSERT INTO ver_correo (id_ver_correo,correo)
VALUES (1,'');

INSERT INTO tipo_correo (id_tipo_correo,asunto)
VALUES (51,'Nueva Verificacion');



ALTER SEQUENCE public.acuerdo_arancel_id_acuerdo_arancel_seq RESTART WITH 26;
ALTER SEQUENCE acuerdo_id_acuerdo_seq1 RESTART WITH 21;

DROP TABLE acuerdo_arancel;

CREATE TABLE acuerdo_arancel
(
  id_acuerdo_arancel serial NOT NULL,
  id_acuerdo integer NOT NULL,
  id_arancel integer NOT NULL,
  activo boolean,
  CONSTRAINT acuerdo_arancel_pkey PRIMARY KEY (id_acuerdo_arancel),
  CONSTRAINT acuerdo_arancel_fk FOREIGN KEY (id_acuerdo)
      REFERENCES acuerdo (id_acuerdo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT arancel_acuerdo_fk FOREIGN KEY (id_arancel)
      REFERENCES arancel (id_arancel) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);

select 'Termino los scripts';