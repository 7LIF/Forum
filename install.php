<?php

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