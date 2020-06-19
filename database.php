<?php

class Database
{
    private static $servername = 'localhost';
    private static $dbname = 'blog';
    private static $username = 'root';
    private static $password = 'root';
    private static $conn = null;

    /**
     * Connect database.
     *
     * @return object
     */
    public static function connectDatabase()
    {
        if (empty(self::$conn)) {
            try {
                if (empty($conn)) {
                    self::$conn = new PDO(
                        'mysql:host=' . self::$servername.';dbname=' . self::$dbname,
                        self::$username,
                        self::$password
                    );
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }

        return self::$conn;
    }

    public static function disconnectDatabase()
    {
        if (!empty(self::$conn)) {
            self::$conn = null;
        }
    }
}
