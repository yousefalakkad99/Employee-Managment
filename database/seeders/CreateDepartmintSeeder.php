<?php

namespace Database\Seeders;
use App\Models\Department;

use Illuminate\Database\Seeder;

class CreateDepartmintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'department_name'=>'engineering',
            'department_code'=>'DPMT-2022'


           ]);
    }
}
