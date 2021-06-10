<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function users(){
        //실시간 유저 온도 및 로그인 현황
        $users = \App\User::all();
        $min = $users->min('temperature');
        $max = $users->max('temperature');
        $average = number_format((float)$users->avg('temperature'), 2, '.', '');
        $sum = $users->sum('isLoggedin');
        $count = $users->count();

        return response()->json([
        'users' => $users, 
        'min' => $min, 
        'max' => $max, 
        'average' => $average, 
        'sum' => $sum, 
        'count' => $count,
        ]);
    }

    public function groups(){
        //실시간 그룹 온도 및 로그인 현황
        $groups = \App\User::orderBy('team')->get()->groupBy('team');
        $groupInfos = [];
        foreach($groups as $group){
            $groupInfo = json_decode('{}');
            $groupInfo->team = $group[0]->team;
            $groupInfo->count = $group->count();
            $groupInfo->isLoggedin = $group->sum('isLoggedin');
            $groupInfo->max = $group->max('temperature');
            $groupInfo->avg = number_format((float)$group->avg('temperature'), 2, '.', '');
            $groupInfo->min = $group->min('temperature');
            array_push($groupInfos, $groupInfo);
        }
        // $groups_min = $groups->min('temperature');
        // $groups_max = $groups->max('temperature');
        // $groups_average = number_format((float)$groups->avg('temperature'), 2, '.', '');
        // $groups_sum = $groups->sum('isLoggedin');
        // $groups_count = $groups->count();

        return response()->json([
        'groups' => $groups,
        'groupInfos' => $groupInfos,
        'groupInfo' => $groupInfo
        ]);
    }

    // public function posts(){
    //     $posts = \App\Post::all();
    //     $id = $posts->max('id');

    //     return response()->json([
    //     'posts' => $posts,
    //     'id' => $id,
    //     ]);
    // }
}
