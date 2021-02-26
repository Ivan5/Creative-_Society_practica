# CRUD Contactos y Login

## El crud de contactos esta hecho en Laravel 7.0, se utiliza la función de login y registro incluidas en el framework.

#

### Una vez se descargue o se clone el repositorio, se deben hacer las siguientes instrucciones.

1.- `composer install` para poder instalar las dependecias que se requieren.

2.- Se debe crear una base de datos en el servidor local de 'MySQL' y hacer la referencia dentro del archivo `.env` en la variable `DB_DATABASE`

3.- `php artisan migrate` para poder generar las migraciones de las tablas a la base de datos.

4.- `php artisan serve` para iniciar el servidor.

> Nota: Se utilizaron las librerías laravelCollective y laraveles/spanish, la primera para la gestión y creación de los formularios y la segunda para la traducción al español.

#

## Los archivos creados para esta prueba son los siguientes :

-   `./app/Http/Controllers/ContactController.php` : El controlador de contactos, que realiza las acciones necesarias y envía los datos al cliente.
-   `./app/Contact.php` : Representa el modelo de Contactos, que es la estructura que tendrá cada instancia de la misma.
-   `./database/migrations/2021_02_26_181612_create_contacts_table.php` : Este archivo representa la migración para la creación de la tabla contactos en la base de datos,contiene los atributos y el tipo de dato de cada uno de ellos.
-   `./resources/views/contacts` : Folder con los archivos necesarios para la vista y las acciones que se ejecutan.
-   `./routes/web.php` : Archivo con las rutas necesarias.

> Se incluye también el archivo de base de datos en un archivo .slq llamado creative_society.sql
