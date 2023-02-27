<?php

require_once __DIR__ . "/../config/credentials.php";

class Database {
    protected PDO $con;

    function __construct()
    {
        $this->con = new PDO(DATABASE_PG_CREDENTIALS);
        $this->create_tables();
    }

    private function create_tables() {
        $query = "CREATE TABLE IF NOT EXISTS palestras(
            id INTEGER PRIMARY KEY,
            name TEXT NOT NULL,
            palestrante TEXT NOT NULL,
            inicio TEXT NOT NULL,
            fim TEXT NOT NULL);";

        $this->con->query($query);
    }

}