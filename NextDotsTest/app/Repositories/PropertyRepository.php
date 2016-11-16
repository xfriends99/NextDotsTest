<?php

namespace App\Repositories;

use App\Property;

class PropertyRepository extends AbstractRepository
{
    function __construct(Property $model)
    {
        $this->model = $model;
    }

    public function createRow(Array $data = [])
    {
        $property = $this->create($data);
        if($property && isset($data['facility'])) {
            $this->createFacilities($property, $data['facility']);
        }
        return $property;
    }

    public function updateRow(Property $model, Array $data = [])
    {
        $update = $model->update($data);
        if($model && isset($data['facility'])) {
            $this->removeAllFacilities($model);
            $this->createFacilities($model, $data['facility']);
        }
        return $update;
    }

    public function deleteRow(Property $model)
    {
        $this->removeAllFacilities($model);
        return $model->delete($model->id);
    }

    public function removeAllFacilities(Property $model)
    {
        $model->facilities()->detach($this->getIdProperties($model));
    }

    public function createFacilities(Property $model, $facilities)
    {
        foreach($facilities as $facility) {
            $model->facilities()->attach($model->id, ['facility_id' => $facility]);
        }
    }

    public function getIdProperties(Property $model)
    {
        $data = [];
        foreach($model->facilities as $facility){
            $data[] = $facility->id;
        }
        return $data;
    }

    public function search(array $filters = [])
    {
        $query = $this->model
            ->distinct()
            ->select('properties.*');
            //->join('modelos', 'brands.id', '=', 'modelos.brand_id');

        return $query->orderBy('properties.created_at', 'desc');
    }
}