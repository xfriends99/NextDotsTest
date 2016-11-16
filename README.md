# NextDotsTest
Test Backend para mostrar mis conocimientos en la programación en PHP y el uso de Laravel

Los pasos para la instalación del proyecto son los siguientes:

1) Abrir una terminal y correr el comando composer install para instalar las dependencias del proyecto.

2) Crear la base de datos con el nombre que prefieran y luego crear un fichero en la raiz de la aplicación llamado .env, en el mismo deben configurar los accesos a su base de datos.

3) En la terminal correr el comando php artisan key:generate, para generar el token de la aplicación.

4) En la terminal correr el comando php artisan migrate:refresh --seed en la raiz del proyecto, dicho comando creara las tablas y datos maestros en la base de datos configurada con antelación.

5) Configurar Nginx para que ejecute la aplicacion apartir de la carpeta public del proyecto o correr el comando php artisan serve.
