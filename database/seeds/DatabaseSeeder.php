<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SectorsSeeder::class);
        $this->call(ServiceProviderTypesSeeder::class);
        $this->call(MarginalizedSituationsSeeder::class);
        $this->call(BeneficiariesSeeder::class);
        $this->call(AreasSeeder::class);
    }
}
