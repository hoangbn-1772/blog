<?php

class User
{
    public function __construct()
    {
    }

    /**
     * Validate input
     *
     * @return bool
     */
    private function validate($data = [])
    {
        if (empty($data['fullname'])
            || empty($data['email'])
            || empty($data['birthday'])
            || empty($data['phone'])
            || empty($data['address'])
            || empty($data['gender'])
        ) {
            return false;
        }
        return true;
    }

    public function store($data = [])
    {
        if ($this->validate($data)) {
            try {
                $conn = Database::connectDatabase();
                $fullName = $data['fullname'];
                $email = $data['email'];
                $birthday = $data['birthday'];
                $phone = $data['phone'];
                $address = $data['address'];
                $gender = $data['gender'] == 'male' ? 1 : 0;
                $avatar = !empty($data['avatar']) ? $data['avatar'] : '';

                $insertSql = "INSERT INTO `users`
                        (`display_name`, `email`, `birthday`, `phone_number`, `gender`, `address`, `avatar`)
                        VALUES ('$fullName', '$email', '$birthday', '$phone', '$gender', '$address', '$avatar')";
                $conn->exec($insertSql);
                Database::disconnectDatabase();
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
    public function getUsers()
    {
        try {
            $conn = Database::connectDatabase();
            $stmt = $conn->prepare('SELECT * FROM users WHERE `is_delete` = 0');
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $users = $stmt->fetchAll();
            Database::disconnectDatabase();

            return $users;
        } catch (PDOException $e) {
            echo 'Get failed: '.$e->getMessage();
        }

        return [];
    }

    /**
     * Get user by id.
     *
     * @return object
     */
    public function getUserById($id = null)
    {
        try {
            $conn = Database::connectDatabase();
            if (!empty($id)) {
                $stmt = $conn->prepare("SELECT users.* FROM users WHERE users.id = {$id} AND users.is_delete = 0");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $user = $stmt->fetch();
                Database::disconnectDatabase();

                return $user;
            }
        } catch (PDOException $e) {
            echo 'Get user information failed: '.$e->getMessage();
        }

        return false;
    }

    /**
     * Update user info by id.
     *
     * @return bool
     */
    public function editUserById($id = null, $data = [])
    {
        if ($this->validate($data)) {
            try {
                $conn = Database::connectDatabase();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $data = [
                    ':display_name' => $data['fullname'],
                    ':email' => $data['email'],
                    ':birthday' => $data['birthday'],
                    ':phone_number' => $data['phone'],
                    ':gender' => $data['gender'] == 'male' ? 1 : 0,
                    ':address' => $data['address'],
                    ':avatar' => !empty($data['avatar']) ? $data['avatar'] : '',
                    ':id' => $id,
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
                $result = $conn->prepare($sql)->execute($data);
                Database::disconnectDatabase();

                return $result;
            } catch (PDOException $e) {
                echo 'Edit user failed: '.$e->getMessage();
            }
        }

        return false;
    }

    /**
     * Delete user.
     *
     * @return bool
     */
    public function delete($id = null)
    {
        try {
            $conn = Database::connectDatabase();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $data = [
                ':is_delete' => 1,
                ':id' => $id,
            ];

            $sql = 'UPDATE `users` SET `is_delete` = :is_delete WHERE `id` = :id';
            $result = $conn->prepare($sql)->execute($data);
            return $result;
            Database::disconnectDatabase();
        } catch (PDOException $e) {
            echo 'Delete user failed: '.$e->getMessage();
        }

        return false;
    }
}
