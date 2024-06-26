-- Active: 1714663991828@@127.0.0.1@3306@videoteca_rtp

USE videoteca_rtp;-- VISTA DE VIDEOS
DROP VIEW IF EXISTS view_videos;
CREATE VIEW view_videos AS
SELECT 
    id_video,
    cod_video,
    title,
    details,
    path_play,
    portrait,
    des_area,
    des_kind,
    video_create,
    date_user,
    id_fk_departament FROM videos
INNER JOIN areas ON id_area = id_fk_area
INNER JOIN kinds ON id_kind = id_fk_kind;

-- VISTA PARA VIDEOS DE PRENSA
DROP VIEW IF EXISTS view_videos_prensa;
CREATE VIEW view_videos_prensa AS
SELECT id_video,
    cod_video,
    title,
    details,
    path_play,
    des_area,
    des_kind,
    video_create,
    date_user,
    id_fk_departament,
    departaments.des_departament FROM videos
INNER JOIN areas ON id_area = id_fk_area
INNER JOIN kinds ON id_kind = id_fk_kind
INNER JOIN departaments ON id_departament = id_fk_departament
WHERE departaments.des_departament = "PRENSA";
DROP VIEW IF EXISTS view_videos_programacion;
CREATE VIEW view_videos_programacion AS
SELECT id_video,
    cod_video,
    title,
    details,
    path_play,
    portrait,
    des_area,
    des_kind,
    video_create,
    date_user,
    id_fk_departament,
    departaments.des_departament FROM videos
INNER JOIN areas ON id_area = id_fk_area
INNER JOIN kinds ON id_kind = id_fk_kind
INNER JOIN departaments ON id_departament = id_fk_departament
WHERE departaments.des_departament = "PROGRAMACION";


-- AREAS SEGUN DEPARTAMENTOS
DROP VIEW IF EXISTS view_areas;
CREATE VIEW view_areas AS
SELECT des_area, id_fk_departament, departaments_areas_create FROM departaments_areas
INNER JOIN departaments ON id_departament = id_fk_departament
INNER JOIN areas ON id_area = id_fk_area;

-- TIPOS SEGUN DEPARTAMENTOS
DROP VIEW IF EXISTS view_kinds;
CREATE VIEW view_kinds AS
SELECT des_kind, id_fk_departament, departaments_kinds_create FROM departaments_kinds
INNER JOIN departaments ON id_departament = id_fk_departament
INNER JOIN kinds ON id_kind = id_fk_kind;

-- ULTIMO CONTRATO DE VIDEO
DROP VIEW IF EXISTS view_agreements;
CREATE VIEW view_agreements AS
SELECT 
    a.id_fk_video, 
    a.agreement_create, 
    a.id_agreement, 
    ag.nro_agreement, 
    ag.agreement, 
    ag.agreement_expiration 
FROM 
    (SELECT 
         id_fk_video, 
         MAX(agreement_create) AS agreement_create, 
         MAX(id_agreement) AS id_agreement 
     FROM 
         agreement 
     GROUP BY 
         id_fk_video
    ) a
JOIN 
    agreement ag 
    ON a.id_fk_video = ag.id_fk_video 
    AND a.agreement_create = ag.agreement_create 
    AND a.id_agreement = ag.id_agreement;

-- VISTA DE VIDEOS CON SU ULTIMO CONTRATO
DROP VIEW IF EXISTS view_videos_agreement;
CREATE VIEW view_videos_agreement AS
SELECT * FROM view_videos_programacion
LEFT JOIN view_agreements on id_fk_video = id_video;

INSERT INTO users(username, passkey, user_permission, user_create, user_update) VALUES
("admin","admin", "Administrador", NOW(), NOW()),
("master","m4st3r", "Administrador", NOW(), NOW()),
("boss","boss", "Administrador", NOW(), NOW()),
("grupo_1","grupo_1@rtp", "Editor", NOW(), NOW()),
("grupo_2","grupo_2@rtp", "Editor", NOW(), NOW()),
("grupo_3","grupo_3@rtp", "Editor", NOW(), NOW()),
("grupo_4","grupo_4@rtp", "Editor", NOW(), NOW()),
("grupo_5","grupo_5@rtp", "Editor", NOW(), NOW()),
("grupo_6","grupo_6@rtp", "Editor", NOW(), NOW()),
("grupo_7","grupo_7@rtp", "Editor", NOW(), NOW()),
("grupo_8","grupo_8@rtp", "Editor", NOW(), NOW());