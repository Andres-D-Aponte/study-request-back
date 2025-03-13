# Prueba Técnica - Laravel 11

<p align="center">
<a href="https://laravel.com"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo" /></a>
</p>

Este proyecto es una prueba técnica desarrollada con Laravel 11. A continuación, encontrarás las instrucciones necesarias para configurar y ejecutar el proyecto en tu entorno local.

---

### Pre-requisitos 📋

Antes de comenzar, asegúrate de tener instalados los siguientes componentes:

1. **Git** - Para clonar el repositorio.
2. **PHP 8.2+** - Requerido para Laravel 11.
3. **Composer** - Gestor de dependencias de PHP.
4. **Node.js y npm** - Para manejar las dependencias de frontend.
5. **Base de datos** (SQLite) - Configurada según tus necesidades.
6. **Conocimientos básicos de Laravel** - Para entender la estructura del proyecto.

---

### Instalación 🔧

Sigue estos pasos para configurar el proyecto en tu máquina:

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/Andres-D-Aponte/study-request-back

2. **Accede al directorio del proyecto**:
   cd study-request-back

3. **Instala las dependencias de PHP**:
    composer install

4. **Instala las dependencias de Node.js**:
    npm install

5. **Configura el archivo .env**:
    Copia el archivo .env.example y renómbralo a .env.

6. **Genera la clave de aplicación**:
    php artisan key:generate

7. **Ejecuta las migraciones**:
    php artisan migrate

8. **Crea usuario admin**:
    php artisan db:seed

>[!NOTE]
>El usuario admin queda creado con las siguientes credenciales:
>   email: admin@gmail.com
>   password: admin


---

### Correr la App 🚀
    Este comando inicia el servidor de desarrollo
    php artisan serve
    Luego, abre tu navegador y visita http://localhost:8000 para ver la aplicación en funcionamiento.

