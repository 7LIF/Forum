<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 68b301b24d0b9c015fc2d00bfe5e105855021941
    include 'config.php';

    //create database
    $connection = new PDO(
        "mysql:host=$host",
        $user,
        $password
    );

    $engine = $connection->prepare("CREATE DATABASE IF NOT EXISTS $database");
    $engine -> execute();
    $connection = null;

    echo '<p> Base de dados criada com sucesso! </p><hr>';

    //open database
    $connection = new PDO(
        "mysql:dbname=$database;host=$host",
        $user,
        $password
    );

    //create table "users"
    $sql = "CREATE TABLE IF NOT EXISTS users (
                id_user INT NOT NULL PRIMARY KEY,
                username VARCHAR(30),
                pass VARCHAR(100),
                avatar VARCHAR(250)
    )";


    $engine = $connection->prepare($sql);
    $engine -> execute();

    echo '<p> Tabela "users" criada com sucesso! </p><hr>';

    //create table "posts"
    $sql = "CREATE TABLE IF NOT EXISTS posts (
        id_post INT NOT NULL PRIMARY KEY,
        id_user INT NOT NULL,
        titulo VARCHAR(100),
        mensagem TEXT,
        data_post DATETIME,
        FOREIGN KEY(id_user) REFERENCES users(id_user) ON DELETE CASCADE
    )";

    $engine = $connection->prepare($sql);
    $engine -> execute();
    $engine = null;

    echo '<p> Tabela "posts" criada com sucesso! </p><hr>';
    echo '<p>Processo de criação da base da dados criada com sucesso!</p>';
<<<<<<< HEAD
=======
=======
include 'config.php';

//create database
$connection = new PDO(
    "mysql:host=$host",
    $user,
    $password
);

$engine = $connection->prepare("CREATE DATABASE IF NOT EXISTS $database");
$engine -> execute();
$connection = null;

echo '<p> Base de dados criada com sucesso! </p><hr>';

//open database
$connection = new PDO(
    "mysql:dbname=$database;host=$host",
    $user,
    $password
);

//create table "users"
$sql = "CREATE TABLE IF NOT EXISTS users (
            id_user INT NOT NULL PRIMARY KEY,
            username VARCHAR(30),
            pass VARCHAR(100),
            avatar VARCHAR(250)
)";


$engine = $connection->prepare($sql);
$engine -> execute();

echo '<p> Tabela "users" criada com sucesso! </p><hr>';

//create table "posts"
$sql = "CREATE TABLE IF NOT EXISTS posts (
    id_post INT NOT NULL PRIMARY KEY,
    id_user INT NOT NULL,
    titulo VARCHAR(100),
    mensagem TEXT,
    data_post DATETIME,
    FOREIGN KEY(id_user) REFERENCES users(id_user) ON DELETE CASCADE
)";


$engine = $connection->prepare($sql);
$engine -> execute();

$engine = null;

echo '<p> Tabela "posts" criada com sucesso! </p><hr>';
echo 'Processo de criação da base da dados criada com sucesso!';
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
>>>>>>> 68b301b24d0b9c015fc2d00bfe5e105855021941
