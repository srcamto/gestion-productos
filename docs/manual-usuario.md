# Manual de Usuario

## 1. Acceso al Sistema

### 1.1 Iniciar Sesión
1. Acceda a la URL del sistema
2. Ingrese su correo electrónico y contraseña
3. Haga clic en **"Log in"**

### 1.2 Credenciales de Prueba
| Rol | Email | Contraseña |
|-----|-------|------------|
| Administrador | admin@example.com | password |
| Vendedor | vendedor@example.com | password |

### 1.3 Cerrar Sesión
Para salir del sistema de forma segura:
1. Haga clic en el menú de usuario (esquina superior derecha)
2. Seleccione **"Log Out"**

---

## 2. Panel de Administrador

Al iniciar sesión como Administrador, verá el panel de control con un botón azul **"Gestionar Productos"**.

### 2.1 Ver Lista de Productos
1. Haga clic en **"Gestionar Productos"**
2. Verá una tabla con todos los productos:
   - **ID:** Identificador único
   - **Nombre:** Nombre del producto
   - **Precio:** Precio unitario en pesos
   - **Stock:** Cantidad disponible
   - **Acciones:** Botones Ver, Editar, Eliminar

### 2.2 Crear Nuevo Producto
1. En la lista de productos, haga clic en **"+ Nuevo Producto"**
2. Complete el formulario:
   - **Nombre:** Nombre del producto (obligatorio)
   - **Descripción:** Detalles del producto (opcional)
   - **Precio:** Valor numérico, ej: 99.99 (obligatorio, mínimo 0)
   - **Stock:** Cantidad disponible, ej: 10 (obligatorio, mínimo 0)
3. Haga clic en **"Guardar Producto"**
4. Verá un mensaje de confirmación: *"Producto creado exitosamente"*

### 2.3 Ver Detalle de Producto
1. En la lista de productos, haga clic en **"Ver"**
2. Se mostrará una ficha con toda la información del producto
3. Desde aquí puede:
   - **Editar:** Ir al formulario de edición
   - **Volver:** Regresar a la lista

### 2.4 Editar Producto
1. En la lista de productos, haga clic en **"Editar"**
2. Modifique los campos necesarios
3. Haga clic en **"Actualizar Producto"**
4. Verá un mensaje: *"Producto actualizado exitosamente"*

### 2.5 Eliminar Producto
1. En la lista de productos, haga clic en **"Eliminar"**
2. El sistema solicitará confirmación: *"¿Eliminar este producto?"*
3. Haga clic en **"Aceptar"** para confirmar
4. Verá un mensaje: *"Producto eliminado exitosamente"*

> ⚠️ **Advertencia:** Esta acción no se puede deshacer.

---

## 3. Panel de Vendedor

Al iniciar sesión como Vendedor, verá el panel de control con un botón verde **"Ver Productos"**.

### 3.1 Ver Catálogo de Productos
1. Haga clic en **"Ver Productos"**
2. Verá una tabla con todos los productos:
   - **ID:** Identificador único
   - **Nombre:** Nombre del producto
   - **Precio:** Precio unitario
   - **Stock:** Cantidad disponible
   - **Acciones:** Botón **"Ver Detalle"**

### 3.2 Ver Detalle de Producto
1. En el catálogo, haga clic en **"Ver Detalle"**
2. Se mostrará una ficha completa con:
   - Nombre del producto
   - Código (ID)
   - Descripción
   - Precio
   - Disponibilidad (unidades o "Agotado")
3. Haga clic en **"Volver al Catálogo"** para regresar

> 📌 **Nota:** Los vendedores **NO** pueden crear, editar ni eliminar productos. Si intenta acceder a rutas de administrador, recibirá un error **403 - No autorizado**.

---

## 4. Preguntas Frecuentes

### P: No puedo iniciar sesión
**R:** Verifique que su correo y contraseña estén escritos correctamente. Use las credenciales de prueba proporcionadas.

### P: No veo el botón "Gestionar Productos"
**R:** Probablemente tiene rol de Vendedor. Solo los Administradores pueden gestionar productos.

### P: Recibo un error 403 al acceder a ciertas páginas
**R:** Significa que no tiene permisos para acceder a esa sección. Contacte al administrador si cree que debería tener acceso.

### P: ¿Puedo cambiar mi contraseña?
**R:** Sí, usando la opción **"Forgot your password?"** en la pantalla de login.

### P: El producto no se guarda y veo mensajes en rojo
**R:** Revise que todos los campos obligatorios estén completos y que el precio y stock sean números válidos.

---

## 5. Atajos y Consejos

| Acción | Consejo |
|--------|---------|
| Navegación | Use el menú superior para ir al dashboard o perfil |
| Lista de productos | La tabla está paginada, use los enlaces abajo para navegar entre páginas |
| Formularios | Los campos con asterisco (*) son obligatorios |
| Mensajes | Los mensajes de éxito/error aparecen en la parte superior |