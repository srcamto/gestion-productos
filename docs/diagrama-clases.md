# Diagrama de Clases

## Código Mermaid

```mermaid
classDiagram
    class User {
        +int id
        +string name
        +string email
        +string password
        +timestamp email_verified_at
        +timestamp created_at
        +timestamp updated_at
        +hasRole(role)
        +assignRole(role)
    }

    class Product {
        +int id
        +string name
        +text description
        +decimal price
        +int stock
        +timestamp created_at
        +timestamp updated_at
    }

    class Role {
        +int id
        +string name
        +string guard_name
        +timestamp created_at
        +timestamp updated_at
    }

    class Permission {
        +int id
        +string name
        +string guard_name
        +timestamp created_at
        +timestamp updated_at
    }

    class DashboardController {
        +index() Response
    }

    class AdminProductController {
        +index() Response
        +create() Response
        +store(Request) Response
        +show(Product) Response
        +edit(Product) Response
        +update(Request, Product) Response
        +destroy(Product) Response
    }

    class VendedorProductController {
        +index() Response
        +show(Product) Response
    }

    class RoleMiddleware {
        +handle(Request, Closure, role) Response
    }

    User "1" -- "many" Role : has roles via Spatie
    User "1" -- "0..1" DashboardController : uses
    AdminProductController "1" -- "many" Product : manages
    VendedorProductController "1" -- "many" Product : reads
    RoleMiddleware "1" -- "1" User : validates