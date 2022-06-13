<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateTeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'tono',
            'email'     => 'tono@gmail.com',
            'password'  => bcrypt('teknisi12345'),
        ]);

        $role = Role::where('name', 'teknisi')->first();

        $role->givePermissionTo([
            'menu-data-list',
            'list-pelanggan'
        ]);

        $user->assignRole([$role->id]);
    }
}
