<?php

namespace App\Repositories;

use App\Facility;

class FacilityRepository extends AbstractRepository
{
    function __construct(Facility $model)
    {
        $this->model = $model;
    }

    public function search(array $filters = [])
    {
        $query = $this->model
            ->distinct()
            ->select('facilities.*');

        return $query->orderBy('facilities.created_at', 'desc');
    }
}