<?php
error_reporting(E_ALL);

$db = new mysqli($_ENV['DATABASE_HOST'], $_ENV['DATABASE_USER'],
	$_ENV['DATABASE_PASSWORD'], $_ENV['DATABASE_NAME']);

if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$res = $db->query("SELECT id FROM test");

echo "<pre>";
while ($items = $res->fetch_assoc()) {
    echo json_encode($items) . "</br>";
}
echo "</pre>";
