<?php

$connect = mysqli_connect('172.17.0.2', 'root', 'root', 'hackathon');

    if (!$connect) {
        die('Error connect to DataBase');
    }