-- VISTA DE VIDEOS
DROP VIEW IF EXISTS view_videos;
CREATE VIEW view_videos AS
SELECT id_video, cod_video, title, details, path_play, des_area, des_kind, video_create FROM videos
INNER JOIN areas ON id_area = id_fk_area
INNER JOIN kinds ON id_kind = id_fk_kind;


-- AREAS SEGUN DEPARTAMENTOS
DROP VIEW IF EXISTS view_areas;
CREATE VIEW view_areas AS
SELECT des_area FROM departaments_areas
INNER JOIN departaments ON id_departament = id_fk_departament
INNER JOIN areas ON id_area = id_fk_area;

-- TIPOS SEGUN DEPARTAMENTOS
DROP VIEW IF EXISTS view_kinds;
CREATE VIEW view_kinds AS
SELECT des_kind FROM departaments_kinds
INNER JOIN departaments ON id_departament = id_fk_departament
INNER JOIN kinds ON id_kind = id_fk_kind;

SELECT * FROM view_videos ORDER BY video_create DESC