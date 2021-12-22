<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Produto;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\Core\BaseEloquentRepository;
use Illuminate\Http\Request;

class EloquentProdutoRepository extends BaseEloquentRepository implements ProdutoRepositoryInterface
{
    public function entity()
    {
        return Produto::class;
    }
}