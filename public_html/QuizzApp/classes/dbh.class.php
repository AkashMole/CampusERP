<?php
class Dbh
{
    private $host = "shareddb-o.hosting.stackcp.net";
    private $username = "quizApp-3130390747";
    private $pwd = "Qweasz@123";
    private $dbName = "quizApp-3130390747";

    //private $host = "localhost";
    //private $username = "root";
    //private $pwd = "";
    //private $dbName = "quizapp";

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
