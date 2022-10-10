<?php

namespace App\Http\Repository;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;


class BaseRepository extends Controller
{
    public Model $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function store($data) {
        return $this->model->create($data);
    }

    public function updateById(int $id ,$data) {
        return $this->getById($id)->update($data);
    }

    public function delete(int $id) {
        return $this->getById($id)->delete();
    }
}
