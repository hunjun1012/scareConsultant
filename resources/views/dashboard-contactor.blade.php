@extends('layouts.vertical', ['title' => '접촉자 정보조회'])

    @section('css')

    @endsection
@section('content')
<div class="content-page">
    <div class="row">
        <div class="widget-rounded-circle card-box">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                    <center>
                                <h4 class="page-title">접촉자 정보 : 현재 {{$messageLength->count()}}명</h4>
                    </center>
                            </div>
                        </div><br>  
                        <!-- <select name="name" onchange="handleOnChange(this)">
                          <option value="상담원2, 상담원3">상담원1</option>
                          <option value="상담원3, 상담원4">상담원2</option>
                          <option value="상담원2">상담원3</option>
                          <option value="상담원3, 상담원5">상담원4</option>
                          <option value="상담원3, 상담원6">상담원5</option>
                          <option value="상담원6, 상담원7">상담원6</option>
                          <option value="상담원8, 상담원9">상담원7</option>
                          <option value="상담원3, 상담원5">상담원8</option>
                        </select>
                        <span id='result'></span> -->

                    </div>     
                        <div class="row" style="width:1500px; height:100%; text-align:center;">
                            <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>접촉 시간</th>
                                                <th>접촉자</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($messageLength as $contact)
                                            <tr>
                                                <td name="date">접촉 시간</td>
                                                <td name="contact">접촉자 이름</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
<script>
function handleOnChange(e) {
  // 선택된 데이터 가져오기
  const value = e.value;
  
  // 데이터 출력
  document.getElementById('result').innerText
    = "접촉자: " + value;
}
</script>
<script>
// 초단위마다 화면 업데이트
$(document).ready(function () {
        setInterval(getUserDatas, 3 * 1000);
    });
    //ApiController에서 가져오고 실시간 화면업데이트
    function getUserDatas(){
        $.ajax({
            type: 'GET',
            url: '{{route("api.users")}}',
            success: function(response) {
                var date = new Date();
                var queue = new Array();
                var message;
                console.log('접촉자 명단'); 
                response.users.forEach( user => {
                    if(user.temperature > 37.5){    
                        message = user.name+" <b>접촉자 : </b> "+'['+user.team+'팀] 및 ['+(user.sit-1)+'번,'+(user.sit+1)+'번,'+(user.sit+7)+'번]자리 상담원 검사 및 격리 조치 필요';
                        queue.push(message);
                        console.log(message);    
                    }
                });
                // 접촉자 표시
                for(i=0; i<message.length; i++){
                    document.getElementsByName('date')[i].innerHTML = "시간: " + date.getHours() +"시"+ date.getMinutes()+"분" + date.getSeconds() + "초";
                    document.getElementsByName("contact")[i].innerHTML = queue.pop();
                }
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