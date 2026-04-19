# Diagrama de Secuencia - Login

## Código Mermaid

```mermaid
sequenceDiagram
    participant U as Usuario
    participant B as Navegador
    participant L as Laravel (Auth)
    participant DB as Base de Datos
    participant S as Spatie (Roles)

    U->>B: Ingresa email/password
    B->>L: POST /login
    L->>DB: SELECT * FROM users WHERE email = ?
    DB-->>L: Datos del usuario
    L->>L: Verificar password (Hash::check)
    alt Credenciales válidas
        L->>S: Obtener roles del usuario
        S->>DB: SELECT roles FROM model_has_roles
        DB-->>S: Roles (admin/vendedor)
        S-->>L: Roles del usuario
        L->>L: Iniciar sesión
        L-->>B: Redirección a /dashboard
        B->>L: GET /dashboard
        L->>S: Verificar rol
        alt Rol = admin
            L-->>B: Vista admin.dashboard
        else Rol = vendedor
            L-->>B: Vista vendedor.dashboard
        end
        B-->>U: Mostrar dashboard correspondiente
    else Credenciales inválidas
        L-->>B: Error: credenciales incorrectas
        B-->>U: Mostrar mensaje de error
    end