<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',100);
            $table->string('phone_number',100);
            $table->string('empno',100);
            $table->unsignedBigInteger('dept_code_id');
            $table->string('grade',100);
            $table->date('appointment');
            $table->string('Identification_Number',225)->unique();
            $table->date('promotion');
            $table->string('Academic_qualification',100);
            $table->string('courses',100)->nullable();
            $table->string('image',500)->nullable();
            $table->string('status')->default('في العمل');
            $table->timestamps();
            $table->foreign('dept_code_id')->references('id')->on('department')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
