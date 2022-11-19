@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
                            <span  class="text-muted mt-1 tx-13 mr-2 mb-0">الرئيسية/الصلاحيات</span><h4  class="content-title mb-0 my-auto">/ عرض الصلاحيات</h4>
						</div>
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
                            <h2> عرض الصلاحيات</h2>
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <br>
                        <div class="form-group">
                            <label class="badge badge-info">
                                <h3> اسم الصلاحية:{{ $role->name }}</h3>
                             </label>

                            <br>
                            @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                            <label class="badge badge-success">
                               <h3> {{ $v->name }},</h3>
                            </label>


                            @endforeach
                            @endif
                        </div>
                    </div>
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
