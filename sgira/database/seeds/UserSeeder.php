<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@admin.com.br',
            'password' => bcrypt('123456'),
        ], [
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'password' => bcrypt('123456'),
            'is_admin' => 1,
        ]);
    }
}
