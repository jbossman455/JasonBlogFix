<?php
require_once("/../model/config.php");

$query = $_SESSION["connection"]->query("CREATE TABLE posts)("
        . "id int(11)NOT NULL AUTO_INCREMENT,"
        . "title varchar(255) NOT NULL, "
        . "post text NOT NULL,"
        . "PRIMARY KEY (Id))");

if ($query) {
    echo "Succesfully created table: posts";
}
else{
    echo "<p>". $_SESSION["connection"]->error. "</p>";
}

