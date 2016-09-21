<?php

use Illuminate\Database\Seeder;

class ServiceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ServiceType::class, 10)->create()->each(function($s) {
            $s->save();
        });
    }
}
