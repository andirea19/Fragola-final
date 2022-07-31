<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeedPivot extends Seeder
{
    /**
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            
            1 => [
                'permissions' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
            ],
            2 => [
                'permissions' => [1],
            ],

        ];

//Verbindung zwischen Rolle und Permission aufbauen - mit foreach-Schleife werden die Permissions zu den Rollen hinzugefügt        

        foreach ($permissions as $id => $permission) {
            $role = Role::find($id);

            foreach ($permission as $key => $ids) {
                $role->{$key}()->sync($ids);
            }
        }
    }
}
