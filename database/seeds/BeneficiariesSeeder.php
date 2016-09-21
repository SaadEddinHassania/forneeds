<?php

use Illuminate\Database\Seeder;

class BeneficiariesSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Beneficiary::class, 10)->create()->each(function($s) {
            $s->save();
        });
    }
}
