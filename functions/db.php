<?php 

function getConnection (){
    [
        'dbname' => $dbname,
        'host' => $host,
        'port' => $port,
        'charset' => $charset,
        'user' => $user,
        'password' => $password
    ] = parse_ini_file(__DIR__ . "/../config/db.ini");

    $dsn = "mysql:dbname=$dbname;host=$host;port=$port;charset=$charset";

    return new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}

