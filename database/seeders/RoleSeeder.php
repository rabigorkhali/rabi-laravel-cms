<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superUser = Role::where('id', 1)->first();
        if (! isset($superUser)) {
            Role::create([
                'name' => 'superuser',
            ]);
        }
    }
}
