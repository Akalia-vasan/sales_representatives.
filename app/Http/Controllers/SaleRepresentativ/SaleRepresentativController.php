<?php

namespace App\Http\Controllers\SaleRepresentativ;

use App\Http\Controllers\Controller;

use App\Http\Responses\ViewResponse;
use App\Models\SaleRepresentativ;
use App\Repositories\Admin\User\RepresentativRepository;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ManageRepresentativRequest;
use App\Http\Requests\RepresentativUpdateRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
class SaleRepresentativController extends Controller
{
    
    protected $repository;


    public function __construct(RepresentativRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['users']);
    }


    
    public function index()
    {
        return new ViewResponse('admin.representativ.index');
    }

    public function create()
    {
        return view('admin.representativ.create');
    }

    public function store(ManageRepresentativRequest $request)
    {
    
        return redirect()->route('admin.auth.representativ.index')
                        ->with('success','Representativ created successfully');
    }

    public function edit(SaleRepresentativ $representativ)
    {
        return view('admin.representativ.edit')
        ->withUser($representativ);
    }

    public function update(RepresentativUpdateRequest $request, SaleRepresentativ $representativ)
    {
        
    
        return redirect()->route('admin.auth.representativ.index')
                        ->with('success','Representativ updated successfully');
    }

    public function destroy(SaleRepresentativ $representativ)
    {
        $representativ->delete();
        return redirect()->route('admin.auth.representativ.index')
                        ->with('success','Representativ deleted successfully');
    }

    public function show(SaleRepresentativ $representativ)
    {
        return view('admin.representativ.show')
        ->withUser($representativ);
    }
}