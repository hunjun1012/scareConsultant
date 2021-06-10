<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoutingController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //서버실행시 메인화면
    public function index()
    {
        $users = \App\User::all();
        $sensoredDatas = \App\sensoredDatas::all();
        $userGroupByTeam = \App\User::orderBy('team')->get()->groupBy('team'); 
        $sensoredDatasGroupedByTeam = [];
        foreach($userGroupByTeam as $group){
            $userGroup =  \App\User::all()->where('team',$group);
            array_push($sensoredDatasGroupedByTeam, array($group));
        }
        return view('auth/login',compact('users', 'sensoredDatas' ,'sensoredDatasGroupedByTeam', 'userGroupByTeam'));
    }   

    /**
     * Display a view based on first route param
     *
     * @return \Illuminate\Http\Response
     */
    public function root($first)
    {
        if ($first != 'assets')
            return view($first);
        return view('index');
    }

    //second level route
    public function secondLevel($first, $second)
    {        
        if ($first != 'assets')
            return view($first.'.'.$second);
        return view('index');
    }

    //third level route
    public function thirdLevel($first, $second, $third)
    {
        if ($first != 'assets')
            return view($first.'.'.$second.'.'.$third);
        return view('index');
    }

    //dashboard-all 뷰에 데이터베이스값 연결
    public function dashboard_all(){
        $users = \App\User::all();
        $sensoredDatas = \App\sensoredDatas::all();
        $userGroupByTeam = \App\User::orderBy('team')->get()->groupBy('team');
        // dd($userGroupByTeam = DB::table('users')->whereNotIn('team', [0])->get());
        $sensoredDatasGroupedByTeam = [];
        foreach($userGroupByTeam as $group){
            $userGroup =  \App\User::all()->where('team',$group);
            array_push($sensoredDatasGroupedByTeam, array($group));
        }
        $today= Carbon::now()->subMonths(5);
        $DetectedUsers = $sensoredDatas->where('temperature','>=','37.5');
        $todayTime = Carbon::now()->subHours(1);

        return view('dashboard-all', compact('users', 'sensoredDatas' ,'sensoredDatasGroupedByTeam', 'userGroupByTeam','today', 'DetectedUsers', 'todayTime'));
    }
    
    //dashboard-user-temperature 뷰에 데이터베이스값 연결
    public function dashboard_temperature(){
        $users = \App\User::all();
        $sensoredDatas = \App\sensoredDatas::all();
        $userGroupByTeam = \App\User::orderBy('team')->get()->groupBy('team'); 
        $sensoredDatasGroupedByTeam = [];
        foreach($userGroupByTeam as $group){
            $userGroup =  \App\User::all()->where('team',$group);
            array_push($sensoredDatasGroupedByTeam, array($group));
        }
        return view('dashboard-user-temperature', compact('users', 'sensoredDatas' ,'sensoredDatasGroupedByTeam', 'userGroupByTeam'));
    }

    //상단 바
    public function topbar(){
        $users = \App\User::all();
        return view('topbar', compact('users'));
    }
    //접촉자 정보
    public function dashboard_contactor(){
        $users = \App\User::all();
        $sensoredDatas = \App\sensoredDatas::all();
        $messageLength =  $users->where('temperature','>=','37.5')->groupBy('id');
        return view('dashboard-contactor', compact('users','sensoredDatas','messageLength'));
    }
    //공지사항 정보
    public function dashboard_notice(){
        $users = \App\User::all();
        return view('dashboard-notice', compact('users'));
    }
    //출근시간,점심시간 정보
    public function dashboard_schedule(){
        $users = \App\User::all();
        return view('dashboard-schedule', compact('users'));
    }
    //좌석 정보
    public function dashboard_sit(){
        $users = \App\User::all();
        $userGroupByTeam = \App\User::orderBy('team')->get()->groupBy('team');
        return view('dashboard-sit', compact('users', 'userGroupByTeam'));
    }

    //좌석 정보
    public function dashboard_information(){
        $users = \App\User::all();
        $sensoredDatas = \App\sensoredDatas::all();
        $userGroupByTeam = \App\User::orderBy('team')->get()->groupBy('team'); 
        $sensoredDatasGroupedByTeam = [];
        foreach($userGroupByTeam as $group){
            $userGroup =  \App\User::all()->where('team',$group);
            array_push($sensoredDatasGroupedByTeam, array($group));
        }
        return view('dashboard-information', compact('users', 'sensoredDatas' ,'sensoredDatasGroupedByTeam', 'userGroupByTeam'));
    }

}