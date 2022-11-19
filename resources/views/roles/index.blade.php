@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
                            <span  class="text-muted mt-1 tx-13 mr-2 mb-0">الرئيسية</span><h4  class="content-title mb-0 my-auto">/ الصلاحيات</h4>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!--Row-->
				<div class="row row-sm">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">جدول الصلاحيات</h4>


                                    <div class="pull-left">
                                        @can('اضافة صلاحية')
                                        <a class="btn btn-success" href="{{ route('roles.create') }}"> انشاء صلاحية جديدة</a>
                                        @endcan
                                    </div>
								</div>
							</div>
                            <div class="col-5">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                            </div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>
											<tr>

												<th class="wd-lg-8p"><h3>رقم الصلاحية</h3></th>
												<th class="wd-lg-8p"><h3>اسم الصلاحية</h3></th>
												<th class="wd-lg-8p"><h3>العمليات</h3></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												@foreach ($roles as $key => $role)<tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $role->name }}</td>
												<td>
													<a href="{{ route('roles.show',$role->id) }}" class="btn btn-sm btn-primary">
														<i class="las la-search"></i>
													</a>
                                                    @can('تعديل صلاحية')
													<a href="{{ route('roles.edit',$role->id) }}" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
                                                    @endcan
                                                    @can('حذف صلاحية')
													<a href="{{ route('roles.delete', $role->id) }}" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
                                                    @endcan

												</td>
											</tr>
                                            @endforeach
										</tbody>
									</table>

								</div>

							</div>
						</div>
					</div><!-- COL END -->
				</div>
				<!-- row closed  -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection


{{--  {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!} --}}
