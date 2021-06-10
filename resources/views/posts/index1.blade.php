


@extends('layouts.vertical', ['title' => '공지사항'])

@section('content')
    <div class="container-fluid">
    <center>
    <div class="card-box">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h2>전파사항 및 공지사항 수정</h2><br>
                </div>
            </div>
        </div>      
        <div class="row mb-2">
            <div class="col-sm-12">
            <form method="get" action="{{route('posts.create')}}">
        <button type="submit" class="btn btn-blue btn-rounded waves-effect waves-light mb-3">
            글 작성하기
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
                                <th>제목</th>
                                <th>내용</th>
                                <th>작성자</th>
                                <th>시작일</th>
                                <th>종료일</th>
                                <th>수정</th>
                                <th>삭제</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($posts as $post)
                        <tr>
                        <td>{{ $post->title }}</a></td>
                        <td style="width:40%;">{{ $post->description }}</td>
                        <td>관리자</td>
                        <td>{{ $post->starttime }}</td>
                        <td>{{ $post->endtime }}</td>

                        <!-- 수정 -->
                        <td> 
                        <button type="button" class="btn-success btn-rounded waves-effect waves-light" onClick="location.href='/posts/{{ $post->id }}/edit'">수정</button>    
                        </td>
                        <!-- 수정 -->

                        <!-- 삭제 -->
                        <td><form method="POST" action="/posts/{{ $post->id }}">
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