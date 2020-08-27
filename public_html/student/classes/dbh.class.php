<?php
class Dbh
{
    private $host = "shareddb-v.hosting.stackcp.net";
    private $username = "WebApp-4674";
    private $pwd = "Qweasz@123";
    private $dbName = "CampusERP-31343787c2";

    function connect()
    {

        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->username, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (Exception $Exception) {

        }
    }
}
