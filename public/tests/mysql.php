<?php
error_reporting(E_ALL);

$start = microtime(true);

$dados = null;

$db = new mysqli($_ENV['DATABASE_HOST'], $_ENV['DATABASE_USER'],
	$_ENV['DATABASE_PASSWORD'], $_ENV['DATABASE_NAME']);

if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$res = $db->query("SELECT id FROM test where id like '%ak%' or id like '%dg%' ");

$dados .= "<pre>";
while ($items = $res->fetch_assoc()) {
    $dados .= json_encode($items) . "</br>";
}
$dados .= "</pre>";

$time = microtime(true)-$start;
echo "mysql: $time\n";

echo $dados;
