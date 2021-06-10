@extends('layouts.vertical', ['title' => '체온 현황'])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/jquery-toast-plugin/jquery-toast-plugin.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/selectize/selectize.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/tablesaw/datatable-buttons.css')}}" rel="stylesheet" type="text/css" />
    <!-- 체온 현황 css -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/selectize/selectize.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/tablesaw/datatable-buttons.css')}}" rel="stylesheet" type="text/css" />    
    <!--테이블에서 화살표 정렬 css -->
    <link href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">체온현황</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        <h4>전체</h4>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-bar-chart-line- font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="mt-1"><span id="users_sum_isLoggedin" data-plugin="counterup">{{$users->sum('isLoggedin')}}</span> / <span id="users_count_isLoggedin" data-plugin="counterup">{{$users->count()}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">로그인 / 상담원</p>
                            </div>  
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="fe-heart font-22 avatar-title text-success"></i>
                            </div>
                        </div>
                        <div class="col-6"> 
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span id="users_average_temperature" data-plugin="counterup"></span>°C</h3>
                                <p class="text-muted mb-1 text-truncate">평균체온</p>
                            </div>
                        </div>  
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                <i class="fe-heart font-22 avatar-title text-warning"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span id="users_max_temperature" data-plugin="counterup"></span>°C</h3>
                                <p class="text-muted mb-1 text-truncate">최고체온</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="fe-heart font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span id="users_min_temperature" data-plugin="counterup"></span>°C</h3>
                                <p class="text-muted mb-1 text-truncate">최저체온</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
        <!-- ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ 그룹별 체온 현황 ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ-->
        <h4>그룹별</h4>
        <div class="row">
         @foreach($userGroupByTeam as $group)
            <div class="col-md-6 col-xl-3"> 
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <h2>{{$group[0]->team}}팀</h2>
                        </div>                                                                                                                                                  
                        <div class="col-6">
                            <div class="text-right">
                            <p class="text-muted mb-1 text-truncate">로그인</p>
                            <h3 class="text-dark my-1"><span id="{{$group[0]->team}}_isLoggedin" data-plugin="counterup">{{$group->sum('isLoggedin')}}</span> / <span id="{{$group[0]->team}}_count">{{$group->count()}}</span></h3>
                            <!-- id="group_count" -->
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                    <!-- id="group_max_temperature" -->
                        <h6 class="text-uppercase">최고체온 <span id="{{$group[0]->team}}_max" class="float-right">{{$group->max('temperature')}}</span></h6>
                        <div class="progress progress-sm m-0">
                            <div id="{{$group[0]->team}}_max_progress" class="progress-bar bg-blue" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="temperatureMaxStyle" style="width: {{$group->max('temperature')+20}}%">
                                <span class="sr-only">50%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                    <!-- id="group_average_temperature" -->
                        <h6 class="text-uppercase">평균체온 <span id="{{$group[0]->team}}_avg" class="float-right">{{number_format((float)$group->avg('temperature'), 2, '.', '')}}</span></h6>
                        <div class="progress progress-sm m-0">
                            <div id="{{$group[0]->team}}_avg_progress"class="progress-bar bg-blue" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{number_format((float)$group->avg('temperature')+20, 2, '.', '')}}%">
                                <span class="sr-only">50%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                    <!-- id="group_min_temperature" -->
                        <h6 class="text-uppercase">최저체온 <span id="{{$group[0]->team}}_min" class="float-right">{{$group->min('temperature')}}</span></h6>
                        <div class="progress progress-sm m-0">
                            <div id="{{$group[0]->team}}_min_progress" class="progress-bar bg-blue" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{$group->min('temperature')+20}}%">
                                <span class="sr-only">50%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>  
        </div>
        <!-- ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ 체온 현황 ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ-->
        <h4>체온 현황</h4>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card-box">
            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>이름</th>
                    <th>Team</th>
                    <th style="color:red;">체온</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($users as $user) {  
                        ?>
                        <tr>
                        <td id="user_{{$user['id']}}_name">{{$user['id']}}</td>
                        <td id="user_{{$user['id']}}_name">{{$user['name']}}</td>
                        <td id="user_{{$user['id']}}_team">{{$user['team']}}팀</td>
                        <td id="user_{{$user['id']}}_temperature"style="color:red;">{{$user['temperature']}}</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/libs/selectize/selectize.min.js')}}"></script>

    <script src="{{asset('assets/libs/morris.js06/morris.js06.min.js')}}"></script>
    <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

    <script src="{{asset('assets/libs/flot-charts/flot-charts.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery.flot.tooltip/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('assets/libs/flot-orderbars/flot-orderbars.min.js')}}"></script>


    <!-- Dashboar all init js-->
    <script src="{{asset('assets/js/pages/dashboard-all.js')}}"></script>
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/jquery-toast-plugin/jquery-toast-plugin.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/toastr.init.js')}}"></script>

    <!--페이지 목록, 오름차순, 내림차순 정렬-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

    <!-- 초단위마다 갱신 -->
    <script>
    $(document).ready(function () {
        setInterval(getUserDatas, 3 * 1000);
        setInterval(getGroupsDatas, 3 * 1000);
        
    });
    //ApiController에서 users 가져오고 실시간 업데이트
    function getUserDatas(){
        $.ajax({
            type: 'GET',
            url: '{{route("api.users")}}',
            success: function(response) {
                console.log('success');
                console.log(response);
                //실시간 최소,최대,평균 값
                $('#users').html(response.users);
                $('#users_min_temperature').html(response.min);
                $('#users_max_temperature').html(response.max);
                $('#users_average_temperature').html(response.average);
                //실시간 로그인 인원
                $('#users_sum_isLoggedin').html(response.sum);
                //실시간 총원
                $('#users_count_isLoggedin').html(response.count);
                //로그인한 유저이고 일정온도 이상일때 알람창 생성하기
                var queue = new Array();
                var message;
                response.users.forEach( user => {
                    if(user.temperature > 37.5 && user.isLoggedin == 1){  
                        message = user.name + '('+user.id+')의 온도('+user.temperature+')가 높습니다.';
                        queue.push(message);
                    }
                    $('#user_'+user.id+'_temperature').html(user.temperature);
                });
                //알림창
                for(i=0; i<message.length; i++){
                $.NotificationApp.send("체온 이상 감지!", queue, 'top-right', '#bf441d', 'error');
                }   
            },
            //에러메세지
            error: function(response) {
                console.log('error');
                console.log(response);
            }
        });
    }

    //ApiController에서 groups 가져오고 실시간 업데이트[배열형태]
    function getGroupsDatas(){
        $.ajax({
            type: 'GET',
            url: '{{route("api.groups")}}',
            success: function(response) {
                console.log('Success');
                console.log(response);
                
                response.groupInfos.forEach( groupInfo => {
                    $('#'+groupInfo.team+'_isLoggedin').html(groupInfo.isLoggedin);
                    $('#'+groupInfo.team+'_count').html(groupInfo.count);
                    $('#'+groupInfo.team+'_max').html(groupInfo.max);
                    $('#'+groupInfo.team+'_avg').html(groupInfo.avg);
                    $('#'+groupInfo.team+'_min').html(groupInfo.min);
                });
            },
            //에러메세지
            error: function(response) {
                console.log('error');
                console.log(response);
            }
        });
    }
</script>
@endsection