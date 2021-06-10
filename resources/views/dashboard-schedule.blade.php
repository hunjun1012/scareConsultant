@extends('layouts.vertical', ['title' => '전파사항, 공지사항 정보'])

@section('css')
    <link href="{{asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">출퇴근, 점심시간 팀별 시간정보</h4>  
                </div>
            </div>
        </div>     
        <div class="row">
            <div class="col-xl-8 col-lg-7">
            <!-- 출근시간 -->
            <div class="card">
                    <div class="card-body">

                        <div class="float-right">
                            <select class="custom-select custom-select-sm ">
                                <option selected="">Recent</option>
                                <option value="1">Most Helpful</option>
                                <option value="2">High to Low</option>
                                <option value="3">Low to High</option>
                            </select>
                        </div>

                        <h4 class="mb-4 mt-0 font-16">출퇴근 시간</h4>

                        <div class="clerfix"></div>
                        
                        <div class="media">
                            <img class="mr-2 rounded-circle" src="{{asset('assets/images/users/user-3.jpg')}}"
                                alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0">관리자 <small class="text-muted float-right">5시간 전</small></h5>
                                <p>1팀 출근시간: 08:00~16:00, 2팀 출근시간: 09:00~17:00, 3팀 출근시간: 10:00~18:00입니다.</p>
                                
                            </div>
                        </div><br>

                        <div class="media">
                            <img class="mr-2 rounded-circle" src="{{asset('assets/images/users/user-3.jpg')}}"
                                alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0">관리자 <small class="text-muted float-right">5시간 전</small></h5>
                                <p>1팀 출근시간: 08:00~16:00, 2팀 출근시간: 09:00~17:00, 3팀 출근시간: 10:00~18:00입니다.</p>
                            </div>
                        </div><br>

                        <div class="media">
                            <img class="mr-2 rounded-circle" src="{{asset('assets/images/users/user-3.jpg')}}"
                                alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0">관리자 <small class="text-muted float-right">5시간 전</small></h5>
                                <p>1팀 출근시간: 08:00~16:00, 2팀 출근시간: 09:00~17:00, 3팀 출근시간: 10:00~18:00입니다.</p>
                            </div>
                        </div><br>

                        <div class="border rounded mt-4">
                            <form action="#" class="comment-area-box">
                                <textarea rows="3" class="form-control border-0 resize-none" placeholder="공지사항 입력..."></textarea>
                                <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                    
                                    <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message mr-1'></i>등록하기</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>

                
                <!-- 점심시간 -->
                <div class="card">
                    <div class="card-body">

                        <div class="float-right">
                            <select class="custom-select custom-select-sm ">
                                <option selected="">Recent</option>
                                <option value="1">Most Helpful</option>
                                <option value="2">High to Low</option>
                                <option value="3">Low to High</option>
                            </select>
                        </div>

                        <h4 class="mb-4 mt-0 font-16">점심 시간</h4>

                        <div class="clerfix"></div>
                        
                        <div class="media">
                            <img class="mr-2 rounded-circle" src="{{asset('assets/images/users/user-3.jpg')}}"
                                alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0">관리자 <small class="text-muted float-right">5시간 전</small></h5>
                                <p>1팀 점심시간: 08:00~16:00, 2팀 점심시간: 09:00~17:00, 3팀 점심시간: 10:00~18:00입니다.</p>
                            </div>
                        </div><br>

                        <div class="media">
                            <img class="mr-2 rounded-circle" src="{{asset('assets/images/users/user-3.jpg')}}"
                                alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0">관리자 <small class="text-muted float-right">5시간 전</small></h5>
                                <p>1팀 점심시간: 08:00~16:00, 2팀 점심시간: 09:00~17:00, 3팀 점심시간: 10:00~18:00입니다.</p>
                            </div>
                        </div><br>

                        <div class="media">
                            <img class="mr-2 rounded-circle" src="{{asset('assets/images/users/user-3.jpg')}}"
                                alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0">관리자 <small class="text-muted float-right">5시간 전</small></h5>
                                <p>1팀 점심시간: 08:00~16:00, 2팀 점심시간: 09:00~17:00, 3팀 점심시간: 10:00~18:00입니다.</p>
                            </div>
                        </div><br>

                        <div class="border rounded mt-4">
                            <form action="#" class="comment-area-box">
                                <textarea rows="3" class="form-control border-0 resize-none" placeholder="공지사항 입력..."></textarea>
                                <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                    
                                    <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message mr-1'></i>등록하기</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/libs/dropzone/dropzone.min.js')}}"></script>
@endsection