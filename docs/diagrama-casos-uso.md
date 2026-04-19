# Diagrama de Casos de Uso

## Mermaid para mas comodidad

```mermaid
graph TD
    subgraph "Sistema de Gestión de Productos"
        A[Iniciar Sesión]
        B[Ver Dashboard Admin]
        C[Gestionar Productos]
        D[Ver Dashboard Vendedor]
        E[Ver Catálogo de Productos]
        F[Ver Detalle de Producto]
        G[Crear Producto]
        H[Editar Producto]
        I[Eliminar Producto]
    end

    Admin[Administrador]
    Vendedor[Vendedor]

    Admin --> A
    Vendedor --> A
    Admin --> B
    Admin --> C
    Admin --> G
    Admin --> H
    Admin --> I
    Vendedor --> D
    Vendedor --> E
    Vendedor --> F
    C --> E
    C --> F

    style Admin fill:#3b82f6,color:#fff
    style Vendedor fill:#10b981,color:#fff