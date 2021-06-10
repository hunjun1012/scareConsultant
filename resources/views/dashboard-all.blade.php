@extends('layouts.vertical', ['title' => '전체 현황'])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/selectize/selectize.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- 알람창  -->
    <link href="{{asset('assets/libs/jquery-toast-plugin/jquery-toast-plugin.min.css')}}" rel="stylesheet" type="text/css" />
    @endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">전체현황</h4>
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
                                <h3 class="mt-1"><span id="users_sum_isLoggedin" data-plugin="counterup">{{$users->sum('isLoggedin')}}</span> / <span data-plugin="counterup">{{$users->count()}}</span></h3>
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
                                <h3 class="text-dark mt-1"><span data-plugin="counterup" id="users_average_temperature"></span> °C</h3>
                                <p class="text-muted mb-1 text-truncate" >평균체온</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-danger border-danger border">
                            <i class="fe-eye font-22 avatar-title text-danger"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                            <h3 class="text-dark mt-1" name="patient">없음</h3>
                                <p class="text-muted mb-1 text-truncate">37.5°C이상 의심환자</p>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                <i class="fe-eye font-22 avatar-title text-warning"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1" name="inspection">없음</h3>
                                <p class="text-muted mb-1 text-truncate">격리대상</p>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </div>
        
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

        <h4>체온 현황</h4>
        <div class="row">
            <div class="col-xl-6">
                <!-- 체온 현황 카드 -->
                <div class="card">
                    <div class="card-body" dir="ltr">
                        <div class="card-widgets">
                        </div>
                        <h4 class="header-title mb-0">월별 고온 의심환자(명)</h4>
                        <div id="cardCollpase3" class="collapse pt-3 show" style="margin-top:25px">
                            <div id="statistics-chart" data-colors="#1478FF" style="height: 386px;" class="morris-chart mt-3"></div>
                        </div> <!-- end collapse-->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <div class="col-xl-6">
                <!-- 체온 현황 카드 -->
                <div class="card">
                    <div class="card-body" dir="ltr">
                        <div class="card-widgets">
                        </div>
                        <h4 class="header-title mb-0">시간별 고온 의심환자(명)</h4>
                        <div id="cardCollpase3" class="collapse pt-3 show" style="margin-top:25px">
                            <div id="statistics-chart2" data-colors="#1478FF" style="height: 386px;" class="morris-chart mt-3"></div>
                        </div> <!-- end collapse-->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
        </div>
        <!-- end row -->
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

    <!-- 알람창 -->
    <script src="{{asset('assets/libs/jquery-toast-plugin/jquery-toast-plugin.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/toastr.init.js')}}"></script>

    <!-- dashboard-all.js에서 그래프 가져오기-->
    <!-- <script src="{{asset('assets/js/pages/dashboard-all.js')}}"></script> -->
    <script>
    // 초단위마다 화면 업데이트
    $(document).ready(function () {
        setInterval(getUserDatas, 3 * 1000);
        setInterval(getGroupsDatas, 3 * 1000);
    });
    //ApiController에서 가져오고 실시간 화면업데이트
    function getUserDatas(){
        $.ajax({
            type: 'GET',
            url: '{{route("api.users")}}',
            success: function(response) {
                console.log('User api success');
                //실시간 최소,최대,평균 값
                $('#users_min_temperature').html(response.min);
                $('#users_max_temperature').html(response.max);
                $('#users_average_temperature').html(response.average);
                //실시간 로그인 하고있는 인원
                $('#users_sum_isLoggedin').html(response.sum);
                //실시간 모든인원
                $('#users_count_isLoggedin').html(response.count);
                //로그인한 유저 일정온도 이상일때 알람창 생성하기
                var message;
                var queue = new Array();
                var patient = new Array();
                var inspection = new Array();
                response.users.forEach( user => {
                    if(user.temperature > 37.5 && user.isLoggedin == 1){  
                        message = user.name + '('+user.id+')의 온도('+user.temperature+')가 높습니다.';
                        queue.push(message);
                        patient.push(user.name);
                        inspection.push(user.team+"팀");
                    }   
                    else if(user.temperature < 37.5 && user.isLoggedin == 1){
                        $('#patient').html("없음");
                        $('#inspection').html("없음");
                    }
                });
                console.log("체온이상")
                for(i=0; i<message.length; i++){
                    document.getElementsByName("patient")[i].innerHTML = patient;
                    document.getElementsByName('inspection')[i].innerHTML = inspection;
                //알림창
                $.NotificationApp.send("체온 이상 감지!", queue, 'top-right', '#bf441d', 'error',);
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

//statistics-chart graph data
//@@@@@@@@@@@@@@월별체온현황 그래프@@@@@@@@@@@@@@@@@
    var createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            dataLabels: false,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#c8c8c8',
            barSizeRatio: 0.4,
            barColors: lineColors
        });
    };

    var $barData  = [
        @for ($i = 0; $i < 6; $i++)
        { y: '{{$today->format("Y-m")}}', 
        a: {{$DetectedUsers->whereBetween('created_at',[$today->firstOfMonth()->toDateTImeString(),$today->addMonth()->firstOfMonth()->toDateTImeString()])->groupBy('id')->count()}} },
        @endfor
    ];
    var colors = ['#1478FF'];
    var dataColors = $("#statistics-chart").data('colors');
    if (dataColors) {
        colors = dataColors.split(",");
    }

    createBarChart('statistics-chart', $barData, 'y', ['a'], ["Statistics"], colors);

    //statistics-chart graph data2
//@@@@@@@@@@@@@@일별체온현황 그래프@@@@@@@@@@@@@@@@@
var createBarChart2  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            dataLabels: false,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#c8c8c8',
            barSizeRatio: 0.4,
            barColors: lineColors
        });
    };

    var $barData  = [
        @for ($i = 0; $i < 10; $i++)
        { y: '{{$todayTime->format("H시i분")}}', 
        a: {{$DetectedUsers->whereBetween('updated_at',[$todayTime->toDateTImeString(), $todayTime->addHours()->toDateTImeString()])->groupBy('id')->count()}} },
        @endfor
    ];

    var colors = ['#1478FF'];
    var dataColors = $("#statistics-chart").data('colors');
    if (dataColors) {
        colors = dataColors.split(",");
    }

    createBarChart2('statistics-chart2', $barData, 'y', ['a'], ["Statistics"], colors);
    </script>
@endsection
