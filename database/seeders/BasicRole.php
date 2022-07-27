<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class BasicRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin=Role::create(['name'=>'superAdmin']);
        $admin=Role::create(['name'=>'admin']);
        $seller=Role::create(['name'=>'seller']);
        $seller=Role::create(['name'=>'user']);

//        $superAdmin->givePermissionTo('add discount');
    }
}
