# SistemaCursoOnline

--ejecutar el siguiente comando en la terminal para poder instalar las dependencias de composer
--composer install



sistema encargado de registrar cursos online

clonar el repositorio

copiar la carpeta contenedora al la raiz xamp , htdoc

iniciar apache xam y MySQL


Abrir la carpeta contenedoras de los archivos en un IDE como visual estudio code
Ejecutar un nuevo terminal

Ejecutar los siguientes comandos
---php bin/console doctrine:database:create
----asignar el nombre de la base de datos en este caso CursosOnline
--ejecutar
---php bin/console make:migration
--php bin/console doctrine:migrations:migrate
--php bin/console doctrine:schema:update --force


una vez ejecutado esos comando abrir el proyecto en el localhost
