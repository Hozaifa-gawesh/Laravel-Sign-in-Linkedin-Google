<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
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
                'path' => 'settings',
                'name' => 'read-settings',
                'display_name' => 'Read Settings',
                'description' => 'عرض الإعدادات',
            ],

            [
                'path' => 'settings',
                'name' => 'update-settings',
                'display_name' => 'Update Settings',
                'description' => 'تعديل الإعدادات',
            ],


            [
                'path' => 'roles',
                'name' => 'read-roles',
                'display_name' => 'Read Roles',
                'description' => 'عرض الأدوار',
            ],
            [
                'path' => 'roles',
                'name' => 'update-roles',
                'display_name' => 'Update Roles',
                'description' => 'تعديل الأدوار',
            ],
            [
                'path' => 'roles',
                'name' => 'create-roles',
                'display_name' => 'Create Roles',
                'description' => 'إضافة الأدوار',
            ],
            [
                'path' => 'roles',
                'name' => 'delete-roles',
                'display_name' => 'Delete Roles',
                'description' => 'مسح الأدوار',
            ],



            [
                'path' => 'admins',
                'name' => 'read-admins',
                'display_name' => 'Read Admins',
                'description' => 'عرض المشرفين',
            ],
            [
                'path' => 'admins',
                'name' => 'update-admins',
                'display_name' => 'Update Admins',
                'description' => 'تعديل المشرفين',
            ],
            [
                'path' => 'admins',
                'name' => 'create-admins',
                'display_name' => 'Create Admins',
                'description' => 'إضافة المشرفين',
            ],
            [
                'path' => 'admins',
                'name' => 'delete-admins',
                'display_name' => 'Delete Admins',
                'description' => 'مسح المشرفين',
            ],



            [
                'path' => 'users',
                'name' => 'read-users',
                'display_name' => 'Read Users',
                'description' => 'عرض المستخدمين',
            ],
            [
                'path' => 'users',
                'name' => 'delete-users',
                'display_name' => 'Delete Users',
                'description' => 'مسح المستخدمين',
            ],
        ];


        foreach ($data as $get)
        {
            Permission::updateOrCreate($get);
        }

    }
}
