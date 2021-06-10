<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.shared.title-meta', ['title' => "Log In"])

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
                                        <a class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="22">
                                            </span>
                                        </a>
                                        <!-- href="{{route('dashboard.all')}}" , href="{{route('dashboard.all')}}" //이미지버튼 클릭시 메인화면 -->
                                        <a class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                    <br><br>
                                </div>

                                <form action="{{route('user.login')}}" method="POST" novalidate>
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="esamailaddress">아이디</label>
                                        <input class="form-control  @if($errors->has('id')) is-invalid @endif" name="id" type="text" id="id" required="" value="{{ old('id')}}" placeholder="Enter your email" />
                                            @if($errors->has('id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('id') }}</strong>
                                            </span>
                                            @endif
                                    </div>

                                    <div class="form-group mb-3">   
                                        <a href="{{route('user.login')}}" class="text-muted float-right"></a>
                                        <label for="password">비밀번호</label>
                                        <div class="input-group input-group-merge @if($errors->has('password')) is-invalid @endif">
                                            <input class="form-control @if($errors->has('password')) is-invalid @endif" name="password" type="password" required="" id="password" placeholder="Enter your password" />
                                            <div class="input-group-append" data-password="false">
                                                <div class="input-group-text">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                        @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <br><br>
                                    @if(session('flash_message'))
                                    {{session('flash_message')}}
                                    @endif
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> 로그인 </button>
                                    </div>
                                </form>
                                <br>
                                

                                <!-- <div class="text-center">
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
                                </div> -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- <div class="row mt-3">
                            <div class="col-12 text-center">
                                <a href="{{route('dashboard.all')}}" class="text-white-50"><b>메인화면으로 돌아가기</b></a>
                                <br><br>
                                <p> <a href="{{route('second', ['auth', 'recoverpw-2'])}}" class="text-white-50 ml-1">비밀번호를 잊어 버렸습니까?</a></p>
                                <p class="text-white-50">계정이 없으십니까? <a href="{{route('user.store')}}" class="text-white ml-1"><b>가입하기</b></a></p>
                            </div>
                        </div> -->
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Scare</a> 
        </footer> -->

        @include('layouts.shared.footer-script')
        
    </body>
</html>