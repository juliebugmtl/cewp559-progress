<?php

class CategoryModel extends BaseModel
{
    public $id;
    public $name;
    public $description;
    public $price;

    protected $TableName = 'categories';
    protected $ModelName = 'CategoryModel';

    public function createCategory($payload)
    {
        
        $fields = array();
        foreach ($payload as $field => $val) {
            $fields[] = "$field = '$val'";
        }

        $setStatement = implode(', ', $fields);
        $query = "INSERT INTO categories SET $setStatement";

        error_log("Insert SQL: $query");

        $result = $this->db_connection->query($query);
        
        if (!$result) {
            throw new Exception("Database error: {$this->db_connection->error}", 500);
        }
        
        $insertedId = $this->db_connection->insert_id;
        return $insertedId;
    }

   public function deleteCategory($id)
    {
 
        $query = sprintf(
            "DELETE FROM categories WHERE id = '$id'");

        error_log("DELETE query: $query");

        $result = $this->db_connection->query($query);
        
        if (!$result) {
            throw new Exception("Database error: {$this->db_connection->error}", 500);
        }

        return;
    }

    public function updateCategory($payload)
    {
        
        $fields = array();
        foreach ($payload as $field => $val) {
            $fields[] = "$field = '$val'";
        }

        var_dump($fields);

        $setStatement = implode(', ', $fields);
        $query = "UPDATE categories SET $setStatement";

        error_log("Insert SQL: $query");

        $result = $this->db_connection->query($query);
        
        if (!$result) {
            throw new Exception("Database error: {$this->db_connection->error}", 500);
        }
        
        $updatedId = $this->db_connection->update_id;
        return $updatedId;
    }

}
