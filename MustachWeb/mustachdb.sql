create database mustachdb;
use mustachdb;

create table usuarios(
	id_usuario int(10) not null auto_increment,
	nombre varchar(40),
	apellido_pat varchar(20),
	apellido_mat varchar(20),
	correo text,
	telefono varchar(30),
	user varchar(20) not null,
	password text,
	primary key (id_usuario)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table clientes(
	id_cliente int(10) not null auto_increment,
	nombre varchar(40),
	apellido_pat varchar(20),
	apellido_mat varchar(20),
	compania varchar(50),
	calle varchar (30),
	numero varchar(10),
	colonia varchar(30),
	municipio varchar(30),
	estado varchar(30),
	telefono varchar(30),
	correo text,
	proyecto text,
	fecha_registro date,
	primary key (id_cliente)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table tipo(
	id_tipo int(10) not null auto_increment,
	nombre varchar(40),	
	primary key (id_tipo)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table servicios(
	id_servicio int(10) not null auto_increment,
	id_tipo int(10),
	id_cliente int(10),	
	cotizacion varchar(40),
	anticipo decimal(10,2),
	saldo decimal(10,2),
	excibiciones decimal(10,2),
	monto_excibicion decimal(10,2),
	primary key (id_servicio),
	foreign key (id_tipo) references tipo(id_tipo),
	foreign key (id_cliente) references clientes(id_cliente)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table pagos(
	id_pago int(10) not null auto_increment,
	id_servicio int(10),
	monto decimal(10,2),
	fecha date,
	forma_pago varchar(15),
	primary key (id_pago),
	foreign key (id_servicio) references servicios(id_servicio)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table soporte(
	id_soporte int(10) not null auto_increment,
	id_servicio int(10),
	problema text,
	primary key (id_soporte),
	foreign key (id_servicio) references servicios(id_servicio)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table comentarios(
	id_comentario int(10) not null auto_increment,
	nombre varchar(40),
	apellido_pat varchar(20),
	apellido_mat varchar(20),
	correo text,
	es_cliente varchar(2),
	mensaje text,
	recibir_respuesta varchar(2),
	primary key (id_comentario)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table visitas(
	id_visitante int(10) not null auto_increment,
	nombre varchar(40),
	apellido_pat varchar(20),
	apellido_mat varchar(20),
	compania varchar(50),	
	telefono varchar(30),
	correo text,
	fecha datetime,
	motivo text,
	confirmacion varchar(20),
	es_cliente varchar(2),
	id_cliente int(10),
	primary key (id_visitante),
	foreign key (id_cliente) references clientes(id_cliente)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;