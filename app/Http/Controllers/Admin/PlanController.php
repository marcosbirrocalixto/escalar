<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanRequest;
use App\Models\Categoria;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;
    

    public function __construct(Plan $plan, Categoria $categoria) 
    {
        $this->plan = $plan;
        $this->categoria = $categoria;
    }

    public function index() 
    {
        $plans = $this->plan->orderBy('name')->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans            
        ]);
    }

    public function create() 
    {
        $plans = $this->categoria->orderBy('name')->paginate();

        return view('admin.pages.plans.create', [
            'plans' => $plans
        ]);
    }

    public function store(StoreUpdatePlanRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('plans.index')
            ->with('message', 'Registro cadastrado com sucesso!');
    }

    public function show($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function delete($id)
    {
        $plan = $this->repository
                ->where('id', $id)
                ->first();

        if (!$plan)
            return redirect()->back();
    
        $plan->delete();

        return redirect()->route('plans.index')
        ->with('message', 'Registro deletado com sucesso!');

    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }


    public function edit($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit', [
            'plan' => $plan,
        ]);
    }

    public function update(StoreUpdatePlanRequest $request, $id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index')
            ->with('message', 'Registro alterado com sucesso!');
    }
}
