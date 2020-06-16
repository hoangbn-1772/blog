<?php

require './UserController.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($id)) {
    delete($id);
}

header('location: list.php');
