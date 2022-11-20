<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Department extends Model
{
    use HasFactory;
    protected $table='department';
    protected $fillable=[

        'id',
        'department_name',
        'department_code',
        'created_at',
        'updated_at'
    ];
    protected $hidden=[
        'created_at',
        'updated_at',



    ];
    public $incrementing = false;
    protected $keyType = 'string';

    public function users()
    {
        return $this ->hasMany(Employee::class,'dept_code_id','id');


    }
}
