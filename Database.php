<?php

use \PDO;

class Database
{
    private string $type;
    private string $host;
    private string $dbname;
    private string $username;
    private string $password;
    private PDO $conn;


    /**
     * Database constructor.
     * @param string $type
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     */
    public function __construct(string $type, string $host, string $dbname, string $username, string $password)
    {
        $this->type = $type;
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        $this->conn = new PDO($type . ":host=" . $host . ";dbname=" . $dbname . ";", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Get a database instant through the singleton pattern
     * @param string $type
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     * @return PDO self::$conn
     */
    public static function getInstance(string $type, string $host, string $dbname, string $username, string $password)
    {
        if (!self::$conn) {
            self::$conn = new self($type, $host, $username, $password, $dbname);
        }
        return self::$conn;
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }
}
