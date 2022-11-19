@extends('layouts.master')
@section('css')
<!--Internal  Nice-select css  -->
<style>
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
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
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body h-100">
								<div class="row row-sm ">
                                    <div class="details col-xl-12 col-lg-7 col-md-7 mt-4 mt-xl-0">
                                        <div class="billed-from">
                                            <div class="row mg-t-20">
                                                <div class="col-md">
                                                    <div class="billed-to">

                                                        <p class="invoice-info-row"><h3>الاسم الكامل : <span>{{ $employee->full_name }}</span></h3></p>
                                                        <p class="invoice-info-row"><h3>الرتبة : <span>{{ $employee->grade }}</span></h3></p>
                                                        <p class="invoice-info-row"><h3>القسم : <span>{{ $employee->department->department_name }}</span></h3></p>
                                                        <p class="invoice-info-row"><h3>رقم القسم : <span>{{ $employee->department->department_code }}</span></h3></p>
                                                        <p class="invoice-info-row"><h3>المؤهل العلمي : <span>{{ $employee->Academic_qualification }}</span></h3></p>
                                                        <p class="invoice-info-row"><h3>الدورات : <span>{{ $employee->courses }}</span></h3></p>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <p class="invoice-info-row"><h3>رقم الهاتف : <span>{{ $employee->phone_number }}</span></h3></p>
                                                    <p class="invoice-info-row"><h3>رقم الهوية : <span>{{ $employee->Identification_Number }}</span></h3></p>
                                                    <p class="invoice-info-row"><h3>الرقم الوظيفي : <span>{{ $employee->empno }}</span></h3></p>
                                                    <p class="invoice-info-row"><h3>تاريخ التعيين : <span>{{ $employee->appointment }}</span></h3></p>
                                                    <p class="invoice-info-row"><h3>اخر تاريخ ترقية : <span>{{ $employee->promotion }}</span></h3></p>

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
                                        </div>
										<div class="action" >
                                            <br>
                                            @can('تعديل موظف')
                                            	<a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-sm btn-info">تعديل
														<i class="las la-pen"></i>
													</a>
                                                    @endcan
                                                    @can('حذف موظف')
													<a href="{{ route('employee.delete',$employee->id) }}" class="btn btn-sm btn-danger">حذف
														<i class="las la-trash"></i>
													</a>
                                                    @endcan
                                                    <a href="{{  route('print',$employee->id) }}" class="btn btn-sm btn-secondary">طباعة
														<i class="las la-print"></i>
													</a>
                                                    @if ($employee->vacations == Null)
                                                    <a href="#" id="AddVac" class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#AddVac">منح اجازة
														<i class="las la-bed"></i>
													</a>

                                                    @else
                                                    <a href="#" id="VacMessage" class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#VacMessage">
                                                        <i class="las la-bed"></i>منح اجازة</a>

                                                    @endif

                                                      @if(Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('success')}}
                                        </div>
                                        @elseif(Session::has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{Session::get('error')}}
                                        </div>
                                        @elseif(Session::has('Empty'))
                                        <div class="alert alert-warning" role="alert">
                                            {{Session::get('Empty')}}
                                        </div>
                                        @endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
                <div class="col-sm-15 col-md-15 col-lg-15 col-xl-15 grid-margin">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h1>المرفقات</h1>
                                    @if(Session::has('AT_success'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('AT_success')}}
                                    </div>
                                    @elseif(Session::has('AT_error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('AT_error')}}
                                    </div>
                                    @endif
                            </div>

                        </div>
                        <div class="card-body">

                            <a href="#" id="attachmint" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddAtachmintModal">
                                <i class="las la-plus"></i></a>
                        </div>
                            <div class="table-responsive border-top userlist-table">
                                <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th class="wd-lg-10p"><h3>#</h3></th>
                                            <th class="wd-lg-10p"><h3>اسم الملف</h3></th>
                                            <th class="wd-lg-10p"><h3>نوع الملف</h3></th>
                                            <th class="wd-lg-10p"><h3>منشأ بواسطة</h3></th>
                                            <th class="wd-lg-10p"><h3>العمليات</h3></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $attachmint as $att )
                                        <tr>
                                            <td>
                                                {{ ++$i }}
                                            </td>
                                            <td>
                                                <a href="{{ url('img/employee/attachmints/'.$att->file)}}" >
                                                   <h3> {{ $att->file }}</h3>
                                                </a>
                                            </td>
                                            <td><h3>{{ $att->type }}</h3></td>
                                            <td>
                                                <h3> {{ $att->originated_by }}</h3>
                                            </td>
                                            <td>
                                                <a href="{{ route('attachmint.del',$att->id) }}" class="btn btn-sm btn-danger">
                                                    <i class="las la-trash"></i>
                                                </a>
                                                <a href="{{ route('download.file',$att->file) }}" class="btn btn-sm btn-dark">
                                                    <i class="las la-download"></i>
                                                </a>
                                                 @if ($att->type == 'png'||$att->type == 'jpg'||$att->type == 'jpeg'||$att->type == 'gif')
                                                <a href="{{ route('show.file',$att->id) }}" class="btn btn-sm btn-info">
                                                    <i class="las la-eye"></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>

                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
        <div class="modal" tabindex="-1" id="AddAtachmintModal">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">اضافة ملف</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  action="{{ route('attachmint.add', $employee->id)}}"  method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                 <input type="file" name="attachmints" required/>
                 @error('attachmints')
                 <div class="alert alert-danger" role="alert">
                     {{$message}}
                 </div>
                 @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                  <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                </form>
                </div>
              </div>
            </div>
          </div>


{{-- modal show --}}
<div class="modal" tabindex="-1" id="modelVacMessage">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">يوجد اجازة بالفعل</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            @if ($employee->vacations != null)
            <h3>الاجازة تبدأ بتاريخ {{ $employee->vacations->Svac }}</h3>
            <h3>وتنتهي بتاريخ{{ $employee->vacations->Evac }}</h3>
            @endif
        </div>
        <div class="modal-footer">

          <button type="button" id="closeVacmessgae" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
        </div>
      </div>
    </div>
  </div>

  {{-- -------------------------- --}}
<div class="modal" tabindex="-1" id="modelAddVac">
   <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">منح أجازة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container text-right">
                <div >
                  <div class="col-lg-15">
                    <form action="{{ route('vacations', $employee->id)}}" method="post" class="row">
                        @csrf
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="input_from"><h3>بداية الاجازة</h3></label>
                            <input type="date" class="form-control" min="2022/8/19" name="Svac" required  >
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="input_to"><h3>نهاية الاجازة</h3></label>
                            <input type="date" class="form-control" name="Evac" style="width: 150%" required >
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">منح</button>
                    <button type="button" id="closeAddVac" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

        </div>

    </div>
   </div>
</div>

@endsection
@section('js')

<script>
    var span = document.getElementById("close");
    var modal = document.getElementById("AddAtachmintModal");
    var btn = document.getElementById("attachmint");
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
</script>


<script>

var spanAddVac = document.getElementById("closeAddVac");
    var modalAddVac = document.getElementById("modelAddVac");
    var btnAddVac = document.getElementById("AddVac");
    btnAddVac.onclick = function() {
        modalAddVac.style.display = "block";
}
spanAddVac.onclick = function() {
    modalAddVac.style.display = "none";
}

</script>



<script>
    var spanVac = document.getElementById("closeVacmessgae");
    var modalVac = document.getElementById("modelVacMessage");
    var btnVac = document.getElementById("VacMessage");
    btnVac.onclick = function() {
    modalVac.style.display = "block";
}
spanVac.onclick = function() {
    modalVac.style.display = "none";
}

</script>

{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}

<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
