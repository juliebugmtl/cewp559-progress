<?php

class OrderController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function newOrder($userId, $cart) {

    	$order_data = array('userId' => $userId, 'total' => $cart['total']);
    	
    	return $this->model->create($order_data);

    }


    public function createOrderItems($orderId, $cart) {

    	foreach($cart['items'] as $key => $cartItem) {

    		$this->model->insertOrderItem($orderId, $cartItem->id);

    	}

    }

    public function getAllOrders($userId) {

        $orders = $this->model->getAllOrders($userId);

        if (!$userId) {
            throw new Exception('Must be logged in. ', 400);
        }

        return $this->model->getAllOrders($userId);
    }
    
}