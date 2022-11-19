@extends('layouts.master')
@section('css')
@endsection
@section('page-header')

@endsection
@section('content')
				<!-- row -->
                        <div class="card card-4">
                            <div class="card-body"  style="background-color:whitesmoke">
                                <h1>تعديل القسم</h1>
                                <br>
                                <br>

                                <form action="{{route('update.department',$Departments->id)}}" method="post">
                                    @csrf
                                    <div class="row row-space">
                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>اسم القسم</h4></label>
                                                <input class="input--style-4" type="text" name="department_name" value="{{$Departments->department_name}}">
                                                @error('department_name')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-5">
                                            <div class="input-group">
                                                <label class="label"><h4>رقم القسم</h4></label>
                                                <input class="input--style-4" type="text" name="department_code" value="{{$Departments->department_code}}">
                                                @error('department_code')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-t-15">
                                        <button class="btn btn--radius-2 btn--blue" type="submit">تعديل</button>
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
