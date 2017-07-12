# Ultralight Web Kit

![Ultralight Web Kit](http://i.imgur.com/jODgJwc.png)

Ultralight Web Kit a simple project written in PHP, based on the **Flight** microframework, using several libraries, such as **Twig**, **Eloquent ORM** or **Phinx**. This project is prepared to work on any web server that has PHP 5.4 or greater.

[![Total Downloads](https://img.shields.io/packagist/dt/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://packagist.org/packages/alemohamad/ultralight-web-kit)
[![Latest Stable Version](https://img.shields.io/packagist/v/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://packagist.org/packages/alemohamad/ultralight-web-kit)
[![License](https://img.shields.io/packagist/l/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://opensource.org/licenses/mit-license.php)

## Why did I build this project?

After testing great frameworks like [Laravel](https://laravel.com), [Zend Framework](https://framework.zend.com), [Symfony](https://symfony.com), [CodeIgniter](https://www.codeigniter.com) o [CakePHP](https://cakephp.org), I did not find anything to help set up small web sites (where the important thing is to have some organization and a little MVC) having in mind designers and Front End developers.

Don't get me wrong, I love the usage of big frameworks to build a web app, but to build a simple web structure, the ones I named above are huge monsters for this task.

This was until I came across the microframework concept and found [Flight](http://flightphp.com). It was love at first sight. ♥️

I hope that this configuration will be helpful to build a simple structure, but providing the complexity necessary to make it a successful project.

## Installation with Composer

This project is intended to work primarily on an **Apache** server with **PHP 5.4** or higher, but some configuration settings can be made to work on **Nginx**.

* Install [Composer](https://getcomposer.org/download/):  
```
$ curl -s https://getcomposer.org/installer | php
```

* We create a new **Ultralight Web Kit** project:  
```
$ php composer.phar create-project alemohamad/ultralight-web-kit path/to/install
```

Composer will create the project in the `path/to/install` directory. If we don't pass this parameter, it will be created in the folder where we are positioned.

Although here I show the installation through **Composer**, you can also do a **Git** *checkout* or download the source code from a web browser. Personally I find it more comfortable and neat to use Composer.

## How to use this project?

For the project to work, you need to rename the `.env.example` file to `.env`. There we modify the values that we need for our project (if you modify the internal files, you can also remove or add variables).

To view the project you can upload the files to a server via FTP or otherwise test it locally with [MAMP](https://www.mamp.info), [WAMP](http://www.wampserver.com/) or the [PHP built-in web server](http://php.net/manual/en/features.commandline.webserver.php):

```
$ php -S localhost:1234
```

Now you can use the link [http://localhost:1234](http://localhost:1234) to access the local PHP server. 😉

## File structure

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

### What files we DO NOT have to upload to the FTP server?

When we have a project like this, and we want to upload it to a server (ours or the client's) there are certain development files that *do not* have to be shared (neither in a .zip or directly by FTP). In this project the files that must be ignored at the time of delivery are:

```
.env.example
.gitignore
backup-project.sh
composer.json
composer.lock
composer.phar
LICENSE
phinx.php
README.en.md
README.md
```

Perhaps for you it is obvious that these files do not have to be shared, but I think it is important to highlight it. And if you are organized and keep your modified code in a custom repo, please don't forget to create your own README. Rename or erase the one in the project and write one with information related to your project!

## Used libraries

All this would not be possible without the following libraries:

* [Flight](https://github.com/mikecao/flight)
* [Twig](https://github.com/twigphp/Twig)
* [phpdotenv](https://github.com/vlucas/phpdotenv)
* [PHPMailer](https://github.com/PHPMailer/PHPMailer)
* [Valitron](https://github.com/vlucas/valitron)
* [Flash](https://github.com/joelvardy/flash)
* [Eloquent ORM](https://github.com/illuminate/database)
* [Phinx](https://github.com/cakephp/phinx)

## Bonus track: Front-end Development

This project is thought for a web development, and for that it is advisable to take into account also the front-end part. In my opinion it is very comfortable to use the [Sass](http://sass-lang.com) language to generate the styles. And it's also good to be able to have both the CSS styles and the JavaScript logic each in a single file, and if we can minimize it, the better.

To achieve this, I added a folder called `assets-dev`, where you can find [Node.js](https://nodejs.org) packages and a [Gulp](http://gulpjs.com) script to install and use. There is also a [Bower](https://bower.io) script for installing CSS and JS libraries (such as [Bourbon](http://bourbon.io) and [jQuery](https://jquery.com)). In the Sass files you will find that I leave a copy of [Reset CSS](http://meyerweb.com/eric/tools/css/reset/) and [Head.JS](http://headjs.com). You can remove them if you don't want to use them.

To use these scripts, we need to use the following commands to install the necessary stuff:

```
$ npm install -g npm
$ sudo gem install sass
$ npm install -g bower
$ npm install -g gulp-cli
```

To install the necessary packages, we have to go to the `assets-dev` folder and use the following commands:

```
$ npm install
$ bower install
```

Then to start working (also in the `assets-dev` folder) we use the command:

```
$ gulp
```

It's important to know that if you cancel the process, it will stop listening and generating the final files to be used in the project.

I want to clarify that this is the way and the tools that I like. You are not required to use it.

In fact, if you do front-end development in another way, it's best to delete the `assets-dev` folder, since in that case it's going to be garbage code.

One tool you can also use is [Prepros](https://prepros.io), although there are many other options for these tasks. 😁

## Authentication

The project has a class called `Auth`, which has logic to be able to perform authentication simply in any project. It is ready to connect to the database, using the `User` model, but it can be modified to another usage.

This class is registered to be used within Flight, so it can be used in this way:

```
<?php
...

$auth = Flight::auth()->attempt($username, $password);

if (!$auth) {
  // username or password are not valid
}

// user is logged in
```

And then, we have these other methods:

```
Flight::auth()->check(); // Indicates whether the user is logged in or not
Flight::auth()->user(); // Returns the object of the logged in user
Flight::auth()->logout();
```

The system is prepared to have global variables in the views that bring the information faster:

```
{{ auth.user.name }}

{% if auth.check %}
Session started
{% else %}
No session started
{% endif %}
```

## Project Backup

To make our life more comfortable, I wrote a Bash script to export the files that we have to deliver to the client (either deliver to their IT team or upload them ourselves to an FTP).

What we have to do is go to the root of the project, and write the following command:

```
$ ./backup-project.sh
```

The same script will tell us what the name of the generated zip file is, in order to have the backup to deliver.

## Steps to contribute to the project

1. Fork this repo.
2. Create a branch for your feature. (`git checkout -b my-new-feature`)
3. Make the desired changes.
4. Commit these changes. (`git commit -am 'Added some feature')`
5. Push to the branch. (`git push origin my-new-feature`)
6. Create a Pull Request.
7. Celebrate that you are a wonderful being for wanting to be part of this!

## License

The kit is licensed under the [MIT](https://opensource.org/licenses/mit-license.php) license.

The project logo is [Wings](https://thenounproject.com/term/wings/382103/) created by [CombineDesign](https://www.behance.net/combine-design). It's so good!
