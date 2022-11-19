<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
                        <div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
					</div>
					<div class="main-header-right">
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>


							<div class="dropdown main-header-message right-toggle">
								<a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
									<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
								</a>
                                <div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="{{url('img/user/image/'.Auth::user()->image)}}" class=""></div>
											<div class="mr-3 my-auto">
												<h6>{{ Auth::user()->username }}</h6><span>
                                                    @foreach(Auth::user()->getRoleNames() as $v)
                                                    {{ $v }}
                                                  @endforeach
                                                   </span>
											</div>
										</div>
									</div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i> تسجيل خروج</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none"> @csrf
                                            </form>



								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
