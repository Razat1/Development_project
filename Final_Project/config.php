<?php

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="password";
$dbname="development_project";

try{
    $dbh = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    if ($e->getCode() == 1062) {
        // Take some action if there is a key constraint violation, i.e. duplicate name
    } else {
        throw $e;
    }
}
echo "Success!";

