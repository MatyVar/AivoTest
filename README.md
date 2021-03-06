## AivoTube -App Test t茅cnico para Aivo.
- Aplicaci贸n que toma una palabra clave ingresada por el usuario, y tiene la posibilidad de desplegar hasta 10 resultados de videos de youtube basado en el parametro de b煤squeda   ingresado por el mismo. La app, tambien tiene la posibilidad de mostrar una salida en formato JSON, demostrando la respuesta de la API de YouTube para esa keyword.

### Comenzando 馃殌
- Estas instrucciones le permitir谩n obtener una copia del proyecto en funcionamiento en su m谩quina local.

### Pre-requisitos 馃搵
- La aplicaci贸n corre sobre Laravel Framework 8.49.2, implementa PHP en su versi贸n 7.4, y como sistema de gesti贸n de paquetes utiliza Composer version 2.0.12. Una ves que la aplicaci贸n cuente con las dependencias necesarias, se podr谩 correr el servicio web mediante Artisan, Cli de laravel.

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
### Instalaci贸n 馃敡
- Instalacion v铆a Git:
````
-Clonar el repositorio https://github.com/MatyVar/AivoTest.git
-abrir la carpeta AivoTest con su editor de codigo, como recomendaci贸n utilizar Visual Studio Code.
-Abrir un terminal y ejecutar dentro de dicha carpeta el comando: 

composer install

-luego ejecutar 

php artisan key:generate

-correr el servidor local con:

php artisan serve

-acceder a localhost:8000
````
### Ejecutando algunas pruebas 鈿欙笍
- El proyecto cuenta con un peque帽o Unit Testing (2 test b谩sicos, que requer铆, para validar el acceso a las rutas y los metodos Get cuando se instala el proyecto) Ejecutar:
````
vendor/bin/phpunit
````
La respuesta de la terminal deberia ser:
````
OK (2 tests, 2 assertions)
````
- Consideraciones importantes:
- La aplicaci贸n se conecta a la api de YouTube, por lo cual se requiere una Api Key. En este caso, he dejado configurada mi Api Key personal, pero estas Keys tienen una Quota diaria de consumo limitada. En el caso de que se haya terminado la Quota, se debe reemplazar la api Key en la aplicacion, por una api Key v谩lida. El sistema igualmente, dar谩 aviso de este error mediante un Alert en la pagina de resultados de la b煤squeda.

- Para reemplazar la api key:
````
en el archivo /app/Http/Controllers/SearchController.php 

Dentro de la funci贸n urlGen(), cambiar el valor de la variable $api_key por la api key nueva.
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
  
Listo para utilizar! 鈿欙笍
Autor 鉁掞笍
Matias David Gasa帽ol - (https://github.com/MatyVar)