<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.shared.title-meta', ['title' => "Register & Signup"])

        @include('layouts.shared.head-css')
    </head>
    <br><br><br><br><br><br><br><br><br>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="{{route('dashboard.all')}}" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="22">
                                            </span>
                                        </a>
                    
                                        <a href="{{route('dashboard.all')}}" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                    <br><br>
                                </div>

                                
                                <form action="{{route('user.store')}}" method="POST" novalidate>
                                @csrf
                                    <div class="form-group">
                                        <label for="fullname">아이디</label>
                                        <input class="form-control"@if($errors->has('id')) is-invalid @endif" name="id" type="text" 
                                        id="fullname" placeholder="Enter id" required 
                                        value="{{ old('id')}}"/>
                                        @if($errors->has('id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id') }}</strong>
                                        </span>
                                        @endif    
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="emailaddress">이메일</label>
                                        <input class="form-control @if($errors->has('email')) is-invalid @endif" name="email" type="email" 
                                            id="emailaddress" required placeholder="Enter your email" 
                                            value="{{ old('email')}}"/>
                                        
                                        @if($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div> -->
                                    <div class="form-group">
                                        <label for="password">비밀번호</label>
                                        <input class="form-control @if($errors->has('password')) is-invalid @endif" name="password" type="password" required id="password" placeholder="Enter password" />
                                        @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="confirm_password">비밀번호 확인</label>
                                        <input class="form-control @if($errors->has('confirm_password')) is-invalid @endif" 
                                            name="confirm_password" type="password" required id="confirm_password" placeholder="Enter password" />
                                        
                                        @if($errors->has('confirm_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                                        @endif
                                    </div> -->
                                    <div class="form-group">
                                        <label>이름</label>
                                        <input class="form-control" type="text" size="35" name="name" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label>나이</label>
                                        <input class="form-control" type="int" size="35" name="age" placeholder="Enter age">
                                    </div>
                                    <div class="form-group">
                                        <label>Team</label><br>
                                        <select name="team">
                                        <option value="1팀"> 1 팀 </option>
                                        <option value="2팀"> 2 팀 </option>
                                        <option value="3팀"> 3 팀 </option>
                                        <option value="4팀"> 4 팀 </option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit"> 추가하기 </button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <a href="{{route('dashboard.all')}}" class="text-white-50"><b>메인화면으로 돌아가기</b></a>
                                <br><br>
                                <p class="text-white-50">이미 계정이 있습니까?  <a href="{{route('second', ['auth', 'login'])}}" class="text-white ml-1"><b>로그인</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>   
        @include('layouts.shared.footer-script')
    </body>
</html>