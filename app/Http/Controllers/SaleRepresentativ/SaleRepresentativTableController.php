<?php

namespace App\Http\Controllers\SaleRepresentativ;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepresentativRequest;
use App\Repositories\Admin\User\RepresentativRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class SaleRepresentativTableController extends Controller
{
    
    protected $repository;

    public function __construct(RepresentativRepository $repository)
    {
        $this->repository = $repository;
    }

    public function invoke(RepresentativRequest $request)
    {
        return Datatables::make($this->repository->getForDataTable($request->get('status'), $request->get('trashed')))
            ->escapeColumns(['name', 'email'])
            ->addColumn('actions', function ($representativ) {
                return '<a href="'.route('admin.auth.representativ.edit', $representativ).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                <a class="btn btn-secondary btn-sm" id="add-dialog" data-toggle="modal" data-target="#exampleModal"
                data-id="'.$representativ->id.'"
                    data-name="'.$representativ->name.'"
                    data-email="'.$representativ->email.'"
                    data-phone="'.$representativ->telephone.'"
                    data-address="'.$representativ->address.'"
                    data-routes="'.$representativ->routes.'"
                    data-join="'.$representativ->joined_at.'"
                    data-comment="'.$representativ->comments.'">
                    <i class="fa fa-eye" data-toggle="tooltip">
                    </i>
                    </a>
                    <a data-method="delete" href="'.route('admin.auth.representativ.destroy', $representativ).'" class="btn btn-danger btn-sm"
                    ><i class="fa fa-trash"></i></a>';
                
            })
            ->make(true);
    }
}
