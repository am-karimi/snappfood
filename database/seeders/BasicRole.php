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
        $admin=Role::create(['name'=>'admin']);
        $superAdmin=Role::create(['name'=>'superAdmin']);
        $seller=Role::create(['name'=>'seller']);

        $superAdmin->givePermissionTo('add discount');
    }
}
