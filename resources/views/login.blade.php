@extends('layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->

				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>مرحبًا بعودتك!</h2>
												<h5 class="font-weight-semibold mb-4">من فضلك سجل دخولك للمتابعة.</h5>
												<form  action="{{route('login')}}" method="post">
                                                    @csrf
													<div class="form-group">
														<label>اسم المستخدم</label>
                                                        <input class="form-control" placeholder="" type="text" name="username">
                                                        @error('username')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
													</div>
													<div class="form-group">
														<label>كلمة السر</label>
                                                        <input class="form-control" placeholder="" type="password" name="password">
                                                        @error('password')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
													</div><button class="btn btn-main-primary btn-block">تسجيل الدخول</button>
                                                    @if(Session::has('error'))
                                                    <div class="alert alert-danger" role="alert">
                                                    {{Session::get('error')}}
                                                    </div>
                                                 @endif
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">


							<img src="{{URL::asset('assets/img/media/The-Modern-Workforce-11-Employee-Management-Trends-For-2020-1200x900.jpg')}}" alt="logo">

					</div>
				</div>
			</div>
		</div>
@endsection
@section('js')
@endsection
