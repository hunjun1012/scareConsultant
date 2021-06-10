@extends('layouts.vertical', ['title' => 'Create Project'])

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
                    <h4 class="page-title">게시글 작성하기</h4>
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
                                <div class="form-group">
                                    <label for="projectname">제목</label>
                                    <input type="text" id="projectname" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="project-overview">내용</label>
                                    <textarea class="form-control" id="project-overview" rows="5"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- 등록 날짜 -->
                                        <div class="form-group">
                                            <label>날짜</label>
                                            <input type="text" class="form-control" data-toggle="flatpicker" placeholder="Select">
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>종료 일</label>
                                            <input type="text" class="form-control" data-toggle="flatpicker" placeholder="Select">
                                        </div>
                                    </div> -->
                                </div>

                                <!-- <div class="form-group">
                                    <label for="project-priority">Project Priority</label>
                                    
                                    <select class="form-control" data-toggle="select2">
                                        <option value="MD">Medium</option>
                                        <option value="HI">High</option>
                                        <option value="LW">Low</option>
                                    </select>
                                </div> -->

                                <!-- <div class="form-group">
                                    <label for="project-budget">Budget</label>
                                    <input type="text" id="project-budget" class="form-control" placeholder="Enter project budget">
                                </div> -->

                            </div> <!-- end col-->
                        </div>  
                        <!-- end row -->


                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-success waves-effect waves-light m-1" onClick=><i class="fe-check-circle mr-1"></i>등록하기</button>
                                <button type="button" class="btn btn-light waves-effect waves-light m-1" onclick="history.back()"><i class="fe-x mr-1"></i>취소하기</button>
                            </div>
                        </div>

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