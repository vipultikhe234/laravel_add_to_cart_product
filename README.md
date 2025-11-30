The following two APIs are required for development (no UI implementation needed; please demonstrate functionality using Postman):

1. Implement JWT authentication for user access.
2. Create an API endpoint to add a product to the cart.

Develop at: 
```
https://github.com/Phantasm-Solutions-Ltd-Pvt/php-f2f-for-candidate

```
Please ensure these implementations are set up prior to joining, in order to streamline the face-to-face interview process.

Best regards,  
Phantasm"# laravel_add_to_cart_product" 


# Laravel Clean Architecture API (Auth + Cart System)

A modular, scalable, and enterprise-level Laravel 10 REST API built using **Clean Architecture**, **Service Layer**, **Repository Pattern**, and **Laravel Sanctum** authentication.

This project demonstrates a production-ready structure for real-world applications such as e-commerce platforms, internal business dashboards, or microservices.  
It includes user authentication, cart management, validation, custom API responses, and global exception handling.

---

## 🚀 Features

### 🔐 Authentication (Laravel Sanctum)
- Login API
- Token-based authentication (Bearer Token)
- Secure unauthorized handling (401 JSON response)
- Validation via Form Requests

### 🛒 Cart Management System
- Add products to cart  
- Auto-create user cart  
- Increase item quantity on duplicate add  
- Cart total auto-recalculation  
- Modular repository-service design

### 🧱 Clean Architecture
- **Controller → Service → Repository** flow  
- Repositories handle DB queries  
- Services handle business logic  
- Controllers only handle request/response  
- Helpers for reusable response formatting  
- Custom exception handler overrides default errors

### 🧩 Additional Highlights
- REST-friendly JSON API responses  
- Custom `ApiResponseHelper`  
- Professional one-line PHPDoc comments  
- PSR-12 clean code  
- Fully structured for scaling and teamwork  
