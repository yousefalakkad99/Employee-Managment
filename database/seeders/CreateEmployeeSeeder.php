<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Employee::create(
            [
                'full_name'=> 'يوسف العقاد',
                'dept_code_id'=> '1',
                'grade'=> 'مدير',
                'appointment'=> '2022/7/8',
                'appointment_photo'=> '1657909262.jpg',
                'Identification_Number'=> '0234234241',
                'Identification_Photo'=> '1657909548.jpg',
                'promotion'=> '2022/7/8',
                'promotion_photo'=> '1658085898.jpg',
                'Academic_qualification'=> 'دبلوم',
                'Academic_qualification_photo'=> '1657909262.jpg',
                'courses'=> 'لارافيل',
               
            ]);

           }
}
