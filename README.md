# Ultralight Web Kit

![Ultralight Web Kit](http://i.imgur.com/jODgJwc.png)

Ultralight Web Kit un proyecto simple escrito en PHP, basado en el microframework **Flight**, utilizando varias librerías, como **Mustache** o **Eloquent ORM**. Este proyecto está preparado para funcionar en cualquier servidor web que posea **PHP 5.4** o mayor.

[![Total Downloads](https://img.shields.io/packagist/dt/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://packagist.org/packages/alemohamad/ultralight-web-kit)
[![Latest Stable Version](https://img.shields.io/packagist/v/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://packagist.org/packages/alemohamad/ultralight-web-kit)
[![License](https://img.shields.io/packagist/l/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://opensource.org/licenses/mit-license.php)

> Are you looking for an **English version**? Find the [README.en.md](README.en.md) file in the repository.

## ¿Por qué armé este proyecto?

Luego de probar frameworks grandes como [Laravel](https://laravel.com), [Zend Framework](https://framework.zend.com), [Symfony](https://symfony.com), [CodeIgniter](https://www.codeigniter.com) o [CakePHP](https://cakephp.org), no encontré nada que ayude a armar sitios web pequeños (donde lo importante es tener organización y un poco de MVC) pensando en diseñadores y programadores Front End.

No me malinterpreten, me encantan los frameworks grandes para armar una web app, pero para armar una web de estructura simple, los que nombré arriba son tremendos monstruos para esta tarea.

Esto fue hasta que me crucé con el concepto de microframework y encontré [Flight](http://flightphp.com). Fue amor a primera vista. ♥️

Espero que esta configuración les sirva para poder armar una estructura simple, pero aportando la complejidad necesaria para que sea un proyecto necesario.

## Instalación con Composer

Este proyecto está pensado para funcionar principalmente en un servidor **Apache** con **PHP 5.4** o mayor, pero se pueden hacer algunos ajustes de configuración para que funcione en **Nginx**.

1. Instalamos [Composer](https://getcomposer.org/download/):  
`$ curl -s https://getcomposer.org/installer | php`  
2. Creamos un nuevo proyecto de **Ultralight Web Kit**:  
`$ php composer.phar create-project alemohamad/ultralight-web-kit path/to/install`

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
│   ├── Controllers
│   │   ├── Contacto.php
│   │   ├── Errors.php
│   │   ├── Hola.php
│   │   ├── Home.php
│   │   └── SendMails.php
│   ├── Models
│   │   ├── Database.php
│   │   └── Message.php
│   ├── Views
│   │   ├── errors
│   │   │   ├── 404.html
│   │   │   └── 500.html
│   │   ├── layouts
│   │   │   ├── layout.html
│   │   │   └── menu.html
│   │   ├── contact_thanks.html
│   │   ├── contact.html
│   │   ├── hello.html
│   │   └── home.html
│   ├── helpers.php
│   └── routes.php
├── vendor
│   ├── composer
│   └── ...
├── composer.json
├── composer.lock
├── composer.phar
├── humans.txt
├── index.php
├── LICENSE
├── README.en.md
├── README.md
├── robots.txt
└── sitemap.xml
```

### ¿Qué archivos NO hay que subir al servidor FTP?

Cuando tenemos un proyecto como este y queremos subirlo al servidor (nuestro o del cliente) hay ciertos archivos de desarrollo que no hay que compartir (ya sea en un .zip o directamente por FTP). En este proyecto los archivos que deben ser ignorados al momento de la entrega son:

```
.env.example
.gitignore
composer.json
composer.lock
composer.phar
LICENSE
README.en.md
README.md
```

Capaz para vos es obvio que estos archivos no se tienen que compartir, pero me parece importante remarcarlo. Y si son ordenados y guardan su código modificado, por favor, no se olviden de crear un README propio. Renombren o borren el del proyecto y armen uno con información relacionada a su proyecto!

## Librerías utilizadas

Todo esto no sería posible sin las siguientes librerías:

* [Flight](https://github.com/mikecao/flight)
* [WingCommander](https://github.com/xmeltrut/WingCommander)
* [phpdotenv](https://github.com/vlucas/phpdotenv)
* [PHPMailer](https://github.com/PHPMailer/PHPMailer)
* [Valitron](https://github.com/vlucas/valitron)
* [Flash](https://github.com/joelvardy/flash)
* [Eloquent ORM](https://github.com/illuminate/database)

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
