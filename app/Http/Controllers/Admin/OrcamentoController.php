<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orcamento;
use Illuminate\Http\Request;

class OrcamentoController extends Controller
{
    private $repository;    

    public function __construct(Orcamento $orcamento) 
    {
        $this->repository = $orcamento;

        //$this->middleware(['can:plan']);
    }

    public function index() 
    {
        $orcamentos = $this->repository->orderBy('licence')->paginate();

        return view('admin.pages.orcamentos.index', [
            'orcamentos' => $orcamentos            
        ]);
    }
}
