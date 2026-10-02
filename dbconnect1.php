<?php

$dbhost = 'localhost';
$dbname = 'esports';
$dbuser = 'root';
$dbpassword = 'root';



if ($_SERVER['HTTP_HOST'] == "duke0123.pairserver.com") {
    $dbhost = 'db178.pair.com';
    $dbname = 'duke0123_esports';
    $dbuser = 'duke0123_4_w';
    $dbpassword = 'Uu2PDA9s47bFNH6e';
}



try {


    $db = new PDO(
        "mysql:host=$dbhost;dbname=$dbname;charset=utf8",
        $dbuser,
        $dbpassword
    );




    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
};
