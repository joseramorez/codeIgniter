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
  ,nombre varchar(255)
  ,descripcion varchar(255)
  ,CONSTRAINT tramite_pk primary key (id_tramite)
);

create table documento(
  id_documento int not null auto_increment
  ,nombre varchar(255) not null
  ,descripcion varchar(255)
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
  ,observaciones varchar(255)
  ,CONSTRAINT caso_pk primary key (id_caso)
  ,CONSTRAINT caso_folio_tramite_fk foreign key (id_folio_tramite) references folio_tramite (id_folio_tramite)
);
create table ruta_doc(
  id_ruta_doc int not null auto_increment
  ,nombre_original varchar(255)
  ,nombre_guardado varchar(255)
  ,fecha_creacion date
  ,ultima_modificacion date
  ,tamaño  varchar(255)
  ,extencion varchar(255)
  ,ruta_completa varchar(255)
  ,CONSTRAINT ruta_doc_pk primary key (id_ruta_doc)
);

create table tipo_documento(
   id_tipo_documento int not null auto_increment
   ,tipo varchar(255)
   ,descripcion varchar(255)
   ,CONSTRAINT tipo_documento_pk primary key (id_tipo_documento)
);

create table biotacora_doc(
  id_bitacora_doc int not null auto_increment
  ,id_folio int
  ,id_documento int
  ,id_tipo_documento int
  ,id_ruta_doc int
  ,fecha_recepcion date
  ,nota varchar(255)
  ,CONSTRAINT biotacora_doc_pk primary key (id_bitacora_doc)
  ,CONSTRAINT biotacora_doc_folio_fk foreign key (id_folio) references folio (id_folio)
  ,CONSTRAINT biotacora_doc_documento_fk foreign key (id_documento) references documento (id_documento)
  ,CONSTRAINT biotacora_doc_tipo_docuemto_fk foreign key (id_tipo_documento) references tipo_documento (id_tipo_documento)
  ,CONSTRAINT biotacora_doc_ruta_doc_fk foreign key (id_ruta_doc) references ruta_doc (id_ruta_doc)
  );

create table categoria_gasto(
  id_categoria_gasto int not null auto_increment
  ,nombre varchar(255)
  ,descripcion varchar(255)
  ,CONSTRAINT categoria_gasto_pk primary key (id_categoria_gasto)
);

create table gasto(
  id_gasto int not null auto_increment
  ,id_categoria_gasto int
  ,nombre varchar(255)
  ,costo float
  ,descripcion varchar(255)
  ,CONSTRAINT gasto_pk primary key (id_gasto)
  ,CONSTRAINT gasto_categoria_gasto_fk foreign key (id_categoria_gasto) references categoria_gasto (id_categoria_gasto)
);

create table gasto_folio(
  id_gasto int
  ,id_folio int
  ,CONSTRAINT gasto_folio_gasto_fk foreign key (id_gasto) references gasto (id_gasto)
  ,CONSTRAINT gasto_folio_folio_fk foreign key (id_folio) references folio (id_folio)
);

create table folio_persona(
  id_folio_persona int not null auto_increment
  ,id_persona int
  ,tipo_persona varchar(255)
  ,CONSTRAINT folio_persona_pk primary key (id_folio_persona)

);
