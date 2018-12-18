create table usuario (
  id_usuario int not null auto_increment
  ,nombre varchar(100) not null
  ,apellido_p varchar(100)
  ,apellido_m varchar(100)
  ,username varchar(100) not null unique
  ,passwords varchar(255) not null
  ,nivel int not null
  ,CONSTRAINT usuario_pk primary key (id_usuario)
);

create table folio(
  id_folio int not null auto_increment
  ,id_usuario int not null
  ,folio varchar(255)
  ,fecha_creacion date
  ,status varchar(20)
  ,comentarios varchar(255)
  ,CONSTRAINT folio_pk primary key (id_folio)
  ,CONSTRAINT folio_usuario_fk foreign key (id_usuario) references usuario (id_usuario)
);

create table tramite(
  id_tramite int not null auto_increment
  ,nombre char
  ,descripcion char
  ,CONSTRAINT tramite_pk primary key (id_tramite)
);

create table documento(
  id_documento int not null auto_increment
  ,nombre char
  ,descripcion char
  ,CONSTRAINT documento_pk primary key (id_documento)
);

create table tramite_documento(
  id_tramite int not null
  ,id_documento int not null
  ,CONSTRAINT tramite_fk foreign key (id_tramite) references tramite (id_tramite)
  ,CONSTRAINT documento_fk foreign key (id_documento) references documento (id_documento)
);

create table folio_tramite(
  id_folio_tramite int not null auto_increment
  ,id_folio int
  ,id_tramite int
  ,CONSTRAINT dolio_tramite_pk primary key (id_folio_tramite)
  ,CONSTRAINT folio_folio_tramite_fk foreign key (id_folio) references folio (id_folio)
  ,CONSTRAINT tramite_folio_tramite_fk foreign key (id_tramite) references tramite (id_tramite)
);

create table caso(
  id_caso int not null auto_increment
  ,id_folio_tramite int not null
  ,tomo int
  ,registro int
  ,observaciones char
  ,CONSTRAINT caso_pk primary key (id_caso)
  ,CONSTRAINT caso_folio_tramite_fk foreign key (id_folio_tramite) references folio_tramite (id_folio_tramite)
);
create table ruta_doc(
  id_ruta_doc int not null auto_increment
  ,nombre_original char
  ,nombre_guardado char
  ,fecha_creacion date
  ,ultima_modificacion date
  ,tamaño  char
  ,extencion char
  ,ruta_completa char
  ,CONSTRAINT ruta_doc_pk primary key (id_ruta_doc)
);

create table biotacora_doc(
  id_bitacora_doc int not null auto_increment
  ,id_folio
  ,id_documento
  .id_tipo_documento
  ,id_ruta_doc
  ,fecha_recepcion
  ,nota

);
