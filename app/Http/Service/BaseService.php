<?php

namespace App\Http\Service;

use App\Http\Controllers\Controller;
use App\Http\Repository\BaseRepository;
use App\Http\Traits\HasResponseApi;

class BaseService extends Controller
{
    use HasResponseApi;

    protected BaseRepository $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->apiResponse($this->repository->getAll());
    }

    public function getById(int $id)
    {
        $item = $this->repository->getById($id);
        if (!$item) {
            $this->setApiStatusCode($this->exampleStatusCode['not_found']);
        }

        return $this->apiResponse($item);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function updateById(int $id, $data)
    {
        $item = $this->repository->getById($id);
        if (!$item) {
            return $this->apiResponse(null, $this->exampleStatusCode['not_found']);
        }

        return $item->update($data);
    }

    public function delete(int $id)
    {
        $item = $this->repository->getById($id);
        if ($item) {
            return $this->apiResponse(null, $this->exampleStatusCode['not_found']);
        }

        return $this->apiResponse($this->repository->getById($id)->delete(), $this->exampleStatusCode['not_found']);
    }
}
