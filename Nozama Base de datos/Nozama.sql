-- DROP DATABASE Nozama;

CREATE DATABASE Nozama;
USE Nozama;

-- crear el usuario, descomentarlo
-- Usuarios
CREATE USER 'rogelio'@'localhost' IDENTIFIED BY 'ROger1';

-- Permisos
 GRANT CREATE, INSERT, UPDATE, DELETE, SELECT ON Nozama.* TO 'rogelio'@'localhost';
FLUSH PRIVILEGES;

-- Tabla Departamento
CREATE TABLE Categoria (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60)
);


-- Tabla Productos, con referencia a Departamento
CREATE TABLE Productos (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(60),
    precio FLOAT NOT NULL,
    descripcion VARCHAR(65),
    disponible int not null,
    cantidad int not null,
    fecha_creacion DATE,
    Id_categoria INT,
    FOREIGN KEY (Id_categoria) REFERENCES Categoria(Id),
    CONSTRAINT ck_Disponible CHECK (disponible IN (0,1))
);

-- Añadir columnas adicionales a la tabla Productos, si faltaran

-- Tabla Datos_Cliente
CREATE TABLE Datos_Cliente (
    Id_dato INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(65),
    Direccion VARCHAR(65),
    Telefono VARCHAR(10),
    Genero int not null,
	CONSTRAINT ck_Genero CHECK (Genero IN (0,1)),
    CONSTRAINT ck_Telefono CHECK (Telefono REGEXP '^[0-9]{10}$')
);

-- Tabla Cliente
CREATE TABLE Cliente (
    Id_Cliente INT PRIMARY KEY AUTO_INCREMENT,
    Id_dato INT,
    Correo VARCHAR(45) unique,
    Contrasena VARCHAR(20),
    Rol INT NOT NULL,
    FOREIGN KEY (Id_dato) REFERENCES Datos_Cliente(Id_dato),
	CONSTRAINT ck_Rol CHECK (Rol IN (0,1,3))
);

select * from Cliente;

-- Tabla Forma_Pago
CREATE TABLE Forma_Pago (
    Id_FormaPago INT PRIMARY KEY AUTO_INCREMENT,
    Banco VARCHAR(45) NOT NULL,
    No_Tarjeta VARCHAR(16),
    Fecha_Vencimiento VARCHAR(5),
    CVV VARCHAR(3),
    Nombre_beneficiario VARCHAR(45),
	CONSTRAINT ck_No_Tarjeta CHECK (No_Tarjeta REGEXP '^[0-9]{16}$'),
    CONSTRAINT ck_CVV CHECK (CVV REGEXP '^[0-9]{3}$')
);

-- Tabla Envio
CREATE TABLE Envio (
    Id_Envio INT PRIMARY KEY AUTO_INCREMENT,
    Tipo VARCHAR(20),
    DireccionEnvio VARCHAR(70),
    CP VARCHAR(8),
    Telefono VARCHAR(10),
    Estado VARCHAR(25)
);

-- Tabla Carrito, con referencia a Productos, Forma_Pago y Envio
CREATE TABLE Carrito (
    Id_Carrito INT PRIMARY KEY AUTO_INCREMENT,
    Id_Producto INT,
    Cantidad INT,
    precio FLOAT,
    Id_FormaPago INT,
    Id_Envio INT,
    FOREIGN KEY (Id_Producto) REFERENCES Productos(Id),
    FOREIGN KEY (Id_FormaPago) REFERENCES Forma_Pago(Id_FormaPago),
    FOREIGN KEY (Id_Envio) REFERENCES Envio(Id_Envio)
);




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
	CONSTRAINT ck_Estado CHECK (estado IN (0,1,3))
);

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




hols esta es una prueba

select * from Productos;





