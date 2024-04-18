drop database if exists bd_yamir;
create database bd_yamir;
use bd_yamir;

create table tb_marca (
	codigo_marca char(5) not null primary key,
    marca varchar(30) not null);

create table tb_categoria (
	codigo_categoria char(5) not null primary key,
    categoria varchar(30) not null);

create table tb_producto (
	codigo_producto char(5) not null primary key,
    producto varchar(40) not null,
    stock_disponible int,
    costo float,
    ganancia float,
    producto_codigo_marca char(5) not null,
    producto_codigo_categoria char(5) not null,
    foreign key (producto_codigo_marca) references tb_marca (codigo_marca),
    foreign key (producto_codigo_categoria) references tb_categoria (codigo_categoria));

create table tb_departamento (
	codigo_departamento char(5) not null primary key,
	departamento varchar(25) not null);

create table tb_provincia (
	codigo_provincia char(5) not null primary key,
	provincia varchar(50) not null,
	provincia_codigo_departamento char(5) not null,
	foreign key (provincia_codigo_departamento) references tb_departamento (codigo_departamento));

create table tb_distrito (
	codigo_distrito char(5) not null primary key,
	distrito varchar(50) not null,
	distrito_codigo_provincia char(5) not null,
    foreign key (distrito_codigo_provincia) references tb_provincia (codigo_provincia));

create table tb_cliente (
	codigo_cliente char(5) not null primary key,
	nombre varchar(20) not null,
	ap_paterno varchar(20) not null,
	ap_materno varchar(20) not null,
	fecha_nacimiento date,
	direccion varchar(50),
	correo_electronico varchar(50),
	cliente_codigo_distrito char(5) not null,
    foreign key (cliente_codigo_distrito) references tb_distrito (codigo_distrito));

create table tb_venta (
    codigo_venta char(5) not null primary key,
    fecha date not null,
    venta_codigo_cliente char(5) not null,
    monto float not null,
    foreign key (venta_codigo_cliente) references tb_cliente (codigo_cliente));

create table tb_detalle_venta (
    dv_codigo_venta char(5) not null,
    dv_codigo_producto char(5) not null,
    cantidad int not null,
    costo float not null,
    foreign key (dv_codigo_producto) references tb_producto (codigo_producto),
    foreign key (dv_codigo_venta) references tb_venta (codigo_venta));

-- Datos insertados en tb_marca
insert into tb_marca values
('M0001', 'Apple'),
('M0002', 'Dell'),
('M0003', 'Asus'),
('M0004', 'Lenovo'),
('M0005', 'Microsoft');

-- Datos insertados en tb_categoria
insert into tb_categoria values
('C0001', 'Tablet'),
('C0002', 'Impresora'),
('C0003', 'Monitor'),
('C0004', 'Teclado'),
('C0005', 'Mouse');

-- Datos insertados en tb_producto
insert into tb_producto values
('P0001', 'iPad Pro 12.9"', 50, 1099.99, 0.25, 'M0001', 'C0001'),
('P0002', 'Dell XPS 13', 30, 1399.99, 0.20, 'M0002', 'C0002'),
('P0003', 'Asus ROG Strix G15', 20, 1599.99, 0.15, 'M0003', 'C0003'),
('P0004', 'Lenovo ThinkPad X1 Carbon', 25, 1999.99, 0.18, 'M0004', 'C0004');

-- Datos insertados en tb_departamento
insert into tb_departamento values
('DP001','Lima'),
('DP002','Arequipa'),
('DP003','Ica'),
('DP004','Cajamarca'),
('DP005','Lambayeque'),
('DP006','Piura'),
('DP007','Tumbes'),
('DP008','Callao'),
('DP009','Junin'),
('DP010','Cusco');

-- Datos insertados en tb_provincia
insert into tb_provincia values
('PR001','Lima Norte', 'DP001'),
('PR002','Lima Sur', 'DP001'),
('PR003','Arequipa', 'DP002'),
('PR004','Camaná', 'DP002'),
('PR005','Ica', 'DP003'),
('PR006','Chincha', 'DP003'),
('PR007','Cajamarca', 'DP004'),
('PR008','Cajabamba', 'DP004'),
('PR009','Lambayeque', 'DP005'),
('PR010','Ferreñafe', 'DP005'),
('PR011','Piura', 'DP006'),
('PR012','Tumbes', 'DP007'),
('PR013','Callao', 'DP008'),
('PR014','Junin', 'DP009'),
('PR015','Cusco', 'DP010');

-- Datos insertados en tb_distrito
insert into tb_distrito values
('D0001','San Juan de Lurigancho', 'PR001'),
('D0002','Villa El Salvador', 'PR002'),
('D0003','Cayma', 'PR003'),
('D0004','Camaná', 'PR004'),
('D0005','Ica', 'PR005'),
('D0006','Chincha Alta', 'PR006'),
('D0007','Cajamarca', 'PR007'),
('D0008','Cajabamba', 'PR008'),
('D0009','Lambayeque', 'PR009'),
('D0010','Ferreñafe', 'PR010'),
('D0011','Piura', 'PR011'),
('D0012','Tumbes', 'PR012'),
('D0013','Callao', 'PR013'),
('D0014','Junin', 'PR014'),
('D0015','Cusco', 'PR015');

-- Datos insertados en tb_cliente
insert into tb_cliente values
('C0001', 'Juan', 'Perez', 'Gomez', '1990-05-15', 'Av. Siempre Viva 123', 'juan.perez@email.com', 'D0001'),
('C0002', 'Maria', 'Lopez', 'Garcia', '1985-12-25', 'Calle Libertad 456', 'maria.lopez@email.com', 'D0002'),
('C0003', 'Carlos', 'Torres', 'Fernandez', '2000-03-10', 'Jr. Progreso 789', 'carlos.torres@email.com', 'D0003');

-- Datos insertados en tb_venta
insert into tb_venta values
('V0001', '2024-04-10', 'C0001', 1099.99),
('V0002', '2024-04-12', 'C0002', 1399.99),
('V0003', '2024-04-15', 'C0003', 1599.99);

-- Datos insertados en tb_detalle_venta
insert into tb_detalle_venta values
('V0001', 'P0001', 1, 1099.99),
('V0002', 'P0002', 1, 1399.99),
('V0003', 'P0003', 1, 1599.99);


/*Listar todas las marcas ordenadas por nombre de la marca de forma ascendente*/
delimiter $$
create procedure sp_ListarMarca()
begin
select * from tb_marca order by marca asc;
end; $$
delimiter;

/*Listar todas las categorías ordenadas por nombre de la categoría de forma ascendent*/
delimiter $$
create procedure sp_ListarCategoria()
begin
select * from tb_categoria order by categoria asc;
end; $$
delimiter;

/*Listar todos los productos ordenados por stock disponible de forma descendente.*/
delimiter $$
create procedure sp_ListarProducto()
begin
select * from tb_producto order by stock_disponible desc;
end; $$
delimiter;

/*Buscar un producto por código.*/
delimiter $$
create procedure sp_BuscarProductoPorCodigo(in codprod char(5))
begin
select * from tb_producto
where codigo_producto = codprod;
end; $$
delimiter;
/*Mostrar la información completa de un producto por código.*/


/*Registrar la información de un producto.*/
delimiter $$
create procedure sp_RegistrarProducto(
in codprod char(5), in prod varchar(40), in stk int,
in cst float, gnc float, codmar char(5), codcat char(5))
begin
insert into tb_producto values (codprod, prod, stk, cst, gnc, codmar, codcat);
end; $$
delimiter;

/*Editar la información de un producto.*/
delimiter $$
create procedure sp_EditarProducto(
in codprod char(5), in prod varchar(40), in stk int,
in cst float, gnc float, codmar char(5), codcat char(5))
begin
update tb_producto set producto = prod, stock_disponible = stk, costo = cst,
ganancia = gnc, producto_codigo_marca = codmar, producto_codigo_categoria = codcat where codigo_producto = codprod;
end; $$
delimiter;

/*Borrar la información de un producto.*/
delimiter $$
create procedure sp_BorrarProducto (in codprod char(5)) begin
delete from tb_producto
where codigo_producto = codprod;
end; $$
delimiter;
call sp_BorrarProducto ('P0003');

/*Listar todas las ventas*/
delimiter $$
create procedure sp_ListarVenta()
begin
    select codigo_venta, fecha, venta_codigo_cliente as codigo_cliente, monto
    from tb_venta;
end; $$
delimiter;


delimiter $$
create procedure sp_MostrarProductoPorCodigo(in codprod char(5))
begin
SELECT 
    tb_producto.codigo_producto AS codigo_producto,
    tb_producto.producto AS producto,
    tb_producto.stock_disponible AS stock_disponible,
    tb_producto.costo AS costo,
    FORMAT((tb_producto.ganancia * 100), 2) AS ganancia,
    FORMAT((tb_producto.costo + (tb_producto.costo * tb_producto.ganancia)), 2) AS precio,
    tb_marca.marca AS producto_codigo_marca,
    tb_categoria.categoria AS producto_codigo_categoria
FROM 
    tb_producto
JOIN 
    tb_marca ON tb_producto.producto_codigo_marca = tb_marca.codigo_marca
JOIN 
    tb_categoria ON tb_producto.producto_codigo_categoria = tb_categoria.codigo_categoria
WHERE
    tb_producto.codigo_producto = codprod;
end; $$
delimiter;


DELIMITER //
CREATE PROCEDURE sp_FiltrarProducto(
    IN prod VARCHAR(40)
)
BEGIN
    SELECT 
        tb_producto.codigo_producto AS codigo_producto,
        tb_producto.producto AS producto,
        tb_producto.stock_disponible AS stock_disponible,
        tb_producto.costo AS costo,
        FORMAT((tb_producto.ganancia * 100), 2) AS ganancia,
        FORMAT((tb_producto.costo + (tb_producto.costo * tb_producto.ganancia)), 2) AS precio,
        tb_marca.marca AS marca,
        tb_categoria.categoria AS categoria
    FROM 
        tb_producto
    JOIN 
        tb_marca ON tb_producto.producto_codigo_marca = tb_marca.codigo_marca
    JOIN 
        tb_categoria ON tb_producto.producto_codigo_categoria = tb_categoria.codigo_categoria
    WHERE 
        tb_producto.producto LIKE CONCAT('%', prod, '%');
END //
DELIMITER ;


DELIMITER //
create procedure sp_ListarCliente()
begin
    select c.codigo_cliente, CONCAT(c.ap_paterno, ' ', c.ap_materno, ' ', c.nombre) as nomcom, d.distrito as nomdis
    from tb_cliente c
    join tb_distrito d on c.cliente_codigo_distrito = d.codigo_distrito;
end; //
DELIMITER ;

-- Eliminar registros en tb_detalle_venta que hacen referencia al producto
DELETE FROM tb_detalle_venta WHERE dv_codigo_producto = 'P0003';

-- Ahora puedes eliminar el registro en tb_producto
DELETE FROM tb_producto WHERE codigo_producto = 'P0003';

