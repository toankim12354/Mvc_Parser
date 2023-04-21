<?php

namespace Wrapper\Models;
use mysqli;
use mysqli_result;
use mysqli_sql_exception;

class Database {
    /**
     * @var false|mysqli
     */
    private mysqli|false $conn;
    private  $content;
    private $titli;
    private $date;


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
        $title =$this->titli ;
        $content = $this->content ;
        $date = $this->date;
        $sql = "INSERT INTO posts (title, content, date) VALUES ('$title', '$content', '$date')";
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
