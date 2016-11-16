<?php

use App\Repositories\FacilityRepository;
use Illuminate\Database\Seeder;

class FacilityTableSeeder extends Seeder
{

    public function __construct(FacilityRepository $facility)
    {
        $this->facility = $facility;
    }

    public function run()
    {
        $this->facility->create(['name' => "Edificio con ascensor"]);
        $this->facility->create(['name' => "Piscina"]);
        $this->facility->create(['name' => "Estacionamiento"]);
        $this->facility->create(['name' => "Cocina"]);
        $this->facility->create(['name' => "Aire acondicionado"]);
        $this->facility->create(['name' => "Calefaccion"]);
    }
}
