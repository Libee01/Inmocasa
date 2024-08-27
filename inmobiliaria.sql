create table usuario (
    usuario_id int (5) not null auto_increment primary key,
    nombres varchar (35) not null,
    correo varchar (100) not null unique,
    clave varchar (80) not null,
    tipo_usuario varchar(20)
);

create table pisos (
    codigo_piso int auto_increment primary key,
    calle varchar (40) not null,
    numero int not null,
    piso int not null,
    puerta varchar (5) not null,
    cp int not null,
    metros int not null,
    zona varchar (15),
    precio float not null,
    imagen varchar (100) not null,
    usuario_id int (5) references usuario
);

create table comprados (
    usuario_comprador int (5) references usuario (usuario_id),
    codigo_piso int references pisos,
    precio_final float not null
);
