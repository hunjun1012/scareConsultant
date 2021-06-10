
@extends('layouts.vertical', ['title' => '상담원 정보관리 및 추가 '])

@section('content')
    <div class="container-fluid">
    <center>
    <div class="card-box">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h2>상담원 회원정보</h2><br>
                </div>
            </div>
        </div>      
        <div class="row mb-2">
            <div class="col-sm-12">
            <form method="get" action="#">
        <button type="button" class="btn btn-blue btn-rounded waves-effect waves-light mb-3" onClick="location.href='{{route('any', 'dashboard-user-management')}}'">
            상담원 추가하기
        </button>
    </form>
            </div>
        </div> 
        </center>
        <!-- end row-->

        <div class="card-box" style="margin-top:-50px; height:100%;"> 
                    <div class="table-responsive">
                        <table class="table mb-0" style="text-align:center;">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>password</th>
                                <th>name</th>
                                <th>age</th>
                                <th>temperature</th>
                                <th>addtemperature</th>
                                <th>team</th>
                                <th>sit</th>
                                <th>isLoggedin</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>수정</th>
                                <th>삭제</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($users as $user)
                        <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->age }}세</td>
                        <td>{{ $user->temperature }}도</td>
                        <td>{{ $user->addtemperature }}도</td>
                        <td>{{ $user->team }}팀</td>
                        <td>{{ $user->sit }}번</td>
                        <td>{{ $user->isLoggedin }}</td>
                        <td><?php echo substr($user->created_at,0,11);?></td>
                        <td><?php echo substr($user->updated_at,0,11);?></td>
                        <!-- 수정 -->
                        <td> 
                        <!-- <button type="button" class="btn-success btn-rounded waves-effect waves-light" onClick="location.href='/information/{{ $user->id }}/edit'">수정</button>     -->
                        <button type="button" class="btn-success btn-rounded waves-effect waves-light" onClick="location.href='/information/{{ $user->id }}/edit'">수정</button>    
                        </td>
                        <!-- 수정 -->
                        <!-- 삭제 -->
                        <td><form method="POST" action="/information/{{ $user->id }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-danger btn-rounded waves-effect waves-light">삭제</button>    
                        </form></td>
                        <!-- 삭제 -->
                        </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-box -->
        
    </div> <!-- container -->


@endsection

@section('script')

@endsection