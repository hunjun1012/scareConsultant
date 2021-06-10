


@extends('layouts.vertical', ['title' => '스케쥴'])

@section('content')
    <div class="container-fluid">
    <center>
    <div class="card-box">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                <h2>출퇴근 및 점심시간</h2><br>
                </div>
            </div>
        </div>      
        <div class="row mb-2">
            <div class="col-sm-12">
            <form method="get" action="{{route('schedules.create')}}">
        <button type="submit" class="btn btn-blue btn-rounded waves-effect waves-light mb-3">
            글 작성하기 
        </button>
    </form>
            </div>
        </div> 
        </center>
        <!-- end row-->

                <div class="card-box" style="margin-top:-50px;  height:100%;">
                    <div class="table-responsive">
                        <table class="table mb-0" style="text-align:center;">
                            <thead>
                            <tr>
                                <th>팀명</th>
                                <th>출근시간</th>
                                <th>퇴근시간</th>
                                <th>점심시작시간</th>
                                <th>점심종료시간</th>
                                <th>비고</th>
                                <th>시작일</th>
                                <th>종료일</th>
                                <th>수정</th>
                                <th>삭제</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($schedules as $schedule)
                        <tr>
                        <td>{{ $schedule->team }}</a></td>
                        <td>{{ $schedule->onwork }}</td>
                        <td>{{ $schedule->offwork }}</td>
                        <td>{{ $schedule->startlunch }}</td>
                        <td>{{ $schedule->endlunch }}</td>
                        <td>{{ $schedule->description }}</td>
                        <td>{{ $schedule->starttime }}</td>
                        <td>{{ $schedule->endtime }}</td>
                        <!-- 시간짜르고 날짜만 표시 -->
                        <!-- php echo substr($schedule->created_at,0,11);? -->

                        <!-- 수정 -->
                        <td> 
                        <button type="button" class="btn-success btn-rounded waves-effect waves-light" onClick="location.href='/schedules/{{ $schedule->id }}/edit'">수정</button>    
                        </td>
                        <!-- 삭제 -->
                        <td><form method="POST" action="/schedules/{{ $schedule->id }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-danger btn-rounded waves-effect waves-light">삭제</button>    
                        </form></td>
                        </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-box -->
        
    </div> <!-- container -->


@endsection