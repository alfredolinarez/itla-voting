# Instrucciones

1. Instalar XAMPP [link de descarga](https://www.apachefriends.org/download.html)

1. Luego de instalarlo ejecutar Apache y MySQL

1. Clonar el proyecto

1. Copiar el contenido del proyecto en la carpeta `C:\xampp\htdocs` (no en subcarpetas)

1. Copiar el archivo `.env.example` y pegarlo con el nombre `.env` (Renombrar el archivo `.env.example` como `.env` tambien funciona)

1. Acceder a http://localhost/phpmyadmin

1. Acceder con usuario: root

1. Sin contraseña

1. Ya dentro, en la pestaña **importar** seleccionar el archivo voting.sql en la raíz del proyecto. (C:\xampp\htdocs\db.sql)

1. Desde la carpeta del proyecto ejecutar (fijarse que le archivo `artisan` esté), ejecutar: `php artisan storage:link` para poder utilizar imagenes
