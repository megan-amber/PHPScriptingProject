<?php
class Order
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // TODO: create($cartItems, $totals) -> insert into orders, then order_items
}
