<?php
$host = "localhost";
$database = "blog";
//$tabela="usuarios";
$login_db = "root";
$senha_db = "784512";
$link = mysqli_connect($host, $login_db, $senha_db);
$db = mysqli_select_db($link, $database);
