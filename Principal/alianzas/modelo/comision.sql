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
CREATE TABLE IF NOT EXISTS campanias(
    id_campania INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_alianza INT(10) NOT NULL,
    codigo_campania INT(10) NOT NULL,
    nombre_campania VARCHAR(30) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    UNIQUE indx_codigo(codigo_campania),
    UNIQUE indx_alianza(id_alianza),
    FULLTEXT indx_nombre(nombre_campania)
);
CREATE TABLE IF NOT EXISTS alianzas(
    id_alianza INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    codigo_alianza INT(10) NOT NULL,
    nombre_alianza VARCHAR(30) NOT NULL,
    UNIQUE indx_codigo(codigo_alianza),
    FULLTEXT indx_nombre(nombre_alianza)
);
CREATE TABLE IF NOT EXISTS comisiones (
  id_comision INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cedula_asesor INT(10) NOT NULL,
  fecha_calculo TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  mes VARCHAR(10) NOT NULL,
  numero_ventas INT(10) NOT NULL,
  estatus VARCHAR(10)  NOT NULL,
);
CREATE TABLE IF NOT EXISTS metas (
  id_meta INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_campania INT(10) NOT NULL,
  concepto varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  estatus varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  valor INT(10) NOT NULL,
  meta_min INT(10) NOT NULL,
  meta_max INT(10) NOT NULL,
  meta_cumplida varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  UNIQUE indx_campania (id_campania),
  FULLTEXT indx_concepto (concepto)
) 