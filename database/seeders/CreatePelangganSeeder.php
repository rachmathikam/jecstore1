<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreatePelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'hikam',
            'email'     => 'hikam@gmail.com',
            'password'  => bcrypt('hikam123'),
        ]);

        $role = Role::where('name', 'pelanggan')->first();

        $role->givePermissionTo([
           'user-permission',
           'pelanggan',
        ]);

        $user->assignRole([$role->id]);
    }
}
