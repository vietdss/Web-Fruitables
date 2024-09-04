<?php
class Database
{
    const servername = "localhost";
    const username = "root";
    const password = "25112003";
    const dbname = "fruitables";
    function connect()
    {
        $conn = new mysqli(self::servername, self::username, self::password,self::dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}

