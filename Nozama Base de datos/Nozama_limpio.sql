DROP DATABASE Nozama;

CREATE DATABASE Nozama;
USE Nozama;

-- crear el usuario, descomentarlo
-- Usuarios
 -- CREATE USER 'rogelio'@'localhost' IDENTIFIED BY 'ROger1';
 SELECT User, Host FROM mysql.user WHERE User = 'rogelio';


-- Permisos
 GRANT CREATE, INSERT, UPDATE, DELETE, SELECT ON Nozama.* TO 'rogelio'@'localhost';
FLUSH PRIVILEGES;

-- Tabla Departamento
CREATE TABLE Categoria (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(70)
);

-- Tabla Productos, con referencia a Departamento
CREATE TABLE Productos (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(80),
    precio FLOAT NOT NULL,
    descripcion VARCHAR(105),
    disponible int not null,
    cantidad int not null,
    fecha_creacion varchar(15),
    Id_categoria INT,
    imagen BLOB NULL,
    FOREIGN KEY (Id_categoria) REFERENCES Categoria(Id),
    CONSTRAINT ck_Disponible CHECK (disponible IN (0,1))
);
-- ALTER TABLE Productos
-- ADD COLUMN imagen BLOB NULL;


-- describe pedido;
-- Añadir columnas adicionales a la tabla Productos, si faltaran

-- Tabla Datos_Cliente
CREATE TABLE Datos_Cliente (
    Id_dato INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(80),
    Direccion VARCHAR(100),
    Telefono VARCHAR(10),
    Genero int not null,
	CONSTRAINT ck_Genero CHECK (Genero IN (0,1)),
    CONSTRAINT ck_Telefono CHECK (Telefono REGEXP '^[0-9]{10}$')
);

-- Tabla Cliente
CREATE TABLE Cliente (
    Id_Cliente INT PRIMARY KEY AUTO_INCREMENT,
    Id_dato INT,
    Correo VARCHAR(60) unique,
    Contrasena VARCHAR(20),
    Rol INT NOT NULL,
    FOREIGN KEY (Id_dato) REFERENCES Datos_Cliente(Id_dato),
	CONSTRAINT ck_Rol CHECK (Rol IN (0,1,2,3))
);

-- Rol 0-Cliente, 1-Empleado, 3-Administrador
-- select * from productos;


-- Tabla Forma_Pago
CREATE TABLE Forma_Pago (
    Id_FormaPago INT PRIMARY KEY AUTO_INCREMENT,
    Id_Cliente int,
    Banco VARCHAR(70) NOT NULL,
    No_Tarjeta VARCHAR(16),
    Fecha_Vencimiento VARCHAR(5),
    CVV VARCHAR(3),
    Nombre_beneficiario VARCHAR(45),
	CONSTRAINT ck_No_Tarjeta CHECK (No_Tarjeta REGEXP '^[0-9]{16}$'),
    CONSTRAINT ck_CVV CHECK (CVV REGEXP '^[0-9]{3}$'),
    CONSTRAINT fk_forma_pago FOREIGN KEY (Id_Cliente) REFERENCES cliente(Id_Cliente)
);

-- Tabla Envio
CREATE TABLE Envio (
    Id_Envio INT PRIMARY KEY AUTO_INCREMENT,
    Tipo VARCHAR(20),
    Id_Cliente int,
    DireccionEnvio VARCHAR(100),
    CP VARCHAR(8),
    Telefono VARCHAR(10),
    Estado VARCHAR(30),
	CONSTRAINT fk_envio_cliente FOREIGN KEY (Id_Cliente) REFERENCES cliente(Id_Cliente)
);

-- Tabla Carrito, con referencia a Productos, Forma_Pago y Envio
CREATE TABLE Carrito (
    Id_Carrito INT PRIMARY KEY AUTO_INCREMENT,
    precio FLOAT,
    Id_FormaPago INT,
    Id_Envio INT,
    FOREIGN KEY (Id_FormaPago) REFERENCES Forma_Pago(Id_FormaPago),
    FOREIGN KEY (Id_Envio) REFERENCES Envio(Id_Envio)
);

CREATE TABLE detalle_carrito (
    Id_Detalle INT AUTO_INCREMENT PRIMARY KEY,  				-- Identificador único del detalle
    Id_Carrito INT NOT NULL,                    -- Referencia al carrito
    Id_Producto INT NOT NULL,                  -- Referencia al producto
    Cantidad INT NOT NULL,                     -- Cantidad del producto
    precio float,
    FOREIGN KEY (Id_Carrito) REFERENCES carrito(Id_Carrito) ON DELETE CASCADE, -- Relación con carrito
    FOREIGN KEY (Id_Producto) REFERENCES productos(Id));



-- Tabla Pedido con referencias a Cliente y Carrito
CREATE TABLE Pedido (
    Id_Pedido INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATETIME default current_timestamp,
    Total FLOAT,
    Id_Cliente INT,
    Id_Carrito INT,
    estado INT NOT NULL,
    FOREIGN KEY (Id_Cliente) REFERENCES Cliente(Id_Cliente),
    FOREIGN KEY (Id_Carrito) REFERENCES Carrito(Id_Carrito),
	CONSTRAINT ck_Estado CHECK (estado IN (0,1,2,3))
); -- Estado 0:Preparacion/pendiente, 1:En Camino, 3:Finalizado

-- Trigger para validar el precio de Productos
DELIMITER //
CREATE TRIGGER precioMayora0 BEFORE INSERT ON Productos
FOR EACH ROW
BEGIN
    IF NEW.precio >= 0 THEN
        SET NEW.precio = NEW.precio;
    ELSE
        SET NEW.precio = 1;
    END IF;
END;
//

-- Trigger para validar la cantidad de Productos
DELIMITER //
CREATE TRIGGER SinCantidad BEFORE INSERT ON Productos
FOR EACH ROW
BEGIN
    IF NEW.cantidad >= 0 THEN
        SET NEW.cantidad = NEW.cantidad;
    ELSE
        SET NEW.cantidad = 0;
    END IF;
END;
//


-- select * from Categoria;

Insert into Categoria (Id,nombre) values (1,"Bocinas");
Insert into Categoria (Id,nombre) values (2,"Cargadores");
Insert into Categoria (Id,nombre) values (3,"Cables");
Insert into Categoria (Id,nombre) values (4,"Baterias");
Insert into Categoria (Id,nombre) values (5,"Audifonos");
Insert into Categoria (Id,nombre) values (6,"Adaptadores");


select * from Productos;
INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Bocina Portátil', 230, '7 HRS, Bluetooth, Puerto de carga, SD Slot, USB Slot, AUX', 1, 100, '2024-10-01', 1);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Audífonos Sony Diadema BT', 380, 'Diadema Bluetooth, malla tejida, almohadillas de espuma viscoelástica', 1, 150, '2024-10-01', 5);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Cable de Datos USB-C', 85, '1M, 5A', 1, 300, '2024-10-01', 3);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Cable C-C', 85, 'Entrada C - Salida C, 2M, 3A', 1, 250, '2024-10-01', 3);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Combo Cubo + Cable', 55, 'USB-C', 1, 200, '2024-10-01', 2);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Cable iPhone', 45, '2M, C-Lightning', 1, 300, '2024-10-01', 3);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Cable iPhone', 40, '1M, C-Lightning', 1, 300, '2024-10-01', 3);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Combo iPhone', 180, 'Carga rápida 20W, Cubo + Cable (C-Lightning)', 1, 100, '2024-10-01', 2);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Cubo Carga Rápida', 120, '35W, 2 Puertos Tipo C', 1, 150, '2024-10-01', 2);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Combo iPhone', 85, 'Carga normal 5W, Cubo + Cable (USB-Lightning)', 1, 150, '2024-10-01', 2);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Audífono Bluetooth AUT119', 85, 'Alcance inalámbrico de 10 m, micrófono incorporado, uso apto para deporte', 1, 150, '2024-10-01', 5);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Audífono Bluetooth AUT203', 85, 'Duración de la batería: 5 horas, batería de polímero de litio de 30mAh', 1, 150, '2024-10-01', 5);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Cargador Huawei Tipo C', 75, 'Cargador de pared original Huawei, voltaje de salida 2.0A, carga rápida', 1, 200, '2024-10-01', 2);

INSERT INTO Productos (Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria)
VALUES ('Cubo Samsung 35W Tipo C', 130, 'Super rápida, no incluye cable, dispositivos móviles compatibles: Huawei, etc.', 1, 150, '2024-10-01', 2);

-- describe pedido;



--  COnsultar
-- Select * from Pedido where Id_Cliente=1;
-- Select * from Cliente;
-- delete from Cliente where Id_Cliente=1;
-- describe cliente;
INSERT INTO Cliente (Correo, Rol, Contrasena) VALUES ('admin',3,'admin');

Select * from Cliente;
