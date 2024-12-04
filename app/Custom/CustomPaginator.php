<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomPaginator extends LengthAwarePaginator
{

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return Request::isApi() ? [
            'items' => $this->items->toArray(),
            'pagination'    => [
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'from' => $this->firstItem(),
                'to' => $this->lastItem(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
            ],
        ] : parent::toArray();
    }
}
