CREATE DATABASE IF NOT EXISTS comisiones CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
use comisiones;

CREATE TABLE IF NOT EXISTS asesores(
    id_asesor INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cedula_asesor INT(10) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    antiguedad INT(3) NOT NULL,
    tipo_asesor VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE indx_cedula(cedula_asesor),
    UNIQUE ind_campania(id_campania),
    FULLTEXT indx_nombre(nombre)
);
CREATE TABLE IF NOT EXISTS comisiones (
  id_comision INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cedula_asesor INT(10) NOT NULL,
  fecha_calculo TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  mes VARCHAR(10) NOT NULL,
  numero_ventas INT(10) NOT NULL,
  estatus VARCHAR(10)  NOT NULL,
);