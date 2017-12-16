<?php

class CategoryController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->getAll();
    }

    public function createCategory($payload)
    {
        return $this->model->createCategory($payload);
    }

    public function deleteCategory($id)
    {
        return $this->model->deleteCategory($id);
    }

    public function updateCategory($id)
    {
        return $this->model->updateCategory($id);
    }

}
