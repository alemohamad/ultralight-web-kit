# Ultralight Web Kit

![Ultralight Web Kit](http://i.imgur.com/jODgJwc.png)

Ultralight Web Kit a simple project written in PHP, based on the **Flight** microframework, using several libraries, such as **Mustache** or **Eloquent ORM**. This project is prepared to work on any web server that has PHP 5.4 or greater.

[![Total Downloads](https://img.shields.io/packagist/dt/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://packagist.org/packages/alemohamad/ultralight-web-kit)
[![Latest Stable Version](https://img.shields.io/packagist/v/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://packagist.org/packages/alemohamad/ultralight-web-kit)
[![License](https://img.shields.io/packagist/l/alemohamad/ultralight-web-kit.svg?style=flat-square)](https://opensource.org/licenses/mit-license.php)

## Why did I build this project?

After testing great frameworks like [Laravel](https://laravel.com), [Zend Framework](https://framework.zend.com), [Symfony](https://symfony.com), [CodeIgniter](https://www.codeigniter.com) o [CakePHP](https://cakephp.org), I did not find anything to help set up small web sites (where the important thing is to have some organization and a little MVC) having in mind designers and Front End developers.

Don't get me wrong, I love the usage of big frameworks to build a web app, but to build a simple web structure, the ones I named above are huge monsters for this task.

This was until I came across the microframework concept and found [Flight](http://flightphp.com). It was love at first sight. ♥️

I hope that this configuration will be helpful to build a simple structure, but providing the complexity necessary to make it a neat project.

## Installation with Composer

This project is intended to work primarily on an **Apache** server with **PHP 5.4** or higher, but some configuration settings can be made to work on **Nginx**.

1. Install [Composer](https://getcomposer.org/download/):  
`$ curl -s https://getcomposer.org/installer | php`  
2. We create a new **Ultralight Web Kit** project:  
`$ php composer.phar create-project alemohamad/ultralight-web-kit path/to/install`

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

### What files we DO NOT have to upload to the FTP server?

When we have a project like this, and we want to upload it to a server (ours or the client's) there are certain development files that *do not* have to be shared (neither in a .zip or directly by FTP). In this project the files that must be ignored at the time of delivery are:

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

Perhaps for you it is obvious that these files do not have to be shared, but I think it is important to highlight it. And if you are organized and keep your modified code in a custom repo, please don't forget to create your own README. Rename or erase the one in the project and write one with information related to your project!

## Used libraries

All this would not be possible without the following libraries:

* [Flight](https://github.com/mikecao/flight)
* [WingCommander](https://github.com/xmeltrut/WingCommander)
* [phpdotenv](https://github.com/vlucas/phpdotenv)
* [PHPMailer](https://github.com/PHPMailer/PHPMailer)
* [Valitron](https://github.com/vlucas/valitron)
* [Flash](https://github.com/joelvardy/flash)
* [Eloquent ORM](https://github.com/illuminate/database)

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