<?php

namespace App\Repositories;

use App\State;

class StateRepository extends AbstractRepository
{
    function __construct(State $model)
    {
        $this->model = $model;
    }

    public function search(array $filters = [])
    {
        $query = $this->model
            ->distinct()
            ->select('states.*');

        return $query->orderBy('states.created_at', 'desc');
    }
}