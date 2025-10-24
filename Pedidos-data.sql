CREATE TABLE Cliente (
  cliente_id INT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  direccion VARCHAR(200),
  telefono VARCHAR(20),
  correo VARCHAR(100)
);

CREATE TABLE Producto (
  producto_id INT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  precio DECIMAL(10,2) NOT NULL
);

CREATE TABLE Pedido (
  pedido_id INT PRIMARY KEY,
  fecha DATE NOT NULL,
  cliente_id INT NOT NULL,
  estado VARCHAR(20),
  FOREIGN KEY (cliente_id) REFERENCES Cliente(cliente_id)
);

CREATE TABLE DetallePedido (
  detalle_id INT PRIMARY KEY, 
  pedido_id INT NOT NULL,
  producto_id INT NOT NULL,
  cantidad INT NOT NULL,
  precio_unitario DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (pedido_id) REFERENCES Pedido(pedido_id),
  FOREIGN KEY (producto_id) REFERENCES Producto(producto_id)
);
