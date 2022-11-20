<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='/') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='/') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='/') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='/') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>

			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{url('img/user/image/'.Auth::user()->image)}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->full_name }}</h4>
							<span class="mb-0 text-muted">@foreach(Auth::user()->getRoleNames() as $v)
                                {{ $v }}
                                <br>,
                              @endforeach</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">الرئيسية</li>
					<li class="slide">

						<a class="side-menu__item" href="{{ url('/' . $page='/') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span style="font-size: 200%" class="side-menu__label">لوحة التحكم</span><span class="badge badge-success side-badge"></span></a>

					</li>

					<li class="slide">
                        @can('الاقسام')
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span style="font-size: 200%" class="side-menu__label">الاقسام</span><i class="angle fe fe-chevron-down"></i></a>
                        @endcan
						<ul class="slide-menu">
                            @can('استعلام قسم')
							<li><a class="slide-item" href="{{ route('departmint') }}"><h2>استعلام</h2></a></li>
                            @endcan
                            @can('اضافة قسم')
                            <li><a class="slide-item" href="{{ route('department.create') }}"><h2>اضافة قسم</h2></a></li>
                            @endcan

						</ul>
					</li>
                    @can('الموظفين')
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" opacity=".3"/><path d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg><span style="font-size: 200%" class="side-menu__label">الموظفين</span><i class="angle fe fe-chevron-down"></i></a>
                        @endcan
						<ul class="slide-menu">
                            @can('استعلام الموظفين')
							<li><a class="slide-item" href="{{ route('employee.index') }}"><h2>استعلام</h2></a></li>
                            @endcan
                            @can('اضافة موظف')
							<li><a class="slide-item" href="{{ route('employee.create') }}"><h2>اضافة موظف</h2></a></li>
                            @endcan

						</ul>
					</li>
                    {{-- @can('المستخدمين')
                    @can('استعلام المستخدمين')
                    @can('اضافة مستخدم')
                    @endcan --}}
                    @can('المستخدمين')
                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg><span class="side-menu__label" style="font-size: 200%">المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
                        @endcan
						<ul class="slide-menu">
                            @can('استعلام المستخدمين')
							<li><a class="slide-item" href="{{ route('user.index') }}"><h2>استعلام</h2></a></li>
                            @endcan
                            @can('اضافة مستخدم')
							<li><a class="slide-item" href="{{ route('user.create') }}"><h2>اضافة مستخدم</h2></a></li>
                            @endcan
						</ul>
					</li>

                    @can('الصلاحيات')
					<li class="slide">
						<a class="side-menu__item" href="{{route('roles.index') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label" style="font-size: 200%">الصلاحيات</span><span class="badge badge-success side-badge"></span></a>
					</li>
                    @endcan

				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
