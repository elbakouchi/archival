--                PRIMERA VERSION
create database folderfile;
	use folderfile;
	set sql_mode='';

	create table area_oficina(
		id_area_oficina int primary key auto_increment not null,
		nombre varchar(500),
		detalle varchar(500),
		activo boolean default 1
		);
	create table usuario(
		id_usuario int primary key auto_increment not null,
		area_oficina_id int,
		nombre varchar(500),
		apellido varchar(500),
		dni varchar(500),
		telefono varchar(500),
		edad varchar(500),
		imagen varchar(500),
		sexo varchar(500),
		email varchar(500),
		usuario varchar(500),
		password varchar(500),
		fecha datetime,
		fecha_modeficacion datetime,
		activo boolean default 1,
		admin boolean default 0,
		publico boolean default 0,
		foreign key (area_oficina_id) references area_oficina(id_area_oficina)
		);
	insert into usuario(
		nombre,apellido,dni,telefono,edad,imagen,sexo,email,usuario,password,fecha,fecha_modeficacion,activo,admin,publico)
	value("admin","admin","70933255","","","","","","admin","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",NOW(),"","1","","");
	create table institucion(
		id_institucion int primary key auto_increment not null,
		usuario_id int,
		nombre text(500),
		descripcion text(500),
		direccion text(500),
		calidad text(500),
		seguridad text(500),
		garantia text(500),
		mision text(500),
		vision text(500),
		valores text(500),
		horario_atencion text(500),
		logo text(500),
		imagen text(500),
		gerente text(500),
		texto1 text(500),
		texto2 text(500),
		texto3 text(500),
		texto4 text(500),
		texto5 text(500),
		texto6 text(500),
		footer1 text(500),
		footer2 text(500),
		footer3 text(500),
		telefono text(500),
		ciudad text(500),
		pais text(500),
		email text(500),
		red_social1 text(500),
		red_social2 text(500),
		red_social3 text(500),
		red_social4 text(500),
		red_social5 text(500),
		red_social6 text(500),
		red_social7 text(500),
		is_activo boolean default 1,
	   	is_publico boolean default 0,
		fecha datetime,
		fechaactualizacion datetime,
		foreign key (usuario_id) references usuario(id_usuario)
		);
	create table periodo(
		id_periodo int not null auto_increment primary key,
		nombre varchar(500),
		descripcion varchar(500),
		activo boolean,
		fecha datetime,
		usuario_id int not null,
		foreign key (usuario_id) references usuario(id_usuario));
	create table carpeta(
		id_carpeta int primary key auto_increment not null,
		usuario_id int,
		periodo_id int,
		nombre varchar(500),
		descripcion varchar(500),
		fecha datetime,
		foreign key (usuario_id) references usuario(id_usuario)
		-- foreign key (periodo_id) references periodo(id_periodo)
		);
	create table periodocarpeta(
		id_periodocarpeta int primary key auto_increment not null,
		carpeta_id int not null,
		periodo_id int not null,
		foreign key (carpeta_id) references carpeta(id_carpeta),
		foreign key (periodo_id) references periodo(id_periodo));
	create table tipo_documento(
		id_tipo int primary key auto_increment not null,
		nombre varchar(500));
	create table archivo(
		id_archivo int primary key auto_increment not null,
		usuario_id int,
		tipo_id int,
		codigo varchar(500),
		nombre_documento varchar(1000),
		descripcion varchar(500),
		ubicacion varchar(500),
		estante varchar(500) ,
		otros varchar(500),
		publico boolean default 0,
		carpeta boolean default 0,
		carpeta_id int,
		fecha datetime,
		foreign key (usuario_id) references usuario(id_usuario),
		foreign key (tipo_id) references tipo_documento(id_tipo),
		foreign key (carpeta_id) references carpeta(id_carpeta)
		);
	create table comentario(
		id_comentario int primary key auto_increment not null,
		archivo_id int,
		usuario_id int,
		comentario text,
		-- area_oficina_id int,
		comentario_id int,
		fecha datetime,
		foreign key (archivo_id) references archivo(id_archivo),
		foreign key (usuario_id) references usuario(id_usuario),
		-- foreign key (area_oficina_id) references area_oficina(id_area_oficina),
		foreign key (comentario_id) references comentario(id_comentario)
		);
	create table permiso(
		id_permiso int primary key auto_increment not null,
		archivo_id int,
		usuario_id int,
		-- area_oficina_id int,
		fecha datetime,
		permiso int,
		foreign key (archivo_id) references archivo(id_archivo),
		foreign key (usuario_id) references usuario(id_usuario)
		-- foreign key (area_oficina_id) references area_oficina(id_area_oficina)
		 );
		