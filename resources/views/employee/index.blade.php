@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<span  class="text-muted mt-1 tx-13 mr-2 mb-0">الرئيسية</span><h4  class="content-title mb-0 my-auto">/ الموظفين</h4>
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
									<h4 class="card-title mg-b-0">جدول الموظفين</h4>
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
                                <div class="card-body pb-0 col-md-4">

                                    <form action="{{ route('employee.index') }}" method="GET">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="query" placeholder="ابحث هنا....." value="{{ request()->input('query') }}">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary" style="width:20px; height:38px;"><i class="las la-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
								<div class="table-responsive border-top userlist-table">

									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>
											<tr>
												<th class="wd-lg-5p"><h4>#</h4></th>
                                                <th class="wd-lg-1p"><h3>صورة شخصية</h3></th>
												<th class="wd-lg-1p"><h3>الاسم الكامل</h3></th>
                                                <th class="wd-lg-1p"><h3>الرتبة</h3></th>
												<th class="wd-lg-1p"><h3>رقم القسم</h3></th>
                                                <th class="wd-lg-1p"><h3>الحالة</h3></th>
												<th class="wd-lg-1p"><h3>العمليات</h3></th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($employee as $employees)

                                        

											<tr>
                                                <td>{{ ++$i }}</td>
                                                <td><img  class="rounded-circle avatar-md mr-2" src="{{ url('img/employee/image/'.$employees->image) }}"></td>
                                                <td><h5>{{ $employees->full_name }}</h5></td>
                                                <td><h5>{{ $employees->grade }}</h5></td>
                                                <td><h5>{{ $employees->department->department_code }}</h5></td>
                                                @if ($employees->status == 'في العمل')
                                                <td><span  style="font-size: 150%" class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>{{ $employees->status }}</span></td>
                                                @else
                                                <td><span style="font-size: 150%" class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div>{{ $employees->status }}</span></td>
                                                @endif
                                                {{-- <td><h5>{{ $employees->status }}</h5></td> --}}



												<td>
													<a href="{{ route('employee.show',$employees->id) }}" class="btn btn-sm btn-info">
														<i class="las la-eye"></i>
													</a>

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
