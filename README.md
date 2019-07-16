## Sobre

Usando Memcached para fazer cache simples e poderoso. Alguns scritps em PHP vão nos auxiliar para exemplificar.
Para fazer uma mensuração de tempo usamos o "microtime()" do PHP.

## Instalação

Instale o docker.

[Docker](https://www.docker.com/products/docker-desktop)

Clone o repositorio.

```bash
$ git clone git@github.com:felipebergamaschi/meetup-memcached-php-docker.git
```

## Uso

Up:

```bash
$ cd meetup-memcached-php-docker/docker
$ docker-compose up
```

Stop:

```bash
$ cd meetup-memcached-php-docker/docker
$ docker-compose stop
```

## Testes

Para visualizar o php

```
http://localhost/
```

Para carregar o mysql com registros

```
http://localhost/tests/mysql-load.php
```

Para visualizar os registro no mysql

```
http://localhost/tests/mysql-select.php
```

Para simular uma query lenta no mysql

```
http://localhost/tests/mysql.php
```

Para simular uma query lenta no mysql com uso do memcached

```
http://localhost/tests/memcached.php
```

## Memcached

Para limpar o memcached

```
http://localhost/tests/memcached-flush.php
```

Para abrir o dashboard do memcached

```
http://localhost/phpmemcacheadmin/
```
