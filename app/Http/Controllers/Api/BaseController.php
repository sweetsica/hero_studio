<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Service\BaseService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected BaseService $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function show($id)
    {
        return $this->service->getById($id);
    }

    public function store(Request $request)
    {
        return $this->service->store($request->all());
    }

    public function update($id, Request $request)
    {
        return $this->service->updateById($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
