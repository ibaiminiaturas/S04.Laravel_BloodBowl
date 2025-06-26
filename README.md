# Bloodbowl Team Manager

Bloodbowl Team Manager es una página web que te ayuda a crear y gestionar entrenadores y equipos de Bloodbowl de forma sencilla y eficiente.

---

## Tecnologías utilizadas

- Laravel (PHP Framework)  
- Livewire (interactividad sin recargas)  
- Laravel Breeze (autenticación y scaffolding básico)  

---

## Instalación y configuración

A continuación se describen los pasos para instalar y configurar el proyecto en tu entorno local.

1. **Clonar el repositorio**

git clone https://github.com/ibaiminiaturas/S04.Laravel_BloodBowl.git


2. **Instalar dependencias de Composer**

composer install

3. **Copiar archivo de entorno y configurar**

cp .env.example .env

Luego edita el archivo `.env` con tus datos de conexión a la base de datos, por ejemplo:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bloodbowl_db
DB_USERNAME= **tu usuario **
DB_PASSWORD= **tu password**


para contestar al correo de verificacion de mail usar:

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=c6558eaa9537de
MAIL_PASSWORD=85c8************ (se proporcionará por correo)
MAIL_SCHEME=null
MAIL_FROM_ADDRESS="verify@bloodbowl.com"
MAIL_FROM_NAME="${APP_NAME}"

4. **Generar clave de aplicación**

php artisan key:generate

5. **Ejecutar migraciones y seeders**

php artisan migrate --seed

6. **Instalar dependencias de Node y compilar assets**

npm install  
npm run dev

7. **Levantar servidor local**

php artisan serve

Luego abre en el navegador [http://localhost:8000](http://localhost:8000)

---

## Uso

- Regístrate y crea un entrenador.  
- Gestiona equipos, jugadores y estadísticas.  
- Usa la interfaz intuitiva y en tiempo real gracias a Livewire.

---

## Contribuciones

¡Contribuciones son bienvenidas! Por favor abre un issue o un pull request.

---

## Licencia

Este proyecto está bajo la licencia MIT.

---

## Contacto

Tu Nombre - ibai24@gmail.com
GitHub: https://github.com/ibaiminiaturas
