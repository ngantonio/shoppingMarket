<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Creando nuevo usuario   
        User::create([

            'name' => "Gabriel Antonio",
            'email' => "oliveiragabr@outlook.com",
            'password' => bcrypt("060297"),
            'admin' => true
        ]);
    }
}
