<?php

use Illuminate\Database\Seeder;

class ServiceProviderTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Models\ServiceProviderType::class, 10)->create()->each(function($s) {
            $s->save();
        });
    }
}
