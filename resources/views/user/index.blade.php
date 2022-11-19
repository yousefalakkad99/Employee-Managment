@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<span  class="text-muted mt-1 tx-13 mr-2 mb-0">الرئيسية</span><h4  class="content-title mb-0 my-auto">/ المستخدمين</h4>
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
									<h4 class="card-title mg-b-0">جدول المستخدمين</h4>
                                    @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('success')}}
                                    </div>
                                    @elseif(Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('error')}}
                                    </div>
                                    @endif

								</div>

							</div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>
											<tr>
												<th class="wd-lg-8p"><span><h3>صورة شخصية</h3></span></th>
												<th class="wd-lg-20p"><span><h3>اسم المستخدم</h3></span></th>
												<th class="wd-lg-20p"><span><h3>صلاحية المستخدم</h3></span></th>
												<th class="wd-lg-20p"><span><h3>البريد الالكتروني</h3></span></th>
												<th class="wd-lg-20p"><h3>العمليات</h3></th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($user as $users)
											<tr>
												<td>
													<img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{ url('img/user/image/'.$users->image) }}">
												</td>
												<td>{{ $users->username }}</td>

												<td class="text-center">
													<span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>
                                                        @foreach($users->getRoleNames() as $v)
                                                        {{ $v }}

                                                      @endforeach


                                                    </span>
												</td>
												<td>
													<a href="#">{{ $users->email }}</a>
												</td>
												<td>

                                                    @can('تعديل حساب')
													<a href="{{ route('user.edit',$users->id) }}" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
                                                    @endcan
                                                    @can('حذف حساب')
													<a href="{{ route('user.delete',$users->id) }}" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
                                                    @endcan
												</td>
											</tr>

										</tbody>
                                        @endforeach
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
