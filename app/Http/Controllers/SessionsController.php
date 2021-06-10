<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //로그인
    public function login(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'password' => 'required|min:3',
        ]);
        if($request['id'] == env('ADMIN_ID') && $request['password'] == env('ADMIN_PW')){
            //session 추가 : isAdmin = true;
            $request->session()->put('id', 'password');
            return redirect()->intended('dashboard/all')->with('관리자님,환영합니다.');
        }
        if(! auth()->attempt($request->only('id','password'),$request->has('remember'))){
            return back()->withInput()->with('flash_message','아이디 또는 비밀번호가 맞지 않습니다.');
        }
        return redirect()->intended('dashboard/all')->with(auth()->user()->name . '님,환영합니다.');
    }

//로그아웃
    public function destroy(){
        auth()->logout();
        return redirect()->intended('auth/login');
    }
}
