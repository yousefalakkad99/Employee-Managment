@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
                            <span  class="text-muted mt-1 tx-13 mr-2 mb-0">الرئيسية/الصلاحيات</span><h4  class="content-title mb-0 my-auto">/ اضافة</h4>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <h2> انشاء صلاحية جديدة</h2>
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>عذرا!</strong> يوجد خطا في المدخلات.<br><br><ul>
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group"><strong>اسم الصلاحية:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>اختر صلاحية:</strong>
                            <br/>
                            @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}
                            </label>
                            <!-- Default indeterminate -->



                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">انشاء</button>
                    </div>
                </div>
                {!! Form::close() !!}
                <p class="text-center text-primary">

                </p>

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

@endsection
@section('js')
@endsection
