<?php

namespace Wrapper\Models;

use mysqli;
use mysqli_result;
use mysqli_sql_exception;

class Database {
    /**
     * @var false|mysqli
     */
    protected mysqli|false $conn;

    /**
     * connect to database
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $dbname
     */
    public function __construct(string $host, string $username, string $password, string $dbname) {
        $this->conn = mysqli_connect($host, $username, $password, $dbname);
    }
//data processed with in the database

    /**
     * run a query
     * @param $sql
     * @return bool|mysqli_result|void
     */
    public function query($sql) {
        try {
            return mysqli_query($this->conn, $sql);
        } catch (mysqli_sql_exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    /**
     *filter special characters
     * @param $value
     * @return string
     */
    public function escape($value): string
    {
        return mysqli_real_escape_string($this->conn, $value);
    }
}