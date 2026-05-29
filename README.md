# proyectopasantia
Proyecto creado Mayra Fritz y Ainara Rosales
INSTRUCCIONES DE INSTALACION 
1)	Copiar la carpeta del proyecto:
Nombre: proyecto
Esta carpeta tiene que ir dentro de c:\xampp\htdocs\
2)	Iniciar los servicios de Apache y MySQL en XAMPP
3)	Crear la base de datos:
En el navegador abrir http://localhost/phpmyadmin y crear una base de datos llamada sistema_php
4)	Importar la base de datos:
Seleccionas la base de datos sistema_php
Ir a la pestaña importar.
Seleccionar el archivo que dice “db.sql” y presionar continuar.
5)	Configurar conexión:
Abrir el archivo “clases/DataBase.php” y verificar que tenga esta configuración.
private $host = "localhost";
private $dbname = "sistema_php";
private $user = "root";
private $pass = "";
6)	Ejecutar el sistema:
Abrir en el navegador: http//localhost/proyecto
Y listo.
