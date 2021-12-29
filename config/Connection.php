<?php

require_once __DIR__ . '/../vendor/autoload.php';

class Connection
{

    //Parameters
    private $conn;

    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->safeLoad();
    }

    //METHOD GETTERS
    protected function getDNS()
    {
        return 'mysql:host=' . $_ENV["SERVER_HOST"] . ';dbname=' . $_ENV["DBNAME"];
    }
    protected function getConn()
    {
        $this->conn = null;
        echo "Password is " . $_ENV["SERVER_PASSWORD"];

        try {
            $this->conn = new PDO($this->getDNS(), $_ENV["SERVER_USER"], $_ENV["SERVER_PASSWORD"]);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo `Connection Error: {$e}`;
        }

        return $this->conn;
    }

    protected function closeConn()
    {
        if ($this->conn !== null) {
            $this->conn = null;
        }
    }
}
