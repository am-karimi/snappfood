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
                'name'=>'Super Admin',
                'email'=>'superAdmin@maktab.ir',
                'phone'=>'091212345678',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('superAdmin');

        User::factory()->create(
            [
                'name'=>'Admin',
                'email'=>'admin@maktab.ir',
                'phone'=>'091212345671',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('admin');

        User::factory()->create(
            [
                'name'=>'buyer1',
                'email'=>'buyer1@maktab.ir',
                'phone'=>'091212345673',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('user');


        User::factory()->create(
            [
                'name'=>'buyer2',
                'email'=>'buyer2@maktab.ir',
                'phone'=>'091212345674',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('user');

        User::factory()->create(
            [
                'name'=>'buyer3',
                'email'=>'buyer3@maktab.ir',
                'phone'=>'091212345675',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('user');

        User::factory()->create(
            [
                'name'=>'buyer4',
                'email'=>'buyer4@maktab.ir',
                'phone'=>'091212345676',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('user');

        User::factory()->create(
            [
                'name'=>'buyer5',
                'email'=>'buyer5@maktab.ir',
                'phone'=>'091212345677',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('user');

        User::factory()->create(
            [
                'name'=>'buyer6',
                'email'=>'buyer6@maktab.ir',
                'phone'=>'091212345679',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('user');

        User::factory()->create(
            [
                'name'=>'seller1',
                'email'=>'seller1@maktab.ir',
                'phone'=>'091212345672',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('seller');

        User::factory()->create(
            [
                'name'=>'seller2',
                'email'=>'seller2@maktab.ir',
                'phone'=>'091212345673',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('seller');

        User::factory()->create(
            [
                'name'=>'seller3',
                'email'=>'seller3@maktab.ir',
                'phone'=>'091212345680',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('seller');

        User::factory()->create(
            [
                'name'=>'seller4',
                'email'=>'seller4@maktab.ir',
                'phone'=>'091212345681',
                'status'=>1,
                'password'=>bcrypt('12345678')
            ])
            ->assignRole('seller');
//        New tyoe

//        DB::table('users')->insert(
//            [
//                'name'=>'xxxx',
//                'email'=>'xx@gmail.com'
//            ]
//        );
    }
}
