<?php
namespace system;

class Database
{
    protected $conn;
    public function __construct()
    {
        $this->conn = new \mysqli(config_item('db_host'), config_item('db_username'), config_item('db_password'), config_item('db_name'));

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($query_string, $return = false)
    {
        $result = $this->conn->query($query_string);

        if ($return) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function row($query_string)
    {
        $row = $this->conn->query($query_string);
        return $row->fetch_assoc();
    }
}