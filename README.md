1.- Usar los comandos para el funcionamiento de vistas e imagenes:

php artisan storage:link

composer require jeroennoten/laravel-adminlte

php artisan adminlte:install

composer require laravelcollective/html

----------Factory y seeder de Imagenes, correcto funcionamiento------------------

1.- cambiar en el archivo .env la siguiente linea:

"FILESYSTEM_DRIVER=local" por "public".

2.-Abre el siguiente archivo: vendor\fakerphp\faker\src\Faker\Provider\Image.php y reemplaza las siguientes líneas de código:  

public const BASE_URL = 'https://placehold.jp';  // cambie la URL

curl_setopt($ch, CURLOPT_FILE, $fp); //línea existente 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//nueva línea 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//nueva línea 
$success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;//línea existente

----------------COMPILACION-----------------------------
Para que se compile todo usar el comando:

npm run dev

----------------CRUD-------------------------------
1.- Crear un usuario o bien usar los usuarios creados por seeders usuario:	leo@test.com o paulina@test.com		contraseña: 1234

2.- acceder a cursos.test/admin
