<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            
    
            <li class="dropdown d-inline-block d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>
            <!-- 알람 목록 -->
            <!-- <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge">1</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">
    
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-right">
                                <a href="" class="text-dark">
                                    <small>지우기</small>
                                </a>
                            </span>알람
                        </h5>
                    </div>
    
                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon">
                                <img src="{{asset('assets/images/users/user-1.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">상담원</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>온도가 도로 높습니다.</small>
                            </p>
                    </a>
                
                </div>
            </li> -->
    
            <li class="dropdown notification-list topbar-dropdown">
            @if (session('id'))
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        관리자님<i class="mdi mdi-chevron-down"></i>              
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">    
                    <div class="dropdown-divider"></div>
                     <a href="{{route('user.destroy')}}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>로그아웃</span>
                    </a>
                </div>
                @elseif(auth()->user() != null)
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        {{auth()->user() ? auth()->user()->name : 'Anonymous'}}<i class="mdi mdi-chevron-down"></i>              
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <!-- <a href="{{route('any', 'contacts/profile')}}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>마이페이지</span>
                    </a> -->
    
                    <!-- item-->
                    <!-- <a href="{{route('any', 'contacts/settings')}}" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>내 설정</span>
                    </a> -->
    
                    <div class="dropdown-divider"></div>
    
                    <!-- item-->
                     <a href="{{route('user.destroy')}}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>로그아웃</span>
                    </a>
                    <!-- <a class="dropdown-item notify-item"

                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                    >
                        <i class="fe-log-out"></i>
                        <span>로그아웃</span>
                
                    </a> -->

                <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf
                </form> -->

                </div>
                @else
                <a href="{{route('user.login')}}" class="nav-link nav-user mr-0 waves-effect waves-light" role="button" >
                   <span class="pro-user-name ml-1">
                        로그인
                    </span>
                </a>
                @endif
            </li>
    
            <!-- <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li> -->
    
        </ul>
        
        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('index')}}" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{asset('assets/images/logo-sm.png')}}"alt="" height="22">
                    <!-- <span class="logo-lg-text-light">Scare</span> -->
                </span>
                <span class="logo-lg">
                    <img src="{{asset('assets/images/logo-dark.png')}}"alt="" height="20">
                    <!-- <span class="logo-lg-text-light">U</span> -->
                </span>
            </a>
    
            <a href="{{route('dashboard.all')}}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{asset('assets/images/logo-sm.png')}}"alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('assets/images/logo-light.png')}}"alt="" height="20">
                </span>
            </a>
        </div>
    
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>   
            
    
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->
