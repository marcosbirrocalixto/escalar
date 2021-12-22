<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $repository;

    public function __construct(ProdutoRepositoryInterface $repository)
    {
        $this->repository = $repository;

        //$this->middleware(['can:detailPlan']);
    }

    public function index()
    {
        //$details = $plan->details();
        $produtos = $this->repository->with('categoria')->paginate();
        //dd($produtos);

        return view('admin.pages.produtos.index', [
            'produtos'   => $produtos,
        ]);
    }

    public function create()
    {
        $categorias = $this->categoria->orderBy('name')->get();

        return view('admin.pages.produtos.create', [
            'categorias'    => $categorias,
        ]);
    }

    public function store(StoreUpdateProdutoRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('produtos.index')
                        ->with('message', 'Registro inserido com sucesso!');
    }

    public function edit($id)
    {
        $produto = $this->repository->find($id);

        if (!$produto) {
            return redirect()->back();
        };

        return view('admin.pages.produtos.edit', [
            'produto'    => $produto,
        ]);
    }

    public function update(StoreUpdateProdutoRequest $request, $id)
    {
        $produto = $this->repository->find($id);

        if (!$produto) {
            return redirect()->back();
        };

        $produto->update($request->all());

        return redirect()->route('produtos.index')
                        ->with('message', 'Registro alterado com sucesso!');
    }

    public function show($id)
    {
        $produto = $this->repository->find($id);

        if (!$produto) {
            return redirect()->back();
        };

        return view('admin.pages.produtos.show', [
            'produto'    => $produto,
        ]);
    }

    public function delete($id)
    {
        $produto = $this->repository->find($id);

        if (!$produto) {
            return redirect()->back();
        };

        $produto->delete();

        return redirect()->route('produtos.index')
                        ->with('message', 'Registro deletado (SoftDelete) com sucesso!');
    }
}
