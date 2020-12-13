<?php

    $connect = mysqli_connect('localhost', 'root', 'root', 'hackathon');

    if (!$connect) {
        die('Error connect to DataBase');
    }