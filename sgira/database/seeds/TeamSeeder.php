<?php

use Illuminate\Database\Seeder;
use App\User;
class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 50)->create()->each(function ($team) {
            $users = User::where('is_admin',0)->get()->random(8)->pluck('id');
            $team->students()->attach($users);
        });
    }
}
