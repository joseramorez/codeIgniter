create table usuario (
  id_usuario int not null auto_increment
  ,nombre varchar(100) not null
  ,apellido_p varchar(100)
  ,apellido_m varchar(100)
  ,username varchar(100) not null
  ,passwords varchar(255) not null
  ,nivel int not null
  ,CONSTRAINT usuario_pk primary key (id_usuario)
);
