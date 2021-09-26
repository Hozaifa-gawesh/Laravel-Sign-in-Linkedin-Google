<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Administration',
                'slug' => 'administration',
            ]
        ];

        foreach ($data as $get)
        {
            Role::updateOrCreate($get);
        }


        // Assign Role To Admins
        $roleUsers = [
            [
                'role_id' => 1,
                'user_id' => 1,
                'user_type' => 'App\Models\Admin',
            ]
        ];

        foreach ($roleUsers as $get)
        {
            DB::table('role_user')->updateOrInsert($get);
        }


        // Assign Role to Permissions
        $role = Role::first();
        if($role) {
            $permissions = DB::table('permissions')->get(['id']);
            foreach ($permissions as $get) {
                $item = [
                    'permission_id' => $get->id,
                    'role_id' => $role->id
                ];
                DB::table('permission_role')->updateOrInsert($item);
            }
        }

    }
}
