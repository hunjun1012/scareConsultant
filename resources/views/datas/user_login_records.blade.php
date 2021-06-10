@extends('layouts.vertical', ['title' => '상담원 로그인 이력'])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/selectize/selectize.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/tablesaw/datatable-buttons.css')}}" rel="stylesheet" type="text/css" />    

    <!-- Plugins css -->
    <link href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">상담원 로그인 이력</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>아이디</th>
                                    <th>이름</th>
                                    <th>Team</th>
                                    <th style="color:blue;">로그인이력</th>
                                    <th>로그인/로그아웃 시간</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $users = \App\isLoggedinDatas::all();
                                foreach ($users as $users) {
                                    ?>
                                    <tr>    
                                    <td>{{$users['id']}}</td>
                                    <td>{{$users['name']}}</td>
                                    <td>{{$users['team']}}</td>
                                    <td style="color:blue;">{{$users['isLoggedin']}}</td>
                                    <td>{{$users['updated_at']}}</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->


       
    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!--페이지 목록, 오름차순, 내림차순 정렬-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection