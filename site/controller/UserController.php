<?php

require '../database/database.php';

/**
 * Insert user.
 */
function store()
{
    if (!empty($_POST['fullname'])
        && !empty($_POST['email'])
        && !empty($_POST['birthday'])
        && !empty($_POST['phone'])
        && !empty($_POST['address'])
        && !empty($_POST['gender'])
    ) {
        try {
            $fullName = $_POST['fullname'];
            $email = $_POST['email'];
            $birthday = $_POST['birthday'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'] == 'male' ? 1 : 0;
            $avatar = !empty($_POST['avatar']) ? $_POST['avatar'] : '';

            $insertSql =
            $insertSql = "INSERT INTO `users`
                        (`display_name`, `email`, `birthday`, `phone_number`, `gender`, `address`, `avatar`) 
                        VALUES ('$fullName', '$email', '$birthday', '$phone', '$gender', '$address', '$avatar')";
            global $conn;
            $conn->exec($insertSql);
        } catch (PDOException $e) {
            echo 'Insert failed: '.$e->getMessage();
        }
    }
}

/**
 * Get all user.
 *
 * @return array
 */
function getUsers()
{
    try {
        global $conn;
        $selectStmt = $conn->prepare('SELECT * FR' . 'OM users');
        $selectStmt->execute();
        return $selectStmt->fetchAll();
    } catch (PDOException $e) {
        echo 'Get failed: '.$e->getMessage();
    }

    return [];
}
