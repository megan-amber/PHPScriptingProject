<?php
class Product
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // TODO: getAll(), getById($id)
}
