<?php
error_reporting(E_ALL);

$start = microtime(true);

$memcached = new Memcached();
$memcached->addServer('memcached', 11211);

$dados = null;

if ( !( $dados = $memcached->get("grandeVolumeDeDados") ) )
{
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

    $memcached->set("grandeVolumeDeDados", $dados, 10);

    sleep(3);
}

$time = microtime(true)-$start;
echo "memcached: $time\n";

echo $dados;
