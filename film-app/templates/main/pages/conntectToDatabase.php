<?php
class Database{
    private $host = "localhost"; //localy
    private $user = "root"; //default xamp username
    private $pwd = "";
    private $dbName = "fakeyt";

    protected function connect(){
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName; //dsn = data source name
        $pdo = new PDO($dsn, $this->user, $this->pwd); // dsn, user, pwd
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //how we fetch, this case assosiactive arrays
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}