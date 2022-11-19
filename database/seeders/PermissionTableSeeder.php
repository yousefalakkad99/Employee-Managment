<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'لوحة التحكم',
            'الاقسام',
            'استعلام قسم',
            'تعديل قسم',
            'حذف قسم',
            'اضافة قسم',
            'الموظفين',
            'استعلام الموظفين',
            'تعديل موظف',
            'حذف موظف',
            'اضافة موظف',
            'الصلاحيات',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',
            'تعديل حساب',
            'حذف حساب',
            'المستخدمين',
            'استعلام المستخدمين',
            'اضافة مستخدم'


        ];
            foreach ($permissions as $permission)
            {
                Permission::create(['name' => $permission]);
            }
        }
    }

