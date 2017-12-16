<?php

class OrderModel extends BaseModel
{
    public $id;
    public $userId;
    public $total;

    protected $TableName = 'orders';
    protected $ModelName = 'OrderModel';


    public function insertOrderItem($orderId, $itemId) {

        $query = "INSERT INTO order_items (orderId, itemId) VALUES ($orderId, $itemId)";

        error_log("Insert SQL: $query");

        $result = $this->db_connection->query($query);
        
        if (!$result) {
            throw new Exception("Database error: {$this->db_connection->error}", 500);
        }

    }


   /**
     * getAllOrders will retrieve all the records from the database from $TableName
     */
    public function getAllOrders($userId) {

        $orders = array();
        $query = "SELECT * from orders where userId = '$userId'";
        $result = $this->db_connection->query($query);

        error_log("Query for getAllOrders is: $query");
        
        if (!$result) {
            throw new Exception("Database error: {$this->db_connection->error}", 500);
        }
        
        while ($order = $result->fetch_object($this->ModelName)) {
            $orders[] = $order;
        }

        return $orders;
    }

}