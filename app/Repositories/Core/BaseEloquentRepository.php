<?php

namespace App\Repositories\Core;

use App\Repositories\Exceptions\NotEntityDefined;
use App\Repositories\Contracts\RepositoryInterface;

class BaseEloquentRepository implements RepositoryInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();   
    }

    public function getAll()
    {
        return $this->entity->get();
    }

    public function findById($id)
    {
        return $this->entity->find($id);
    }   

    public function findWhere($coluna, $valor)
    {
        return $this->entity
                        ->where($coluna, $valor)
                        ->get();
    }

    public function findWhereFirst($coluna, $valor)
    {
        return $this->entity
                        ->where($coluna, $valor)
                        ->first();
    }

    public function paginate($totalPage = 10)
    {
        return $this->entity->paginate($totalPage);
    }

    public function store(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(int $id, array $data)
    {
        $entity = $this->findById($id);
        return $entity->update($data);
    }

    public function delete($id)
    {
        return $entity = $this->findById($id)->delete();
    }

    public function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NotEntityDefined;
        }

        return app($this->entity());
    }
}   
