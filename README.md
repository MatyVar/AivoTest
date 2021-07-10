## AivoTube -App Test técnico para Aivo.
- Aplicación que toma una palabra clave ingresada por el usuario, y tiene la posibilidad de desplegar hasta 10 resultados de videos de youtube basado en el parametro de búsqueda   ingresado por el mismo. La app, tambien tiene la posibilidad de mostrar una salida en formato JSON, demostrando la respuesta de la API de YouTube para esa keyword.

### Comenzando 🚀
- Estas instrucciones le permitirán obtener una copia del proyecto en funcionamiento en su máquina local.

### Pre-requisitos 📋
- La aplicación corre sobre Laravel Framework 8.49.2, implementa PHP en su versión 7.4, y como sistema de gestión de paquetes utiliza Composer version 2.0.12. Una ves que la aplicación cuente con las dependencias necesarias, se podrá correr el servicio web mediante Artisan, Cli de laravel.

- Ejemplo de inicio de servidor web:
````
php artisan serve

- Ejemplo de respuesta de terminal:
[Fri Jul  9 14:12:59 2021] PHP 7.4.12 Development Server (http://127.0.0.1:8000) started
````
- para visualizar el index, ingresar esta url en el navegador:
````
http://127.0.0.1:8000
````
### Instalación 🔧
- Instalacion vía Git:
````
-Clonar el repositorio https://github.com/MatyVar/AivoTest.git
-abrir la carpeta AivoTest con su editor de codigo, como recomendación utilizar Visual Studio Code.
-Abrir un terminal y ejecutar dentro de dicha carpeta el comando: 

composer install

-luego ejecutar 

php artisan key:generate

-correr el servidor local con:

php artisan serve

-acceder a localhost:8000
````
### Ejecutando algunas pruebas ⚙️
- El proyecto cuenta con un pequeño Unit Testing (2 test básicos, que requerí, para validar el acceso a las rutas y los metodos Get cuando se instala el proyecto) Ejecutar:
````
vendor/bin/phpunit
````
La respuesta de la terminal deberia ser:
````
OK (2 tests, 2 assertions)
````
- Consideraciones importantes:
- La aplicación se conecta a la api de YouTube, por lo cual se requiere una Api Key. En este caso, he dejado configurada mi Api Key personal, pero estas Keys tienen una Quota diaria de consumo limitada. En el caso de que se haya terminado la Quota, se debe reemplazar la api Key en la aplicacion, por una api Key válida. El sistema igualmente, dará aviso de este error mediante un Alert en la pagina de resultados de la búsqueda.

- Para reemplazar la api key:
````
en el archivo /app/Http/Controllers/SearchController.php 

Dentro de la función urlGen(), cambiar el valor de la variable $api_key por la api key nueva.
````
### Aspectos importantes del proyecto:
- El proyecto posee validacion de campo, manejo de respuestas de codigo de error distintos a status 200,
  y se puede testear ingresando como keyword:
````
'muse' : como ejemplo de palabra clave correcta para busqueda.
'asd as fasf sfas  asdas sada as xzcxc zxc zxc xc zxcz xcxzczxczxczxc   zxczx cxzc zx ' :como para validar video inexistente-

'campo vacio' : como para validar form

se puede cambiar algun parametro de la api key y se vera el mensaje de error correspondiente.
````
  
Listo para utilizar! ⚙️
Autor ✒️
Matias David Gasañol - (https://github.com/MatyVar)