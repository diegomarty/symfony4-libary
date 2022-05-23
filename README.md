#Late and code Tutorial - Symfony
*Para empezar con symfony es necesario*

Tienes que tener instalado Composer y PHP 8.0 o superior para poder utilizar Symfony

$ symfony check:requirements // Comprueba si están instalados los requerimientos para el proyecto

$ scoop install symfony-cli // Instala el CLI de Symfony

### $ symfony new my_project_directory --webapp //Symfony con todos los Paquetes incluidos

$ symfony new my_project_directory //Symfony base

$ symfony server:start //Inicia el servidor de Symfony


******************************************************************************

$ composer require annotations //Instala el paquete Annotations

$ composer require logger //Instala el paquete Logger


******************************************************************************

$ composer require symfony/orm-pack //Instala el paquete ORM (Gestor Bd)

$ composer require --dev symfony/maker-bundle //Instala el paquete Maker (Generador de Bd)

//Hay que configurar el .env.local para que funcione el ORM y el Maker
### .env.local example -> DATABASE_URL="mysql://root:@127.0.0.1:3306/symfony-library?serverVersion=5.7&charset=utf8mb4"

$ php bin/console doctrine:database:create //Crea la base de datos

$ php bin/console make:entity //Crea una entidad con sus atributos (columna en la Bd) y una clase para la entidad

$ php bin/console make:migration //Crea una migración para la base de datos creando una nueva version de la BD

$ php bin/console doctrine:migrations:migrate //Migra la base de datos para que se utilice con la version que acabamos de crear

******************************************************************************

$ composer require friendsofsymfony/rest-bundle //Instala el paquete RestBundle *INSTALAR LA PLANTILLA - press Yes*

$ composer require symfony/serializer-pack //Instala el paquete Serializer de Symfony

# config > packages > framework.yaml > añadimos las siguientes lineas

    serializer:
        enabled: true
        mapping:
            paths: ['%kernel.project_dir%/config/serializer/']

# Creamos la entity de serializer para Book url:symfony-library\config\serializer\Entity\Book.yaml

# Creamos el archivo fos_rest.yaml para configurar las respuestas de nuestra api url:symfony-library\config\packages\fos_rest.yaml

$ composer require symfony/validator twig doctrine/annotations //Instala el paquete Validator y Twig y Annotations

//Hay que revisar el archivo anottations.yaml para que funcionen las anottations

******************************************************************************

$ composer require symfony/form //Instala el paquete Form (Formularios)

$ composer require league/flysystem-bundle //Instala el paquete Flysystem para la gestión de archivos

$ composer require --dev symfony/phpunit-bridge //Instala el paquete PHPUnit Bridge
/*despues hay que isntalar php unit*/

$ composer require --dev symfony/browser-kit symfony/css-selector //Instala el paquete BrowserKit y CSS Selector

    // para crear la base de datos para los tests
    $ php bin/console doctrine:database:create --env=test
    $ php bin/console doctrine:schema:create --env=test
