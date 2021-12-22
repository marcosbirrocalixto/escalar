<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Produto;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ProdutoRepositoryInterface;

class EloquentProdutoRepository extends BaseEloquentRepository implements ProdutoRepositoryInterface
{
    public function entity()
    {
        return Produto::class;
    }
}