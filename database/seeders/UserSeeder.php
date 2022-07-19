<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(
            [
                'name'=>'Amir Karimi',
                'email'=>'maktab@iwpco.ir',
                'passwor'=>bcrypt('12345678')
            ])
            ->assignRole('superAdmin');

        User::factory()->create(
            [
                'name'=>'Mohammad Karimi',
                'email'=>'mamad@iwpco.ir',
                'passwor'=>bcrypt('12345678')
            ])
            ->assignRole('admin');

        User::factory()->create(
            [
                'name'=>'Rasoul Madani',
                'email'=>'rasoul@iwpco.ir',
                'passwor'=>bcrypt('12345678')
            ])
            ->assignRole('seller');

        User::factory()->create(
            [
                'name'=>'Melli Nazari',
                'email'=>'melli@iwpco.ir',
                'passwor'=>bcrypt('12345678')
            ])
            ->assignRole('user');

//        New tyoe

//        DB::table('users')->insert(
//            [
//                'name'=>'xxxx',
//                'email'=>'xx@gmail.com'
//            ]
//        );
    }
}
