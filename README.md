# Ultralight Web Kit

![Ultralight Web Kit](http://i.imgur.com/jODgJwc.png)

Ultralight Web Kit un proyecto simple escrito en PHP, basado en el microframework **Flight**, utilizando varias librerías, como **Twig**, **Eloquent ORM** o **Phinx**. Este proyecto está preparado para funcionar en cualquier servidor web que posea **PHP 5.4** o mayor.

[![Total Downloads](https://img.shields.io/packagist/dt/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://packagist.org/packages/alemohamad/ultralight-web-kit)
[![Latest Stable Version](https://img.shields.io/packagist/v/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://packagist.org/packages/alemohamad/ultralight-web-kit)
[![License](https://img.shields.io/packagist/l/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://opensource.org/licenses/mit-license.php)

> Are you looking for an **English version**? Find the [README.en.md](README.en.md) file in the repository.

## ¿Por qué armé este proyecto?

Luego de probar frameworks grandes como [Laravel](https://laravel.com), [Zend Framework](https://framework.zend.com), [Symfony](https://symfony.com), [CodeIgniter](https://www.codeigniter.com) o [CakePHP](https://cakephp.org), no encontré nada que ayude a armar sitios web pequeños (donde lo importante es tener organización y un poco de MVC) pensando en diseñadores y programadores Front End.

No me malinterpreten, me encantan los frameworks grandes para armar una web app, pero para armar una web de estructura simple, los que nombré arriba son tremendos monstruos para esta tarea.

Esto fue hasta que me crucé con el concepto de microframework y encontré [Flight](http://flightphp.com). Fue amor a primera vista. ♥️

Espero que esta configuración les sirva para poder armar una estructura simple, pero aportando la complejidad necesaria para que sea un proyecto exitoso.

## Instalación con Composer

Este proyecto está pensado para funcionar principalmente en un servidor **Apache** con **PHP 5.4** o mayor, pero se pueden hacer algunos ajustes de configuración para que funcione en **Nginx**.

* Instalamos [Composer](https://getcomposer.org/download/):  
```
$ curl -s https://getcomposer.org/installer | php
```

* Creamos un nuevo proyecto de **Ultralight Web Kit**:  
```
$ php composer.phar create-project alemohamad/ultralight-web-kit path/to/install
```

Composer va a crear el proyecto en el directorio `path/to/install`. Si no pasamos este parámetro, se va a crear en la carpeta donde estemos posicionados.

Aunque aquí muestro la instalación con **Composer**, también se puede hacer un *checkout* de **Git** o descargar el código fuente desde un navegador web. Personalmente me parece más cómodo y ordenado usar Composer.

## ¿Cómo usar el proyecto?

Para que funcione el proyecto, tienen que renombrar el archivo `.env.example` por `.env`. Allí modificamos los valores que necesitamos para nuestro proyecto (si modifican los archivos internos, pueden remover o agregar variables).

Para ver el proyecto pueden subir los archivos a un servidor por FTP o sino probarlo de forma local con [MAMP](https://www.mamp.info), [WAMP](http://www.wampserver.com/) o con el [servidor web de PHP](http://php.net/manual/en/features.commandline.webserver.php):

```
$ php -S localhost:1234
```

Ahora pueden usar el link [http://localhost:1234](http://localhost:1234) para acceder al servidor local de PHP. 😉

## Estructura de archivos

```
.
├── app
│   ├── Auth
│   │   └── Auth.php
│   ├── Config
│   │   ├── migrations
│   │   │   └── ...
│   │   ├── seeds
│   │   │   └── ...
│   │   ├── auth.php
│   │   ├── config.php
│   │   ├── Database.php
│   │   ├── globals.php
│   │   └── twig.php
│   ├── Controllers
│   │   ├── Contacto.php
│   │   ├── Errors.php
│   │   ├── Hola.php
│   │   ├── Home.php
│   │   └── SendMails.php
│   ├── Models
│   │   ├── Message.php
│   │   └── User.php
│   ├── Views
│   │   ├── emails
│   │   │   └── mail.twig
│   │   ├── errors
│   │   │   ├── 404.twig
│   │   │   └── 500.twig
│   │   ├── layouts
│   │   │   ├── layout.twig
│   │   │   └── menu.twig
│   │   ├── contact_thanks.twig
│   │   ├── contact.twig
│   │   ├── hello.twig
│   │   └── home.twig
│   ├── helpers.php
│   └── routes.php
├── vendor
│   ├── composer
│   └── ...
├── .env.example
├── .htaccess
├── backup-project.sh
├── composer.json
├── composer.lock
├── composer.phar
├── deploy.php
├── humans.txt
├── index.php
├── LICENSE
├── phinx.php
├── README.en.md
├── README.md
├── robots.txt
├── sitemap.xml
└── web.config
```

### ¿Qué archivos NO hay que subir al servidor FTP?

Cuando tenemos un proyecto como este y queremos subirlo al servidor (nuestro o del cliente) hay ciertos archivos de desarrollo que no hay que compartir (ya sea en un .zip o directamente por FTP). En este proyecto los archivos que deben ser ignorados al momento de la entrega son:

```
.env.example
.gitignore
backup-project.sh
composer.json
composer.lock
composer.phar
deploy.php
LICENSE
phinx.php
README.en.md
README.md
```

Capaz para vos es obvio que estos archivos no se tienen que compartir, pero me parece importante remarcarlo. Y si son ordenados y guardan su código modificado, por favor, no se olviden de crear un README propio. Renombren o borren el del proyecto y armen uno con información relacionada a su proyecto!

## Librerías utilizadas

Todo esto no sería posible sin las siguientes librerías:

* [Flight](https://github.com/mikecao/flight)
* [Twig](https://github.com/twigphp/Twig)
* [phpdotenv](https://github.com/vlucas/phpdotenv)
* [PHPMailer](https://github.com/PHPMailer/PHPMailer)
* [Valitron](https://github.com/vlucas/valitron)
* [Flash](https://github.com/joelvardy/flash)
* [Eloquent ORM](https://github.com/illuminate/database)
* [Phinx](https://github.com/cakephp/phinx)
* [Deployer](https://github.com/deployphp/deployer)

## Bonus track: Desarrollo Front-end

Este proyecto está pensado para un desarrollo web, y para esto conviene tener en cuenta también el armado del front-end. En mi opinión es muy cómodo usar el lenguaje [Sass](http://sass-lang.com) para armar los estilos. Y también está bueno poder tener los estilos CSS y la lógica de JavaScript en un único archivo (menos llamadas al servidor), y si podemos minimizarlo, mejor.

Para poder conseguir esto, armé una carpeta llamada `assets-dev`, en donde se encuentran paquetes de [Node.js](https://nodejs.org) y un script de [Gulp](https://gulpjs.com) para instalar y utilizar. En los archivos de Sass van a encontrar que les dejo una copia de [Reset CSS](https://meyerweb.com/eric/tools/css/reset/) y [Head.JS](http://headjs.com). Pueden removerlos si no quieren usarlos. Además el proyecto viene con una copia de [Bourbon](https://www.bourbon.io) para utilizar, el cual pueden remover en el archivo `main.scss` si no lo van a utilizar.

Para utilizar estos scripts, tenemos que utilizar los siguientes comandos para instalar lo necesario:

```
$ npm install -g npm
$ sudo gem install sass
$ npm install -g gulp-cli
```

Para instalar los paquetes necesarios, tenemos que ir a la carpeta `assets-dev` y usar el siguiente comando:

```
$ npm install
```

Luego para trabajar (también en la carpeta `assets-dev`) usamos el comando:

```
$ gulp
```

Es importante saber que si cancelamos el proceso, se va a dejar de escuchar para generar los archivos finales a usar en el proyecto.

Quiero aclarar que esta es la forma y las herramientas que a mi me gustan. No están obligados a utilizarla.

De hecho, si realizan desarrollo front-end de otra forma, lo mejor es eliminar la carpeta `assets-dev`, ya que en ese caso va a ser código basura.

Una herramienta que también pueden usar es [Prepros](https://prepros.io), aunque hay muchas otras opciones para estas tareas. 😁

## Autenticación

El proyecto tiene una clase llamada `Auth`, la cual posee lógica para poder realizar autenticación de forma simple en cualquier proyecto. Está preparada para conectarse a la base de datos, usando el modelo `User`, pero puede ser modificada por si utiliza otra forma.

Dicha clase está registrada para ser utilizada dentro de Flight, por lo que se la puede utilizar de esta forma:

```
<?php
...

$auth = Flight::auth()->attempt($username, $password);

if (!$auth) {
  // usuario o contraseña no son válidos - no puede ingresar
}

// usuario logueado
```

Y luego, tenemos estos otros métodos:

```
Flight::auth()->check(); // Informa si el usuario está logueado o no
Flight::auth()->user(); // Devuelve el objeto del usuario logueado
Flight::auth()->logout();
```

El sistema está preparado para tener variables globales en las views que traen la información más rápido:

```
{{ auth.user.name }}

{% if auth.check %}
Sesión iniciada
{% else %}
No hay una sesión iniciada
{% endif %}
```

## Backup del proyecto

Para hacer nuestra vida más cómoda, escribí un script de Bash para que exporte los archivos que tenemos que entregar al cliente (tanto entregar a su equipo de IT o subir nosotros al FTP).

Lo que tenemos que hacer es ir al root del proyecto, y escribir el siguiente comando:

```
$ ./backup-project.sh
```

El mismo script nos va a decir cual es el nombre del archivo zip generado, para poder disponer del backup del proyecto para entregar.

## Pasos para contribuir con el proyecto

1. Hacé un fork del repo.
2. Creá una branch para tu feature. (`git checkout -b my-new-feature`)
3. Hacé los cambios que quieras.
4. Commitéa dichos cambios. (`git commit -am 'Added some feature')`
5. Pusheá al branch. (`git push origin my-new-feature`)
6. Creá una Pull Request.
7. Festejemos ya que sos un copado por querer ser parte de esto!

## Licencia

El kit está licenciado bajo la licencia [MIT](https://opensource.org/licenses/mit-license.php).

El logo del proyecto es [Wings](https://thenounproject.com/term/wings/382103/) creado por [CombineDesign](https://www.behance.net/combine-design). Está muy bueno!
