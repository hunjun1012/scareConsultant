@extends('layouts.vertical', ['title' => '좌석 정보'])

@section('css')
<link href="{{asset('assets/css/sit.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content-page">
    <div class="row">
        <div class="widget-rounded-circle card-box">
        <center>
           <h1>좌석별 체온 현황</h1>
        </center><br>
        @foreach([1,2,3,4] as $team)
        <center>
        <p style="font-size:30px; color:black; font-weight: bold;">{{$team}}팀 Seat</p>
        <form>
        <span style="font-size:17px; font-weight: bold;">환기횟수: </span>
        <input type=text name=amount value="0" style="width:30px; text-align:center;">
        <input type=button class="btn btn-sm btn-success" value="환기" onClick="javascript:this.form.amount.value++;">
        <input type=button class="btn btn-sm btn-success" value="취소" onClick="javascript:this.form.amount.value--;">
        </form><br>
        </center>
        <table class="table1">
            <tbody class="tbody1">
                <tr>
                   @foreach([1,2,3,4,5,6,7,8,9,10,11,12,13,14] as $seat)
                   <td id="{{$team}}_{{$seat}}" style="background-color: white;">{{$seat}}<br><p style="font-size:20px" id="{{$team}}_{{$seat}}_temp">-</p></td>
                     @if($seat == '7')
                    </tr><tr>
                    @endif
                   @endforeach
                </tr>
            </tbody>
        </table><br><br>
        @endforeach
            </div>
        </div>
    </div>
</body>
@endsection


@section('script')
    <!-- 초단위마다 갱신 -->
    <script>
    $(document).ready(function () { 
        getUserDatas();
        setInterval(getUserDatas, 3 * 1000);
    });
    //ApiController에서 users 가져오고 실시간 업데이트
    function getUserDatas(){
        $.ajax({
            type: 'GET',
            url: '{{route("api.users")}}',
            success: function(response) {
                console.log('success');
                console.log(response);
                response.users.forEach( user => {
                    if(user.isLoggedin){
                        $('#'+user.team+'_'+user.sit+'_temp').html(user.temperature);
                        if(37.5 < user.temperature) {
                            $('#'+user.team+'_'+user.sit).css("backgroundColor","red");
                        }
                    } else{
                        $('#'+user.team+'_'+user.sit+'_temp').html('로그아웃');
                        $('#'+user.team+'_'+user.sit).css("backgroundColor","#80808045");
                    }                    
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