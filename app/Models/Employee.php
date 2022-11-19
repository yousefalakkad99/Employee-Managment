<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\attachments;
use App\Models\Vacation;

class Employee extends Model
{
    use HasFactory;
    protected $table='employees';
    protected $fillable = [
        'id',
        'full_name',
        'phone_number',
        'empno',
        'dept_code_id',
        'grade',
        'appointment',
        'appointment_photo',
        'Identification_Number',
        'Identification_Photo',
        'promotion',
        'promotion_photo',
        'Academic_qualification',
        'Academic_qualification_photo',
        'courses',
        'Certificates_photo',
        'image',
        'status',
        'created_at',
        'updated_at',


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

        'Certificates_photo'=>'array'

    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'dept_code_id','id');


    }

    public function attachments()
    {
        return $this->hasOne(attachments::class,'employee_id','id');


    }

    public function vacations()
    {
        return $this->hasOne(Vacation::class,'employee_id','id');



    }
}
