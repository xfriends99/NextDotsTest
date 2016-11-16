<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

    protected $fillable = ['title','description','address','town','country','state_id'];

    public function facilities()
    {
        return $this->belongsToMany(Facility::class,'property_facility')
            ->withPivot('property_id')->withTimestamps();
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
