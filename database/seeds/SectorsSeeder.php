<?php

use Illuminate\Database\Seeder;

class SectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Sector::class, 10)->create()->each(function($s) {
            $s->serviceTypes()->save(factory(App\Models\ServiceType::class)->make());
        });
    }
}
