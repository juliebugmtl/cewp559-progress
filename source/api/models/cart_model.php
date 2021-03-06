<?php 

class CartModel extends BaseModel
{
    public $id;
    public $userId;
    public $itemId;

    protected $TableName = 'cart';
    protected $ModelName = 'CartModel';

    public function addItem($userId, $itemId) {

    	$query = "INSERT INTO cart SET itemId = $itemId , userId = $userId";

    	error_log("Add Item query: $query");

    	$result = $this->db_connection->query($query);

        if (!$result) {
            throw new Exception("Database error: {$this->db_connection->error}", 500);
        }

    }


    public function getCartItems($userId) {
    	// Raw query should be SELECT * FROM cart JOIN items ON cart.itemId = items.id WHERE userId = $userId

    	$join = 'JOIN items ON cart.itemId = items.id';
    	$where = "WHERE userId = $userId";

        error_log("Get Cart Items query: $query");

    	return parent::getFiltered($join, $where);
    }


    public function getCartTotal($userId) {

    	// Raw query should be SELECT SUM(price) FROM cart JOIN items ON cart.itemId = items.id WHERE userId = $userId

        $query = "SELECT SUM(price) AS total FROM cart JOIN items ON cart.itemId = items.id WHERE userId = $userId";

        error_log("Get Cart Total query: $query");
        
        $result = $this->db_connection->query($query);

        if (!$result) {
            throw new Exception("Database error: {$this->db_connection->error}", 500);
        }
        
        $cart = $result->fetch_object();

        return round($cart->total, 2);


    }

    public function emptyCart($userId) {

    	$query = "DELETE FROM cart WHERE userId = $userId";

    	error_log("Delete cart query: $query");

    	$result = $this->db_connection->query($query);

        if (!$result) {
            throw new Exception("Database error: {$this->db_connection->error}", 500);
        }

    }


}
