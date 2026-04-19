# Análisis de Requerimientos

## 1. Problema a Resolver
Una empresa necesita que su fuerza de ventas consulte el catálogo de productos actualizado, pero solo el área administrativa debe poder modificar este catálogo para mantener la integridad de la información y evitar errores operativos que podrían afectar las ventas o la reputación del negocio.

## 2. Usuarios y Roles

### Rol 1: Administrador
- **Descripción:** Usuario con control total sobre el catálogo de productos.
- **Permisos:**
  - Ver dashboard de administración
  - Crear nuevos productos
  - Editar productos existentes
  - Eliminar productos
  - Ver lista de productos
  - Ver detalle de productos
- **Justificación:** Este rol es necesario para mantener el catálogo actualizado y corregir errores en la información de productos. Es el responsable de la gestión completa del inventario.

### Rol 2: Vendedor
- **Descripción:** Usuario de consulta sin permisos de escritura.
- **Permisos:**
  - Ver dashboard de vendedor
  - Ver lista de productos
  - Ver detalle de un producto
- **Justificación:** Este rol permite a los vendedores acceder a la información que necesitan para su trabajo diario (precios, disponibilidad, descripciones) sin riesgo de modificar o eliminar datos accidentalmente, garantizando la integridad de la información.

## 3. Requerimientos Funcionales

| ID | Requerimiento | Prioridad |
|----|---------------|-----------|
| RF-01 | El sistema debe permitir el inicio de sesión de usuarios registrados | Alta |
| RF-02 | El sistema debe distinguir entre rol Administrador y Vendedor después del login | Alta |
| RF-03 | El Administrador debe poder crear productos con los campos: nombre, descripción, precio, stock | Alta |
| RF-04 | El Administrador debe poder editar cualquier producto existente | Alta |
| RF-05 | El Administrador debe poder eliminar productos del catálogo | Alta |
| RF-06 | El Administrador debe poder ver la lista completa de productos con acciones CRUD | Alta |
| RF-07 | El Vendedor debe poder ver la lista completa de productos en modo solo lectura | Alta |
| RF-08 | El Vendedor debe poder ver el detalle individual de un producto | Alta |
| RF-09 | El sistema debe redirigir a diferentes dashboards según el rol después del login | Media |
| RF-10 | El sistema debe validar que el precio sea un valor numérico mayor o igual a 0 | Media |
| RF-11 | El sistema debe validar que el stock sea un número entero no negativo | Media |
| RF-12 | El sistema debe mostrar mensajes de confirmación al crear, editar o eliminar productos | Baja |

## 4. Requerimientos No Funcionales

| ID | Requerimiento | Categoría |
|----|---------------|-----------|
| RNF-01 | La aplicación debe estar desarrollada en Laravel 12 con PHP 8.2 o superior | Tecnología |
| RNF-02 | La base de datos debe ser MySQL | Tecnología |
| RNF-03 | Las contraseñas deben almacenarse usando hash bcrypt | Seguridad |
| RNF-04 | La interfaz debe ser responsive usando Tailwind CSS | Usabilidad |
| RNF-05 | El código debe seguir el patrón Modelo-Vista-Controlador (MVC) | Arquitectura |
| RNF-06 | El sistema debe incluir seeders para generar datos de prueba automáticamente | Calidad |
| RNF-07 | Las rutas de administración deben estar protegidas por middleware de roles | Seguridad |
| RNF-08 | El tiempo de carga de la lista de productos no debe exceder los 2 segundos | Rendimiento |
| RNF-09 | La aplicación debe ser compatible con navegadores modernos (Chrome, Firefox, Edge) | Compatibilidad |

## 5. Modelo de Datos

### Tabla: users
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | BIGINT UNSIGNED | Clave primaria autoincremental |
| name | VARCHAR(255) | Nombre completo del usuario |
| email | VARCHAR(255) | Correo electrónico único |
| email_verified_at | TIMESTAMP | Fecha de verificación de email |
| password | VARCHAR(255) | Contraseña hasheada con bcrypt |
| remember_token | VARCHAR(100) | Token para recordar sesión |
| created_at | TIMESTAMP | Fecha de creación del registro |
| updated_at | TIMESTAMP | Fecha de última actualización |

### Tabla: products
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | BIGINT UNSIGNED | Clave primaria autoincremental |
| name | VARCHAR(255) | Nombre del producto |
| description | TEXT | Descripción detallada (opcional) |
| price | DECIMAL(10,2) | Precio unitario con 2 decimales |
| stock | INTEGER | Cantidad disponible en inventario |
| created_at | TIMESTAMP | Fecha de creación del registro |
| updated_at | TIMESTAMP | Fecha de última actualización |

### Tablas de Spatie Permission
| Tabla | Descripción |
|-------|-------------|
| roles | Almacena los roles disponibles (admin, vendedor) |
| permissions | Almacena permisos granulares |
| model_has_roles | Relación muchos a muchos entre usuarios y roles |
| role_has_permissions | Relación muchos a muchos entre roles y permisos |
| model_has_permissions | Relación muchos a muchos entre usuarios y permisos |

## 6. Diagrama de Casos de Uso
┌─────────────────────────────────────┐
│ Sistema de Gestión │
│ de Productos │
└─────────────────────────────────────┘
│
┌───────────────────────────┴───────────────────────────┐
│ │
▼ ▼
┌───────────────┐ ┌───────────────┐
│ Administrador │ │ Vendedor │
└───────┬───────┘ └───────┬───────┘
│ │
├── Iniciar Sesión ─────────────────────────────────────┤
├── Ver Dashboard Admin │
├── Crear Producto ├── Ver Dashboard Vendedor
├── Editar Producto ├── Ver Lista de Productos
├── Eliminar Producto └── Ver Detalle de Producto
└── Ver Lista de Productos

## 7. Diagrama de Flujo de Autenticación
┌──────────┐ ┌──────────┐ ┌──────────────┐
│ Login │────▶│ ¿Creds │─No─▶│ Error: │
│ Page │ │ válidas? │ │ Reintentar │
└──────────┘ └────┬─────┘ └──────────────┘
│Sí
▼
┌───────────────┐
│ ¿Qué rol │
│ tiene? │
└───────┬───────┘
│
┌────────────┴────────────┐
│ │
▼ ▼
┌─────────────────┐ ┌─────────────────┐
│ Dashboard Admin │ │ Dashboard Vendedor│
│ /dashboard │ │ /dashboard │
└─────────────────┘ └─────────────────┘

## 8. Decisiones Arquitectónicas

| Decisión | Justificación |
|----------|---------------|
| Uso de Laravel Breeze | Proporciona autenticación completa con vistas Blade pre-diseñadas y Tailwind CSS integrado, acelerando el desarrollo inicial |
| Uso de Spatie Laravel-Permission | Es el estándar industrial para gestión de roles y permisos en Laravel, bien documentado y mantenido activamente |
| Middleware personalizado `role` | Permite proteger rutas específicas por rol de manera simple y reutilizable |
| Controladores separados por rol (Admin/Vendedor) | Mantiene el código organizado, facilita el mantenimiento y sigue el principio de responsabilidad única |
| Vistas separadas por rol | Cada rol tiene su propio dashboard y vistas específicas, mejorando la seguridad y la experiencia de usuario |
| Tailwind CSS | Viene por defecto con Breeze y permite estilos modernos sin escribir CSS personalizado |
| Seeders para datos de prueba | Facilitan la demostración del sistema y las pruebas sin necesidad de crear datos manualmente |

## 9. Reglas de Negocio

| ID | Regla | Descripción |
|----|-------|-------------|
| RN-01 | Precio mínimo | El precio de un producto no puede ser negativo |
| RN-02 | Stock mínimo | El stock no puede ser negativo |
| RN-03 | Eliminación con confirmación | Antes de eliminar un producto, el sistema debe solicitar confirmación al usuario |
| RN-04 | Producto único | No se requiere que el nombre del producto sea único, ya que pueden existir productos con nombres similares |
| RN-05 | Acceso restringido | Los vendedores no pueden acceder a ninguna ruta bajo el prefijo `/admin` |
