# Web Foro

Sistema de foro web construido con Laravel 12 y Livewire, que permite a los usuarios crear preguntas, responder, comentar y dar soporte a publicaciones mediante un sistema de "corazones".

## 📋 Características

- **Sistema de Preguntas y Respuestas**: Usuarios pueden crear preguntas organizadas por categorías
- **Comentarios**: Sistema de comentarios polimórficos para preguntas y respuestas
- **Sistema de Corazones**: Los usuarios pueden dar "corazones" (likes) a preguntas, respuestas y comentarios
- **Categorías**: Organización de preguntas por categorías
- **Blog**: Sistema de publicación de artículos
- **Autenticación Completa**: 
  - Registro e inicio de sesión
  - Autenticación de dos factores (2FA)
  - Gestión de perfil
  - Cambio de contraseña
- **Políticas de Autorización**: Control de permisos para actualizar/eliminar preguntas propias
- **Componentes Livewire**: Interactividad en tiempo real sin recargar la página
- **Slugs Automáticos**: URLs amigables para las preguntas
- **Interfaz Moderna**: Diseñada con TailwindCSS 4 y Livewire Flux

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 12**: Framework PHP
- **Livewire**: Componentes reactivos
- **Laravel Fortify**: Autenticación
- **MySQL/PostgreSQL**: Base de datos
- **Laravel Pint**: Formateo de código
- **PHPUnit**: Testing

### Frontend
- **TailwindCSS 4**: Framework CSS
- **Vite**: Build tool
- **Axios**: Cliente HTTP
- **Alpine.js**: (incluido en Livewire)

## 📦 Requisitos

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- NPM/Yarn
- MySQL >= 8.0 o PostgreSQL >= 13
- Extensiones PHP: BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML

## 🚀 Instalación

### 1. Clonar el repositorio

```bash
git clone <repository-url>
cd web-foro

# Instalar dependencias PHP
composer install

# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate

# Configurar base de datos en .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=web_foro
# DB_USERNAME=root
# DB_PASSWORD=

# Ejecutar migraciones
php artisan migrate

# Instalar dependencias Node
npm install

# Compilar assets
npm run build

# Iniciar servidor de desarrollo
php artisan serve

# En otra terminal, compilar assets en modo desarrollo
npm run dev

```

## 📁 Estructura del proyecto
```
web-foro/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AnswerController.php    # Gestión de respuestas
│   │   │   ├── QuestionController.php  # Gestión de preguntas
│   │   │   └── PageController.php      # Páginas principales
│   │   └── Livewire/
│   │       ├── Comment.php             # Componente de comentarios
│   │       ├── Heart.php               # Componente de corazones
│   │       └── Settings/               # Componentes de configuración
│   ├── Models/
│   │   ├── User.php
│   │   ├── Question.php
│   │   ├── Answer.php
│   │   ├── Comment.php
│   │   ├── Category.php
│   │   ├── Heart.php
│   │   └── Blog.php
│   ├── Policies/
│   │   └── QuestionPolicy.php          # Autorización de preguntas
│   └── Traits/
│       └── HasHeart.php                # Trait para likes
├── database/
│   ├── factories/                      # Factories para testing
│   ├── migrations/                     # Migraciones de base de datos
│   └── seeders/                        # Seeders
├── resources/
│   ├── views/                          # Plantillas Blade
│   ├── css/
│   └── js/
└── routes/
    └── web.php                         # Rutas web
```

## 👥 Autor

Desarrollado como parte de un proyecto de aprendizaje con Laravel y Livewire.
