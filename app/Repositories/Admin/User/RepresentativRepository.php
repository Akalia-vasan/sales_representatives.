<?php

namespace App\Repositories\Admin\User;
use App\Models\SaleRepresentativ;

use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class RepresentativRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = SaleRepresentativ::class;

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false)
    {
        $dataTableQuery = $this->query()
            ->select([
                'id',
                'name',
                'email',
                'telephone',
                'routes',
            ]);

        return $dataTableQuery;
    }


    public function retrieveData(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }
}
