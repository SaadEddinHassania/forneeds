<?php

use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Area::class, 10)->create()->each(function ($s) {
            $s->save();
            factory(App\Models\City::class, 10)->create(['area_id' => $s->id])->each(function ($c) {
                $c->save();
                factory(App\Models\District::class, 10)->create(['city_id' => $c->id])->each(function ($d) {
                    $d->save();
                    factory(App\Models\Street::class, 10)->create(['district_id' => $d->id])->each(function ($t) {
                        $t->save();
                    });
                });
            });
        });


//        factory(App\Models\Area::class, 10)->create()
//            ->each(function ($A) {
//                $A->save();
//                $c = factory(App\Models\City::class)
//                    ->create(['area_id' => $A->id])
//                    ->each(function ($C) {
//                        $C->districts()->save(
//                            $d = factory(App\Models\District::class)
//                                ->create(['city_id' => $C->id])
//                                ->each(function ($D) {
//                                    $D->streets()->save(
//                                        $s = factory(App\Models\Street::class)
//                                            ->create(['district_id' => $D->id]));
//                                    return $s;
//                                }));
//                        return $d;
//                    });
//                return $c;
//            });
    }
}


