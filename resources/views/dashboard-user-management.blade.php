
@extends('layouts.vertical', ['title' => '상담원 관리'])
@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/selectize/selectize.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/tablesaw/datatable-buttons.css')}}" rel="stylesheet" type="text/css" />
	@include('layouts.shared.title-meta', ['title' => "Register & Signup"])
    @include('layouts.shared.head-css')
@endsection

@section('content')
<body style="background-color:#ebf9fc;">
<br><br><br><br><br><br><br>
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

                                    <div class="form-group">
                                        <label for="password">비밀번호</label>
                                        <input class="form-control @if($errors->has('password')) is-invalid @endif" name="password" type="password" required id="password" placeholder="Enter password" />
                                        @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
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
                                        <option value="1"> 1팀 </option>
                                        <option value="2"> 2팀 </option>
                                        <option value="3"> 3팀 </option>
                                        <option value="4"> 4팀 </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Seat</label><br>
                                        <select name="sit">
                                        <option value="1"> 1번</option>
                                        <option value="2"> 2번</option>
                                        <option value="3"> 3번</option>
                                        <option value="4"> 4번</option>
                                        <option value="5"> 5번</option>
                                        <option value="6"> 6번</option>
                                        <option value="7"> 7번</option>
                                        <option value="8"> 8번</option>
                                        <option value="9"> 9번</option>
                                        <option value="10"> 10번</option>
                                        <option value="11"> 11번</option>
                                        <option value="12"> 12번</option>
                                        <option value="13"> 13번</option>
                                        <option value="14"> 14번</option>
                                        </select>
                                    </div>  
                                    <br>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit"> 추가하기 </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
	</body>
@endsection
