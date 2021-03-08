<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = '1';
        $user->name = 'Zurak';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

    }
}
