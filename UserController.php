<?php

require './database.php';

/*
 * Insert user.
 */
$actionName = isset($_POST['actionName']) ? $_POST['actionName'] : '';
switch ($actionName) {
    case 'store':
        store();
        break;

    case 'edit':
        editUserById();
        break;
    default:
        break;
}
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
            connectDatabase();
            $fullName = $_POST['fullname'];
            $email = $_POST['email'];
            $birthday = $_POST['birthday'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'] == 'male' ? 1 : 0;
            $avatar = !empty($_POST['avatar']) ? $_POST['avatar'] : '';

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
        connectDatabase();
        global $conn;
        $selectStmt = $conn->prepare('SELECT * FROM users');
        $selectStmt->execute();
        $users = $selectStmt->fetchAll();

        return $users;
    } catch (PDOException $e) {
        echo 'Get failed: '.$e->getMessage();
    }

    return [];
}

/**
 * Get user by id.
 *
 * @return user
 */
function getUserById($id = null)
{
    try {
        connectDatabase();
        if (!empty($id)) {
            global $conn;
            $stmt = $conn->prepare("SELECT users.* FROM users WHERE users.id = {$id} AND users.is_delete = 0");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $user = $stmt->fetch();
            disconnectDatabase();

            return $user;
        }
    } catch (PDOException $e) {
        echo 'Get user information failed: '.$e->getMessage();
    }
}

/**
 * Update user info by id.
 *
 * @return bool
 */
function editUserById()
{
    if (!empty($_POST['fullname'])
        && !empty($_POST['email'])
        && !empty($_POST['birthday'])
        && !empty($_POST['phone'])
        && !empty($_POST['address'])
        && !empty($_POST['gender'])
    ) {
        try {
            connectDatabase();
            global $conn;
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $data = [
                ':display_name' => $_POST['fullname'],
                ':email' => $_POST['email'],
                ':birthday' => $_POST['birthday'],
                ':phone_number' => $_POST['phone'],
                ':gender' => $_POST['gender'] == 'male' ? 1 : 0,
                ':address' => $_POST['address'],
                ':avatar' => !empty($_POST['avatar']) ? $_POST['avatar'] : '',
                ':id' => (int) $_POST['id'],
            ];
            $sql = 'UPDATE `users`
                    SET `display_name` = :display_name,
                        `email` = :email,
                        `birthday` = :birthday,
                        `phone_number` = :phone_number,
                        `gender` = :gender,
                        `address` = :address,
                        `avatar` = :avatar
                    WHERE `id` = :id';
            $conn->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo 'Edit user failed: '.$e->getMessage();
        }
    }
}
