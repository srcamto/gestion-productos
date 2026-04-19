# Sistema de Gestión de Productos con Roles

## Descripcion
Aplicacion web desarrollada como prueba diagnostica que implementa un sistema de autenticacion con roles (Administrador y Vendedor) y un modulo CRUD completo para la gestion de productos.

## Tecnologias Utilizadas
- **Backend:** PHP 8.2+, Laravel 12
- **Base de Datos:** MySQL
- **Frontend:** Blade + Tailwind CSS
- **Autenticacion:** Laravel Breeze + Spatie Laravel-Permission
- **Control de Versiones:** Git

## Roles y Permisos
| Rol | Permisos |
|-----|----------|
| **Administrador** | Crear, Editar, Ver, Eliminar productos |
| **Vendedor** | Solo Ver lista y detalle de productos |

## Credenciales de Prueba
| Email | Contraseña | Rol |
|-------|------------|-----|
| admin@example.com | password | Administrador |
| vendedor@example.com | password | Vendedor |

## Instalacion y Ejecucion

1. Clonar el repositorio:
```bash
git clone https://github.com/srcamto/gestion-productos.git
cd gestion-productos

2. Instalar dependencias:

composer install
npm install

3. Configurar entorno:

cp .env.example .env
php artisan key:generate

4. Configurar base de datos en .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion-productos
DB_USERNAME=root
DB_PASSWORD=

5. Ejecutar migraciones y seeders:

bash
php artisan migrate:fresh --seed

6. Compilar assets:

bash
npm run build

7. Iniciar servidor:

bash
php artisan serve

O usar Laragon: http://localhost/gestion-productos/public

Estructura del Proyecto

app/Models - Modelos Eloquent (User, Product)

app/Http/Controllers/Admin - Controladores para Administrador

app/Http/Controllers/Vendedor - Controladores para Vendedor

app/Http/Middleware - Middleware de roles

database/migrations - Migraciones de tablas

database/seeders - Datos de prueba

resources/views - Vistas Blade organizadas por rol

routes/web.php - Rutas protegidas por roles

docs/ - Documentacion tecnica y de usuario


Documentacion 

La documentacion completa se encuentra en la carpeta docs/:

Analisis de requerimientos

Diagrama de Casos de Uso

Diagrama de Clases

Diagrama de Base de Datos

Diagrama de Secuencia - Login

Manual de Usuario

Manual Tecnico


Demo

Video demostrativo: se encuentra subido al classroom o en el gmail.

Repositorio: https://github.com/srcamto/gestion-productos

Autor
Camilo Andres Baez Paez

Licencia
Este proyecto fue desarrollado como parte de una prueba diagnostica tecnica.