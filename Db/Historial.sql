-- Active: 1720716992755@@192.168.0.88@3306@videoteca_rtp
# MOSTRAR LOS VIDEOS QUE SUBIO CADA USUARIO

# VISTA PARA VER CUANTOS VIDEOS SUBIO UN USUARIO
DROP VIEW IF EXISTS view_history_videos_upgrade;
CREATE VIEW view_history_videos_upgrade
AS
SELECT users.*, COUNT(users_activities.id_fk_video) AS videos_subidos FROM users
LEFT JOIN users_activities ON users.id_user = users_activities.id_fk_user
INNER JOIN videos ON videos.id_video = users_activities.id_fk_video
INNER JOIN activities on users_activities.id_fk_activity = activities.id_activity
WHERE activities.des_activity LIKE '%SUBIDO%'
GROUP BY users.id_user

SELECT * FROM view_history_videos_upgrade


-- SELECT users.*, COUNT(users_activities.id_fk_video) AS videos_subidos FROM users
-- LEFT JOIN users_activities ON users.id_user = users_activities.id_fk_user
-- INNER JOIN videos ON videos.id_video = users_activities.id_fk_video
-- INNER JOIN activities on users_activities.id_fk_activity = activities.id_activity
-- WHERE activities.des_activity LIKE '%SUBIDO%'
-- GROUP BY users.id_user

-- SELECT * FROM users
-- LEFT JOIN users_activities ON users.id_user = users_activities.id_fk_user
-- INNER JOIN videos ON videos.id_video = users_activities.id_fk_video
-- INNER JOIN activities on users_activities.id_fk_activity = activities.id_activity
-- WHERE activities.des_activity LIKE '%SUBIDO%'

-- SELECT * FROM videos WHERE path_play IS NOT NULL 

DROP VIEW IF EXISTS view_user_videos;
CREATE VIEW view_user_videos
AS
SELECT users.id_user, users.username, users.user_permission, users_activities.ip_user, view_videos.id_video, view_videos.cod_video, view_videos.path_play, des_area, des_kind, view_videos.video_create FROM users
LEFT JOIN users_activities ON users.id_user = users_activities.id_fk_user
INNER JOIN view_videos ON view_videos.id_video = users_activities.id_fk_video
INNER JOIN activities on users_activities.id_fk_activity = activities.id_activity
WHERE activities.des_activity LIKE '%SUBIDO%'
ORDER BY view_videos.video_create DESC

SELECT * FROM view_user_videos;