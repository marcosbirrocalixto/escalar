<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function findWhere($coluna, $valor);
    public function findWhereFirst($coluna, $valor);
    public function paginate($totalPage = 10);
    public function store(array $data);
    public function update(int $id, array $data);
    public function delete($id);
}