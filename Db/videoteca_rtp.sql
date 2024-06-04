-- Active: 1716929637665@@127.0.0.1@3306@videoteca_rtp
DROP DATABASE videoteca_rtp;
CREATE DATABASE videoteca_rtp;
USE videoteca_rtp;

CREATE TABLE users(
    id_user int primary key auto_increment,
    username varchar(25),
    passkey varchar(25),
    passhash varchar(100),
    sessionstate tinyint,
    photo text,
    user_permission text,
    user_create datetime not null,
    user_update datetime not null
);
CREATE TABLE activities(
    id_activity int primary key auto_increment,
    des_activity text not null,
    activity_create datetime,
    activity_update datetime
);
CREATE TABLE areas(
    id_area int primary key auto_increment,
    des_area varchar(50) not null,
    area_create datetime not null,
    area_update datetime not null
);
CREATE TABLE kinds(
    id_kind int primary key AUTO_INCREMENT,
    des_kind varchar(50) not null,
    kind_create datetime not null,
    kind_update datetime not null
);
CREATE TABLE departaments(
    id_departament int primary key auto_increment,
    des_departament varchar(50),
    departament_create datetime not null,
    departament_update datetime not null
);
CREATE TABLE departaments_areas(
    id_fk_departament int not null,
    id_fk_area int not null,
    departaments_areas_create datetime not null,
    departaments_areas_update datetime not null,
    Foreign Key (id_fk_departament) REFERENCES departaments(id_departament) ON DELETE CASCADE,
    Foreign Key (id_fk_area) REFERENCES areas(id_area) ON DELETE CASCADE
);
CREATE TABLE departaments_kinds(
    id_fk_departament int not null,
    id_fk_kind int not null,
    departaments_kinds_create datetime not null,
    departaments_kinds_update datetime not null,
    Foreign Key (id_fk_departament) REFERENCES departaments(id_departament) ON DELETE CASCADE,
    Foreign Key (id_fk_kind) REFERENCES kinds(id_kind) ON DELETE CASCADE
);
CREATE TABLE videos(
    id_video bigint primary key auto_increment,
    cod_video varchar(20),
    title text,
    details text,
    path_play text,
    duration text,
    name_file text,
    portrait text,
    id_fk_area int not null,
    id_fk_kind int not null,
    id_fk_departament int not null,
    date_user date not null,
    video_create datetime not null,
    video_update datetime not null,
    Foreign Key (id_fk_area) REFERENCES areas(id_area) ON DELETE CASCADE,
    Foreign Key (id_fk_kind) REFERENCES kinds(id_kind) ON DELETE CASCADE,
    Foreign Key (id_fk_departament) REFERENCES departaments(id_departament) ON DELETE CASCADE
);
CREATE TABLE agreeement(
    id_agreeement bigint primary key auto_increment,
    nro_agreeemnt text,
    agreement text,
    agreement_expiration date,
    id_fk_video bigint,
    agreement_create datetime not null,
    agreement_update datetime not null,
    Foreign Key (id_fk_video) REFERENCES videos(id_video) ON DELETE CASCADE
);
CREATE TABLE users_activities(
    id_fk_user int,
    id_fk_video bigint,
    id_fk_activity int,
    ip_user varchar(25),
    details text,
    videos_activity_create datetime,
    videos_activity_update datetime,
    Foreign Key (id_fk_user) REFERENCES users(id_user) ON DELETE CASCADE,
    Foreign Key (id_fk_video) REFERENCES videos(id_video) ON DELETE CASCADE,
    Foreign Key (id_fk_activity) REFERENCES activities(id_activity) ON DELETE CASCADE
);