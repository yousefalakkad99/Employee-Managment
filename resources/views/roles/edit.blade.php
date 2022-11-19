@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
                            <span  class="text-muted mt-1 tx-13 mr-2 mb-0">الرئيسية/الصلاحيات</span><h4  class="content-title mb-0 my-auto">/ تعديل</h4>
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
                            <h2> تعديل الصلاحية</h2>
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>عذزا!</strong>يوجد خطأ في المدخلات<br>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>
                        @endif{!! Form::model($role, ['method' => 'post','route' => ['roles.update', $role->id]]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group"><strong>اسم الصلاحية:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>الصلاحيات:</strong>
                                    <br/>
                                    @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                        {{ $value->name }}
                                    </label>

                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">تحديث</button>
                            </div>
                        </div>
                        {!! Form::close() !!}<p class="text-center text-primary">


                <!-- Static Table End -->
                </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
