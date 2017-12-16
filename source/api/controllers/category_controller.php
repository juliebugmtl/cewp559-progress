<?php

class CategoryController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getAll() {
        return $this->model->getAll();
    }

    public function createCategory($payload) {
        return $this->model->createCategory($payload);
    }

    public function deleteCategory($id) {
        return $this->model->deleteCategory($id);
    }

    // Unable to get updateCategory to work. -- JM
    //
    // public function updateCategory($requestJSON) {
    //     return $this->model->updateCategory($id, $payload);
    // }

}
