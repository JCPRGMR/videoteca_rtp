-- Active: 1716929637665@@127.0.0.1@3306@videoteca_rtp
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
    _create datetime not null,
    _update datetime not null
    Foreign Key (id_fk_departament) REFERENCES departaments(id_departaments)
);
CREATE TABLE departaments_kinds(
    id_fk_departament int not null,
    _create datetime not null,
    _update datetime not null
    Foreign Key (id_fk_departament) REFERENCES departaments(id_departaments)
);
CREATE TABLE videos();
CREATE TABLE agreeement();
CREATE TABLE users_activities(
    id_fk_user int,
    id_fk_video bigint,
    id_fk_activity int,
    ip_user varchar(25),
    details text,
    videos_activity_create datetime,
    videos_activity_update datetime,
    Foreign Key (id_fk_user) REFERENCES users() DELETE ON CASCADE
    Foreign Key (id_fk_video) REFERENCES video() DELETE ON CASCADE
    Foreign Key (id_fk_activiy) REFERENCES activities() DELETE ON CASCADE
);