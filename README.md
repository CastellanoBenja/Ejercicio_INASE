# Sistema de Reportes de Muestras - INASE

Aplicación web desarrollada en **CakePHP** para la gestión y visualización de resultados de análisis de muestras.  
Permite consultar listados, generar reportes y filtrar por especie a través de un formulario modal.

---

## Tecnologías utilizadas

- **Framework:** CakePHP 5.x  
- **Lenguaje:** PHP 8.3.6 
- **Base de datos:** MySQL 8.0.43

---

### Instalación y ejecución local

### 1. Clonar el repositorio

### 2. Instalar dependencias de CakePHP

```bash
composer install
```

### 3. Crear la Base de Datos

Ejecutar el script SQL incluido en el proyecto:
```bash
mysql -u root -p < config/schema.sql
```

### 4. Crear un usuario con permisos sobre esa base y editar config/app_local.php *Obligatorio*

Ejemplo de creación de usuario
```sql
CREATE USER 'inase_user'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON inase_db.* TO 'inase_user'@'localhost';
FLUSH PRIVILEGES;
```

Con las credenciales creadas, configurar el archivo `config/app_local.php`
```php
'Datasources' => [
    'default' => [
        'host' => 'localhost',
        'username' => 'inase_user',
        'password' => '123456',
        'database' => 'inase_db',
        //...
    ],
],
```

### 5. Levantar el servidor local

Ejecutar el servidor embebido de CakePHP:

```bash
bin/cake server
```

Por defecto, la aplicación estará disponible en:

```bash
http://localhost:8765/muestras
```

## Funcionalidades principales

- Listado de muestras: posibilidad de ver detalle, editar y agregar muestras.  
- Listado de resultados asociados a muestras: posibilidad de ver detalle, editar y agregar resultados.  
- Generación de reportes para cada muestra con su respectivo resultado (si existe).  
- Opción de filtrado por especie para el reporte.  
- Persistencia en base de datos MySQL.

---

## Consideraciones

- Se asumió que solo podía existir un resultado por cada muestra.  
- Se limitaron ciertos campos para mantener coherencia (por ejemplo: *cantidad de semillas > 0*).
- Solo se implementó el filtrado por especie en el módulo de reporte, teniendo en cuenta los requerimientos opcionales.

---

## Aprendizajes y Conclusiones

- Se aplicaron y reforzaron conocimientos sobre el framework CakePHP (conexión con base de datos, generación de código base, desarrollo bajo el patrón MVC).  
- Se aplicaron y reforzaron conocimientos sobre herramientas de Frontend: HTML, CSS y JavaScript.  
- Se realizaron operaciones sobre la base de datos: consultas, creación de tablas y establecimiento de reglas.

---

## Autor

**Benjamín Castellano Bogdan**  
Proyecto desarrollado como parte de la consigna técnica del Instituto Nacional de Semillas (INASE).
