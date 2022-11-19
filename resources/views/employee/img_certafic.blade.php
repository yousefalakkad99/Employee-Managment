@extends('layouts.master')
@section('css')
<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
                            <span  class="text-muted mt-1 tx-13 mr-2 mb-0">الرئيسية/الموظفين</span><h4  class="content-title mb-0 my-auto">/ استعلام موظف</h4>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<!-- row -->

                <div class="row">
                        <div class="col-lg-8">
                            <div class="card item-card">
                                <div class="card-body pb-0 h-100">
                                    <div class="text-center">
                                        <img src="{{ url('img/employee/attachmints/'.$attachments->file)}}" alt="img" class="img-fluid" width="65%" height="75%">


                                    </div>
                                </div>
                                <div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
                                    <a>
                                        {{ $attachments->file }}
                                         </a>
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
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
