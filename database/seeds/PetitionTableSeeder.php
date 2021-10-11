<?php

use Illuminate\Database\Seeder;
use App\Petitionall;
class PetitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Petitionall::truncate();

        Petitionall::create(['name' => 'สวท.01']);
        Petitionall::create(['name' => 'สวท.02']);
        Petitionall::create(['name' => 'สวท.03']);
        Petitionall::create(['name' => 'สวท.04']);
        Petitionall::create(['name' => 'สวท.05']);
        Petitionall::create(['name' => 'สวท.06']);
        Petitionall::create(['name' => 'สวท.07']);
        Petitionall::create(['name' => 'สวท.08']);
        
    }
}
