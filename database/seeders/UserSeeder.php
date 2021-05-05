<?php

namespace Database\Seeders;



use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Faker\Provider\Address;
use Faker\Provider\Person;
use Faker\Provider\Text;
use Faker\Provider\zh_CN\PhoneNumber;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        User::factory()
            ->count(100)
            ->create();

        $faker = Factory::create();

        for($i = 1; $i <= 102; ++$i){
            DB::table('profiles')
                ->insert([
                    'user_id' => $i,
                    'fullname' => $faker->name ,
                    'media_id' => 1,
                    'address' => $faker->address,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
        }


    }
}
