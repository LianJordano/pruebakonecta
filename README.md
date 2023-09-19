***Nombre del Proyecto***
Prueba tecnica para Konecta

***Requisitos Previos***
Debes tener Php,composer y postgres

***Clonar el repositorio:***
git clone https://github.com/LianJordano/pruebakonecta

***Instalar las dependencias de Composer:***
composer install
Copiar el archivo de configuración .env.example a .env y configurar las variables de entorno, como la conexión a la base de datos y las claves de seguridad:

cp .env.example .env
Generar una nueva clave de aplicación:

php artisan key:generate
Configurar la base de datos y ejecutar las migraciones:

php artisan migrate
Iniciar el servidor de desarrollo:

php artisan serve
Acceder a la aplicación en http://localhost:8000.

***Uso***
En este proyecto, usted podra crear productos a los cuales podra asignarle unos atributos como nombre, precio, stock entre otros, de igual forma tambien por medio del modulo de ventas podra registrar ventas de los productos previamente creados


Nombre del desarrollador: Julian Camilo Jordan Ordoñez
Email: julianjordan1992@hotmail.com
