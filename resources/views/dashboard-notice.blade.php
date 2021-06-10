@extends('layouts.vertical', ['title' => '공지사항'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">전파사항, 공지사항 정보</h4> 
                </div>
            </div>
        </div>     
        <div class="row mb-2">
            <div class="col-sm-4">
                <a href="{{route('second', ['project', 'create'])}}" class="btn btn-danger btn-rounded waves-effect waves-light mb-3"><i class="mdi mdi-plus"></i>등록하기</a>
            </div>
            <div class="col-sm-8">
                <div class="text-sm-right">
                    <div class="btn-group mb-3">
                        <button type="button" class="btn btn-primary">전체</button>
                    </div>
                    <div class="btn-group mb-3 ml-1">
                        <button type="button" class="btn btn-light">공지사항</button>
                        <button type="button" class="btn btn-light">전파사항</button>
                    </div>
                    <div class="btn-group mb-3 ml-2 d-none d-sm-inline-block">
                        <button type="button" class="btn btn-dark"><i class="mdi mdi-apps"></i></button>
                    </div>
                    <div class="btn-group mb-3 d-none d-sm-inline-block">
                        <button type="button" class="btn btn-link text-dark"><i class="mdi mdi-format-list-bulleted-type"></i></button>
                    </div>
                </div>
            </div><!-- end col-->
        </div> 
        <!-- end row-->


        <div class="row">
            <div class="col-lg-4">
                <div class="card-box project-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">수정하기</a>
                            <a class="dropdown-item" href="#">삭제하기</a>
                        </div>
                    </div> <!-- end dropdown -->
                    <!-- Title-->
                    <h2>공지사항</h2><br>
                    <!-- Desc-->
                    <p style="font-size:25px;">손을 자주 씻으세요. 비누와 물 또는 알코올 성분의 손 세정제를 사용하세요.</p>
                    <!-- 날짜 -->
                    <p class="mb-1">
                        <span class="pr-2 text-nowrap mb-2 d-inline-block">
                            <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                            <b>날짜 : 2021.01.04</b>
                        </span>
                    </p>

                </div> <!-- end card box-->
            </div><!-- end col-->

            
        
    </div> <!-- container -->
@endsection