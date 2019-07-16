<?php
error_reporting(E_ALL);

$memcached = new Memcached();
$memcached->addServer('memcached', 11211);
$memcached->flush();
