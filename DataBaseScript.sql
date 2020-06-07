-- ////////////////////////////////////////////////////////////////////////////////////
-- 						BASE DE DATOS DE UNA FARMACIA
-- ////////////////////////////////////////////////////////////////////////////////////
create database farmacia   character set utf8mb4 collate utf8mb4_general_ci;
use farmacia;
-- ////////////////////////////////////////////////////////////////////////////////////
--									TABLA ROLES
-- ////////////////////////////////////////////////////////////////////////////////////
create table roles(
	idRoles int not null primary key auto_increment,
    nombre varchar(45) not null
);
-- ////////////////////////////////////////////////////////////////////////////////////
--									TABLA USUARIOS
-- ////////////////////////////////////////////////////////////////////////////////////
create table usuarios(
	idUsuarios int not null primary key auto_increment,
    nombre varchar(100) not null,
    email varchar(100) not null,
    password varchar(255) not null,
    activo boolean not null default true,
    idRoles int not null,
    foreign key (idRoles) references roles(idRoles)    
);
-- ////////////////////////////////////////////////////////////////////////////////////
--									TABLA MARCAS
-- ////////////////////////////////////////////////////////////////////////////////////
create table marcas(
	idMarcas int primary key not null auto_increment,
    nombre varchar(45)
);
-- ////////////////////////////////////////////////////////////////////////////////////
--									TABLA CATEGORIAS
-- ////////////////////////////////////////////////////////////////////////////////////
create table categorias(
	idCategoria int primary key not null auto_increment,
    codigo varchar(45),
    nombre varchar(45)
);
-- ////////////////////////////////////////////////////////////////////////////////////
--									TABLA PRODUCTOS
-- ////////////////////////////////////////////////////////////////////////////////////
create table productos(
	idProductos int primary key not null auto_increment,
    descripcion text(100) not null,
    nombre varchar(45) not null,
    codigo varchar(45) not null,
    idCategoria int not null,
    idMarcas int not null,
    foreign key (idCategoria) references categorias(idCategoria),
    foreign key (idMarcas) references marcas(idMarcas)
);
-- ////////////////////////////////////////////////////////////////////////////////////
--								TABLA MEDIOS PAGO
-- ////////////////////////////////////////////////////////////////////////////////////
create table medios_pago(
	idMediosPago int primary key not null auto_increment,
    nombre varchar(45)
);
-- ////////////////////////////////////////////////////////////////////////////////////
--								TABLA CLIENTES
-- ////////////////////////////////////////////////////////////////////////////////////
create table clientes(
	idClientes int primary key not null auto_increment,
    nombre varchar(45),
    rut varchar(45),
    direccion varchar(45),
    fecha_nacimiento date,
    persona tinyint(1)
);
-- ////////////////////////////////////////////////////////////////////////////////////
--								TABLA VENTAS
-- ////////////////////////////////////////////////////////////////////////////////////
create table ventas(
	idVentas int primary key not null auto_increment,
    created_at datetime default current_timestamp,
    factura tinyint,
    idMediosPago int not null,
    idUsuarios int not null,
    idCliente int not null,
    foreign key (idMediosPago) references medios_pago(idMediosPago),
    foreign key (idUsuarios) references usuarios(idUsuarios),
    foreign key (idCliente) references clientes(idClientes)
);
-- ////////////////////////////////////////////////////////////////////////////////////
--								TABLA DETALLE VENTAS
-- ////////////////////////////////////////////////////////////////////////////////////
create table detalle_venta(
	idDetalleVentas int primary key not null auto_increment,
    cantidad int,
    precio int,
    idProductos int not null,
    idVentas int not null,
    foreign key (idProductos) references productos(idProductos),
    foreign key (idVentas) references ventas(idVentas) 
);
-- ////////////////////////////////////////////////////////////////////////////////////
--								TABLA PROVEEDORES
-- ////////////////////////////////////////////////////////////////////////////////////
create table proveedores(
	idProveedores int primary key not null auto_increment,
    nombre varchar(100) not null,
    rut varchar(50) not null,
    direccion varchar(100) not null,
    email varchar(100),
    contacto varchar(100),
    activo boolean not null default true
);
-- ////////////////////////////////////////////////////////////////////////////////////
--								TABLA ADQUISICIONES
-- ////////////////////////////////////////////////////////////////////////////////////
create table adquisiciones(
	idAdq int not null primary key auto_increment,
    fecha timestamp default current_timestamp on update current_timestamp,
    idProv int not null,
    foreign key (idProv) references proveedores(idProveedores)
);
-- ////////////////////////////////////////////////////////////////////////////////////
--								TABLA DETALLE DE ADQUISICIONES
-- ////////////////////////////////////////////////////////////////////////////////////
create table detalle_adquisiciones(
	idDetalle int not null primary key auto_increment,
    cantidad varchar(45),
    precio varchar(45),
    idAd int not null,
    idProd int not null,
    foreign key (idAd) references adquisiciones(idAdq),
    foreign key (idProd) references productos(idProductos)
);