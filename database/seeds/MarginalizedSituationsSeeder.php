<?php

use Illuminate\Database\Seeder;

class MarginalizedSituationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MarginalizedSituation::class, 10)->create()->each(function ($s, $i) {
            if ($i == 0) {
                $s->name = "none marginalized";
                }
            $s->save();
        });
    }
}
