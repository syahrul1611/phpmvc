<?php

class Database
{
    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host='.config('db_host.database').';dbname='.config('db_name.database');
        $options = config('db_options.database');
        try {
            $this->dbh = new PDO($dsn,config('db_username.database'),config('db_password.database'),$options);
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bindQuery($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindQuery($param,$value,$type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}