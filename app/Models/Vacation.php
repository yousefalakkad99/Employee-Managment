<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Vacation extends Model
{
    use HasFactory;
    protected $table='vacation';
    protected $fillable = [
        'id',
        'Svac',
        'Evac',
        'employee_id',
        'created_at',
        'updated_at'

    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function employess()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
       


    }

}
