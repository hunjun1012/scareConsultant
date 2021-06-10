

@extends('layouts.vertical', ['title' => '공지사항 생성'])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">공지사항 작성하기</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">

                            <form method="POST" action="{{route('posts.store')}}">
                                @csrf
                                <div>
                                    <label for="projectname">제목</label>
                                    <input type="text" name="title" class="form-control" placeholder="제목"><br>
                                </div>

                                <div>
                                    <label for="project-overview">내용</label>
                                    <textarea name="description" class="form-control" placeholder="내용" rows="10"></textarea><br>    
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- 등록 날짜 -->
                                        <label>시작날짜</label>
                                        <input name="starttime" type="date" class="form-control">
                                    </div>

                                    <div class="col-lg-6">
                                        <label>종료날짜</label>
                                        <input name="endtime" type="date" class="form-control">
                                    </div>
                                </div><br>
                            <center>
                                <div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i>게시하기</button> 
                                    <button type="button" class="btn btn-light waves-effect waves-light m-1" onClick="location.href='{{route('posts.index1')}}'"><i class="fe-x mr-1"></i>취소하기</button>
                                </div>
                            </center>    
                            </form>

                            </div> <!-- end col-->
                        </div>  
                        <!-- end row -->
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
        
    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/create-project.init.js')}}"></script>
@endsection