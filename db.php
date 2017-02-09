<?php
require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=registr', 'root', '' );
session_start();// Запуск сессии, для того чтобы запомнить пользователя