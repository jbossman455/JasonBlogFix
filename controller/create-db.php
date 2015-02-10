<?php

require_once("/../model/config.php");

$connection = new mysqli($host, $username, $password);

if ($connection->connect_error) {
    die("<p>Error: " . $connection->connect_error."</p>");
}

$exists = $connection->select_db($database);

if (!$exists) {
    $query = $connection->query("CREATE DATABASE $database");

    if ($query) {
        echo" Successfully created database: " . $database. "</p>";
    }
} else {
    echo "<p>Database already exists.</p>";
}

$query = $connection->query("CREATE TABLE posts("
        . "id int(11)NOT NULL AUTO_INCREMENT,"
        . "title varchar(255) NOT NULL, "
        . "post text NOT NULL,"
        . "PRIMARY KEY (Id))");

if ($query) {
    echo "Succesfully created table: posts";
}
else{
    echo "<p>$connection->error</p>";
}

$connection->close();
