<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'tuannguyensn2001';
        $user->email = 'devpro2001@gmail.com';
        $user->password = Hash::make('java2001');
        $user->save();

        $user = new User();
        $user->name="namnguyenly2k1";
        $user->email = 'namnguyenly2k1@gmail.com';
        $user->password = Hash::make('nvn120901');
        $user->save();


    }
}
