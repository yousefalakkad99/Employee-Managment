
 @extends('layouts.master')
 @section('css')
 <style>
     @media print {
         #print_Button {
             display: none;


         }

         #back {
             display: none;


         }
     }
 </style>
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
                            <span  class="text-muted mt-1 tx-13 mr-2 mb-0">الرئيسية/الموظفين</span><h4  class="content-title mb-0 my-auto">/ معاينة الطباعة</h4>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('title')
 معاينه طباعة الموظف
@stop
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-12 col-xl-12">
						<div class=" main-content-body-invoice" id="print">
							<div class="card card-invoice">
								<div class="card-body">
									<div class="invoice-header">
										<h1 class="invoice-title"> طباعة معلومات الموظف</h1>
										<div class="billed-from">

										</div><!-- billed-from -->
									</div><!-- invoice-header -->
									<div class="row mg-t-20">
										<div class="col-md">
											<div class="billed-to">
                                                <p class="invoice-info-row"><h3> الاسم الكامل&nbsp; :<span>&nbsp; {{ $employee->full_name }}</span></h3></p>
                                                <p class="invoice-info-row"><h3>الرتبة&nbsp; :<span>&nbsp; {{ $employee->grade }}</span></h3></p>
                                                <p class="invoice-info-row"><h3>القسم&nbsp; :<span>&nbsp; {{ $employee->department->department_name }}</span></h3></p>
                                                <p class="invoice-info-row"><h3>رقم القسم &nbsp;:<span>&nbsp; {{ $employee->department->department_code }}</span></h3></p>
                                                <p class="invoice-info-row"><h3>المؤهل العلمي&nbsp; :<span>&nbsp; {{ $employee->Academic_qualification }}</span></h3></p>

											</div>
										</div>
										<div class="col-md">
                                            <p class="invoice-info-row"><h3>رقم الهاتف&nbsp; :<span>&nbsp; {{ $employee->phone_number }}</span></h3></p>
                                            <p class="invoice-info-row"><h3>رقم الهوية&nbsp; :<span>&nbsp; {{ $employee->Identification_Number }}</span></h3></p>
                                            <p class="invoice-info-row"><h3>الرقم الوظيفي&nbsp; :<span>&nbsp; {{ $employee->empno }}</span></h3></p>
                                            <p class="invoice-info-row"><h3>تاريخ التعيين&nbsp; :<span>&nbsp; {{ $employee->appointment }}</span></h3></p>
                                            <p class="invoice-info-row"><h3>اخر تاريخ ترقية&nbsp; :<span>&nbsp; {{ $employee->promotion }}</span></h3></p>
                                            <p class="invoice-info-row"><h3>الدورات&nbsp; :<span>&nbsp; {{ $employee->courses }}</span></h3></p>
										</div>
                                        <div class="col-md">
                                            <div class="card item-card">
                                                <div class="card-body pb-0 h-50">
                                                    <div class="text-center">
                                                        <img src="{{ url('img/employee/image/'.$employee->image)}}" alt="img" class="img-fluid" style="width: 50%">
                                                    </div>
                                                </div>
                                                <div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
                                                    <H3>صورة شخصية</H3>
                                                </div>
                                            </div>
                                        </div>
									</div>

									<hr class="mg-b-0">
									<a class="btn btn-purple float-left mt-3 mr-2" id="back" href="{{ route('employee.show',$employee->id) }}">
										<i class="las la-back"></i>رجوع
									</a>
                                    <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                        class="mdi mdi-printer ml-1"></i>طباعة</button>

									</a>

								</div>
							</div>
						</div>
					</div><!-- COL-END -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
@endsection
