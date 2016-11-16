<?php

use App\Repositories\StateRepository;
use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{

    public function __construct(StateRepository $state)
    {
        $this->state = $state;
    }

    public function run()
    {
        $this->state->create(['name' => "En revision"]);
        $this->state->create(['name' => "Activo"]);
        $this->state->create(['name' => "Inactivo"]);
    }
}
