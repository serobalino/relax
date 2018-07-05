/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     05/07/2018 15:34:39                          */
/*==============================================================*/


drop table if exists escenarios;

drop table if exists estados;

drop table if exists historial;

drop table if exists lugares;

drop table if exists password_resets;

drop table if exists users;

/*==============================================================*/
/* Table: escenarios                                            */
/*==============================================================*/
create table escenarios
(
   id_ec                smallint not null auto_increment,
   id_es                smallint,
   titulo_ec            varchar(100),
   imegen_ec            varchar(300),
   tiempo_ec            decimal(5,2),
   primary key (id_ec)
);

/*==============================================================*/
/* Table: estados                                               */
/*==============================================================*/
create table estados
(
   id_es                smallint not null auto_increment,
   titulo_es            varchar(200) not null,
   primary key (id_es)
);

/*==============================================================*/
/* Table: historial                                             */
/*==============================================================*/
create table historial
(
   id_es                smallint not null,
   id_us                bigint not null,
   id_ec                smallint,
   fecha_hi             timestamp
);

/*==============================================================*/
/* Table: lugares                                               */
/*==============================================================*/
create table lugares
(
   codigo_lu            char(30) not null,
   titulo_lu            varchar(500) not null,
   lng_lu               varchar(20),
   lat_lu               varchar(20),
   primary key (codigo_lu)
);

/*==============================================================*/
/* Table: password_resets                                       */
/*==============================================================*/
create table password_resets
(
   email                varchar(300),
   token                varchar(300),
   created_at           datetime
);

/*==============================================================*/
/* Table: users                                                 */
/*==============================================================*/
create table users
(
   id                   bigint not null auto_increment,
   lugar                char(30),
   name                 varchar(300),
   email                varchar(300),
   password             char(61),
   avatar               varchar(400),
   remember_token       varchar(100),
   updated_at           timestamp,
   created_at           timestamp,
   google               varchar(40),
   facebook             varchar(40),
   primary key (id)
);

alter table escenarios add constraint fk_estado_ecenarios foreign key (id_es)
      references estados (id_es) on delete restrict on update restrict;

alter table historial add constraint fk_estados_usuario foreign key (id_es)
      references estados (id_es) on delete restrict on update restrict;

alter table historial add constraint fk_estados_usuario2 foreign key (id_us)
      references users (id) on delete restrict on update restrict;

alter table historial add constraint fk_usuatio_escenario foreign key (id_ec)
      references escenarios (id_ec) on delete restrict on update restrict;

alter table users add constraint fk_esta foreign key (lugar)
      references lugares (codigo_lu) on delete restrict on update restrict;

