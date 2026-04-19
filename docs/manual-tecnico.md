# Manual Técnico

## 1. Requisitos del Sistema

| Requisito | Versión |
|-----------|---------|
| PHP | 8.2 o superior |
| Composer | 2.x |
| Node.js | 18.x o superior |
| NPM | 9.x o superior |
| MySQL | 8.0 o MariaDB 10.x |
| Servidor Web | Apache/Nginx o Laragon |

### Extensiones PHP Requeridas
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML

---

## 2. Estructura del Proyecto

gestion-productos/
│
├── app/
│ ├── Http/
│ │ ├── Controllers/
│ │ │ ├── Admin/
│ │ │ │ └── ProductController.php # CRUD completo para admin
│ │ │ ├── Vendedor/
│ │ │ │ └── ProductController.php # Solo lectura para vendedor
│ │ │ └── DashboardController.php # Redirección por rol
│ │ └── Middleware/
│ │ └── RoleMiddleware.php # Middleware de autorización
│ └── Models/
│ ├── User.php # Modelo con trait HasRoles
│ └── Product.php # Modelo Product (fillable)
│
├── database/
│ ├── migrations/
│ │ ├── 0001_01_01_000000_create_users_table.php
│ │ ├── 2026_04_19_173729_create_permission_tables.php
│ │ └── 2026_04_19_183204_create_products_table.php
│ └── seeders/
│ ├── DatabaseSeeder.php # Seeder principal
│ ├── RoleSeeder.php # Crea roles admin/vendedor
│ ├── UserSeeder.php # Crea usuarios de prueba
│ └── ProductSeeder.php # Crea 5 productos de prueba
│
├── resources/views/
│ ├── admin/
│ │ ├── dashboard.blade.php
│ │ └── products/
│ │ ├── index.blade.php # Lista con CRUD
│ │ ├── create.blade.php # Formulario creación
│ │ ├── edit.blade.php # Formulario edición
│ │ └── show.blade.php # Detalle para admin
│ └── vendedor/
│ ├── dashboard.blade.php
│ └── products/
│ ├── index.blade.php # Lista solo lectura
│ └── show.blade.php # Detalle para vendedor
│
├── routes/
│ └── web.php # Rutas protegidas por rol
│
├── docs/ # Documentación completa
│
├── .env.example # Variables de entorno ejemplo
├── README.md # Documentación principal
└── composer.json # Dependencias PHP

---

## 3. Instalación y Configuración

### 3.1 Clonar el Repositorio

```bash
git clone https://github.com/srcamto/gestion-productos.git
cd gestion-productos

### 3.2 Instalar Dependencias

composer install
npm install

### 3.3 Configurar Variables de Entorno

cp .env.example .env
php artisan key:generate


Editar .env con los datos de la base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion-productos
DB_USERNAME=root
DB_PASSWORD=

### 3.4 Ejecutar Migraciones y Seeders

php artisan migrate:fresh --seed

Esto creará:

Tablas del sistema

Roles: admin, vendedor

Usuarios: admin@example.com, vendedor@example.com (password: password)

5 productos de prueba

### 3.5 Compilar Assets

npm run build

### 3.6 Iniciar Servidor

php artisan serve

O usar Laragon: http://localhost/gestion-productos/public

## 4. Configuración de Roles y Autorización

###4.1 Middleware RoleMiddleware

// app/Http/Middleware/RoleMiddleware.php
public function handle(Request $request, Closure $next, $role): Response
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    if (!auth()->user()->hasRole($role)) {
        abort(403, 'No tienes permiso para acceder a esta página.');
    }
    return $next($request);
}

### 4.2 Registro del Middleware

// bootstrap/app.php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ]);
})

### 4.3 Rutas Protegidas

// routes/web.php

// Admin - CRUD completo
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
});

// Vendedor - Solo lectura
Route::middleware(['auth', 'role:vendedor'])->prefix('vendedor')->name('vendedor.')->group(function () {
    Route::get('products', [\App\Http\Controllers\Vendedor\ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}', [\App\Http\Controllers\Vendedor\ProductController::class, 'show'])->name('products.show');
});

## 5. Base de Datos

###5.1 Migración de Productos

Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->decimal('price', 10, 2);
    $table->integer('stock')->default(0);
    $table->timestamps();
});

### 5.2 Modelo Product

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];
}

### 5.3 Modelo User (con Spatie)

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    // ...
}

## 6. Seeders

### 6.1 RoleSeeder

Role::create(['name' => 'admin']);
Role::create(['name' => 'vendedor']);

### 6.2 UserSeeder

$admin = User::create([
    'name' => 'Administrador',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
]);
$admin->assignRole('admin');

### 6.3 ProductSeeder

Product::create([
    'name' => 'Laptop Pro',
    'description' => 'Laptop de alto rendimiento',
    'price' => 1299.99,
    'stock' => 10,
]);

## 7. Despliegue en Producción

### 7.1 Preparación

# Clonar repositorio
git clone https://github.com/srcamto/gestion-productos.git

# Instalar dependencias (sin dev)
composer install --optimize-autoloader --no-dev
npm install && npm run build

# Configurar entorno
cp .env.example .env
php artisan key:generate

### 7.2 Optimizaciones

php artisan config:cache
php artisan route:cache
php artisan view:cache

### 7.3 Base de Datos

php artisan migrate --force
php artisan db:seed --force

### 7.4 Permisos de Directorios

chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

## 8. Troubleshooting

Problema				Solución
Error 403 en rutas admin		Verificar que el usuario tenga rol admin asignado
No se ven estilos			Ejecutar npm run build
Error de permisos Spatie		Verificar que User use trait HasRoles
Ruta no encontrada			Ejecutar php artisan route:clear
Error "Class Role not found"		Ejecutar composer dump-autoload
No se crean productos			Verificar campos fillable en modelo Product

## 9. Comandos Útiles

| Comando | Descripción |
|---------|-------------|
| php artisan migrate:fresh --seed | Recrea BD con datos de prueba |
| php artisan route:list | Muestra todas las rutas |
| php artisan db:show | Muestra tablas de la BD |
| php artisan tinker | Consola interactiva de Laravel |
| php artisan optimize:clear | Limpia toda la caché |
---