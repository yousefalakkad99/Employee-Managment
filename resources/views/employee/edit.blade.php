@extends('layouts.master')
@section('css')
@endsection
@section('page-header')

@endsection
@section('content')
				<!-- row -->
                        <div class="card card-4">
                            <div class="card-body"  style="background-color:whitesmoke">
                                <h1>تعديل مستخدم</h1>
                                <br>
                                <br>
                                <form action="{{ route('employee.update',$employee->id) }}" method="post" enctype='multipart/form-data' >
                                    @csrf
                                    <div class="row row-space">
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>الاسم الكامل</h4></label>
                                                <input class="input--style-4" type="text" name="full_name" value="{{ $employee->full_name }}">
                                                @error('full_name')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>الرقم الوظيفي</h4></label>
                                                <input class="input--style-4" type="text" name="empno" value="{{ $employee->empno }}">
                                                @error('empno')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
 {{-- ----------------------------------------------------------------------------------------------------------- --}}
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>الرتبة</h4></label>
                                                <input class="input--style-4" type="text" name="grade" value="{{ $employee->grade }}">
                                                @error('grade')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>رقم الهوية</h4></label>
                                                <input class="input--style-4" type="text" name="Identification_Number" value="{{ $employee->Identification_Number }}">
                                                @error('Identification_Number')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
{{-- ----------------------------------------------------------------------------------------------------------- --}}
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>المؤهل العلمي</h4></label>
                                                <input class="input--style-4" type="text" name="Academic_qualification" value="{{ $employee->Academic_qualification }}">
                                                @error('Academic_qualification')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>رقم الهاتف</h4></label>
                                                <input class="input--style-4" type="text"  name="phone_number" value="{{ $employee->phone_number }}" />
                                                @error('phone_number')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


    {{-- ----------------------------------------------------------------------------------------------------------- --}}
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>تاريخ قرار التعين</h4></label>
                                                <input class="input--style-2" type="date" name="appointment" value="{{ $employee->appointment }}" >
                                                @error('appointment')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>تاريخ اخر ترقية</h4></label>
                                                <input class="input--style-2" type="date" name="promotion" value="{{ $employee->promotion }}">
                                                @error('promotion')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
 {{-- ----------------------------------------------------------------------------------------------------------- --}}
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>الدورات</h4></label>
                                                <textarea class="input--style-4" id="" name="courses" rows="1" cols="40">{{ $employee->courses }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-5">
                                            <label class="label"><h4>صورة شخصية</h4></label>
                                                <input class="input--style-4" type="file" name="image">
                                                @error('image')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

{{-- ----------------------------------------------------------------------------------------------------------- --}}

                                        <div class="col-5">
                                            <div class="input-group">
                                                <select name="dept_code_id" class="input--style-4">
                                                    <option value="{{ $employee->dept_code_id }}">{{ $employee->department->department_code }}</option>
                                                    @foreach($dept as $depts)
                                                    <option value="{{$depts->id}}">{{ $depts->department_code }}</option>
                                                    @endforeach
                                                    </select>
                                                    @error('dept_code_id')
                                                    <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="input-group">
                                                <button class="btn btn--radius-2 btn--blue" type="submit">تعديل</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
				<!-- row closed -->
			<!-- Container closed -->
        <!-- Jquery JS-->
    <script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{URL::asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{URL::asset('vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{URL::asset('vendor/datepicker/daterangepicker.js')}}"></script>
    <!-- Main JS-->
    <script src="{{URL::asset('js/global.js')}}"></script>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection


{{-- --}}
