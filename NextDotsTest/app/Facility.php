<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';

    protected $fillable = ['name'];

    public function properties()
    {
        return $this->belongsToMany(Property::class,'property_facility')
            ->withPivot('facility_id')->withTimestamps();
    }
}
