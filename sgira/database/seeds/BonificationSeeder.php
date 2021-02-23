<?php

use Illuminate\Database\Seeder;

class BonificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bonification::class, 2)->create();
    }
}
