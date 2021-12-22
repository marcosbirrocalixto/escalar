<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $repository;    

    public function __construct(Categoria $categoria) 
    {
        $this->repository = $categoria;

        //$this->middleware(['can:plan']);
    }

    public function index() 
    {
        $categorias = $this->repository->orderBy('name')->paginate();

        return view('admin.pages.categorias.index', [
            'categorias' => $categorias            
        ]);
    }

    public function create()
    {
        return view('admin.pages.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\storeUpdateCategoria  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoria $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('categorias.index')
            ->with('message', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$categoria = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$categoria = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.categorias.edit', compact('categoria'));
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\storeUpdateCategoria  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoria $request, $id)
    {
        if (!$categoria = $this->repository->find($id)) {
            return redirect()->back();
        }

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('message', 'Registro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$categoria = $this->repository->find($id)) {
            return redirect()->back();
        }

        $categoria->delete();

        return redirect()->route('categorias.index');
    }


    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $categorias = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                    
                                }
                            })
                            ->orderBy('name')
                            ->paginate();

        return view('admin.pages.categorias.index', compact('categorias', 'filters'));
    }
}
