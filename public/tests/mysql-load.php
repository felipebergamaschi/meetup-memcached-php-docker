<?php
error_reporting(E_ALL);

$db = new mysqli($_ENV['DATABASE_HOST'], $_ENV['DATABASE_USER'],
	$_ENV['DATABASE_PASSWORD'], $_ENV['DATABASE_NAME']);

if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

if (!$db->query("DROP TABLE IF EXISTS test") ||
    !$db->query("CREATE TABLE test(id VARCHAR(2000))")) {
    echo "Table creation failed: (" . $db->errno . ") " . $db->error;
}

for ($i=0; $i < 1000; $i++) { 
    $db->query("INSERT INTO test(id) VALUES ('" . generateRandomString(1000) . "')");
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
