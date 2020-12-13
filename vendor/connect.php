<?php

$connect = mysqli_connect('172.17.0.3', 'root', 'root', 'hackathon');

    if (!$connect) {
        die('Error connect to DataBase');
    }