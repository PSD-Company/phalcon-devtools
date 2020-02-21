# Phalcon Devtools Docker

[![Latest Version](https://img.shields.io/packagist/v/psdcompany/devtools.svg?style=flat-square)][:packagist:]
[![Software License](https://img.shields.io/badge/license-BSD--3-brightgreen.svg?style=flat-square)][:license:]
[![Total Downloads](https://img.shields.io/packagist/dt/psdcompany/devtools.svg?style=flat-square)][:packagist:]
[![Daily Downloads](https://img.shields.io/packagist/dd/psdcompany/devtools.svg?style=flat-square)][:packagist:]

![Phalcon WebTools](https://cloud.githubusercontent.com/assets/1256298/18617851/b7d31558-7de2-11e6-83e0-30e5902af714.png)

## What's Phalcon?

Phalcon PHP is a web framework delivered as a C extension providing high performance and lower resource consumption.

## What are Devtools Docker?

This tools provide you useful scripts to generate code helping to develop faster and easy applications that use
with Phalcon framework with docker.

## Requirements

* PHP >= 7.2
* Phalcon >= 4.0.0

## Installing globally via Composer

Install composer in a common location:

```bash
curl -s http://getcomposer.org/installer | php
```

Move the `composer.phar` to you local bin directory, so it can be used globally:

```bash
mv composer.phar /usr/local/bin/composer
```

Run compose global require:

```bash
composer global require psdcompany/devtools
```

Create a symlink to the program:

```bash
ln -s ~/.composer/vendor/bin/phalcon /usr/local/bin/phalcon
```

## Usage

To get a list of available commands just execute following:

```bash
phalcon commands help
```

This command should display something similar to:

```sh
$ phalcon --help

Phalcon DevTools (3.4.0)

Help:
  Lists the commands available in Phalcon devtools

Available commands:
  info             (alias of: i)
  commands         (alias of: list, enumerate)
  controller       (alias of: create-controller)
  module           (alias of: create-module)
  model            (alias of: create-model)
  all-models       (alias of: create-all-models)
  project          (alias of: create-project)
  scaffold         (alias of: create-scaffold)
  migration        (alias of: create-migration)
  webtools         (alias of: create-webtools)
  serve            (alias of: server)
  console          (alias of: shell, psysh)
```

## Docker configuration

You have to make sure your database image is running and accessible on a port. The `docker-compose.yml` For a mariadb should look like this:

```yaml
services:
  mariadb:
    ports:
      - 3306:3306
```

## Database configuration

You have to add the `dsn` and the `adapter` parameters to your`database` config file. The complete `database` config should look like this:

```php
$config = [
  'dsn'      => 'Server=127.0.0.1;Port=3306;Database=my_db_name;Uid=my_db_user;Pwd=my_db_user_password;'
  'host'     => 'mariadb',
  'dbname'   => 'my_db_name',
  'username' => 'my_db_user',
  'password' => 'my_db_user_password',
  'adapter'  => 'Postgresql' #Msql
];
```

## Configuration file

By creating **config.json** or any other configuration file called **config** in root project you can set options for all possible commands, for example:

```json
{
  "migration" : {
    "migrations": "App/Migrations",
    "config": "App/Config/db.ini"
  },
  "controller" : {
    "namespace": "Phalcon\\Test",
    "directory": "App/Controllers",
    "base-class": "App\\MyAbstractController"
  }
}
```

And then you can use use `phalcon migration run` or `phalcon controller SomeClass` and those commands will be executed with options from file. Arguments provided by developer from command line will overwrite existing one in file.

## License

Phalcon Developer Tools is open source software licensed under the [New BSD License][:license:].<br>
© Phalcon Framework Team and contributors

[:packagist:]: https://packagist.org/packages/psdcompany/devtools
[:license:]: https://github.com/PSD-Company/phalcon-devtools-docker/blob/master/LICENSE.txt