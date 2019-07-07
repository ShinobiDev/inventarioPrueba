
## Ingreso y compra de un producto

Esta aplicación permite crear productos y realizar la compra de ellos, esta realizada en Laravel 5.5, PHP 7.2, javascript, boodstrap, MySql, se utilizo el patron de diseño Admin Lte.

## Instalación.

Recuerde crear el archivo .env para ello se cuenta con el archivo .env.example, recuerde utilizar la información de la base de datos, el usuario y la contraseña de la base de datos con la que vaya a conectar la aplicación.  

Puede correr la migración o utilizar el archivo en la carpeta BD.

## Pasos adicionales en LINUX

Es necesario otorgar permisos a las carpetas de storage y storage/logs, accedemos a la consola y escribimos las siguientes lineas de comando.

sudo chmod 777 -R storage

cd storage

sudo chmod 777 -R logs

## Roles

Actualmente la aplicación cuenta con 2 usuarios:

- Administrador - administrador@prueba.com
- Cliente - cliente@prueba.com
La clave de acceso para los dos usuarios es: 123456

## Rol Administrador

Con este rol se podrá realizar la creación de los productos, así como la actualización de los mismos, ademas de poder ver las ventas realizadas y eliminarlas.

## Rol Cliente

Con este rol podrá realizar la compra de productos, cancelar la compra y ver las compras realiadas.


