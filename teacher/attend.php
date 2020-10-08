<?php
require_once('../src/bootstrap.php');

if (isset($_SESSION['table']) && $_SESSION['table'] !== 'teachr') {
    header("Location: /");
    exit();
}

