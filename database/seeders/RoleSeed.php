<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /** Role Seed macht
     * - Erstellt eine neue Rolle
     * - Bearbeitet eine vorhandene Rolle
     * 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'admin',
            ],
            [
                'id'    => 2,
                'title' => 'user',
            ],
        ];

        Role::insert($roles);
    }
}
